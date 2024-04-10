<?php

namespace App\Http\Livewire\Admin\Project;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\ValidationTrait;

class Show extends Component
{
    use WithFileUploads, ValidationTrait;

    public $form;

    public function mount(Project $project)
    {
        $this->setLocation(37.7749, -122.4194);
        $this->page_title = __('site.project');
        $this->project = $project;
        $this->form = Arr::except($project->toArray(), ['updated_at', 'created_at', 'id']);
    }

    public function render()
    {
        return view('livewire.admin.projects.show')->layout('layouts.admin');
    }
}
