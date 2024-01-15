@extends('master-merchant')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Earning_History') }}</div>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.All') }} {{ __('messages.Earning_History') }}</div>
            </div>
            <div class="card-common-body">
                <div class="row">
                    <div class="col-sm-12 lengthFilterCol">

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
                                    <select class="form-control form-control-filters" name="transactionID">
                                        <option value="" selected>{{ __('messages.Transaction_ID') }}</option>
                                        <option value="1">23432</option>
                                        <option value="2">564456</option>
                                    </select>
                                    <select class="form-control form-control-filters" name="orderID">
                                        <option value="" selected>{{ __('messages.Order_ID') }}</option>
                                        <option value="1">23432</option>
                                        <option value="2">564456</option>
                                    </select>
                                    <select class="form-control form-control-filters" name="merchant">
                                        <option value="" selected>{{ __('messages.Select_Merchant') }}</option>
                                        <option value="1">Merchant 1</option>
                                        <option value="2">Merchant 2</option>
                                    </select>
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
                <div class="card-table-responsive">
                    <table id="washStations" class="table tableCommon table-striped table-single-line">
                        <thead>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Transaction_ID') }}</th>
                                <th>{{ __('messages.Order_ID') }}</th>
                                <th>{{ __('messages.Merchant_Name') }}</th>
                                <th>{{ __('messages.Amount') }}</th>
                                <th>{{ __('messages.Date_Time') }}</th>
                                <th>{{ __('messages.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>02</td>
                                <td>2546</td>
                                <td>2546</td>
                                <td>Merchant Name</td>
                                <td>2546</td>
                                <td>10/12/2023 11:45 am</td>
                                <td>
                                    <div class="actions-col">
                                        <a class="actionIcon" href="{{ url('/merchant/earning-transactions/history/view') }}">
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
                                <th>{{ __('messages.Transaction_ID') }}</th>
                                <th>{{ __('messages.Order_ID') }}</th>
                                <th>{{ __('messages.Merchant_Name') }}</th>
                                <th>{{ __('messages.Amount') }}</th>
                                <th>{{ __('messages.Date_Time') }}</th>
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