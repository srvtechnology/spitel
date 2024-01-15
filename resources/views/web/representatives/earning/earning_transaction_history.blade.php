@extends('master-representative')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Earning_History') }}</div>
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
</div>
<div>
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
<div class="row my-2">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.type_of_business') }}</div>
            </div>
            <div class="card-common-body">
                <div class="card-table-responsive">
                    <table class="customers table tableCommon table-striped table-single-line">
                        <thead>
                            <tr>
                                <th>{{ __('messages.Type') }}</th>
                                <th>{{ __('messages.Count') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tbl-id">{{ __('messages.Buffet') }}</td>
                                <td class="tbl-id">15</td>
                            </tr>
                            <tr>
                                <td class="tbl-id">{{ __('messages.Bakery') }}</td>
                                <td class="tbl-id">5</td>
                            </tr>
                            <tr>
                                <td class="tbl-id">{{ __('messages.Grill') }}</td>
                                <td class="tbl-id">15</td>
                            </tr>
                            <tr>
                                <td class="tbl-id">{{ __('messages.Buffet') }}</td>
                                <td class="tbl-id">5</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('messages.Type') }}</th>
                                <th>{{ __('messages.Count') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row my-2">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.number_of_city') }}</div>
            </div>
                <div class="card-common-body">
                    <div class="card-topbar-inner-report">
                        <div class="d-flex">
                            <label class="card-topbar-title">{{ __('messages.City') }} :</label>
                            <div>City 1</div>
                        </div>
                        <div class="d-flex">
                            <label class="card-topbar-title">{{ __('messages.Neighborhood') }} :</label>
                            <div>Neighborhood</div>
                        </div>
                    </div>
                    <div class="card-topbar-title">{{ __('messages.type_of_business') }}</div>
                    <div class="card-table-responsive">
                        <table class="customers table tableCommon table-striped table-single-line">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.Type') }}</th>
                                    <th>{{ __('messages.Count') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="tbl-id">{{ __('messages.Buffet') }}</td>
                                    <td class="tbl-id">15</td>
                                </tr>
                                <tr>
                                    <td class="tbl-id">{{ __('messages.Bakery') }}</td>
                                    <td class="tbl-id">5</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('messages.Type') }}</th>
                                    <th>{{ __('messages.Count') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Status_of_Collection') }}</div>
            </div>
            <div class="card-common-body">
                <div class="card-table-responsive">
                    <table class="customers table tableCommon table-striped table-single-line">
                        <thead>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Overall_collection') }}</th>
                                <th>{{ __('messages.Fee_to_collect') }}</th>
                                <th>{{ __('messages.fee_collection') }}</th>
                                <th>{{ __('messages.Fee_not_collect') }}</th>
                                <th>{{ __('messages.rest_collection') }}</th>
                                {{-- <th>{{ __('messages.Actions') }}</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>02</td>
                                <td>Fee to collect</td>
                                <td>fee collection</td>
                                <td>Merchant Name</td>
                                <td>Fee No Ctcollect</td>
                                <td>rest collection</td>
                                {{-- <td>
                                    <div class="actions-col">
                                        <a class="actionIcon" href="{{ url('/representative/earning-transactions/history/view') }}">
                                            <span>{{ __('messages.View') }}</span>
                                            <i class="fa-solid fa-eye textOrange"></i>
                                        </a>
                                    </div>
                                </td> --}}
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Overall_collection') }}</th>
                                <th>{{ __('messages.Fee_to_collect') }}</th>
                                <th>{{ __('messages.fee_collection') }}</th>
                                <th>{{ __('messages.Fee_not_collect') }}</th>
                                <th>{{ __('messages.rest_collection') }}</th>
                                {{-- <th>{{ __('messages.Actions') }}</th> --}}
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Collection_location') }}</div>
            </div>
            <div class="card-common-body">
                <div class="card-table-responsive">
                    <table class="customers table tableCommon table-striped table-single-line">
                        <thead>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.City') }}</th>
                                <th>{{ __('messages.Neighborhood') }}</th>
                                <th>{{ __('messages.Overall_collection') }}</th>
                                <th>{{ __('messages.Fee_to_collect') }}</th>
                                <th>{{ __('messages.fee_collection') }}</th>
                                <th>{{ __('messages.Fee_not_collect') }}</th>
                                <th>{{ __('messages.rest_collection') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>City 1</td>
                                <td>Neighborhood</td>
                                <td>Fee to collect</td>
                                <td>fee collection</td>
                                <td>Merchant Name</td>
                                <td>Fee No Ctcollect</td>
                                <td>rest collection</td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>City 2</td>
                                <td>Neighborhood</td>
                                <td>Fee to collect</td>
                                <td>fee collection</td>
                                <td>Merchant Name</td>
                                <td>Fee No Ctcollect</td>
                                <td>rest collection</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.City') }}</th>
                                <th>{{ __('messages.Neighborhood') }}</th>
                                <th>{{ __('messages.Overall_collection') }}</th>
                                <th>{{ __('messages.Fee_to_collect') }}</th>
                                <th>{{ __('messages.fee_collection') }}</th>
                                <th>{{ __('messages.Fee_not_collect') }}</th>
                                <th>{{ __('messages.rest_collection') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Collection_type') }}</div>
            </div>
            <div class="card-common-body">
                <div class="card-table-responsive">
                    <table class="customers table tableCommon table-striped table-single-line">
                        <thead>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Type') }}</th>
                                <th>{{ __('messages.Overall_collection') }}</th>
                                <th>{{ __('messages.Fee_to_collect') }}</th>
                                <th>{{ __('messages.fee_collection') }}</th>
                                <th>{{ __('messages.Fee_not_collect') }}</th>
                                <th>{{ __('messages.rest_collection') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Type 1</td>
                                <td>Fee to collect</td>
                                <td>fee collection</td>
                                <td>Merchant Name</td>
                                <td>Fee No Ctcollect</td>
                                <td>rest collection</td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>Type 2</td>
                                <td>Fee to collect</td>
                                <td>fee collection</td>
                                <td>Merchant Name</td>
                                <td>Fee No Ctcollect</td>
                                <td>rest collection</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Type') }}</th>
                                <th>{{ __('messages.Overall_collection') }}</th>
                                <th>{{ __('messages.Fee_to_collect') }}</th>
                                <th>{{ __('messages.fee_collection') }}</th>
                                <th>{{ __('messages.Fee_not_collect') }}</th>
                                <th>{{ __('messages.rest_collection') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection