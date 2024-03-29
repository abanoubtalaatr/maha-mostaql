<main class="main-content">
    <x-admin.head/>

    <!--campaign-->
    <div class="border-div">
        <div class="b-btm">
            <h4>{{$page_title}}</h4>
        </div>
        <div class="row mt-30">
            <div class="col-lg-12">


                <form wire:submit.prevent='update' action="" class="contact-form row ">

                    <div class="form-group col-6">
                        <label for="form.name">@lang('validation.attributes.name')</label>
                        <input wire:model.defer='form.name' class="form-control" type="text"
                               placeholder="@lang('validation.attributes.name')"/>
                        @error('form.name')<p style='color:red'> {{$message}} </p>@enderror
                    </div>


                    <div class="form-group col-6">
                        <label for="form.opinion">@lang('site.opinion')</label>
                        <textarea wire:model='form.opinion' class="form-control"
                                  placeholder="@lang('site.opinion')"/></textarea>
                        @error('form.opinion')<p style='color:red'> {{$message}} </p>@enderror
                    </div>


                    <div class="col-md-12 my-2">
                        <div class="custom-file-upload w-25">
                            @if($image)
                                <img  style='max-width:100%'  src="{{$image->temporaryUrl()}}" alt="">
                            @else
                                @isset($opinion)
                                    <img style='max-width:100%' src="{{$form['image']??""}}" alt="">
                                @endisset
                            @endif
                            <img src="{{asset('frontAssets')}}/imgs/wallet/upload.svg" alt="">
                            <span>@lang('validation.attributes.image')</span>
                            <input wire:model='image' class='form-control @error('image') is-invalid @enderror' type="file"/>
                            @error('image') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div wire:loading wire:target="image">    <i class="fas fa-spinner fa-spin"></i> </div>

                    </div>

                    <div class="btns text-center">
                        <button type='submit' class="button btn-red big">@lang('site.edit')</button>
                    </div>

                </form>


            </div>

        </div>
    </div>
</main>
