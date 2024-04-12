<section class="main-dash">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <div class="d-flex justify-content-between mb-4 top-nav-flex">
                        <h2>المفضلة - المشاريع</h2>
                        <!--  -->
                        <div class="d-flex gap-3">
                            <a href="{{route('user.favourites.projects')}}" class="btn btn-balance-nav-sec btn-balance-nav-sec-active">
                                مشاريع
                            </a>
                            <a href="{{route('user.favourites.users')}}" class="btn btn-balance-nav-sec ">
                                مستقلين
                            </a>
                        </div>
                    </div>

                    <!-- fav card container -->
                    <div class="w-100 d-flex-column">
                        <!-- fav card -->
                        @foreach($favorites as $favorite)
                            <div class="shadow fav-card-item">
                            <!-- header of fav card -->

                            <div class="d-flex justify-content-between gap-1 align-items-center fav-card-header">
                                <!--  -->
                                <div>
                                    <h3 class="mb-3">{{$favorite->favoritable->user->first_name . ' '.$favorite->favoritable->user->last_name }}</h3>
                                    <p class="mb-3">
                                        {{$favorite->favoritable->description}}
                                    </p>
                                    <div class="d-flex align-items-center gap-3">

                                        <p class="t-color-primary">
                                            <img src="{{asset('website/assets/images/wallet.png')}}" alt="">
                                            <strong> $   {{$favorite->favoritable->price_from  .' - '. $favorite->favoritable->price_to }}</strong>
                                        </p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="d-flex gap-2 align-items-center fav-card-buttons">
                                    <button class="btn btn-preseved-jobs">
                                        تواصل الان
                                    </button>
                                    @if((new \App\Services\FavouriteService())->projectIsFavourite($favorite->favoritable->id))
                                    <button class="fav-card-fav-btn" wire:click="makeFavouriteProject({{$favorite->favoritable->id}})">
                                        <img src="{{asset("website/assets/images/fav-icon.png")}}">
                                    </button>
                                    @endif
                                </div>
                                <!--  -->
                            </div>
                            <!-- end of fav card header -->
                            <!-- fav card footer -->
                            <div class="d-flex my-4 justify-content-between align-items-center">
                                <div class="d-flex gap-3 align-items-center">
                                    <img src="{{asset("website/assets/images/Avatar wrap.png")}}" class="rounded-circle fav-card-profile-img">
                                    <div>
                                        <p>المسمي الوظيفي</p>
                                        <p class="text-muted">منذ : 5 ايام</p>
                                    </div>
                                </div>
                                <div class="align-items-center d-flex fav-card-number">
                                    <span>2</span>
                                    <p class="text-muted">عدد العروض</p>
                                </div>
                            </div>
                            <!-- end of fav card footer -->
                        </div>
                        @endforeach
                        @if($favorites->count() ==0 )
                            <div class="text-center">
                                <h3>لايوجد بيانات حاليا</h3>
                            </div>
                        @endif
                        <!-- end of fav card -->

                    </div>
                    <!-- end of container -->
                    <!-- pagination enable it when the page is full -->
                    <div class="col-md-12 my-4 position-relative">
                        {{$favorites->links()}}
                    </div>
                    <!-- pagination  -->
                </div>
            </div>
        </div>
    </div>
</section>
