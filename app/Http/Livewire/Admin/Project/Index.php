<?php

namespace App\Http\Livewire\Admin\Project;

use App\Constants\ProjectStatus;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $status;
    public $perPage =10;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->page_title = __('site.projects');
    }

    public function updatedPage()
    {
        $this->rowNumber = ($this->page - 1) * $this->perPage + 1;
    }

    public function accept(Project $project)
    {
        $project->update(['status' => ProjectStatus::OFFERS]);
    }

    public function getRecords()
    {
        return Project::query()
            ->when(!empty($this->status), function ($query) {
                return  $query->whereStatus($this->status);
            })
            ->latest()->orderBy('status')
            ->paginate();
    }

    public function resetData()
    {
        $this->reset(['status']);
    }

    public function render()
    {
        $records = $this->getRecords();

        return view('livewire.admin.projects.index', compact('records'))->layout('layouts.admin');
    }
}
