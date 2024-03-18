<section class="main-dash">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-12">
                        <form class="mt-2 add-job">
                            <h3 class="head-label head-label-3 mb-5">
                                تغير كلمة المرور
                            </h3>
                            @if(isset($message))
                                <div class="alert alert-info">
                                    {{$message}}
                                </div>
                            @endif
                            <div class="form-group first mb-4">
                                <input type="password" wire:model="password" class="form-control shadow" placeholder="كلمة المرور" id="input1">
                            </div>
                            @error('password') <p class="text-danger">{{$message}}</p> @enderror

                            <div class="form-group first mb-4">
                                <input type="password" wire:model="confirmation_password" class="form-control shadow" placeholder="اعادة كلمة المرور" id="input2">
                            </div>

                            @error('confirmation_password') <p class="text-danger">{{$message}}</p> @enderror

                            <div class="mt-5 d-sm-grid-2">
                                <button type="button" wire:click="change" class="btn btn-1 mb-3 ms-2">
                                    حفظ
                                </button>
{{--                                <button type="button" class="btn btn-outline-secondary mb-3 me-2">--}}
{{--                                    رجوع--}}
{{--                                </button>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
