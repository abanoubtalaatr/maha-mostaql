<section class="main-dash">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <div class="text-right">
                        <h3 class="w-100">تصفح جميع المشاريع</h3>
                    </div>

                    <form action="" class="add-job float-start mt-4">
                        <div class="form-group first">
                            <select wire:model="filter" class="form-select shadow sort-of bg-white-2" aria-label="Default select example">
                                <option value="">الميزانيه</option>
                                <option value="50">50$ : 150$</option>
                                <option value="150">150$ : 350$</option>
                                <option value="350">350$ : اكثر</option>
                            </select>
                        </div>
                    </form>

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
                                <div class="d-flex gap-2 align-items-center fav-card-buttons">
                                    @if(!(new \App\Services\ProposalService())->applyBefore($project->id, auth()->id()))
                                    <a href="{{route('user.client.proposals.create', $project->id)}}" class="btn btn-preseved-jobs">تقدم</a>
                                    @endif
                                    @if(!(new \App\Services\FavouriteService())->projectIsFavourite($project->id))
                                        <button class="fav-card-fav-btn" wire:click="makeFavourite({{$project->id}})">
                                            <img src="{{asset('website/assets/images/fav-no-active.png')}}">
                                        </button>
                                    @endif

                                </div>
                                <!--  -->
                            </div>
                            <!-- end of fav card header -->
                            <!-- fav card footer -->
                            <div class="d-flex my-4 justify-content-between align-items-center">
                                <div class="d-flex gap-3 align-items-center">
                                    <img src="{{asset('website/assets/images/Avatar wrap.png')}}" class="rounded-circle fav-card-profile-img">
                                    <div>
                                        <p>{{$project->user? $project->user->name : ""}}</p>
                                        <p class="text-muted">{{\Illuminate\Support\Carbon::parse($project->created_at)->diffForHumans()}}</p>
                                    </div>
                                </div>
                                <div class="align-items-center d-flex fav-card-number">
                                    <span>{{$project->proposals? $project->proposals()->count():0}}</span>
                                    <p class="text-muted">عدد العروض</p>
                                </div>
                                <div class="">
                                    <p class="text-muted">حالة  المشروع</p>
                                    <span>{{$project->getStatus($project->status)}}</span>

                                </div>
                            </div>
                            <!-- end of fav card footer -->
                        </div>
                        @endforeach

                        <!-- end of fav card -->
                    </div>
                    <!-- end of container -->
                    <!-- pagination enable it when the page is full -->
                    <div class="col-md-12 my-4 position-relative">
                        {{ $projects->links() }}

                    </div>
                    <!-- pagination  -->
                </div>
            </div>
        </div>
    </div>
</section>
