<?php

namespace App\Http\Livewire\Admin\Specialty;

use App\Models\Country;
use App\Models\Specialty;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $name, $page_title;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->page_title = __('admin.specialties');
    }

    public function destroy(Specialty $specialty)
    {
        $specialty->delete();
    }

    public function getRecords()
    {
        return Specialty::query()
            ->when($this->name, function ($query) {
                return $query->where('name', 'LIKE', '%' . $this->name . '%');
            })
            ->latest()
            ->paginate();
    }

    public function render()
    {
        $records = $this->getRecords();

        return view('livewire.admin.specialties.index', compact('records'))->layout('layouts.admin');
    }
}
