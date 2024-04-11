
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
                        @foreach(\App\Constants\RequestWithDrawStatus::all() as $status)
                            <option value="{{$status}}">{{\App\Constants\RequestDeliverStatus::getName($status)}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-3">
                    <button wire:click="resetData()" class="btn btn-primary form-control contact-input">@lang('site.reset')</button>
                </div>

            </div>

            @if(count($records))
                <table class="table-page table">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">@lang('admin.username')</th>
                        <th class="text-center">@lang('admin.amount')</th>
                        <th class="text-center">@lang('admin.papal')</th>
                        <th class="text-center">@lang('admin.bank_account')</th>
                        <th class="text-center">@lang('admin.bank_name')</th>
                        <th class="text-center">@lang('admin.card_name')</th>
                        <th>@lang('site.actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td>#{{$record->id}}</td>
                            <td class='text-center'>{{$record->user->first_name . ' ' . $record->user->last_name}}</td>
                            <td class='text-center'>{{$record->amount}}</td>
                            <td class='text-center'>{{$record->paypal_email}}</td>
                            <td class='text-center'>{{$record->bank_account}}</td>
                            <td class='text-center'>{{$record->bank_name}}</td>
                            <td class='text-center'>{{$record->card_name}}</td>

                            <td>
                                <div class="actions">
                                    @if($record->status == \App\Constants\RequestDeliverStatus::PENDING)
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
