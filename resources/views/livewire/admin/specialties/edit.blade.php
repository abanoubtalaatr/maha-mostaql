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

                    <div class="btns text-center mt-3">
                        <button type='submit' class="button btn-red big">@lang('site.edit')</button>
                    </div>

                </form>


            </div>

        </div>
    </div>
</main>
