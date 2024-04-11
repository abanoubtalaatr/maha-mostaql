<section class="main-dash">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <!-- <div class="col-md-12"> -->
                    <h2 class=" mb-5">
                        اضافة مشروع جديد
                    </h2>
                    <!-- the right side -->

                        <form class="mt-2 add-job">
                            <div class="row">
                                <div class="col-lg-9 col-sm-12 div-form">
                                    <div class="form-group first mb-4">
                                <input type="text" wire:model="form.title" class="form-control shadow" placeholder="عنوان المشروع" id="input1">
                                @error('form.title') <p class="text-danger">{{$message}}</p> @enderror

                            </div>

                                    <div class="form-group first mb-4">
                                <input type="text" wire:model="form.link" class="form-control shadow" placeholder="رابط المشروع" id="input2">
                                @error('form.link') <p class="text-danger">{{$message}}</p> @enderror

                            </div>
                            <!--  -->
                                    <div class="form-group first mb-2 d-flex gap-2 justify-content-between">
                                        <select wire:model="price" class="form-select shadow sort-of bg-white-2 w-100 black-text" aria-label="Default select example">
                                            <option selected="">الميزانيه</option>
                                            <option value="50-150">50$ : 150$</option>
                                            <option value="150-350">150$ : 350$</option>
                                            <option value="350">350$ : اكثر</option>
                                        </select>
                                    </div>
                                    @error('price') <p class="text-danger">{{$message}}</p> @enderror

                                    <div class="form-group first mb-2 d-flex gap-2 justify-content-between">
                                        <select wire:model="form.specialty_id" class="form-select shadow sort-of bg-white-2 w-100 black-text" aria-label="Default select example">
                                            <option value>التخصص</option>
                                            @foreach(\App\Models\Specialty::all() as $specialty)
                                                <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('form.specialty_id') <p class="text-danger">{{$message}}</p> @enderror

                                    <div class="form-group first mb-4">
                                        <input type="text" wire:model="form.period" class="form-control shadow" placeholder="المدة" id="input2">
                                    </div>
                                    @error('form.period') <p class="text-danger">{{$message}}</p> @enderror



                            <!--  -->
                                    <div class="form-group first mb-4 custom-textarea">
                                <textarea wire:model="form.description" class="form-control shadow h-100 resize-none custom-textarea" rows="5" placeholder="وصف المشروع" id="input5"></textarea>
                            </div>
                                    @error('form.description') <p class="text-danger">{{$message}}</p> @enderror

                            <!--  -->

                                    <div class="mt-5 d-sm-grid-2">
                                <button type="button" wire:click="store" class="btn btn-1 mb-3 ms-2">
                                    حفظ
                                </button>
                                <button type="button" id="ignoreButton" class="btn btn-outline-secondary mb-3 me-2">
                                    تجاهل
                                </button>
                            </div>

                                </div>
                                <div class="col-lg-3 col-sm-3 ">
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
                        </form>
                    <!-- end of the right side -->
                    <!-- left side -->
                    <!-- project-image-upload.blade.php -->

                </div>
                <!-- end of left -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>
@include('partial.back_button_javascript')

@push('scripts')
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function(){
                var dataURL = reader.result;
                var imgPreview = document.querySelector('.img-preview');
                imgPreview.src = dataURL;
            };

            reader.readAsDataURL(input.files[0]);
        });
    </script>
@endpush
