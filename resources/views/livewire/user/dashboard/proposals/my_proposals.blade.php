<section class="main-dash">
    <div class="container">
        <div class="row d-flex package-info-cont">
            <div class="col-md-11">
                <div class="row">
                    <div class="text-right">
                        <h3 class="w-100">اخر العروض المقدمة</h3>
                    </div>

                    <div class="col-md-12">
                        <div class="d-flex mt-4 gap-3 align-items-center justify-content-between w-100 dash-job-search">
                            <select wire:model="status" class="form-select form-select-md custom-dropdown custom-input-padding shadow">
                                <option>رتب حسب حالة العرض</option>
                                @foreach(\App\Constants\ProposalStatus::all() as $proposal)
                                    <option value="{{$proposal}}">{{\App\Constants\ProposalStatus::getName($proposal)}}</option>
                                @endforeach
                            </select>
                            <select wire:model="created_at" class="custom-dropdown shadow form-select form-select-md custom-input-padding">
                                <option>عرض الاقدم للاحدث</option>
                                <option value="asc">اقدم</option>
                                <option value="desc">احدث</option>
                            </select>
                        </div>
                    </div>
                    <!--  -->
                    <!-- fav card container -->
                    <div class="w-100 d-flex-column">
                        <!-- fav card -->
                        @foreach($proposals as $proposal)
                            <div class="shadow fav-card-item">
                            <!-- header of fav card -->

                            <div class="d-flex justify-content-between gap-1 align-items-center fav-card-header">
                                <!--  -->
                                <div>
                                    <h3 class="mb-3">{{$proposal->project->title}}</h3>
                                    <p class="mb-3">{{$proposal->project->description}}</p>

                                    <div class="d-flex align-items-center gap-3">
                                        <p class="t-color-primary">
                                            <img src="{{asset('website/assets/images/wallet.png')}}" alt="">
                                            <strong> {{$proposal->project->price_from}} - {{$proposal->project->price_to}} $</strong>
                                        </p>
                                    </div>
                                    <br>

                                </div>
                                <!--  -->
                                <div class="d-flex gap-2 align-items-center fav-card-buttons">

                                </div>
                                <!--  -->
                            </div>
                            <!-- end of fav card header -->
                            <!-- fav card footer -->
                                <p>معلومات عرضك </p>
                            <div class="d-flex my-4  align-items-center">

                                <div class="align-items-center d-flex fav-card-number">
                                    <p class="text-muted mx-2">عدد العروض</p>
                                    <span class="mx-2">{{$proposal->project->proposals()->count()}}</span>
                                </div>

                                <div class="align-items-center d-flex fav-card-number mx-3">
                                    <p class="text-muted mx-3">الحالة</p>
                                    <button class="btn btn-info">{{$proposal->getStatus($proposal->status)}}</button>
                                </div>

                                <div class="align-items-center d-flex fav-card-number mx-3">
                                    <p class="text-muted mx-3">المدة</p>
                                    <p class="mx-2">{{$proposal->period}}</p> يوم
                                </div>

                                <div class="align-items-center d-flex fav-card-number mx-3">
                                    <p class="text-muted mx-3">السعر </p>
                                    <p class="mx-2">{{$proposal->price}}</p>
                                </div>

                                <div class="align-items-center d-flex fav-card-number mx-3">
                                    <p class="text-muted mx-3">العرض </p>
                                    <p class="mx-2">{{$proposal->description}}</p>
                                </div>

                            </div>
                                <hr>
                                @if($proposal->status == 2)
                                <button class="btn btn-warning" wire:click="requestToDeliverProposal({{$proposal->id}})">طلب تسليم الصفقة </button>
                                @endif
                            <!-- end of fav card footer -->
                        </div>
                        @endforeach
                        <!-- end of fav card -->
                    </div>
                    <!-- end of container -->
                    <!-- pagination enable it when the page is full -->
                    <div class="col-md-12 my-4 position-relative">
                        {{ $proposals->links() }}

                    </div>
                    <!-- pagination  -->
                    <!--  -->
                </div>
            </div>
        </div>
    </div>
</section>
