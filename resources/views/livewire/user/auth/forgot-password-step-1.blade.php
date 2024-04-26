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
                            
                                <div class="step-1">
                                    <div class="form-group first mb-2">
                                        <input type="email" wire:model="email" class="form-control shadow" placeholder="البريد الالكتروني" id="useremail">
                                    </div>
                                    @error('email') <p class="text-danger mb-3">{{$message}}</p> @enderror

                                    <div class="d-grid text-center">
                                        <button id="spinner" wire:click="sendEmail" type="button" class="btn btn-1 mb-2 shadow">
                                            @include('livewire.shared.spinner_html')
                                            <span>التالي</span>
                                        </button>
                                    </div>
                                </div>
                            
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
