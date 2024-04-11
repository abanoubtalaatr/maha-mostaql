<?php

namespace App\Http\Livewire\User;

use App\Constants\ProjectStatus;
use App\Http\Livewire\Traits\ValidationTrait;
use App\Models\Country;
use App\Models\Project;
use App\Services\FavouriteService;
use Illuminate\Http\Request;
use Livewire\Component;

class ProjectSearch extends Component
{
    use ValidationTrait;

    public $countries;
    public $day;
    public $period;
    public $price, $title, $country_id, $specialty_id;

    public function mount(Request $request)
    {
        if($request->has('country')) {
            $this->country_id = $request->input('country');
        }
        if($request->has('specialty')){
            $this->specialty_id = $request->input('specialty');
        }

        if($request->has('title')){
            $this->title = $request->input('title');
        }
        $this->countries = Country::query()->get();
    }

    public function makeFavourite($projectId)
    {
        $favourite = (new FavouriteService())->projectIsFavourite($projectId, auth()->id());

        if(!$favourite){
            (new FavouriteService())->create($projectId, auth()->id());
        }else{
            (new FavouriteService())->delete($projectId, auth()->id());
        }
    }

    public function getRecords()
    {
        return Project::query()
            ->where('status', '!=', ProjectStatus::REVIEW)
            ->when($this->day, function ($query) {
                if ($this->day == 'one-hour') {
                    // Filter for 1 hour
                    $query->where('created_at', '>=', now()->subHour());
                } else {
                    // Filter for other day values
                    $query->whereDate('created_at', '>=', now()->subDays($this->day));
                }
            })
            ->when($this->title, function($query){
                $query->where('title', 'like', '%' . $this->title . '%');
            })
            ->when($this->specialty_id, function ($query) {
                $query->where('specialty_id', $this->specialty_id);
            })
            ->when($this->country_id, function ($query) {
                $query->whereHas('user', function ($userQuery) {
                    $userQuery->whereHas('country', function ($countryQuery){
                        $countryQuery->where('id', $this->country_id);
                    });
                });
            })
            ->when($this->period, function ($query) {
                $periodValues = explode(',', $this->period);

                // Ensure that there are exactly two values
                if (count($periodValues) == 2) {
                    // Cast each element to an integer
                    $periodValues = array_map('intval', $periodValues);

                    $query->whereBetween('period', $periodValues);
                }
            })

            ->when($this->price, function ($query) {
                $query->where('price_from', '>', $this->price);
            })
            ->latest()
            ->paginate(config('app.per_page'));

    }


    public function render()
    {
        $projects = $this->getRecords();

        return view('livewire.user.project-search', compact('projects'))->layout('layouts.project');
    }
}
