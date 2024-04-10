<main class="main-content">
    <!--head-->
    <x-admin.head/>
    <!--campaign-->
    <div class="border-div">
        <div class="b-btm">
            <h4>{{$page_title}}</h4>
        </div>
        <div class="edit-c">
            <form wire:submit.prevent='update'>
                <div class="row">
                    <div class="col-6">
                        <label for="">@lang('validation.attributes.email')</label>
                        <input wire:model='form.email' placeholder="@lang('validation.attributes.email')"
                               class="@error('form.email') is-invalid @enderror form-control contact-input"
                               type="text"/>
                        @error('form.email') <p class="text-danger">{{$message}}</p> @enderror
                        <hr/>
                    </div>


                </div>

                <div class="row">

                    <div class="col-6">
                        <label for="">@lang('validation.attributes.facebook')</label>
                        <input wire:model='form.facebook' placeholder="@lang('validation.attributes.facebook')"
                               class="@error('form.facebook') is-invalid @enderror form-control contact-input"
                               type="text"/>
                        @error('form.facebook') <p class="text-danger">{{$message}}</p> @enderror
                        <hr/>
                    </div>
                    <div class="col-6">
                        <label for="">@lang('validation.attributes.instagram')</label>
                        <input wire:model='form.instagram' placeholder="@lang('admin.instagram')"
                               class="@error('form.instagram') is-invalid @enderror form-control contact-input"
                               type="text"/>
                        @error('form.instagram') <p class="text-danger">{{$message}}</p> @enderror
                        <hr/>
                    </div>
                    <div class="col-6">
                        <label for="">@lang('validation.attributes.twitter')</label>
                        <input wire:model='form.twitter' placeholder="@lang('validation.attributes.twitter')"
                               class="@error('form.twitter') is-invalid @enderror form-control contact-input"
                               type="text"/>
                        @error('form.twitter') <p class="text-danger">{{$message}}</p> @enderror
                        <hr/>
                    </div>

                    <div class="col-6">
                        <p>@lang('admin.number_of_days_to_receive_money')</p>
                        <input wire:model='form.number_of_days_to_receive_money' placeholder="@lang('admin.number_of_days_to_receive_money')"
                               class="@error('form.number_of_days_to_receive_money') is-invalid @enderror form-control contact-input"
                               type="text"/>
                        @error('form.number_of_days_to_receive_money') <p class="text-danger">{{$message}}</p> @enderror
                        <hr/>
                    </div>
                    <div class="col-6">
                        <p>@lang('admin.commission')</p>
                        <input wire:model='form.commission' placeholder="@lang('admin.commission')"
                               class="@error('form.commission') is-invalid @enderror form-control contact-input"
                               type="text"/>
                        @error('form.commission') <p class="text-danger">{{$message}}</p> @enderror
                        <hr/>
                    </div>

                </div>

                <div class="btns text-center d-block mt-4">
                    <button type='button' wire:click="update" class="button btn-red big">@lang('site.save')</button>
                </div>

            </form>
        </div>
    </div>
</main>
<script>
    document.addEventListener('livewire-upload-progress', event => {
    @this.progress = Math.floor(event.detail.progress);
    });
</script>

