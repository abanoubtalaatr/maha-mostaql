<section class="jobs-company">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5 mt-2 d-lg-2">
                <form action="" class="filter-box add-job">
                    <h3 class="head-label">نص البحث</h3>
                    <div class="form-group first mb-4">
                        <input type="search" wire:model="title" class="form-control shadow add-icon-2 bg-white-2" placeholder="ادخل نص البحث" id="useremail">
                    </div>
                    <h3 class="head-label">الدوله</h3>
                    <div class="form-group first mb-4">
                        <select wire:model="country_id" class="form-select shadow bg-white-2" aria-label="Default select example">
                            <option value>أختر المدينة</option>
                            @foreach(\App\Models\Country::all() as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h3 class="head-label">التخصص</h3>
                    <div class="form-group first mb-4">
                        <select wire:model="specialty_id" class="form-select shadow bg-white-2" aria-label="Default select example">
                            <option value>أختر التخصص</option>
                            @foreach(\App\Models\Specialty::all() as $specialty)
                                <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <h3 class="head-label">تاريخ النشر</h3>
                    <div class="form-check">
                        <label class="form-check-label form-check-input-2 container-box" for="inlineRadio4">اخر ساعه
                            <input wire:model="day" value="one-hour" class="form-check-input input-radio-2" type="radio" name="inlineRadioOptions1" id="inlineRadio4" value="option4" checked="">

                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label form-check-input-2 container-box" for="inlineRadio3">اخر 24 ساعه
                            <input wire:model="day" value="1" class="form-check-input input-radio-2" type="radio" name="inlineRadioOptions1" id="inlineRadio3" value="option3">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label form-check-input-2 container-box" for="inlineRadio40">اخر 7 ايام
                            <input wire:model="day" value="7" class="form-check-input input-radio-2" type="radio" name="inlineRadioOptions1" id="inlineRadio40" value="option40" checked="">

                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label form-check-input-2 container-box" for="inlineRadio30">اخر 14 ايام
                            <input wire:model="day" value="14" class="form-check-input input-radio-2" type="radio" name="inlineRadioOptions1" id="inlineRadio30" value="option30">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="form-check mb-4">
                        <label class="form-check-label form-check-input-2 container-box" for="inlineRadio300">اخر 30 ايام
                            <input wire:model="day" value="30" class="form-check-input input-radio-2" type="radio" name="inlineRadioOptions1" id="inlineRadio300" value="option300">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <h3 class="head-label">مدة التسليم</h3>
                    <div class="mb-4 form-check">
                        <label class="form-check-label container-box container-box-label" for="exampleCheck1">
                            من 1 إلى 2 أسابيع

                            <input  type="radio" wire:model="period" value="7,14" class="form-check-input form-check-remmembr" id="exampleCheck1">
                            <span class="checkmark checkmark-2"></span>
                        </label>
                    </div>
                    <div class="mb-4 form-check">
                        <label class="form-check-label container-box container-box-label" for="exampleCheck10">من 2 أسابيع إلى شهر
                            <input type="radio" wire:model="period" value="14,29" class="form-check-input form-check-remmembr" id="exampleCheck10" checked="">
                            <span class="checkmark checkmark-2"></span>
                        </label>
                    </div>
                    <div class="mb-4 form-check">
                        <label class="form-check-label container-box container-box-label" for="exampleCheck100">
                            اكثر من شهر
                            <input type="radio" wire:model="period" value="30,1000" class="form-check-input form-check-remmembr" id="exampleCheck100">
                            <span class="checkmark checkmark-2"></span>
                        </label>
                    </div>
                </form>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" class="add-job float-start">
                            <div class="form-group first">
                                <select wire:model="price" class="form-select shadow sort-of bg-white-2" aria-label="Default select example">
                                    <option selected="">الميزانيه</option>
                                    <option value="50">50$ : 150$</option>
                                    <option value="150">150$ : 350$</option>
                                    <option value="350">350$ : اكثر</option>
                                </select>
                            </div>
                        </form>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="float-start ms-3 d-sm-2"><img src="assets/images/filter.png" alt=""></a>
                        <h3 class="head-label mt-3">
                            <small class="filter-results">عدد النتائج في هذه الصفحه {{$projects->count()}} وظيفة</small>
                        </h3>
                    </div>

                    <div class="col-md-12 m-x-0">
                        @foreach($projects as $project)
                            <div class="job-card shadow row flex-sm-row-reverse">
                            <ol class="col-md-4">
                                <li>
                                    <a href="{{route('user.client.proposals.create', $project->id)}}" class="btn btn-preseved-jobs">تقدم</a>
                                </li>
                                @if(auth()->check())
                                <li>
                                    @if(!(new \App\Services\FavouriteService())->projectIsFavourite($project->id))
                                        <button class="fav-card-fav-btn" wire:click="makeFavourite({{$project->id}})">
                                            <img src="{{asset('website/assets/images/fav-no-active.png')}}">
                                        </button>
                                    @endif
                                </li>
                                @endif
                            </ol>
                            <div class="col-md-8">
                                <p>
                                    {{$project->title}}
                                </p>
                                <br>
                                <small>
                                    {{$project->description}}
                                </small>
                                <ul>
                                    <li>
                                        <img src="{{asset('website/assets/images/location-dark.png')}}" alt="">{{$project->user->country? $project->user->country->name :""}}
                                    </li>
                                    <li>
                                        <img src="{{asset('website/assets/images/wallet.png')}}" alt=""><span>{{$project->price_to . ' - ' .  $project->price_from}}</span>
                                        $
                                    </li>
                                    <li>
                                        <img src="{{asset('website/assets/images/time.png')}}" alt=""><span>{{$project->period}}</span> يوم
                                    </li>
                                </ul>
                                <div class="d-flex mt-4">
                                    <img src="{{asset('website/assets/images/company-logo.png')}}" alt="" class="ms-3 company-logo">
                                    <div class="company-info pt-2">
                                        <h5>{{$project->user->first_name . ' ' . $project->user->last_name}}</h5>
                                        <p>
                                            <img src="{{asset('website/assets/images/time.png')}}" alt=""> منذ
                                            :<span> {{\Illuminate\Support\Carbon::parse($project->created_at)->diffForHumans()}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="col-md-12 my-4">
                        {{$projects->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
