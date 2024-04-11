<?php

namespace App\Services;

use App\Constants\RequestWithDrawStatus;
use App\Constants\RequestWithDrawType;
use App\Models\RequestWithdraw;

class RequestWithDrawService
{
    public function create($userId, $amount, $type, $paypalEmail =null, $bankName =null,$bankAccount = null,$cardName = null)
    {
        RequestWithdraw::query()->create([
            'user_id' => $userId,
            'amount' => $amount,
            'type' => $type,
            'status' => RequestWithDrawStatus::PENDING,
            'paypal_email' => $paypalEmail,
            'bank_name' => $bankName,
            'bank_account' => $bankAccount,
            'card_name' => $cardName,
        ]);
    }

    public function hasRequestWithdrawPending($userId)
    {
        return RequestWithdraw::query()->where('status', RequestWithDrawStatus::PENDING)->where('user_id', $userId)->exists();
    }
}
