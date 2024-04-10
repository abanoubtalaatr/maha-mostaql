<section class="main-page">
    <div class="container">
        <div class="row d-lg-2">
            <!-- start sub navbar -->
            <div class="col-md-12">
                <div class="sub-nav navbar pt-3">
                    <ul class="navbar-nav-2 me-auto">
                        @if(auth()->check())
                            <li class="nav-item-2">
                                <a href="{{route('user.logout')}}" class="nav-link-2 text-white">
                                    <img src="{{asset("website/assets/images/1-nav.png")}}" alt="">
                                    تسجيل خروج</a>
                            </li>

                            <li class="nav-item-2">
                                <a href="{{route('user.owner.projects.all')}}" class="nav-link-2 text-white">
                                    <img src="{{asset("website/assets/images/1-nav.png")}}" alt="">
                                    لوحة التحكم</a>
                            </li>

                        @else
                            <li class="nav-item-2">
                                <a href="{{route('user.login')}}" class="nav-link-2 text-white">
                                    <img src="{{asset("website/assets/images/1-nav.png")}}" alt="">
                                تسجيل دخول</a>
                        </li>
                        <li class="nav-item-2">
                            <a href="{{route('user.signupas')}}" class="nav-link-2 text-white">
                                <img src="{{asset("website/assets/images/2-nav.png")}}" alt="">
                                انضم الان
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            <!-- start navbar -->
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-light">
                    <div class="container-fluid px-0">
                        <a class="navbar-brand" href="#"><img src="{{asset("website/assets/images/logo.png")}}" alt=""></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/">الرئيسية</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="search-filter.html">المشاريع</a>
                                </li>
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="contact.html">تواصل معنا</a>--}}
{{--                                </li>--}}
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html">من نحن</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row d-sm-2">
            <!-- start navbar -->
            <div class="col-md-12">
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <button type="button" class="btn navbar-toggler" data-bs-dismiss="offcanvas">
                    <span class="navbar-toggler-icon">
                      <i class="fas fa-bars"></i>
                    </span>
                            <img src="{{asset("website/assets/images/sm-logo.png")}}" alt="" class="me-2">
                        </button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav navbar">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.979" viewBox="0 0 16 14.979">
                                        <g id="cube-of-notes-stack" transform="translate(0 -19.534)">
                                            <g id="_x32__21_" transform="translate(0 19.534)">
                                                <g id="Group_3608" data-name="Group 3608" transform="translate(0 0)">
                                                    <path id="Path_1252" data-name="Path 1252" d="M8,33.692,1.066,30.5c.024.014-.613-.273-1.066-.532,0,.387.1,1.1.458,1.286L7.246,34.3a1.446,1.446,0,0,0,1.508,0l6.788-3.052c.335-.156.458-.891.458-1.286-.436.218-1.055.53-1.067.532ZM8,20.373c.05.059.037.012,0,0ZM.458,28.052,7.246,31.1a1.446,1.446,0,0,0,1.508,0l6.788-3.051c.335-.156.458-.89.458-1.286-.436.219-1.055.53-1.067.533L8,30.5,1.066,27.3c.024.015-.613-.274-1.066-.533C0,27.153.1,27.861.458,28.052Zm0-3.2,6.788,3.052a1.446,1.446,0,0,0,1.508,0l6.788-3.052a.935.935,0,0,0,0-1.507L8.754,19.765a1.347,1.347,0,0,0-1.509,0L.458,23.349A.918.918,0,0,0,.458,24.856ZM8,20.373,14.933,24.1,8,27.024,1.066,24.1Z" transform="translate(0 -19.534)"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    الرئيسية
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="search-filter.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.063" viewBox="0 0 16 14.063">
                                        <path id="portfolio" d="M15.534,1.875H11.281V1.406A1.408,1.408,0,0,0,9.875,0H6.125A1.408,1.408,0,0,0,4.719,1.406v.469H.469A.47.47,0,0,0,0,2.344V12.656a1.408,1.408,0,0,0,1.406,1.406H14.594A1.408,1.408,0,0,0,16,12.656V2.352a.455.455,0,0,0-.466-.477ZM5.656,1.406A.469.469,0,0,1,6.125.937h3.75a.469.469,0,0,1,.469.469v.469H5.656Zm9.225,1.406L13.425,7.179a.468.468,0,0,1-.445.321H10.344V7.031a.469.469,0,0,0-.469-.469H6.125a.469.469,0,0,0-.469.469V7.5H3.02a.468.468,0,0,1-.445-.321L1.119,2.812ZM9.406,7.5v.938H6.594V7.5Zm5.656,5.156a.469.469,0,0,1-.469.469H1.406a.469.469,0,0,1-.469-.469V5.232l.748,2.244a1.4,1.4,0,0,0,1.334.962H5.656v.469a.469.469,0,0,0,.469.469h3.75a.469.469,0,0,0,.469-.469V8.438h2.637a1.4,1.4,0,0,0,1.334-.962l.748-2.244Zm0,0" transform="translate(0 0)"></path>
                                    </svg>

                                    المشاريع
                                </a>
                            </li>

