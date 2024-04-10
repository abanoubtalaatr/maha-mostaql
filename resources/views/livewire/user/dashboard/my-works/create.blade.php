<section class="main-dash">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <!-- <div class="col-md-12"> -->
                    <h2 class=" mb-5">
                        اضافة عمل جديد
                    </h2>
                    <!-- the right side -->

                        <form class="mt-2 add-job">
                            <div class="row">
                            <div class="col-lg-9 col-sm-12 div-form">
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
                </div>
                <!-- end of left -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>

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
