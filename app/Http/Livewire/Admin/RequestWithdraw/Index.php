<?php

namespace App\Http\Livewire\Admin\RequestWithdraw;

use App\Constants\RequestWithDrawStatus;
use App\Constants\WalletStatus;
use App\Models\RequestWithdraw;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $status;
    public $perPage =10;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->page_title = __('admin.request_withdraws');
    }

    public function updatedPage()
    {
        $this->rowNumber = ($this->page - 1) * $this->perPage + 1;
    }

    public function accept(RequestWithdraw $requestWithdraw)
    {
        $requestWithdraw->user->wallets()->where('status', WalletStatus::CAN_DRAW_WIDTH)->update(['status' => WalletStatus::WITHDRAW_DONE]);
        
        $requestWithdraw->update(['status' => RequestWithDrawStatus::COMPLETE]);
    }

    public function getRecords()
    {
        return RequestWithdraw::query()
            ->when(!empty($this->status), function ($query) {
                return  $query->whereStatus($this->status);
            })
            ->latest()->orderBy('status')
            ->paginate();
    }

    public function resetData()
    {
        $this->reset(['status']);
    }

    public function render()
    {
        $records = $this->getRecords();

        return view('livewire.admin.request_withdraws.index', compact('records'))->layout('layouts.admin');
    }
}