{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="contact.html">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="14.502" height="14.493" viewBox="0 0 14.502 14.493">--}}
{{--                                        <g id="circular-outlined-badge-with-ribbon-recognition-prize-symbol" transform="translate(0 0)">--}}
{{--                                            <g id="_x35__15_" transform="translate(0 0)">--}}
{{--                                                <g id="Group_3591" data-name="Group 3591" transform="translate(0 0)">--}}
{{--                                                    <path id="Path_1235" data-name="Path 1235" d="M7.251,2.437a3.17,3.17,0,1,0,3.17,3.17A3.17,3.17,0,0,0,7.251,2.437Zm0,5.435A2.265,2.265,0,1,1,9.515,5.607,2.265,2.265,0,0,1,7.251,7.872Zm4.992.2a5.389,5.389,0,0,0,.574-2.414A5.525,5.525,0,0,0,7.251.172,5.525,5.525,0,0,0,1.685,5.655a5.389,5.389,0,0,0,.574,2.414L0,11.923s1.433.287,2.886.587c.969,1.079,1.934,2.155,1.934,2.155L6.9,11.121c.118.007.234.018.354.018s.236-.01.354-.018l2.077,3.545,1.934-2.155c1.453-.3,2.886-.587,2.886-.587Zm-7.53,4.953s-.7-.659-1.35-1.3c-.928-.264-1.864-.533-1.864-.533L2.812,8.953a5.566,5.566,0,0,0,3.1,2.019ZM7.251,10.14a4.534,4.534,0,1,1,4.525-4.534A4.529,4.529,0,0,1,7.251,10.14Zm3.888,1.586c-.654.635-1.35,1.3-1.35,1.3l-1.2-2.049a5.566,5.566,0,0,0,3.1-2.019L13,11.194Z" transform="translate(0 -0.172)"></path>--}}
{{--                                                </g>--}}
{{--                                            </g>--}}
{{--                                        </g>--}}
{{--                                    </svg>--}}

