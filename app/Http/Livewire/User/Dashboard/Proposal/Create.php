<?php

namespace App\Http\Livewire\User\Dashboard\Proposal;

use App\Http\Livewire\Traits\ValidationTrait;
use App\Models\Project;
use App\Models\Proposal;
use App\Models\Setting;
use Livewire\Component;
use function App\Helpers\isFreelancer;

class Create extends Component
{
    use ValidationTrait;

    public $form, $price, $project;

    public function mount(Project $project)
    {
        if (!isFreelancer()) {
            abort(403);
        }

        $this->form['project_id'] = $project->id;
        $this->form['user_id'] = auth()->id();
        $this->project = $project;
    }

    public function store()
    {
        $this->validate();

        Proposal::query()->create($this->form);

        return redirect()->route('user.client.proposals.my_proposals');
    }

    public function UpdatedFormPrice()
    {
        if ($this->form['price']) {
            $commission = Setting::query()->first()->commission;

            if ($commission) {
                $commission  = ($commission / 100) * $this->form['price'];
                $this->form['dues'] = $this->form['price'] - $commission;
            } else {
                $this->form['dues'] = $this->form['price'] - 10;
                if ($this->form['dues'] < 0) {
                    $this->form['dues'] = 0;
                }
            }
        }
    }


    public function getRules()
    {
        return [
            'form.price' => ['required', 'min:1'],
            'form.period' => ['required', 'min:1'],
            'form.description' => ['required', 'min:3', 'max:500'],
        ];
    }

    public function render()
    {
        return view('livewire.user.dashboard.proposals.create')->layout('layouts.user_dashboard');
    }
}
