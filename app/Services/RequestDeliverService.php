<?php

namespace App\Services;

use App\Constants\ProjectStatus;
use App\Constants\ProposalStatus;
use App\Constants\RequestDeliverStatus;
use App\Constants\WalletStatus;
use App\Models\Proposal;

class RequestDeliverService
{
    public SendGridService $sendGridService;
    public WalletService $walletService;

    public function __construct()
    {
        $this->sendGridService = new SendGridService();
        $this->walletService = new WalletService();
    }

    /**
     * @param $proposalId
     * @return void
     */
    public function acceptRequest($proposalId): void
    {
        $proposal = Proposal::query()->findOrFail($proposalId);

        //update project status
        $proposal->project->update(['status' => ProjectStatus::DELIVERY]);

        $data['project'] = $proposal->project;


        // send notification to accept your request
        $this->sendGridService->sendMail('مبروك تم قبول طلب تسليمك علي المشروع', $proposal->user->email,$data,'emails.proposal.accept_request_deliver');
        // append in wallet with user id , amount (proposal dues) , proposal id, status ,

        $this->walletService->create($proposalId, $proposal->user->id,$proposal->dues,WalletStatus::PENDING);


        //update proposal accept request then update update the proposal status

        $proposal->update(['status_request_to_deliver' => RequestDeliverStatus::ACCEPT, 'status' => ProposalStatus::DONE]);
    }

    /**
     * @param $proposalId
     * @return bool
     */
    public function isSendRequestDeliver($proposalId): bool
    {
        return Proposal::query()
            ->where('id', $proposalId)
            ->where('status_request_to_deliver', RequestDeliverStatus::ACCEPT)
            ->exists();
    }
}
