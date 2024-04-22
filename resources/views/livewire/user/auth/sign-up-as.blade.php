<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2">
        <img src="{{asset('website/assets/images/log-in-layer.png')}}" alt="" class="login-layer">
    </div>

    <div class="contents order-2 order-md-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10">
                    <div class="logo-box">
                        <div class="w-25">
                            <x-logo />
                        </div>
                    </div>
                    <div class="log-dis">
                        <h3 class="mb-2 t-color-primary">أهلا ومرحبا</h3>
                        <p class="mb-4">
                            من فضلك اختر نوع الحساب الذي تريد انشائه في المنصه حتى يتم
                            توحيهك الى الغرض المناسب
                        </p>
                    </div>

                    <form class="mt-2">
                        <input type="hidden" name="account_type" id="accountType" value="مستقل"> <!-- Default value -->

                        <!-- Your existing HTML content -->

                        <div class="d-flex sign-up-card-cont justify-content-between mb-4">
                            <!-- cards -->
                            <!-- card two -->
                            <div value="عميل" class="card sign-up-card shadow mb-2 clicked-box">
                                <br>
                                <h4>انا عميل. <br>اقوم بالتوظيف لمشروع</h4>
                            </div>
                            <!-- end of card 2 -->
                            <!-- card one -->
                            <div value="مستقل" class="card sign-up-card shadow mb-2 active-card clicked-box">
                                <br>
                                <h4>انا مستقل. <br>ابحث عن عمل</h4>
                            </div>
                            <!-- end of card one -->
                        </div>

                        <div class="d-grid text-center">
                            <button type="button" class="btn btn-1 mb-2 shadow dy-btn" onclick="redirectToSignup()">سجل كمستقل</button>
                            <!--  -->
                            <a href="{{route('user.login')}}" class="sign-in-link mt-2">لديك حساب؟ <span>سجل دخول</span></a>
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
<script>
    let activeValue = "مستقل";
    const cards = document.querySelectorAll(".card");
    const dybtn = document.querySelector(".dy-btn");
    const accountTypeInput = document.getElementById("accountType");

    dybtn.textContent = `سجل ك${activeValue}`;

    function redirectToSignup() {
        const selectedValue = accountTypeInput.value;
        window.location.href = "{{ route('user.signup') }}" + "?account_type=" + encodeURIComponent(selectedValue);
    }

    cards.forEach((card) => {
        card.addEventListener("click", (e) => {
            if (card.contains(e.target)) {
                activeValue = card.getAttribute("value");
                dybtn.textContent = `سجل ك${activeValue}`;
                accountTypeInput.value = activeValue; // Update hidden input value
                cards.forEach((c) => c.classList.remove("active-card"));
                card.classList.add("active-card");
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFOnpDpii0DWz5bYVWvUzL+/9cCcyQ983Y70ZI3vfu7WIPcBSBIlServiceClientQ9Gt" crossorigin="anonymous"></script>
