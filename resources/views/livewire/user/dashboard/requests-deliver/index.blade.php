<section class="main-dash">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <div class="text-right">
                        <h3 class="w-100">طلبات التسليم علي المشاريع</h3>
                    </div>

                    <!-- fav card container -->
                    <div class="w-100 d-flex-column">
                        <!-- fav card -->

                        @foreach($projects as $project)
                            <div class="shadow fav-card-item">
                                <div class="d-flex justify-content-between gap-1 align-items-center fav-card-header">
                                    <div>
                                        <h3 class="mb-3">{{$project->title}}</h3>
                                        <p class="mb-3">{{$project->description}}</p>
                                        <div class="d-flex align-items-center gap-3">
                                            <p class="t-color-primary">
                                                <img src="{{asset('website/assets/images/wallet.png')}}" alt="">
                                                <strong>{{$project->price_from}} - {{ $project->price_to > 0 ? $project->price_to : "اكثر" }} $</strong>
                                            </p>
                                        </div>
                                    </div>
                                    <!--  -->

                                    <!--  -->
                                </div>
                                <!-- end of fav card header -->
                                <!-- fav card footer -->
                                <hr>
                                <h4>العرض</h4>
                                <div class="d-flex my-4 justify-content-between align-items-center">
                                    <div class="d-flex gap-3 align-items-center">
                                        @if($project->user->avatar)
                                            @php
                                                $image = $project->user->avatar;
                                            @endphp
                                            <img src="{{asset("uploads/pics/$image")}}" class="rounded-circle fav-card-profile-img">
                                        @else
                                            <img src="{{asset('website/assets/images/Avatar wrap.png')}}" class="rounded-circle fav-card-profile-img">
                                        @endif

                                        <div>
                                            <p>{{$project->user? $project->user->name : ""}}</p>
                                            <p class="text-muted">{{\Illuminate\Support\Carbon::parse($project->created_at)->diffForHumans()}}</p>
                                        </div>
                                    </div>
                                    <div class="align-items-center d-flex fav-card-number">
                                        <span>{{$project->proposals? $project->proposals()->count():0}}</span>
                                        <p class="text-muted">عدد العروض</p>
                                    </div>
                                </div>
                                @foreach($project->proposals as $proposal)
                                    <div class="d-flex my-4  align-items-center">

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

                                        @if(!(new \App\Services\RequestDeliverService())->isSendRequestDeliver($proposal->id))
                                            <div class="d-flex border p-2">
                                                <div class="align-items-center d-flex fav-card-number mx-3">
                                                    <button class="btn btn-primary" wire:click="acceptRequest({{$proposal->id}})"> قبول</button>
                                                </div>
                                            </div>
                                        @else
                                            <button class="btn btn-info">تم قبول الطلب من قبل</button>
                                        @endif
                                    </div>
                                @endforeach

                                <!-- end of fav card footer -->
                            </div>
                        @endforeach

                        <!-- end of fav card -->
                    </div>
                    <!-- end of container -->
                    <!-- pagination enable it when the page is full -->
                    <div class="col-md-12 my-4 position-relative">
                        {{$projects->links()}}
                    </div>
                    <!-- pagination  -->
                </div>
            </div>
        </div>
    </div>
</section>
