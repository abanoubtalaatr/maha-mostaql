<?php

namespace App\Services;

use Exception;
use App\Models\Proposal;
use App\Constants\ProjectStatus;
use App\Constants\ProposalStatus;
use Illuminate\Support\Facades\DB;
use App\Constants\RequestDeliverStatus;

class ProposalService
{
    public function applyBefore($project, $userId)
    {
        return Proposal::query()->where('project_id', $project)->where('user_id', $userId)->exists();
    }

    public function isOwnerProposal($userId, $proposalId)
    {
        return Proposal::query()->where('id', $proposalId)->where('user_id', $userId)->exists();
    }

    public function acceptProposal($proposal)
    {

        try {
            DB::beginTransaction();
            $proposal = Proposal::query()->find($proposal);


            $data['project'] = $proposal->project;

            //send email to user your proposal is acceptable
            (new SendGridService())->sendMail("Your proposal has been accepted", $proposal->user->email, $data, 'emails.Proposal.accept');

            //update the reset of proposal on this project with excluded
            Proposal::query()->where('project_id', $proposal->project->id)->where('id', '!=', $proposal->id)->update(['status' => ProposalStatus::EXCLUDED]);

            $paymentData['price'] = $proposal->price;
            $paymentData['project'] = $proposal->project->id;
            $paymentData['id'] = auth()->id();


            //update project status
            $proposal->project()->update(['status' => ProjectStatus::IMPLEMENTS]);

            // update proposal with accept
            $proposal->update(['status' => ProposalStatus::ACCEPT]);


            return redirect()->to((new PayPalPaymentService())->pay($data));
        } catch (Exception) {
            DB::rollback();
        }
    }

    public function isProposalAccepted($proposal)
    {
        return Proposal::query()->where('id', $proposal)->where('status', ProposalStatus::ACCEPT)->exists();
    }

    public function requestToDeliverProposal($proposalId)
    {
        $proposal = Proposal::query()->findOrFail($proposalId);

        $data['project'] = $proposal->project;

        (new SendGridService())->sendMail('طلب تسليم الصفقة', $proposal->user->email, $data, 'emails.proposal.request_deliver_project');

        $proposal->update(['request_to_deliver' => 1, 'status_request_to_deliver' => RequestDeliverStatus::PENDING]);
    }

    public function isRequestToDeliver($proposalId)
    {
        return Proposal::query()->where('id', $proposalId)->where('request_to_deliver', 1)->where('status_request_to_deliver', RequestDeliverStatus::PENDING)->exists();
    }
}
