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
                            <img src="{{asset('website/assets/images/logo-login.png')}}" alt="">
                        </div>
                        <div class="log-dis">
                            <h3 class="mb-2 t-color-primary">تسجيل الدخول</h3>
                            <p class="mb-4">
                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة
                                ما سيلهي القارئ عن التركيز على الشكل الخارجي
                            </p>
                        </div>

                        @if(isset($message))
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @endif
                        <form class="mt-2">
                            <div class="form-group first mb-4">
                                <input type="email" class="form-control shadow" wire:model="email"
                                       placeholder="البريد الالكتروني" id="useremail">
                            </div>

                            <div class="form-group last mb-4">
                                <input id="password-field" type="password" wire:model="password"
                                       class="form-control shadow" placeholder="كلمة المرور">
                            </div>

                            <div class="mb-5 mt-4 d-flex justify-content-between">
                                <label class="form-check-label container-box" for="exampleCheck1">تذكرني
                                    <input type="checkbox" class="form-check-input form-check-remmembr"
                                           id="exampleCheck1" checked="">
                                    <span class="checkmark checkmark-2"></span>
                                </label>
                                <a href="{{route('user.forgot_password')}}" class="float-start forgot-pass">نسيت كلمه
                                    المرور</a>
                            </div>

                            <div class="d-grid text-center">
                                <!-- change <a> to button later  -->
                                <button id="spinner " wire:click="attempt" type="button" class="btn btn-1 mb-2 shadow">
                                    @include('livewire.shared.spinner_html')
                                    <span> تسجيل دخول</span>
                                </button>
                                <!--  -->
                                <a type="button" href="{{route('login.google')}}"
                                   class="btn btn-1 mb-2 shadow d-flex align-items-center justify-content-between px-4 btn-google-style">
                                    <span> تسجيل الدخول عبر البريد الالكتروني </span>
                                    <img src="{{asset('website/assets/images/google.webp')}}" class="w-1-3">
                                </a>

                                <a href="{{route('user.signupas')}}" class="sign-in-link mt-2 mb-4">ليس لديك حساب؟
                                    <span>سجل من هنا</span></a>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="col-md-7 mt-5">
                            00
                          </div> -->
                </div>
            </div>
        </div>
    </div>
</main>
@include('livewire.shared.spinner_script')

