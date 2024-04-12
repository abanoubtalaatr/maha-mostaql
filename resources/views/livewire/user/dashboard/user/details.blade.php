<div>
    <div class="nav-sm">
        <div class="logo">
            <img src="{{asset('website/assets/images/logo.png')}}" alt="">
        </div>
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <section class="main-dash">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-11">
                    <div class="row">
                        <!-- <div class="col-md-12"> -->
                        <h2 class=" mb-5">
                            بيانات الحساب
                        </h2>

                        <!-- the right side -->
                        <div class="col-lg-12 col-sm-12 div-form">
                                <!--  -->

                                <div class="d-flex gap-3  first mb-4">
                                    @if($user->avatar)
                                        <img src="{{asset("uploads/pics/". $user->avatar)}}" class="rounded-circle fav-card-profile-img">
                                    @else
                                        <img src="{{asset('website/assets/images/Avatar wrap.png')}}" class="rounded-circle fav-card-profile-img">
                                    @endif
                                </div>
                                <div class="d-flex gap-3 first mb-4">
                                    <label>الاسم : </label>
                                    <p>{{$user->first_name . ' ' . $user->last_name}}</p>
                                </div>

                                <div class="d-flex gap-3 first mb-4">
                                    <label>المسمي الوظيفي : </label>
                                    <p>{{$user->job_title}}</p>
                                </div>

                                <div class="d-flex gap-3 first mb-4">
                                    <label>البلد : </label>
                                    <p>{{$user->country? $user->country->name :""}}</p>
                                </div>

                                <div class="d-flex gap-3 first mb-4">
                                    <label>التخصص : </label>
                                    <p>{{$user->specialty? $user->specialty->name :""}}</p>
                                </div>

                            @if(auth()->user()->id == $user->id)
                                @if(!(new \App\Services\FavouriteService())->userIsFavourite($user->id))
                                    <div class="d-flex gap-3 first mb-4">
                                        <button class="btn btn-primary " wire:click="addToFavorite({{$user->id}})">اضافتة في المفضلة</button>
                                    </div>
                                @endif
                            @endif
                            <hr>

                        </div>

                        <h3>معرض الاعمال</h3>
                        <div class="col-lg-12">
                        <div class="row mt-4">
                            @foreach($user->works as $work)
                                <div class="col-4 mb-4 border-right p-3">
                                    <a href="{{route('user.client.my_works.show', $work->id)}}">
                                        <p class="mb-2">{{ $work->title}}</p>
                                        <p><img class="rounded" src="{{asset('website/assets/images/proj-2.png')}}"></p>
                                    </a>
                                </div>

                            @endforeach

                        </div>
                        </div>
                        <!-- end of the right side -->
                        <!-- left side -->
                    </div>
                    <!-- end of left -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>

</div>
