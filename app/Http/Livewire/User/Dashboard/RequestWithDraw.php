<?php

namespace App\Http\Livewire\User\Dashboard;
use App\Constants\WalletStatus;
use App\Services\PayPalPaymentService;
use App\Services\RequestWithDrawService;
use App\Services\TapPaymentService;
use Livewire\Component;

class RequestWithDraw extends Component
{
    public $amountCanWithDraw;
    public $withdraw_type;
    public $toggleWithdraw = false;
    public $toggleChargeWallet = false;
    public $paypal_email = null, $bank_name = null, $bank_account = null, $card_name = null;
    public $charge_type, $charge_amount;

    public function mount()
    {
        $this->amountCanWithDraw = auth()->user()->wallets()->where('status', WalletStatus::CAN_DRAW_WIDTH)->sum('amount');
    }

    public function toggleWidthDrawModel()
    {
        $this->toggleWithdraw = !$this->toggleWithdraw;
    }

    public function toggleChargeWalletModal()
    {
        $this->toggleChargeWallet = !$this->toggleChargeWallet;
    }

    public function requestWithdraw()
    {
        // Validate withdrawal type
        $this->validate([
            'withdraw_type' => ['required', 'in:bank,paypal']
        ]);

        // Dynamically add validation rules based on withdrawal type
        $rules = [
            'amountCanWithDraw' => 'required|numeric|min:0',
        ];

        if ($this->withdraw_type == 'paypal') {
            $rules['paypal_email'] = 'required|email';
        } elseif ($this->withdraw_type == 'bank') {
            $rules['bank_account'] = 'required|string';
            $rules['card_name'] = 'required|string';
            $rules['bank_name'] = 'required|string';
        }

        // Validate input fields
        $this->validate($rules);

        if((new RequestWithDrawService())->hasRequestWithdrawPending(auth()->id())){
            $this->message = "لاستطيع عمل طلب سحب لانه يوجد طلب قيد المراجعة";
            return 0;
        }
        // Proceed with withdrawal request
        if ($this->amountCanWithDraw > 0) {
            (new RequestWithDrawService())->create(auth()->id(), $this->amountCanWithDraw, $this->withdraw_type, $this->paypal_email, $this->bank_name, $this->bank_account,$this->card_name);
            $this->message = "تم ارسال طلب السحب بنجاح. يرجى متابعة الإجراءات في الأيام القادمة.";
        } else {
            $this->message = 'لا يمكنك السحب لأن رصيدك غير كافٍ.';
            return 0;
        }

        // Redirect back to the withdrawal page
        return redirect()->to(route('user.request_withdraws'));
    }

    public function charge()
    {
        $this->validate(['charge_type' => ['required', 'in:paypal,bank'],'charge_amount' => ['required', 'min:1']]);

        if($this->charge_type =='paypal'){
            $data['first_name'] = auth()->user()->first_name;
            $data['last_name'] = auth()->user()->last_name;
            $data['price'] = $this->charge_amount;
            $data['id'] = auth()->id();

            return redirect()->away((new PayPalPaymentService())->pay($data));

        }else{
            $data['first_name'] = auth()->user()->first_name;
            $data['last_name'] = auth()->user()->last_name;
            $data['price'] = $this->charge_amount;
            $data['id'] = auth()->id();
            $data['type'] = 'charge';
            $data['mobile'] = auth()->user()->mobile;
            $data['email'] = auth()->user()->email;

            return redirect()->away((new TapPaymentService())->pay($data));
        }
    }
    public function render()
    {
        $requestWithDraws = auth()->user()->requestWithdraws()->latest()->get();

        $wallets = auth()->user()->wallets()->latest()->get();
        return view('livewire.user.dashboard.request_withdraws',
            compact('requestWithDraws', 'wallets')
        )->layout('layouts.user_dashboard');
    }
}
