<main>
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
                            <h3 class="mb-2 t-color-primary">انشاء حساب جديد</h3>
                            <p class="mb-4">
                                من فضلك ادخل تلك البيانات حتى يتم انشاء حساب بكل سهوله و يسر
                            </p>
                        </div>

                        <form class="mt-2">
                            <div class="form-group first mb-4">
                                <div class="d-flex gap-3">
                                    <input type="text" wire:model="form.first_name" class="form-control shadow" placeholder="الاسم الاول" id="firstname">
                                    <input type="text" wire:model="form.last_name" class="form-control shadow" placeholder="اسم العائلة" id="lastname">

                                    <input hidden name="account_type" wire:model="form.account_type" value="{{request()->input('account_type')}}">
                                </div>
                                @error('form.first_name') <p class="text-danger">{{$message}}</p> @enderror
                                @error('form.last_name') <p class="text-danger">{{$message}}</p> @enderror

                            </div>

                            <div class="form-group last mb-4">
                                <input type="email" class="form-control shadow" wire:model="form.email" placeholder="البريد الالكتروني" id="useremail">
                                @error('form.email') <p class="text-danger">{{$message}}</p> @enderror

                            </div>

                            <div class="form-group last mb-4">
                                <input type="text" class="form-control shadow" wire:model="form.mobile" placeholder="رقم جوالك" id="phone">
                                @error('form.mobile') <p class="text-danger">{{$message}}</p> @enderror

                            </div>

                            <div class="form-group last mb-4">
                                <select class="form-control shadow" id="countryDropdown" wire:model="form.country_id">
                                    <option value="">اختر الدولة</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                @error('form.country_id') <p class="text-danger">{{$message}}</p> @enderror
                            </div>

                            <div class="form-group last mb-4">
                                <input id="password-field" type="password" wire:model="form.password" class="form-control shadow" placeholder="كلمة المرور">
                                @error('form.password') <p class="text-danger">{{$message}}</p> @enderror

                            </div>

                            <div class="d-grid text-center">
                                <!-- change this <a> to button later   -->
                                <button  wire:click="store" href="dashboard-explore-projects.html" type="button" class="btn btn-1 mb-2 shadow">
                                    انشاء الحساب
                                </button>
                                <!--  -->
                                <a type="button" href="{{route('login.google')}}"  class="btn btn-1 mb-2 shadow d-flex align-items-center justify-content-between px-4 btn-google-style">
                                    <span> تسجيل الدخول عبر البريد الالكتروني </span>
                                    <img src="{{asset('website/assets/images/google.webp')}}" class="w-1-3">
                                </a>

                                <a href="{{route('user.login')}}" class="sign-in-link mt-2 mb-4">لديك حساب؟ <span>سجل دخول</span></a>
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

<script>
    let activeValue = "مستقل";
    const cards = document.querySelectorAll(".card");
    const dybtn = document.querySelector(".dy-btn");

    dybtn.textContent = `سجل ك${activeValue}`;

    cards.forEach((card) => {
        card.addEventListener("click", (e) => {
            if (card.contains(e.target)) {
                activeValue = card.getAttribute("value");
                dybtn.textContent = `سجل ك${activeValue}`;
                cards.forEach((c) => c.classList.remove("active-card"));
                card.classList.add("active-card");
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFOnpDpii0DWz5bYVWvUzL+/9cCcyQ983Y70ZI3vfu7WIPcBSBIlServiceClientQ9Gt" crossorigin="anonymous"></script>
