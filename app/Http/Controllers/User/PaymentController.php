<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function Symfony\Component\VarDumper\Dumper\esc;

class PaymentController extends Controller
{
    protected $view = "site.payment.";
    protected $tripController;
    protected $notification;


    public function payment_success(Payment $payment)
    {
        return view("{$this->view}success", compact('payment'));
    }

    public function payment_failed(Payment $payment)
    {
        return view("{$this->view}success", compact('payment'));
    }

    public function payment_response(Request $request)
    {
        $data = $request;
        $ResponseCode = $data['ResponseCode'];
        $item_id = $data['TrackId'];
        $payFor = $data['payFor'] ? $data['payFor'] : 'service';

        $order = Order::query()->find($request->TrackId);

        if($request->ResponseCode == 000) {
            $order->update(['is_paid' => 1]);
            $payment = Payment::create([
                'user_id' => auth()->id(),
                'payFor' => $payFor,
                'TrackId' => $item_id,
                'ResponseCode' => $ResponseCode,
                'PaymentId' => $request->PaymentId,
                'TranId' => $request->TranId,
                'Result' => $request->Result,
                'amount' => $request->amount,
                'cardBrand' => $request->cardBrand,
                'email' => $request->email,
            ]);

            return redirect()->route('user.payment.success', $payment->id);
        }else{
            if($order) {
                $order->delete();
            }

            return redirect()->route('user.payment.failed');
        }
    }

}
