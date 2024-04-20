
<main class="main-content">
    <!--head-->
    <x-admin.head/>
    <!--table-->
    <div class="border-div">
        <div class="b-btm flex-div-2">
            <h4>{{$page_title}}</h4>
        </div>
        <div class="table-page-wrap">

            <div class="row d-flex align-items-center my-3 border p-2 rounded">


                <div class="form-group col-3">
                    <label for="status-select">@lang('site.status_order')</label>
                    <select wire:model='status' id='status-select' class="form-control border  contact-input">
                        <option value>@lang('site.status')</option>
                        @foreach(\App\Constants\ProposalStatus::all() as $status)
                            <option value="{{$status}}">{{\App\Constants\ProposalStatus::getName($status)}}</option>
                        @endforeach
                    </select>
                </div>


            </div>

            @if(count($records))
                <table class="table-page table">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">@lang('admin.title')</th>
                        <th class="text-center">@lang('admin.price')</th>
                        <th class="text-center">@lang('admin.description')</th>
                        <th class="text-center">@lang('admin.period')</th>

                        <th>@lang('site.actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>#{{$record->id}}</td>
                            <td class='text-center'>{{$record->title}}</td>
                            <td class='text-center'>{{$record->price}}</td>
                            <td>
                                {{$record->description}}
                            </td>
                            <td>
                                {{$record->period}}
                            </td>

                            <td>
                                <div class="actions">
                                     @if($record->status == \App\Constants\ProjectStatus::REVIEW)
                                         <button class="btn btn-primary" wire:click="accept({{$record->id}})">@lang('admin.accept')</button>
                                     @endif
                                </div>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>

                {{$records->links()}}
            @else
                <div class="row" style='margin-top:10px'>
                    <div class="alert alert-warning">@lang('site.no_data_to_display')</div>
                </div>
            @endif
        </div>
    </div>
</main>
<style>
    .primary {
        background: #34a57b;
        color:white;
    }
    .rejected {
        background: red;
        color:white;
    }
    .spinner {
        display: none;
    }
    .spinner.show {
        display: inline-block;
    }
</style>
@include('partial.modal-scripts')
