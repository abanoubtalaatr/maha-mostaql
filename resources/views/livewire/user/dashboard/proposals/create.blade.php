<section class="main-dash">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-12">
                        <form class="mt-2 add-job">
                            <h3 class="head-label head-label-3 mb-5">
                                اضاف عرضك الان
                            </h3>

                            <div class="shadow fav-card-item">
                                <div class="d-flex justify-content-between gap-1 align-items-center fav-card-header">
                                    <div>
                                        <h3 class="mb-3">{{$project->title}}</h3>
                                        <p class="mb-3">
                                           {{$project->description}}
                                        </p>
                                        <div class="d-flex align-items-center gap-3">
                                            <p class="t-color-primary">
                                                <img src="{{asset('website/assets/images/wallet.png')}}" alt="">
                                                <strong> {{$project->price_from}} - {{$project->price_to}} $</strong>
                                            </p>
                                        </div>
                                    </div>

                                    <!--  -->
                                </div>
                                <!-- end of fav card header -->
                                <!-- fav card footer -->
                                <div class="d-flex my-4 justify-content-between align-items-center">
                                    <div class="d-flex gap-3 align-items-center">
                                        <img src="{{asset('uploads/pics/'.$project->user->avatar)}}" class="rounded-circle fav-card-profile-img">
                                        <div>
                                            <p>{{$project->user->name}}</p>
                                            <p class="text-muted">{{\Illuminate\Support\Carbon::parse($project->created_at)->diffForHumans()}}</p>
                                        </div>
                                    </div>
                                    <div class="align-items-center d-flex fav-card-number">
                                        <span>{{$project->proposals()->count()}}</span>
                                        <p class="text-muted">عدد العروض</p>
                                    </div>
                                </div>
                                <!-- end of fav card footer -->
                            </div>
                            <div class="form-group first mb-4">
                                <input wire:model="form.period" type="number" class="form-control shadow" placeholder="عدد الايام" id="input1">
                            </div>
                            @error('form.period') <p class="text-danger">{{$message}}</p> @enderror

                            <div class="form-group first mb-4">
                                <input wire:model="form.price" type="number" class="form-control shadow" placeholder="قيمه العرض" id="input1">
                            </div>
                            @error('form.price') <p class="text-danger">{{$message}}</p> @enderror

                            <div class="form-group first mb-4">
                                <input wire:model="form.dues" type="number" disabled="" class="form-control shadow" placeholder="مستحقاتك" id="input1">
                            </div>


                            <div class="form-group mb-4">
                                <textarea wire:model="form.description" class="form-control border form-control-text h-100" placeholder="نص الرساله"></textarea>
                            </div>
                            @error('form.description') <p class="text-danger">{{$message}}</p> @enderror

                            <div class="mt-5 d-sm-grid-2">
                                <button type="button" wire:click="store" class="btn btn-1 mb-3 ms-2">
                                    اضف العرض
                                </button>
                                <button type="button" wire:click="$emit('back')" class="btn btn-outline-secondary mb-3 me-2">
                                    رجوع
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partial.back_button_javascript')
</section>

