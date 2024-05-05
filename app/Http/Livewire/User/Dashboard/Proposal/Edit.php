<?php

namespace App\Http\Livewire\User\Dashboard\Proposal;

use App\Models\Work;
use App\Models\Setting;
use Livewire\Component;
use App\Models\Proposal;
use Illuminate\Support\Arr;
use function App\Helpers\isFreelancer;
use App\Http\Livewire\Traits\ValidationTrait;

class Edit extends Component
{
    use ValidationTrait;

    public $form, $proposal, $project;

    public function mount(Proposal $proposal)
    {
        if (!isFreelancer()) {
            abort(403);
        }

        $this->proposal = $proposal;
        $this->project = $proposal->project;


        $this->form = Arr::only($proposal->toArray(), ['price', 'period', 'description', 'dues']);
    }

    public function update()
    {
        $this->validate();


        $this->proposal->update($this->form);

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
        return view('livewire.user.dashboard.proposals.edit')->layout('layouts.user_dashboard');
    }
}
