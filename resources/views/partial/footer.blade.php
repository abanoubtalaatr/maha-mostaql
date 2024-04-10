<footer>
    @php
        $settings = \App\Models\Setting::query()->first();
    @endphp

    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="address">
                        <img src="{{asset("website/assets/images/logo.png")}}" alt="">
                        <p class="mb-4 mt-4">
                            يقدم فرصتك وسيلة لربط الشركات وأصحاب المشاريع بأفضل
                            المستقلين المحترفين لتنفيذ أفكارهم ومشاريعهم بكفاءة وفاعلية.
                        </p>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-menus">
                    <h4>القائمة</h4>
                    <ul>
                        <li><a href="{{route('home')}}">الرئيسية</a></li>
                        <li><a href="search-filter.html">المشاريع</a></li>
{{--                        <li><a href="contact.html">تواصل معنا</a></li>--}}
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-menus">
                    <h4>القائمة</h4>
                    <ul>
                        <li><a href="about.html">من نحن</a></li>
                        <li><a href="policy.html">سياسة الاستخدام</a></li>
                        <li><a href="faq.html">س و ج</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-sm-6 newsletter">

                    <div class="social-links mt-4">
                        <h4>تابعنا</h4>
                        <a href="{{$settings->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="{{$settings->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="{{$settings->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><img src="{{asset("website/assets/images/badge.png")}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
