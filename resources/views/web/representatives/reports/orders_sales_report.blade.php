@extends('master-representative')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Merchant_Report') }}</div>
</div>
<div class="row mb-4 total-sale-wraper total-many-wrapper ordersAll">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon1.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.number_of') }} {{ __('messages.Merchant') }}</div>
                <div class="total-info-card-number">75</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon2.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.type_of_business') }}</div>
                <div class="total-info-card-number">20</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon6.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.number_of') }} {{ __('messages.City') }}</div>
                <div class="total-info-card-number">36</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon4.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.number_of') }} {{ __('messages.Active') }}</div>
                <div class="total-info-card-number">257</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon5.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.number_of') }} {{ __('messages.Inactive') }}</div>
                <div class="total-info-card-number">234</div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Merchant_Report') }}</div>
            </div>
            <div class="card-common-body">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-12 lengthFilterCol">
                                <button class="btn btn-primary w-170">{{ __('messages.Download') }}</button>
                                <div class="searchFilter">
                                    <i class="fa-regular fa-sliders"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row no-margin filter-trigger" style="display: block;">
                            <div class="col-md-12">
                                <div class="filters-table-wrapper">
                                    <div class="filter-heading">{{ __('messages.Search_Filters') }}</div>
                                    <div class="filters-table">
                                        <div class="main-filters">
                                            <div class="input-group date filterDateRight">
                                                <input type="text" class="form-control" id="input_from" placeholder="{{ __('messages.From_Date') }}">
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-light">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                            </div>
                                            <div class="input-group date filterDateRight">
                                                <input type="text" class="form-control" id="input_to" placeholder="{{ __('messages.To_Date') }}">
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-light">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filters-control">
                                        <a href="#!" class="btn btn-transparent clear-filter">{{ __('messages.Clear_Filter') }}</a>
                                        <button type="submit" href="#!" class="btn btn-primary">{{ __('messages.Search') }}</button>
                                        <a href="#!" class="btn  btn-transparent btn-tra hide-filter">{{ __('messages.Hide_Filter') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                    <div class="card-table-responsive">
                        <table id="customers" class="table tableCommon table-striped table-single-line">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.ID') }}</th>
                                    <th>{{ __('messages.Name') }}</th>
                                    <th>{{ __('messages.City') }}</th>
                                    <th>{{ __('messages.type_of_business') }}</th>
                                    <th>{{ __('messages.Neighborhood') }}</th>
                                    <th>{{ __('messages.Contact_person') }}</th>
                                    <th>{{ __('messages.Status') }}</th>
                                    <th>{{ __('messages.Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="tbl-id">
                                        01
                                    </td>
                                    <td class="tbl-id">
                                        Name
                                    </td>
                                    <td>
                                        <span class="tbl-name">city</span>
                                    </td>
                                    <td>
                                        05
                                    </td>
                                    <td>
                                        Neighborhood
                                    </td>
                                    <td>
                                        Contact person
                                    </td>
                                    <td>
                                        <div class="btn-group dropdown-menu-action-active-group">
                                            <div class="status-common status-green">
                                                <span class="status-dot">{{ __('messages.Active') }}</span>
                                            </div>
                                            <ul class="dropdown-menu dropdown-menu-action dropdown-menu-action-active">
                                                <li><a class="dropdown-item" >{{ __('messages.Active') }}</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#!">{{ __('messages.Inactive') }}</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="actions-col">
                                            <a class="actionIcon" href="{{ url('/representative/report-view') }}">
                                                <span>{{ __('messages.View') }} {{ __('messages.Detail') }}</span>
                                                <i class="fa-solid fa-eye textOrange"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('messages.ID') }}</th>
                                    <th>{{ __('messages.Name') }}</th>
                                    <th>{{ __('messages.City') }}</th>
                                    <th>{{ __('messages.type_of_business') }}</th>
                                    <th>{{ __('messages.Neighborhood') }}</th>
                                    <th>{{ __('messages.Contact_person') }}</th>
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
</div>
@endsection