{{--                                    تواصل معنا--}}
{{--                                </a>--}}
{{--                            </li>--}}
                            <li class="nav-item">
                                <a class="nav-link" href="about.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12">
                                        <g id="new-email-envelope-frontal-view" transform="translate(0 -76.5)">
                                            <g id="_x38__18_" transform="translate(0 76.5)">
                                                <g id="Group_3685" data-name="Group 3685">
                                                    <path id="Path_1329" data-name="Path 1329" d="M8.5,83.5h-6a.5.5,0,0,0,0,1h6a.5.5,0,0,0,0-1Zm0,2h-6a.5.5,0,0,0,0,1h6a.5.5,0,0,0,0-1Zm5.5-9H2a2,2,0,0,0-2,2v8a2,2,0,0,0,2,2H14a2,2,0,0,0,2-2v-8A2,2,0,0,0,14,76.5Zm1,10a1,1,0,0,1-1,1H2a1,1,0,0,1-1-1v-8a1,1,0,0,1,1-1H14a1,1,0,0,1,1,1Zm-2-8H11a1,1,0,0,0-1,1v2a1,1,0,0,0,1,1h2a1,1,0,0,0,1-1v-2A1,1,0,0,0,13,78.5ZM13,81a.5.5,0,0,1-.5.5h-1A.5.5,0,0,1,11,81V80a.5.5,0,0,1,.5-.5h1a.5.5,0,0,1,.5.5Z" transform="translate(0 -76.5)"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    من نحن
                                </a>
                            </li>

                            @if(!auth()->check())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{route('user.signupas')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.063" viewBox="0 0 16 14.063">
                                        <path id="portfolio" d="M15.534,1.875H11.281V1.406A1.408,1.408,0,0,0,9.875,0H6.125A1.408,1.408,0,0,0,4.719,1.406v.469H.469A.47.47,0,0,0,0,2.344V12.656a1.408,1.408,0,0,0,1.406,1.406H14.594A1.408,1.408,0,0,0,16,12.656V2.352a.455.455,0,0,0-.466-.477ZM5.656,1.406A.469.469,0,0,1,6.125.937h3.75a.469.469,0,0,1,.469.469v.469H5.656Zm9.225,1.406L13.425,7.179a.468.468,0,0,1-.445.321H10.344V7.031a.469.469,0,0,0-.469-.469H6.125a.469.469,0,0,0-.469.469V7.5H3.02a.468.468,0,0,1-.445-.321L1.119,2.812ZM9.406,7.5v.938H6.594V7.5Zm5.656,5.156a.469.469,0,0,1-.469.469H1.406a.469.469,0,0,1-.469-.469V5.232l.748,2.244a1.4,1.4,0,0,0,1.334.962H5.656v.469a.469.469,0,0,0,.469.469h3.75a.469.469,0,0,0,.469-.469V8.438h2.637a1.4,1.4,0,0,0,1.334-.962l.748-2.244Zm0,0" transform="translate(0 0)"></path>
                                    </svg>
                                    انضم الان
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('user.login')}}" class="nav-link"><svg id="user" xmlns="http://www.w3.org/2000/svg" width="16" height="15.999" viewBox="0 0 16 15.999">
                                        <g id="Group_4004" data-name="Group 4004" transform="translate(0 0)">
                                            <path id="Path_1431" data-name="Path 1431" d="M13.78,2.472A8,8,0,1,0,2.462,13.766s.006.011.011.015c.046.045.1.082.143.125.129.114.257.232.392.343.073.057.148.114.222.167.128.1.256.191.39.279.091.057.185.114.278.171.123.074.246.149.374.217.108.057.218.106.328.158s.238.114.361.166.246.091.371.136.232.086.351.122c.135.041.273.072.41.106.114.028.225.06.343.083.158.031.318.051.478.073.1.014.2.033.3.043.262.026.526.04.792.04s.53-.014.792-.04c.1-.01.2-.029.3-.043.16-.022.32-.042.478-.073.114-.023.229-.057.343-.083.137-.034.275-.065.41-.106.119-.037.235-.081.351-.122s.249-.086.371-.136.241-.109.361-.166.22-.1.328-.158c.127-.068.25-.143.374-.217.093-.057.187-.109.278-.171.134-.088.262-.183.39-.279.074-.057.15-.109.222-.167.135-.109.264-.224.392-.343.047-.043.1-.081.143-.125,0,0,.006-.011.011-.015A7.988,7.988,0,0,0,13.78,2.472ZM12.5,13.168c-.1.091-.211.178-.32.262-.064.049-.128.1-.194.145-.1.075-.208.146-.315.214-.078.05-.157.1-.237.145l-.306.171c-.091.047-.185.091-.278.134s-.2.09-.3.13-.208.079-.314.114-.193.067-.291.1c-.114.034-.234.062-.352.091-.093.022-.184.046-.278.065-.135.026-.274.045-.412.063-.079.01-.157.025-.237.033-.219.021-.442.034-.666.034s-.447-.013-.666-.034c-.079-.008-.158-.022-.237-.033-.139-.019-.277-.037-.412-.063-.094-.018-.185-.043-.278-.065-.118-.029-.236-.057-.352-.091-.1-.029-.194-.063-.291-.1s-.211-.074-.314-.114-.2-.085-.3-.13-.187-.087-.278-.134-.206-.11-.306-.171c-.08-.047-.159-.095-.237-.145-.107-.068-.212-.139-.315-.214-.066-.047-.13-.1-.194-.145-.109-.084-.216-.171-.32-.262-.025-.019-.048-.043-.073-.065A4.583,4.583,0,0,1,6.543,8.822a3.387,3.387,0,0,0,2.91,0A4.583,4.583,0,0,1,12.567,13.1C12.543,13.125,12.521,13.147,12.5,13.168ZM6.006,4.591A2.285,2.285,0,1,1,9.117,7.7a.012.012,0,0,0-.01,0,2.42,2.42,0,0,1-.478.2c-.03.009-.057.02-.089.027-.057.015-.117.025-.176.035A2.314,2.314,0,0,1,8.03,8H7.965a2.314,2.314,0,0,1-.335-.034c-.057-.01-.118-.021-.176-.035-.03-.007-.057-.019-.089-.027a2.418,2.418,0,0,1-.478-.2l-.01,0A2.285,2.285,0,0,1,6.006,4.591Zm7.575,7.38h0a5.741,5.741,0,0,0-3.058-3.938,3.427,3.427,0,1,0-5.05,0,5.741,5.741,0,0,0-3.058,3.938,6.855,6.855,0,1,1,11.167,0Z" transform="translate(0 -0.011)"></path>
                                        </g>
                                    </svg>
                                    تسجيل دخول
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg navbar-dark bg-light">
                    <div class="container-fluid px-0">
                        <a class="navbar-brand" href="#"><img src="{{asset("website/assets/images/logo.png")}}" alt=""></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row d-flex flex-reverse">
                    <div class="col-md-7">
                        <div class="hero-info">
                            <h1>وظَّف بذكاء وبأقل وقت</h1>
                            <h3>
                                أعلن عن وظيفة | افرز و وفلتر | أختر الأنسب واتمم عملية
                                التوظيف
                            </h3>
                            <p>
                                وظف أفضل المستقلين لإنجاز أعمالك عن بعد أنجز مشاريعك
                                بسهولة وأمان عبر أكبر منصة عمل حر بالعالم العربي
                            </p>
                            @if(!auth()->check())
                            <div class="d-inline-flex">
                                <a href="{{route('user.signupas')}}" class="btn btn-2 ms-2">
                                    انضم الان
                                </a>
                                <a href="{{route('user.login')}}" class="btn btn-3 me-2">
                                    تسجيل الدخول
                                </a>

                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="hero-box">
                            <img src="{{asset("website/assets/images/hero.png")}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="smart-job shadow">
                    <h2>هل لديك عمل تريد إنجازه</h2>
                    <p>
                        أعلن عن وظيفة | افرز و وفلتر | أختر الأنسب واتمم عملية التوظيف
                    </p>
                    <div class="input-group mb-3 row shadow filter-serch mt-3">
                        <div class="input-group-text p-0 col-lg-3 col-md-3 col-6">
                            <span toggle="#password-field" class="field-icon toggle-password"><img src="{{asset("website/assets/images/location.png")}}" alt=""></span>

                            <select class="form-select form-select-lg border-0 custom-input-padding form-select-search rounded-0">
                                <option>الدوله</option>
                                @foreach($countries as $country)
                                    <option>{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group-text p-0 col-lg-3 col-md-3 col-6">
                            <span toggle="#password-field" class="field-icon toggle-password"><img src="{{asset("website/assets/images/label.png")}}" alt=""></span>

                            <select class="form-select form-select-lg border-0 custom-input-padding rounded-0">
                                <option>التخصص</option>
                                <option>One</option>
                                <option>Two</option>
                                <option>Three</option>
                                <option>Four</option>
                            </select>
                        </div>
                        <input type="search" class="form-control col-lg-5 col-md-5 col-12 custom-input-padding" placeholder="ادخل نص البحث">
                        <button class="input-group-text btn-1 col-1 text-center search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
