<section class="main-dash">
    <div class="container">
        <!-- modal withdraw money-->
        <div id="dash-modal">
            <div class="dash-modal-content">

            </div>
            <div class="dash-modal-backdrop"></div>
        </div>
        <!-- end modal withdraw money -->
        <div class="row d-flex justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <!--  -->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3>{{$project->title}}</h3>
                        <div class="d-flex align-items-center gap-2">

                        </div>
                    </div>
                    <!--  -->
                    @if($project->image)
                        <div>
                            <img height="200" src="{{asset('uploads/pics/'. $project->image)}}" class="project-details-container proj-img-details mt-2 shadow">
                        </div>
                    @endif
                    <!--  -->
                    <div class="project-details-container proj-details-text shadow">
                        <div>
                            <h4>تفاصيل المشروع</h4>
                            <hr>
                            <h4 class="mt-2">
                                {{$project->title}}
                            </h4>
                            <p class="mt-2">
                                <strong>الوصف : </strong>
                                <span>{{$project->description}}</span>
                            </p>

                            <p class="mt-2">
                                <strong>السعر : </strong>
                                <strong>  $   {{$project->price_from  .' - ' . $project->price_to}}</strong>
                            </p>

                            <p class="mt-2">
                                <strong>المدة : </strong>
                                <strong>     {{$project->period }}</strong>
                            </p>
                        </div>
                        <hr>
                        <div>
                            <h4>العروض</h4>

                            @foreach($project->proposals as $proposal)
                                <div>
                                    <h4 class="mt-2">
                                        <a href="{{route('user.shared.user.details',$project->user->id)}}">
                                            <strong> المستقل : </strong>
                                            <img class="mx-1 rounded-circle" height="40" width="40"  src="{{asset('website/assets/images/proj-2.png')}}">
                                            <span> {{$proposal->user->first_name . ' ' . $proposal->user->last_name}}</span>

                                        </a>
                                    </h4>
                                    @if((new \App\Services\ProposalService())->isOwnerProposal(auth()->id(), $project->id))
                                        <p class="mt-2">
                                        <strong>الوصف : </strong>
                                        <span>{{$proposal->description}}</span>
                                    </p>
                                        <p class="mt-2">
                                        <strong>السعر : </strong>
                                        <strong>$ {{$proposal->price}}</strong>
                                    </p>
                                        <p class="mt-2">
                                        <strong>القيمة المستحقة : </strong>
                                        <strong>$ {{$proposal->dues}}</strong>
                                    </p>
                                        <p class="mt-2">
                                        <strong>المدة : </strong>
                                        <strong> {{$proposal->period }}</strong>
                                    </p>
                                        <p class="mt-2">
                                        <strong>الحالة : </strong>
                                        <strong> {{$proposal->status }}</strong>
                                    </p>
                                    @endif

                                    @if((new \App\Services\ProjectService())->isProjectOwner($project->id, auth()->id()))

                                        @if(!(new \App\Services\ProjectService())->isProjectImplement($project->id))
                                            <button class="btn btn-primary mt-4" wire:click="acceptProposal({{$proposal->id}})"> قبول العرض </button>
                                        @endif
                                        @endif
                                </div>
                                <hr>

                            @endforeach
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
    </div>
</section>
