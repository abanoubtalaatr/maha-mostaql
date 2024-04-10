<?php

namespace App\Http\Livewire\Admin\Country;

use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $name, $page_title;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->page_title = __('admin.countries');
    }

    public function destroy(Country $country)
    {
        $country->delete();
    }

    public function getRecords()
    {
        return Country::query()
            ->when($this->name, function ($query) {
                return $query->where('name', 'LIKE', '%' . $this->name . '%');
            })
            ->latest()
            ->paginate();
    }

    public function render()
    {
        $records = $this->getRecords();

        return view('livewire.admin.countries.index', compact('records'))->layout('layouts.admin');
    }
}
