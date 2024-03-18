<section class="main-dash">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-11">
                <div class="row">
                    <!-- start of text -->
                    <div class="d-flex justify-content-between gap-3 align-items-center">
                        <h2>اخر اعمالي على المنصة</h2>
                    </div>
                    <!-- sort -->

                    <div class="d-flex justify-content-between align-items-center">
{{--                        <select class="my-4 left-side-div form-select form-select-md custom-dropdown custom-input-padding shadow">--}}
{{--                            <option>حالة المشروع</option>--}}
{{--                            <option>A</option>--}}
{{--                            <option>B</option>--}}
{{--                        </select>--}}
                        <div class="my-4 left-side-div "></div>
                        <!--  -->
                        <a href="{{route('user.client.my_works.create')}}" class="btn btn-1 px-4">اضف عمل جديد</a>
                    </div>
                    <!-- start of cards -->
                    <div class="grid-2-col-2 margin-top-4">
                        <!-- card -->

                        @foreach($works as $work)
                            <div class="double-div-top shadow margin-bottom-2">
                            <div class="text-bord">
                                <!--  -->
                                <div class="d-flex align-items-center par">
                                    <!-- <span>i</span> -->
                                    <p>{{$work->views}}   @lang("site.views")</p>
                                </div>
                                <div class="d-flex align-items-center par">
                                    <!-- <span>i</span> -->
                                    <p>{{$work->likes}}   @lang('site.likes')</p>
                                </div>
                                <div class="d-flex align-items-center par">
                                    <!-- <span>i</span> -->
                                    <p>{{\Illuminate\Support\Carbon::parse($work->invoke_date)->diffForHumans()}}</p>
                                </div>
                                <!--  -->
                            </div>
                            <a href="{{route('user.client.my_works.show', $work->id)}}" class="double-div-bottom shadow">
                                <span>{{$work->title}} </span>
                                <img src="{{asset('website/assets/images/proj-2.png')}}">
                            </a>
                        </div>
                        @endforeach
                        <!-- end of card -->
                    </div>
                    <!-- end of cards -->
                    <!-- pagination enable it when the page is full -->
                    <div class="col-md-12 my-4 position-relative">
                        <nav aria-label="Page navigation example ">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link next-link" href="#"><img src="assets/images/nav-right.png" alt="">
                                        التالي</a>
                                </li>

                                <li class="page-item">
                                    <a class="page-link page-link-2" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link page-link-2" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link page-link-2" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link prev-link" href="#">
                                        السابق <img src="assets/images/nav-left.png" alt=""></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- pagination  -->
                    <!-- end of text -->
                </div>
            </div>
        </div>
    </div>
</section>
