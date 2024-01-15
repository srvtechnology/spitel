@extends('master')
@section('content')



<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Merchant') }} {{ __('messages.Order_History') }}</div>
    <a href="{{ url('/admin/Merchants/list') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>

<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Merchant') }} {{ __('messages.Order_History') }}</div>
            </div>
            <div class="card-common-body">
                <div class="card-table-responsive">
                    <table id="washStations" class="table tableCommon table-striped table-single-line">
                        <thead>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Merchant') }}</th>
                                <th>{{ __('messages.Order_Type') }}</th>
                                <th>{{ __('messages.Order_placed_Date_Time') }}</th>
                                <th>{{ __('messages.Order_Takeway_Date_Time') }}</th>
                                <th>{{ __('messages.Status') }}</th>
                                <th>{{ __('messages.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tbl-id">01</td>
                                <td>merry</td>
                                <td>type</td>
                                <td>4:20 pm</td>
                                <td>5:00 pm</td>
                                <td>
                                    <div class="btn-group dropdown-menu-action-active-group">
                                        <div class="status-common status-green dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="status-dot">{{ __('messages.Complete') }}</span>
                                        </div>
                                        <ul class="dropdown-menu dropdown-menu-action dropdown-menu-action-active">
                                            <li><a class="dropdown-item" href="#!">{{ __('messages.Complete') }}</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#!">{{ __('messages.Cancel') }}</a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <div class="actions-col">
                                        <a class="actionIcon" href="{{ url('/admin/Merchants-order-history-detail') }}">
                                            <span>{{ __('messages.View') }}</span>
                                            <i class="fa-solid fa-eye textOrange"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Merchant') }}</th>
                                <th>{{ __('messages.Order_Type') }}</th>
                                <th>{{ __('messages.Order_placed_Date_Time') }}</th>
                                <th>{{ __('messages.Order_Takeway_Date_Time') }}</th>
                                <th>{{ __('messages.Status') }}</th>
                                <th>{{ __('messages.Actions') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection