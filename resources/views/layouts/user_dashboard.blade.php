<!DOCTYPE html>
<html class="no-js">
<head>
    @include('partial.style')
    @livewireStyles()
    @stack('styles')
</head>
<body class="home-page">
<!-- Main Content-->
<div class="wrapper d-flex align-items-stretch">
    <!-- start sidebar -->
    <nav id="sidebar">
        <div class="pt-5">
            <a href="{{route('home')}}" class="img logo rounded-circle"><img src="{{asset('website/assets/images/logo.png')}}" alt=""></a>
            <div class="d-flex mb-1 side-company-card mt-3">
                <img src="{{asset('website/assets/images/company-logo.png')}}" alt="" class="ms-3 company-logo">
                <div class="company-info-2 pt-2">
                    <h5>معين</h5>
                    <p>مكة , السعودية</p>
                    <p>
                        <strong style="font-size:12px"> الاسم : {{auth()->user()->first_name }}</strong>
                    </p>
                    <p>
                        <strong style="font-size:12px"> نوع الحساب : {{\App\Constants\UserTypes::getName(auth()->user()->account_type) }}</strong>
                    </p>

                </div>
            </div>


            <ul class="list-unstyled components mb-5 sidebar-container">
                <li class="{{ \App\Helpers\activeUrl('user.owner.projects.all') }}">
                    <a href="{{route('user.owner.projects.all')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.979" viewBox="0 0 16 14.979">
                            <g id="cube-of-notes-stack" transform="translate(0 -19.534)">
                                <g id="_x32__21_" transform="translate(0 19.534)">
                                    <g id="Group_3608" data-name="Group 3608" transform="translate(0 0)">
                                        <path id="Path_1252" data-name="Path 1252" d="M8,33.692,1.066,30.5c.024.014-.613-.273-1.066-.532,0,.387.1,1.1.458,1.286L7.246,34.3a1.446,1.446,0,0,0,1.508,0l6.788-3.052c.335-.156.458-.891.458-1.286-.436.218-1.055.53-1.067.532ZM8,20.373c.05.059.037.012,0,0ZM.458,28.052,7.246,31.1a1.446,1.446,0,0,0,1.508,0l6.788-3.051c.335-.156.458-.89.458-1.286-.436.219-1.055.53-1.067.533L8,30.5,1.066,27.3c.024.015-.613-.274-1.066-.533C0,27.153.1,27.861.458,28.052Zm0-3.2,6.788,3.052a1.446,1.446,0,0,0,1.508,0l6.788-3.052a.935.935,0,0,0,0-1.507L8.754,19.765a1.347,1.347,0,0,0-1.509,0L.458,23.349A.918.918,0,0,0,.458,24.856ZM8,20.373,14.933,24.1,8,27.024,1.066,24.1Z" transform="translate(0 -19.534)"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        تصفح المشاريع
                    </a>
                </li>


                @if(\App\Helpers\isFreelancer())
                    <li class="{{ \App\Helpers\activeUrl('user.client.proposals.my_proposals') }}">
                        <a href="{{route('user.client.proposals.my_proposals')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18.286" viewBox="0 0 16 18.286">
                                <g id="copy-two-paper-sheets-interface-symbol" transform="translate(-43.714)">
                                    <g id="_x33__21_" transform="translate(43.714)">
                                        <g id="Group_3603" data-name="Group 3603" transform="translate(0)">
                                            <path id="Path_1247" data-name="Path 1247" d="M55.714,0H48.857a2.381,2.381,0,0,0-2.286,2.286l-.661.015a2.288,2.288,0,0,0-2.2,2.27V16A2.381,2.381,0,0,0,46,18.286h8.571A2.381,2.381,0,0,0,56.857,16h.571a2.381,2.381,0,0,0,2.286-2.286V4.585ZM54.571,17.143H46A1.2,1.2,0,0,1,44.857,16V4.571a1.133,1.133,0,0,1,1.089-1.124l.626-.019V13.714A2.381,2.381,0,0,0,48.857,16h6.857A1.2,1.2,0,0,1,54.571,17.143Zm4-3.429a1.2,1.2,0,0,1-1.143,1.143H48.857a1.2,1.2,0,0,1-1.143-1.143V2.286a1.2,1.2,0,0,1,1.143-1.143h5.714c-.009,1.316,0,2.3,0,2.3a2.355,2.355,0,0,0,2.286,2.271h1.714ZM56.857,4.571c-.609,0-1.143-1.106-1.143-1.7V1.161h0l2.857,3.412Z" transform="translate(-43.714)"></path>
                                            <line id="Line_31" data-name="Line 31" y2="4.618" transform="translate(9.5 6.382)" fill="none" stroke-linecap="round" stroke-width="1"></line>
                                            <line id="Line_32" data-name="Line 32" x1="5.7" transform="translate(6.5 8.691)" fill="none" stroke-linecap="round" stroke-width="1"></line>
                                        </g>
                                    </g>
                                </g>
                            </svg>

                            عروضي
                        </a>
                    </li>
                    <li class="{{ \App\Helpers\activeUrl('user.client.my_works.index') }}">
                        <a href="{{route('user.client.my_works.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18.286" viewBox="0 0 16 18.286">
                                <g id="copy-two-paper-sheets-interface-symbol" transform="translate(-43.714)">
                                    <g id="_x33__21_" transform="translate(43.714)">
                                        <g id="Group_3603" data-name="Group 3603" transform="translate(0)">
                                            <path id="Path_1247" data-name="Path 1247" d="M55.714,0H48.857a2.381,2.381,0,0,0-2.286,2.286l-.661.015a2.288,2.288,0,0,0-2.2,2.27V16A2.381,2.381,0,0,0,46,18.286h8.571A2.381,2.381,0,0,0,56.857,16h.571a2.381,2.381,0,0,0,2.286-2.286V4.585ZM54.571,17.143H46A1.2,1.2,0,0,1,44.857,16V4.571a1.133,1.133,0,0,1,1.089-1.124l.626-.019V13.714A2.381,2.381,0,0,0,48.857,16h6.857A1.2,1.2,0,0,1,54.571,17.143Zm4-3.429a1.2,1.2,0,0,1-1.143,1.143H48.857a1.2,1.2,0,0,1-1.143-1.143V2.286a1.2,1.2,0,0,1,1.143-1.143h5.714c-.009,1.316,0,2.3,0,2.3a2.355,2.355,0,0,0,2.286,2.271h1.714ZM56.857,4.571c-.609,0-1.143-1.106-1.143-1.7V1.161h0l2.857,3.412Z" transform="translate(-43.714)"></path>
                                            <line id="Line_31" data-name="Line 31" y2="4.618" transform="translate(9.5 6.382)" fill="none" stroke-linecap="round" stroke-width="1"></line>
                                            <line id="Line_32" data-name="Line 32" x1="5.7" transform="translate(6.5 8.691)" fill="none" stroke-linecap="round" stroke-width="1"></line>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            اعمالي
                        </a>
                    </li>
                    <li class="{{ \App\Helpers\activeUrl('user.client.my_works.index') }}">
                        <a href="{{route('user.client.my_works.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="10.937" viewBox="0 0 16 10.937">
                                <g id="tag-outline" transform="translate(0 136.237) rotate(-90)">
                                    <g id="_x35__18_" transform="translate(125.3)">
                                        <g id="Group_3744" data-name="Group 3744" transform="translate(0)">
                                            <path id="Path_1388" data-name="Path 1388" d="M135.935,4.956,131.392.277a.9.9,0,0,0-1.3,0L125.55,4.956a.9.9,0,0,0-.243.808H125.3v8.189A2.018,2.018,0,0,0,127.288,16h6.958a2.018,2.018,0,0,0,1.988-2.047V6.276C136.234,5.682,136.294,5.325,135.935,4.956ZM135.3,14a.993.993,0,0,1-1,1h-7a1.04,1.04,0,0,1-1.005-1.048L126.3,6a.906.906,0,0,1,.224-.713l3.895-4.011a.45.45,0,0,1,.649,0l3.895,4.01A.913.913,0,0,1,135.3,6v8Zm-4.529-9.772a2.048,2.048,0,1,0,1.988,2.047A2.018,2.018,0,0,0,130.767,4.229Zm0,3.071a1.024,1.024,0,1,1,.994-1.024A1.009,1.009,0,0,1,130.767,7.3Z" transform="translate(-125.3 0)"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>

                            شراء عروض جديدة
                        </a>
                    </li>

                @endif

                @if(\App\Helpers\isClient())
                    <li class="{{ \App\Helpers\activeUrl('user.owner.projects.requests_deliver') }}">
                        <a href="{{route('user.owner.projects.requests_deliver')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18.286" viewBox="0 0 16 18.286">
                                <g id="copy-two-paper-sheets-interface-symbol" transform="translate(-43.714)">
                                    <g id="_x33__21_" transform="translate(43.714)">
                                        <g id="Group_3603" data-name="Group 3603" transform="translate(0)">
                                            <path id="Path_1247" data-name="Path 1247" d="M55.714,0H48.857a2.381,2.381,0,0,0-2.286,2.286l-.661.015a2.288,2.288,0,0,0-2.2,2.27V16A2.381,2.381,0,0,0,46,18.286h8.571A2.381,2.381,0,0,0,56.857,16h.571a2.381,2.381,0,0,0,2.286-2.286V4.585ZM54.571,17.143H46A1.2,1.2,0,0,1,44.857,16V4.571a1.133,1.133,0,0,1,1.089-1.124l.626-.019V13.714A2.381,2.381,0,0,0,48.857,16h6.857A1.2,1.2,0,0,1,54.571,17.143Zm4-3.429a1.2,1.2,0,0,1-1.143,1.143H48.857a1.2,1.2,0,0,1-1.143-1.143V2.286a1.2,1.2,0,0,1,1.143-1.143h5.714c-.009,1.316,0,2.3,0,2.3a2.355,2.355,0,0,0,2.286,2.271h1.714ZM56.857,4.571c-.609,0-1.143-1.106-1.143-1.7V1.161h0l2.857,3.412Z" transform="translate(-43.714)"></path>
                                            <line id="Line_31" data-name="Line 31" y2="4.618" transform="translate(9.5 6.382)" fill="none" stroke-linecap="round" stroke-width="1"></line>
                                            <line id="Line_32" data-name="Line 32" x1="5.7" transform="translate(6.5 8.691)" fill="none" stroke-linecap="round" stroke-width="1"></line>
                                        </g>
                                    </g>
                                </g>
                            </svg>

                            طلبات التسليم
                        </a>
                    </li>
                    <li class="{{ \App\Helpers\activeUrl('user.owner.projects.index') }}">
                        <a href="{{route('user.owner.projects.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18.286" viewBox="0 0 16 18.286">
                                <g id="copy-two-paper-sheets-interface-symbol" transform="translate(-43.714)">
                                    <g id="_x33__21_" transform="translate(43.714)">
                                        <g id="Group_3603" data-name="Group 3603" transform="translate(0)">
                                            <path id="Path_1247" data-name="Path 1247" d="M55.714,0H48.857a2.381,2.381,0,0,0-2.286,2.286l-.661.015a2.288,2.288,0,0,0-2.2,2.27V16A2.381,2.381,0,0,0,46,18.286h8.571A2.381,2.381,0,0,0,56.857,16h.571a2.381,2.381,0,0,0,2.286-2.286V4.585ZM54.571,17.143H46A1.2,1.2,0,0,1,44.857,16V4.571a1.133,1.133,0,0,1,1.089-1.124l.626-.019V13.714A2.381,2.381,0,0,0,48.857,16h6.857A1.2,1.2,0,0,1,54.571,17.143Zm4-3.429a1.2,1.2,0,0,1-1.143,1.143H48.857a1.2,1.2,0,0,1-1.143-1.143V2.286a1.2,1.2,0,0,1,1.143-1.143h5.714c-.009,1.316,0,2.3,0,2.3a2.355,2.355,0,0,0,2.286,2.271h1.714ZM56.857,4.571c-.609,0-1.143-1.106-1.143-1.7V1.161h0l2.857,3.412Z" transform="translate(-43.714)"></path>
                                            <line id="Line_31" data-name="Line 31" y2="4.618" transform="translate(9.5 6.382)" fill="none" stroke-linecap="round" stroke-width="1"></line>
                                            <line id="Line_32" data-name="Line 32" x1="5.7" transform="translate(6.5 8.691)" fill="none" stroke-linecap="round" stroke-width="1"></line>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            مشاريعي
                        </a>
                    </li>
                    <li class="{{ \App\Helpers\activeUrl('user.owner.projects.create') }}">
                        <a href="{{route('user.owner.projects.create')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18.286" viewBox="0 0 16 18.286">
                                <g id="copy-two-paper-sheets-interface-symbol" transform="translate(-43.714)">
                                    <g id="_x33__21_" transform="translate(43.714)">
                                        <g id="Group_3603" data-name="Group 3603" transform="translate(0)">
                                            <path id="Path_1247" data-name="Path 1247" d="M55.714,0H48.857a2.381,2.381,0,0,0-2.286,2.286l-.661.015a2.288,2.288,0,0,0-2.2,2.27V16A2.381,2.381,0,0,0,46,18.286h8.571A2.381,2.381,0,0,0,56.857,16h.571a2.381,2.381,0,0,0,2.286-2.286V4.585ZM54.571,17.143H46A1.2,1.2,0,0,1,44.857,16V4.571a1.133,1.133,0,0,1,1.089-1.124l.626-.019V13.714A2.381,2.381,0,0,0,48.857,16h6.857A1.2,1.2,0,0,1,54.571,17.143Zm4-3.429a1.2,1.2,0,0,1-1.143,1.143H48.857a1.2,1.2,0,0,1-1.143-1.143V2.286a1.2,1.2,0,0,1,1.143-1.143h5.714c-.009,1.316,0,2.3,0,2.3a2.355,2.355,0,0,0,2.286,2.271h1.714ZM56.857,4.571c-.609,0-1.143-1.106-1.143-1.7V1.161h0l2.857,3.412Z" transform="translate(-43.714)"></path>
                                            <line id="Line_31" data-name="Line 31" y2="4.618" transform="translate(9.5 6.382)" fill="none" stroke-linecap="round" stroke-width="1"></line>
                                            <line id="Line_32" data-name="Line 32" x1="5.7" transform="translate(6.5 8.691)" fill="none" stroke-linecap="round" stroke-width="1"></line>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            اضافة مشروع
                        </a>
                    </li>
                @endif


                <li class="{{ \App\Helpers\activeUrl('user.favourites.projects') }}">
                    <a href="{{route('user.favourites.projects')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                            <g id="gear-outlined-symbol" transform="translate(-0.005)">
                                <g id="_x31__13_" transform="translate(0.005)">
                                    <g id="Group_3644" data-name="Group 3644" transform="translate(0)">
                                        <path id="Path_1288" data-name="Path 1288" d="M15.476,9.886l-1.238-.721A6.443,6.443,0,0,0,14.353,8a6.4,6.4,0,0,0-.115-1.165l1.238-.721a1.071,1.071,0,0,0,.387-1.457L14.805,2.81a1.053,1.053,0,0,0-1.445-.39l-1.251.729a6.32,6.32,0,0,0-1.988-1.175V1.067A1.062,1.062,0,0,0,9.063,0H6.948A1.062,1.062,0,0,0,5.89,1.067v.905A6.337,6.337,0,0,0,3.9,3.148L2.65,2.419a1.053,1.053,0,0,0-1.445.39L.147,4.657A1.071,1.071,0,0,0,.534,6.114l1.238.721A6.446,6.446,0,0,0,1.657,8a6.4,6.4,0,0,0,.115,1.165L.534,9.886a1.071,1.071,0,0,0-.387,1.457l1.058,1.848a1.053,1.053,0,0,0,1.445.39L3.9,12.853a6.32,6.32,0,0,0,1.988,1.175v.906A1.062,1.062,0,0,0,6.947,16H9.062a1.062,1.062,0,0,0,1.058-1.067v-.905a6.32,6.32,0,0,0,1.988-1.175l1.251.729a1.054,1.054,0,0,0,1.445-.39l1.058-1.847A1.07,1.07,0,0,0,15.476,9.886Zm-.793,1.386-.529.924a.527.527,0,0,1-.723.2l-1.469-.855a5.269,5.269,0,0,1-2.9,1.691V14.4a.531.531,0,0,1-.529.533H7.476a.531.531,0,0,1-.529-.533V13.226a5.269,5.269,0,0,1-2.9-1.691l-1.469.855a.527.527,0,0,1-.723-.2l-.528-.924a.536.536,0,0,1,.194-.729L3,9.684A5.186,5.186,0,0,1,3,6.316L1.521,5.457a.535.535,0,0,1-.193-.728L1.857,3.8a.527.527,0,0,1,.723-.2l1.469.855a5.266,5.266,0,0,1,2.9-1.691V1.6a.531.531,0,0,1,.529-.533H8.534a.531.531,0,0,1,.529.533V2.774a5.273,5.273,0,0,1,2.9,1.691l1.469-.855a.527.527,0,0,1,.723.2l.529.924a.536.536,0,0,1-.194.729l-1.476.859a5.184,5.184,0,0,1,0,3.368l1.476.859A.536.536,0,0,1,14.683,11.272ZM8.005,5.333A2.667,2.667,0,1,0,10.65,8,2.656,2.656,0,0,0,8.005,5.333Zm0,4.267A1.6,1.6,0,1,1,9.592,8,1.593,1.593,0,0,1,8.005,9.6Z" transform="translate(-0.005)"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>

                        مفضلاتي
                    </a>
                </li>

                <li class="{{ \App\Helpers\activeUrl('user.request_withdraws') }}">
                    <a href="{{route('user.request_withdraws')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                            <g id="gear-outlined-symbol" transform="translate(-0.005)">
                                <g id="_x31__13_" transform="translate(0.005)">
                                    <g id="Group_3644" data-name="Group 3644" transform="translate(0)">
                                        <path id="Path_1288" data-name="Path 1288" d="M15.476,9.886l-1.238-.721A6.443,6.443,0,0,0,14.353,8a6.4,6.4,0,0,0-.115-1.165l1.238-.721a1.071,1.071,0,0,0,.387-1.457L14.805,2.81a1.053,1.053,0,0,0-1.445-.39l-1.251.729a6.32,6.32,0,0,0-1.988-1.175V1.067A1.062,1.062,0,0,0,9.063,0H6.948A1.062,1.062,0,0,0,5.89,1.067v.905A6.337,6.337,0,0,0,3.9,3.148L2.65,2.419a1.053,1.053,0,0,0-1.445.39L.147,4.657A1.071,1.071,0,0,0,.534,6.114l1.238.721A6.446,6.446,0,0,0,1.657,8a6.4,6.4,0,0,0,.115,1.165L.534,9.886a1.071,1.071,0,0,0-.387,1.457l1.058,1.848a1.053,1.053,0,0,0,1.445.39L3.9,12.853a6.32,6.32,0,0,0,1.988,1.175v.906A1.062,1.062,0,0,0,6.947,16H9.062a1.062,1.062,0,0,0,1.058-1.067v-.905a6.32,6.32,0,0,0,1.988-1.175l1.251.729a1.054,1.054,0,0,0,1.445-.39l1.058-1.847A1.07,1.07,0,0,0,15.476,9.886Zm-.793,1.386-.529.924a.527.527,0,0,1-.723.2l-1.469-.855a5.269,5.269,0,0,1-2.9,1.691V14.4a.531.531,0,0,1-.529.533H7.476a.531.531,0,0,1-.529-.533V13.226a5.269,5.269,0,0,1-2.9-1.691l-1.469.855a.527.527,0,0,1-.723-.2l-.528-.924a.536.536,0,0,1,.194-.729L3,9.684A5.186,5.186,0,0,1,3,6.316L1.521,5.457a.535.535,0,0,1-.193-.728L1.857,3.8a.527.527,0,0,1,.723-.2l1.469.855a5.266,5.266,0,0,1,2.9-1.691V1.6a.531.531,0,0,1,.529-.533H8.534a.531.531,0,0,1,.529.533V2.774a5.273,5.273,0,0,1,2.9,1.691l1.469-.855a.527.527,0,0,1,.723.2l.529.924a.536.536,0,0,1-.194.729l-1.476.859a5.184,5.184,0,0,1,0,3.368l1.476.859A.536.536,0,0,1,14.683,11.272ZM8.005,5.333A2.667,2.667,0,1,0,10.65,8,2.656,2.656,0,0,0,8.005,5.333Zm0,4.267A1.6,1.6,0,1,1,9.592,8,1.593,1.593,0,0,1,8.005,9.6Z" transform="translate(-0.005)"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>

                        المعاملات المالية
                    </a>
                </li>

                <li class="{{ \App\Helpers\activeUrl('user.wallet') }}">
                    <a href="{{ route('user.wallet') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12">
                            <g id="new-email-envelope-frontal-view" transform="translate(0 -76.5)">
                                <g id="_x38__18_" transform="translate(0 76.5)">
                                    <g id="Group_3685" data-name="Group 3685">
                                        <path id="Path_1329" data-name="Path 1329" d="M8.5,83.5h-6a.5.5,0,0,0,0,1h6a.5.5,0,0,0,0-1Zm0,2h-6a.5.5,0,0,0,0,1h6a.5.5,0,0,0,0-1Zm5.5-9H2a2,2,0,0,0-2,2v8a2,2,0,0,0,2,2H14a2,2,0,0,0,2-2v-8A2,2,0,0,0,14,76.5Zm1,10a1,1,0,0,1-1,1H2a1,1,0,0,1-1-1v-8a1,1,0,0,1,1-1H14a1,1,0,0,1,1,1Zm-2-8H11a1,1,0,0,0-1,1v2a1,1,0,0,0,1,1h2a1,1,0,0,0,1-1v-2A1,1,0,0,0,13,78.5ZM13,81a.5.5,0,0,1-.5.5h-1A.5.5,0,0,1,11,81V80a.5.5,0,0,1,.5-.5h1a.5.5,0,0,1,.5.5Z" transform="translate(0 -76.5)"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        الرصيد
                    </a>
                </li>

                <li class="{{ \App\Helpers\activeUrl('user.profile') }}">
                    <a href="{{ route('user.profile') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12">
                            <g id="new-email-envelope-frontal-view" transform="translate(0 -76.5)">
                                <g id="_x38__18_" transform="translate(0 76.5)">
                                    <g id="Group_3685" data-name="Group 3685">
                                        <path id="Path_1329" data-name="Path 1329" d="M8.5,83.5h-6a.5.5,0,0,0,0,1h6a.5.5,0,0,0,0-1Zm0,2h-6a.5.5,0,0,0,0,1h6a.5.5,0,0,0,0-1Zm5.5-9H2a2,2,0,0,0-2,2v8a2,2,0,0,0,2,2H14a2,2,0,0,0,2-2v-8A2,2,0,0,0,14,76.5Zm1,10a1,1,0,0,1-1,1H2a1,1,0,0,1-1-1v-8a1,1,0,0,1,1-1H14a1,1,0,0,1,1,1Zm-2-8H11a1,1,0,0,0-1,1v2a1,1,0,0,0,1,1h2a1,1,0,0,0,1-1v-2A1,1,0,0,0,13,78.5ZM13,81a.5.5,0,0,1-.5.5h-1A.5.5,0,0,1,11,81V80a.5.5,0,0,1,.5-.5h1a.5.5,0,0,1,.5.5Z" transform="translate(0 -76.5)"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        بيانات المستخدم
                    </a>
                </li>

                <li class="{{ \App\Helpers\activeUrl('user.change_password') }}">
                    <a href="{{route('user.change_password')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="16" viewBox="0 0 10 16">
                            <g id="lock-circular-padlock-outline-tool-symbol" transform="translate(-148.5)">
                                <g id="_x39__40_" transform="translate(148.5)">
                                    <g id="Group_3664" data-name="Group 3664" transform="translate(0)">
                                        <path id="Path_1308" data-name="Path 1308" d="M153.5,10a.5.5,0,0,0-.5.5v2a.5.5,0,1,0,1,0v-2A.5.5,0,0,0,153.5,10Zm4-1.991V4a4,4,0,0,0-8,0V8.009a5,5,0,1,0,8,0ZM150.5,4a3,3,0,0,1,6,0V7.007a4.972,4.972,0,0,0-6,0Zm3,11a4,4,0,0,1,0-8,4.1,4.1,0,0,1,4,4A4,4,0,0,1,153.5,15Z" transform="translate(-148.5)"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>

                        تغير كلمة المرور
                    </a>
                </li>
                <li class="{{ \App\Helpers\activeUrl('user.chats') }}">
                    <a href="{{route('user.chats')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18.286" viewBox="0 0 16 18.286">
                            <g id="copy-two-paper-sheets-interface-symbol" transform="translate(-43.714)">
                                <g id="_x33__21_" transform="translate(43.714)">
                                    <g id="Group_3603" data-name="Group 3603" transform="translate(0)">
                                        <path id="Path_1247" data-name="Path 1247" d="M55.714,0H48.857a2.381,2.381,0,0,0-2.286,2.286l-.661.015a2.288,2.288,0,0,0-2.2,2.27V16A2.381,2.381,0,0,0,46,18.286h8.571A2.381,2.381,0,0,0,56.857,16h.571a2.381,2.381,0,0,0,2.286-2.286V4.585ZM54.571,17.143H46A1.2,1.2,0,0,1,44.857,16V4.571a1.133,1.133,0,0,1,1.089-1.124l.626-.019V13.714A2.381,2.381,0,0,0,48.857,16h6.857A1.2,1.2,0,0,1,54.571,17.143Zm4-3.429a1.2,1.2,0,0,1-1.143,1.143H48.857a1.2,1.2,0,0,1-1.143-1.143V2.286a1.2,1.2,0,0,1,1.143-1.143h5.714c-.009,1.316,0,2.3,0,2.3a2.355,2.355,0,0,0,2.286,2.271h1.714ZM56.857,4.571c-.609,0-1.143-1.106-1.143-1.7V1.161h0l2.857,3.412Z" transform="translate(-43.714)"></path>
                                        <line id="Line_31" data-name="Line 31" y2="4.618" transform="translate(9.5 6.382)" fill="none" stroke-linecap="round" stroke-width="1"></line>
                                        <line id="Line_32" data-name="Line 32" x1="5.7" transform="translate(6.5 8.691)" fill="none" stroke-linecap="round" stroke-width="1"></line>
                                    </g>
                                </g>
                            </g>
                        </svg>

                    المحادثات
                    </a>
                </li>
                <li>
                    <a href="{{route('user.logout')}}" class="border-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14">
                            <g id="down-arrow-to-a-square" transform="translate(0 57.714) rotate(-90)">
                                <g id="_x39__7_" transform="translate(43.714)">
                                    <g id="Group_3614" data-name="Group 3614" transform="translate(0)">
                                        <path id="Path_1258" data-name="Path 1258" d="M46.886,9.379l3.45,3.45a.577.577,0,0,0,.757,0l3.449-3.45a.5.5,0,0,0-.707-.707l-2.621,2.622V.5a.5.5,0,0,0-1,0V11.293L47.593,8.671a.5.5,0,0,0-.707.707ZM55.714,2h-1.5V3h1.5a1,1,0,0,1,1,1V14a1,1,0,0,1-1,1h-10a1,1,0,0,1-1-1V4a1,1,0,0,1,1-1h1.5V2h-1.5a2,2,0,0,0-2,2V14a2,2,0,0,0,2,2h10a2,2,0,0,0,2-2V4A2,2,0,0,0,55.714,2Z" transform="translate(-43.714)"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>

                        تسجيل خروج
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Page Content  -->
    <div id="content">
        {{ isset($slot)? $slot : ''}}
        @yield('content')
    </div>


</div>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    Pusher.logToConsole = false;

    var pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
        cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
        forceTLS: true,
        pusherOptions: {
            authTimeout: 10000 // Set the authorization timeout to 10 seconds.
        }
    });

    var channel = pusher.subscribe('chat');
    channel.bind('message{{auth()->id()}}', function (data) {
        Livewire.emit('messageReceived', data.message);
    });
</script>

@include('partial.scripts')
@livewireScripts()
</body>
</html>
