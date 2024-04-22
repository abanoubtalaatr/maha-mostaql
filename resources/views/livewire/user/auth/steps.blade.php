<main>
    <!-- start log in page -->
    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2">
            <img src="{{asset('website/assets/images/log-in-layer.png')}}" alt="" class="login-layer">
        </div>

        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="logo-box">
                            <div class="w-25">
                                <x-logo />
                            </div>
                        </div>
                        <div class="log-dis">
                            <h3 class="mb-2 t-color-primary">نسيت كلمة السر؟</h3>
                            <p class="mb-4">
                                ادخل عنوان بريدك الالكتروني و سنرسل لك رمز لاعادة تعيين كلمة
                                المرور الخاصة بك
                            </p>
                        </div>

                        <form class="mt-2">

                            @if($step == 2)
                                    <div class="step-2">
                                        <div class="otp-container d-flex gap-2 align-items-center justify-content-center mb-4">
                                            <input type="text" wire:model="number1" class="otp-field  text-center shadow" maxlength="1" data-next="#otp-2" autofocus="">
                                            <input id="otp-2" type="text" wire:model="number2" class="otp-field  text-center shadow" maxlength="1" data-next="#otp-3">
                                            <input id="otp-3" type="text" wire:model="number3" class="otp-field  text-center shadow" maxlength="1" data-next="#otp-4">
                                            <input id="otp-4" type="text" wire:model="number4" class="otp-field  text-center shadow" maxlength="1" data-next="#submit-button">
                                        </div>

                                        @if(isset($codeNotValid))
                                            <p class="text-danger mb-3">{{$codeNotValid}}</p>
                                        @endif
                                        <div class="text-center mb-4">
                                            <button class="btn t-color-primary" wire:click="sendEmail">اعادة الارسال </button>
                                        </div>
                                        <div class="d-grid text-center">
                                            <button wire:click="verifyCode" type="button" id="submit-button" class="btn btn-1 mb-2 shadow"> التالي
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                @if($step == 3)
                                    <div class="step-3">
                                        <div class="form-group first mb-4">
                                            <input type="password" wire:model="password" class="form-control shadow" placeholder="كلمة المرور" id="compsass">
                                        </div>
                                        <div class="form-group first mb-4">
                                            <input type="password" wire:model="confirmation_password" class="form-control shadow" placeholder="اعادة كلمة المرور الجديدة" id="compsass2">
                                        </div>
                                        @error('password') <p class="text-danger mb-3">{{$message}}</p> @enderror
                                        @error('confirmation_password') <p class="text-danger mb-3">{{$message}}</p> @enderror

                                        <div class="d-grid text-center mt-5">
                                            <button type="button" wire:click="resetPassword" class="btn btn-1 mb-3">تأكيد</button>
                                        </div>


                                    </div>
                                @endif

                        </form>
                        <!-- <div class="col-md-7 mt-5">
                                00
                              </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.shared.spinner_script')@include('partial.scripts')

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const otpFields = document.querySelectorAll('.otp-field');

        otpFields.forEach((field, index) => {
          field.addEventListener('input', (event) => {
            const value = event.target.value;
            if (value.length === 1) {
              const nextField = document.querySelector(field.dataset.next);
              nextField.focus();
            } else if (value === '') {
              if (index > 0) {
                const prevField = otpFields[index - 1];
                prevField.focus();
              }
            }
          });
        });

        (function ($) {
          'use strict';

          var fullHeight = function () {
            $('.js-fullheight').css('height', $(window).height());
            $(window).resize(function () {
              $('.js-fullheight').css('height', $(window).height());
            });
          };
          fullHeight();

          $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
          });
        })(jQuery);
      });
    </script>

</main>
