<div>
    
    <section class="main-dash">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-11">
                    <div class="row">
                        <!-- <div class="col-md-12"> -->
                        <h2 class=" mb-5">
                            البيانات الحساب الشخصي
                        </h2>

                        @if(isset($message))
                            <div class="alert alert-info">{{$message}}</div>
                        @endif
                        <!-- the right side -->
                        <div class="row">
                            <div class="col-lg-9 col-sm-12 div-form">
                                <form class="mt-2 add-job">
                                    <!--  -->
                                    <div class="d-flex gap-3 first mb-4">
                                        <input type="text" wire:model="form.first_name" class="form-control form-inline shadow" placeholder="الاسم الاول" id="input1">

                                        <input type="text" wire:model="form.last_name" class="form-control shadow"  placeholder="اسم العائله" id="input2">

                                    </div>
                                    @error('form.first_name') <p class="text-danger">{{$message}}</p> @enderror
                                    @error('form.first_name') <p class="text-danger">{{$message}}</p> @enderror


                                    <!--  -->
                                    <div class="form-group first mb-4">
                                        <input type="text" wire:model="form.email" class="form-control shadow" placeholder="البريد الالكتروني" id="input3">
                                        @error('form.email') <p class="text-danger">{{$message}}</p> @enderror

                                    </div>
                                    <div class="form-group first mb-4">
                                        <input type="text" wire:model="form.mobile" class="form-control shadow" placeholder="رقم الجوال" id="input4">
                                        @error('form.mobile') <p class="text-danger">{{$message}}</p> @enderror

                                    </div>
                                    <div class="form-group first mb-4">
                                        <select wire:model="form.country_id" class="form-control shadow" id="input5">
                                            <option value="">اختر الدولة</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('form.country_id') <p class="text-danger">{{$message}}</p> @enderror

                                    </div>
                                    <!--  -->
                                    <div class="d-flex mb-4 gap-3">
                                        <select wire:model="form.specialty_id" class="form-control shadow" id="input6">
                                            <option value="">اختر التخصص</option>
                                            @foreach ($specialties as $specialty)
                                                <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                            @endforeach
                                        </select>

                                        <input type="text" wire:model="form.job_title" class="form-control shadow" id="input7" placeholder="المسمى الوظيفي">

                                    </div>
                                    @error('form.specialty_id') <p class="text-danger">{{$message}}</p> @enderror
                                    @error('form.job_title') <p class="text-danger">{{$message}}</p> @enderror

                                    <!--  -->
                                    <div class="form-group first mb-4">
                                        <textarea wire:model="form.about" class="form-control shadow h-12 resize-none" rows="5" placeholder="النبذة التعريفية" id="input8"></textarea>

                                    </div>
                                    @error('form.about') <p class="text-danger">{{$message}}</p> @enderror

                                    <button  wire:click="update" type="button" class="btn btn-1 mb-3 ms-2">
                                        حفظ
                                    </button>

                                    <div class="mt-5 d-sm-grid-2">

                                        {{--                                    <button type="button" class="btn btn-outline-secondary mb-3 me-2">--}}
                                        {{--                                        رجوع--}}
                                        {{--                                    </button>--}}
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-3 col-sm-3 ">
                                <div>
                                    @if($form['avatar'])
                                    <img src="{{asset('uploads/pics/'. $form['avatar'])}}">
                                    @endif
                                </div>
                                <div class="custom-file-upload ">
                                    @if($image)
                                        <img  style='max-width:100%'  src="{{$image->temporaryUrl()}}" alt="">
                                    @endif
                                    <img src="{{asset('frontAssets')}}/imgs/wallet/upload.svg" alt="">
                                    <span>@lang('validation.attributes.image')</span>
                                    <input wire:model='image' class='form-control @error('image') is-invalid @enderror' type="file"/>
                                    @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                                <div wire:loading wire:target="image">
                                    <i class="fas fa-spinner fa-spin"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end of left -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>

</div>
