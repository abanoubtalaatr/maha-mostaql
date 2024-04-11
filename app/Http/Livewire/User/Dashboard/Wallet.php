<?php

namespace App\Http\Livewire\User\Dashboard;
use App\Constants\WalletStatus;
use Livewire\Component;

class Wallet extends Component
{
    public function render()
    {
        $totalBalance = auth()->user()->wallets()->sum('amount');
        $pendingBalance = auth()->user()->wallets()->where('status', WalletStatus::PENDING)->sum('amount');
        $canWithDraw = auth()->user()->wallets()->where('status', WalletStatus::CAN_DRAW_WIDTH)->sum('amount');

        return view('livewire.user.dashboard.wallet',
            compact('totalBalance', 'pendingBalance', 'canWithDraw')
        )->layout('layouts.user_dashboard');
    }
}
