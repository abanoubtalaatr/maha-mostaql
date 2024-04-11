<?php

namespace App\Services;

use App\Models\Favorite;
use App\Models\Project;
use App\Models\User;
use App\Models\Wallet;

class WalletService
{
    public function create($proposalId, $userId, $amount, $status, $walletType)
    {
        Wallet::query()->create([
            'proposal_id'=> $proposalId,
            'user_id' => $userId,
            'amount' => $amount,
            'status' => $status,
            'wallet_type' => $walletType,
        ]);
    }
}
