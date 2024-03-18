<section class="main-dash">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <!-- <div class="col-md-12"> -->
                    <h2 class=" mb-5">
                        تعديل عمل جديد
                    </h2>
                    <!-- the right side -->
                    <div class="col-lg-9 col-sm-12 div-form">
                        <form class="mt-2 add-job">

                            <div class="form-group first mb-2">
                                <input type="text" wire:model="form.title" class="form-control shadow" placeholder="عنوان العمل" id="input1">
                            </div>
                            @error('form.title') <p class="text-danger">{{$message}}</p> @enderror

                            <div class="form-group first mb-2">
                                <input type="text" wire:model="form.link" class="form-control shadow mt-2" placeholder="رابط العمل" id="input2">
                            </div>
                            @error('form.link') <p class="text-danger">{{$message}}</p> @enderror

                            <div class="form-group first mb-2">
                                <input type="date" wire:model="form.invoke_date" class="form-control shadow" placeholder="{{__('site.date_of_complete_project')}}" id="input3">
                            </div>

                            @error('form.invoke_date') <p class="text-danger">{{$message}}</p> @enderror

                            <!-- end of skill set -->

                            <!--  -->
                            <div class="form-group first mb-2 custom-textarea">
                                <textarea wire:model="form.description" class="form-control shadow h-100 resize-none custom-textarea" rows="5" placeholder="وصف العمل" id="input5"></textarea>
                            </div>
                            @error('form.description') <p class="text-danger">{{$message}}</p> @enderror

                            <!--  -->


                            <div class="mt-5 d-sm-grid-2">
                                <button type="button" wire:click="store" class="btn btn-1 mb-3 ms-2">
                                    حفظ
                                </button>
                                <a href="{{route('user.client.my_works.index')}}" type="button" class="btn btn-outline-secondary mb-3 me-2">
                                    تجاهل
                                </a>
                            </div>
                        </form>
                    </div>
                    <!-- end of the right side -->
                    <!-- left side -->
                    <div class="col-lg-3 col-sm-12 div-img">
                        <div class="shadow px-4 py-4 d-flex flex-column align-items-center rad-20">
                            <div class="project-image-containerr shadow">

                                <img src="{{asset('website/assets/images/proj-2.png')}}">
                            </div>
                            <button class="btn btn-1 px-4 mt-3 w-100">
                                تغيير الصورة
                            </button>
                            <button class="btn btn-outline-primary px-4 mt-3 w-100 rad-20">
                                ازاله الصوره
                            </button>
                        </div>
                    </div>
                </div>
                <!-- end of left -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>
