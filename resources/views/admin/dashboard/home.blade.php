@extends('layouts.admin')
@section('content')
<main class="main-content">
    <!--head-->
    <x-admin.head/>
    <!--wallet-->
    <div class="border-div">
        <h2>@lang('site.dashboard')</h2>
        <div class="row">
            <div class="col-4 text-center">
                <div class="dash box-shad" onclick='window.location.href="{{route('admin.users.index')}}'>
                    <h4>{{$totalClients??0}}</h4>
                    <p class="grey">@lang('site.clients')</p>
                </div>
            </div>

            <div class="col-4 text-center">
                <div class="dash box-shad" onclick='window.location.href="{{route('admin.users.index')}}'>
                    <h4>{{$totalFreelancers??0}}</h4>
                    <p class="grey">@lang('site.freelancers')</p>
                </div>
            </div>

            <div class="col-4 text-center">
                <div class="dash box-shad" onclick='window.location.href="{{route('admin.oil_brands')}}'>
                    <h4>{{$totalProjects??0}}</h4>
                    <p class="grey">@lang('site.projects')</p>
                </div>
            </div>

            <div class="col-4 text-center">
                <div class="dash box-shad" onclick='window.location.href="{{route('admin.orders')}}'>
                    <h4>{{$totalSpecialties??0}}</h4>
                    <p class="grey">@lang('site.specialties')</p>
                </div>
            </div>
            <div class="col-4 text-center">
                <div class="dash box-shad" >
                    <h4>{{$totalCountries??0}}</h4>
                    <p class="grey">@lang('site.countries')</p>
                </div>
            </div>


        </div>


    </div>
</main>
@endsection
