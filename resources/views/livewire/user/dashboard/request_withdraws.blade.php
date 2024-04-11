<section class="main-dash">
    <div class="container">

        <!-- Modal -->
        @if($toggleWithdraw)
            @include('livewire.user.dashboard.popup.request_withdraw')
        @endif
        @if($toggleChargeWallet)
            @include('livewire.user.dashboard.popup.charge_wallet')
        @endif
        <div class="row d-flex justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <!--  -->
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <h2>السجلات</h2>
                        <div class="d-flex align-items-center gap-2">
                            <button class="btn btn-balance-nav-sec px-3 py-1" id="dash-open-modal-2" wire:click="toggleChargeWalletModal()">
                                شحن الرصيد
                            </button>
                            <button class="btn btn-balance-nav-first px-3 py-1" id="dash-open-modal" wire:click="toggleWidthDrawModel()">
                                سحب الرصيد
                            </button>
                        </div>
                    </div>

                    <!-- cards -->
                    <div class="balance-history-container">

                        @foreach($requestWithDraws as $requestWithDraw)
                            <div class="balance-history-card mb-2 shadow d-flex justify-content-between gap-3 px-4 align-items-center rad-20">
                                <h5>$ {{$requestWithDraw->amount}}</h5>
                                <div class="vert-line"></div>

                                @if($requestWithDraw->type == \App\Constants\RequestWithDrawType::PAYPAL)
                                    <div class="d-flex flex-column align-items-start justify-content-start my-4">
                                        <h5>  سحب بواسطة {{$requestWithDraw->paypal_email??''}}</h5>
                                        <p class="text-muted">{{\Illuminate\Support\Carbon::parse($requestWithDraw->created_at)->diffForHumans()}}</p>
                                    </div>
                                @endif
                                @if($requestWithDraw->type == \App\Constants\RequestWithDrawType::BANK)
                                    <div class="d-flex flex-column align-items-start justify-content-start my-4">
                                        <h5> سحب بواسطة : {{$requestWithDraw->bank_account??''}} </h5>
                                        <h5> بنك : {{$requestWithDraw->bank_name??''}}</h5>
                                        <h5>  اسم البطاقة : {{$requestWithDraw->card_name??''}}</h5>
                                        <p class="text-muted">{{\Illuminate\Support\Carbon::parse($requestWithDraw->created_at)->diffForHumans()}}</p>
                                    </div>
                                @endif
                                <div class="vert-line"></div>
                                <h5>{{\App\Constants\RequestDeliverStatus::getName($requestWithDraw->status)}}</h5>
                            </div>
                        @endforeach
                            <h2 class="mt-4">سجلات المحفظة</h2>
                        @foreach($wallets as $wallet)
                                <div class="balance-history-card mb-2 shadow d-flex justify-content-between gap-3 px-4 align-items-center rad-20">
                                    <h5>$ {{$wallet->amount}}</h5>
                                    <div class="vert-line"></div>

                                    <div class="d-flex flex-column align-items-start justify-content-start my-4">
                                        <h5>   {{\App\Constants\WalletType::getName($wallet->wallet_type)??''}}</h5>
                                    </div>

{{--                                    <div class="vert-line"></div>--}}
{{--                                    <h5>{{\App\Constants\WalletStatus::getName($wallet->status)}}</h5>--}}
                                </div>
                            @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

