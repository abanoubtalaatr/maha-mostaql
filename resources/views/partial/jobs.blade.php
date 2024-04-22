<!-- start new job section -->
<section class="new-job">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="head-line me-4">
                    <a href="{{route('projects.search')}}" class="float-start see-more">شاهد المزيد</a>
                    <h2>أحدث الوظائف</h2>
                    <p>أختر الأنسب واتمم عملية التوظيف</p>
                </div>
            </div>

            <div class="col-md-12">
                <div class="responsive">
                    @foreach(\App\Models\Project::query()->where('status', \App\Constants\ProjectStatus::OFFERS)->latest()->limit(5)->get() as $project)
                        <a href="{{route('user.client.proposals.create', $project->id)}}">
                            <div class="job-card shadow" style="min-height: 250px;">
                            <p>{{$project->title}}</p>
                            <ul class="d-flex">
                                <li>
                                    <img src="{{asset('website/assets/images/location-dark.png')}}" alt=""/>

                                    <span>{{$project->user->country ? $project->user->country->name : ''}}</span>
                                </li>
                                <li>
                                    <img src="{{asset('website/assets/images/wallet.png')}}" alt="" />
                                    <span> $  {{$project->price_from . " - " . $project->price_to}} </span>
                                </li>
                            </ul>
                            <div class="d-flex mt-4">
                                <div class="w-25 mx-2">
                                    <x-logo />
                                </div>
                                <div class="company-info pt-2">
                                    <h5>{{$project->user->first_name . '  ' . $project->user->last_name}}</h5>
                                    <p>
                                        <img src="{{asset('website/assets/images/time.png')}}" alt="التاريخ" />
                                        : <span> {{\Illuminate\Support\Carbon::parse($project->created_at)->diffForHumans()}}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<!-- start step section -->
