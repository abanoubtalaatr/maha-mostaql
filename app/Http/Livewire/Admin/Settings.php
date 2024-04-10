<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Support\Arr;
use App\Http\Livewire\Traits\ValidationTrait;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use ValidationTrait;
    use WithFileUploads;

    public $form, $page_title, $settings, $pay_cash, $pay_online, $mission_image, $objective_image, $vision_image, $video_url;
    public $progress = 0, $latitude, $longitude;

    public function mount()
    {
        $this->page_title = __('admin.settings');
        $this->settings = Setting::first();
        $this->form = Arr::except($this->settings->toArray(), ['id', 'created_at', 'updated_at']);
        $this->latitude = $this->settings->lat ?? env('DEFAULT_LATITUDE');
        $this->longitude = $this->settings->lng ?? env('DEFAULT_LONGITUDE');

    }

    public function update()
    {
        $this->validate();

        $this->settings->update($this->form);

        return redirect()->to(route('admin.settings'))->with('success_message', __('site.saved'));
    }

    public function getRules()
    {

        return [
            'form.email' => 'email',
            'form.facebook' => 'string|min:10|max:1000',
            'form.instagram' => 'string|min:10|max:1000',
            'form.twitter' => 'string|min:10|max:1000',
            "form.commission" => ['required', 'integer'],
            "form.number_of_days_to_receive_money" => ['required', 'integer'],
            ];
    }
    public function render()
    {
        return view('livewire.admin.settings')->layout('layouts.admin');
    }
}
