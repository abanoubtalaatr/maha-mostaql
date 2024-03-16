<main class="main-content">
    <!--head-->
    <x-admin.head/>
    <!--table-->
    <div class="border-div">
        <div class="b-btm flex-div-2">
            <h4>{{$page_title}}</h4>
            <a style='text-align:center' href='{{route('admin.create_opinions')}}'
               class="button btn-red big">@lang('site.create')</a>
        </div>
        <div class="table-page-wrap">

            <div class="row d-flex align-items-center my-3 border p-2 rounded">
                <div class="form-group col-3">
                    <label for="status-select">@lang('validation.attributes.name')</label>
                    <input wire:model='name' type="text" class="form-control contact-input">
                </div>
                <div class="form-group col-3">
                    <label for="status-select">@lang('site.status')</label>
                    <select wire:model='status' id='status-select' class="form-control  contact-input">
                        <option value>@lang('site.status')</option>
                        <option value="active">@lang('site.active')</option>
                        <option value="inactive">@lang('site.inactive')</option>
                    </select>
                </div>

                <div class="form-group col-2">
                    <button wire:click="resetData()" class="btn btn-primary form-control contact-input">@lang('site.reset')</button>
                </div>
            </div>
            @if(count($records))
                <table class="table-page table">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">@lang('site.name')</th>
                        <th class="text-center">@lang('site.opinion')</th>
                        <th class="text-center">@lang('site.status')</th>
                        <th>@lang('site.actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                        <tr>
                            <td class="text-center">{{$loop->index + 1}}</td>
                            <td class='text-center'>{{$record->name}}</td>
                            <td class='text-center'>{{$record->opinion}}</td>
                            <td class='text-center'>
                                <div class="status {{$record->status_class}}">
                                    <span>@lang('site.'.$record->status)</span>
                                </div>
                            </td>

                            <td>
                                <div class="actions">
                                    <button
                                        wire:click='toggleStatus({{$record->id}})'
                                        class="no-btn">
                                        <i class="fas @if($record->is_active==1) fa-lock red @else fa-unlock green @endif"></i>
                                    </button>
                                    <a href='{{route('admin.edit_opinions',$record->id)}}' class="no-btn"><i
                                            class="far fa-edit blue"></i></a>

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
