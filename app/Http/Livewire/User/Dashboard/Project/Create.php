<?php

namespace App\Http\Livewire\User\Dashboard\Project;

use App\Constants\ProjectStatus;
use App\Http\Livewire\Traits\ValidationTrait;
use App\Models\Project;
use App\Services\PayPalPaymentService;
use App\Services\SendGridService;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use SendGrid;
use Srmklive\PayPal\Providers\PayPalServiceProvider;
use Srmklive\PayPal\Services\PayPal;

use function App\Helpers\isFreelancer;

class Create extends Component
{
    use ValidationTrait;
    use WithFileUploads;

    public $form, $price, $image, $imageUrl;

    public function store()
    {
        $this->validate();

        $priceAfterExplode = explode('-', $this->price);

        $this->validate([
            'image' => 'nullable|image|max:1024', // Max file size of 1MB
        ]);

        $this->form['image'] =
            $this->image ?
            $this->image->storeAs(date('Y/m/d'), Str::random(50) . '.' . $this->image->extension(), 'public') : null;

        $priceFrom = $priceAfterExplode[0];

        if (isset($priceAfterExplode[1])) {
            $priceTo = $priceAfterExplode[1];
        } else {
            $priceTo  = 0;
        }

        $this->form['price_from'] = $priceFrom;
        $this->form['price_to'] = $priceTo;


        $this->form['user_id'] = auth()->id();

        $this->form['status'] = ProjectStatus::REVIEW;

        Project::query()->create($this->form);

        // send email to the client
        $clientEmail = env('CLIENT_EMAIL', 'moaeen2024@gmail.com');

        (new SendGridService())->sendMail('تم اضافة مشروع جديد علي المنصة', $clientEmail, [], 'emails.projects.new-project');
        return redirect()->route('user.owner.projects.index');
    }

    public function updatedImage()
    {
        // Update the image preview URL
        $this->imageUrl = $this->image->temporaryUrl();
    }


    public function getRules()
    {
        return [
            'form.title' => ['required', 'string', 'min:3', 'max:200'],
            'form.link' => ['nullable'],
            'form.period' => ['required', 'min:1', 'max:1000'],
            'form.description' => ['required', 'string', 'min:3', 'max:5000'],
            'form.image' => ['nullable'],
            'price' => ['required'],
            'form.specialty_id' => ['required', 'exists:specialties,id']
        ];
    }

    public function render()
    {
        return view('livewire.user.dashboard.projects.create')->layout('layouts.user_dashboard');
    }
}
