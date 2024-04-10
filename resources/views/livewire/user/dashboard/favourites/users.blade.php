<section class="main-dash">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <div class="d-flex justify-content-between mb-4 top-nav-flex">
                        <h2>المفضلة - المستقلين</h2>
                        <!--  -->
                        <div class="d-flex gap-3">
                            <a href="{{route('user.favourites.projects')}}" class="btn btn-balance-nav-sec ">
                                مشاريع
                            </a>
                            <a href="{{route('user.favourites.users')}}" class="btn btn-balance-nav-sec btn-balance-nav-sec-active">
                                مستقلين
                            </a>
                        </div>
                    </div>

                    <!-- fav card container -->
                    <div class="w-100 d-flex-column">
                        <!-- fav card -->
                        <div class="shadow fav-card-item">
                            <!-- header of fav card -->

                            @foreach($favorites as $favorite)
                            <div class="d-flex justify-content-between gap-1 align-items-center fav-card-header">
                                <!--  -->

                                <div>
                                    <h3 class="mb-3">{{$favorite->favoritable->first_name . " " . $favorite->favoritable->last_name}}</h3>
                                    <p class="mb-3">
                                        {{$favorite->favoritable->job_title}}
                                    </p>
                                </div>
                                <!--  -->
                                <div class="d-flex gap-2 align-items-center fav-card-buttons">
                                    <button class="btn btn-preseved-jobs">
                                        تواصل الان
                                    </button>
                                    @if((new \App\Services\FavouriteService())->userIsFavourite($favorite->favoritable->id))
                                        <button class="fav-card-fav-btn" wire:click="makeUserFavourite({{$favorite->favoritable->id}})">
                                            <img src="{{asset("website/assets/images/fav-icon.png")}}">
                                        </button>
                                    @endif
                                </div>
                                <!--  -->
                            </div>
                            <!-- end of fav card header -->
                            <!-- fav card footer -->

                            @endforeach
                            <!-- end of fav card footer -->
                        </div>
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
