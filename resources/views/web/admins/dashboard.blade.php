@extends('master')
@section('content')
    {{-- total_business  --}}
    <div class="main-heading-container">
        <div class="common-title">{{ __('messages.total_business') }}</div>
        <div class="col-md-4 form-group posRel">
            <label>{{ __('messages.From_Date') }}</label>
            <input type="text" class="form-control" id="input_from" name="valid_till"
                placeholder="{{ __('messages.From_Date') }}">
        </div>
        <div class="col-md-4 form-group posRel">
            <label>{{ __('messages.Till_date') }}</label>
            <input type="text" class="form-control" id="input_to" name="valid_till"
                placeholder="{{ __('messages.Till_date') }}">
        </div>
    </div>

    <div class="row mb-4 total-sale-wraper total-many-wrapper ordersAll">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon1.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Total') }} {{ __('messages.Registered') }}</div>
                    <div class="total-info-card-number">75</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon6.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.New') }} {{ __('messages.Registered') }}</div>
                    <div class="total-info-card-number">36</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon2.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title"> {{ __('messages.No_of_Representatives') }}</div>
                    <div class="total-info-card-number">20</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon3.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.No_of_Cities') }}</div>
                    <div class="total-info-card-number">02</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon4.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Total') }} {{ __('messages.Active') }}</div>
                    <div class="total-info-card-number">257</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon5.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Total') }} {{ __('messages.Inactive') }}</div>
                    <div class="total-info-card-number">234</div>
                </div>
            </div>
        </div>
    </div>
    {{-- Fee Collection  --}}

    <div class="main-heading-container">
        <div class="common-title">{{ __('messages.fee_collected') }}</div>
        <div class="col-md-4 form-group posRel">
            <label>{{ __('messages.From_Date') }}</label>
            <input type="text" class="form-control input_from" name="valid_till"
                placeholder="{{ __('messages.From_Date') }}">
        </div>
        <div class="col-md-4 form-group posRel">
            <label>{{ __('messages.Till_date') }}</label>
            <input type="text" class="form-control input_to" name="valid_till"
                placeholder="{{ __('messages.Till_date') }}">
        </div>
    </div>
    <div class="row mb-4 total-sale-wraper total-many-wrapper ordersAll">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon1.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Fee_to_collect') }}</div>
                    <div class="total-info-card-number">75</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon2.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.fee_collected') }}</div>
                    <div class="total-info-card-number">20</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon3.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Fee_not_collect') }}</div>
                    <div class="total-info-card-number">02</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon4.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Rest_to_collect') }}</div>
                    <div class="total-info-card-number">257</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon5.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Previous_fee_not_collected') }}</div>
                    <div class="total-info-card-number">234</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon6.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Total_to_be_collected') }}</div>
                    <div class="total-info-card-number">36</div>
                </div>
            </div>
        </div>
    </div>
    {{-- type of business  --}}

    <div class="main-heading-container">
        <div class="common-title">{{ __('messages.type_of_business') }}</div>
    </div>
    <div class="row mb-4 total-sale-wraper total-many-wrapper ordersAll">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon1.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Food_picker') }}</div>
                    <div class="total-info-card-number">75</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon1.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Grocery_picker') }}</div>
                    <div class="total-info-card-number">20</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon1.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.other') }}</div>
                    <div class="total-info-card-number">02</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon1.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.other') }}</div>
                    <div class="total-info-card-number">257</div>
                </div>
            </div>
        </div>
    </div>
    {{-- Orders  --}}
    <div class="main-heading-container">
        <div class="common-title">{{ __('messages.Orders') }}</div>
    </div>
    <div class="row mb-4 total-sale-wraper total-many-wrapper ordersAll">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon1.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Today') }} {{ __('messages.Orders') }}</div>
                    <div class="total-info-card-number">75</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon2.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Todays') }} {{ __('messages.Completed') }}
                        {{ __('messages.Orders') }}</div>
                    <div class="total-info-card-number">20</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon3.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Todays') }} {{ __('messages.Cancelled') }}
                        {{ __('messages.Orders') }}</div>
                    <div class="total-info-card-number">02</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon4.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Total') }} {{ __('messages.Orders') }}</div>
                    <div class="total-info-card-number">257</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon5.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Total') }} {{ __('messages.Completed') }}
                        {{ __('messages.Orders') }}</div>
                    <div class="total-info-card-number">234</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon6.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Total') }} {{ __('messages.Cancelled') }}
                        {{ __('messages.Orders') }}</div>
                    <div class="total-info-card-number">36</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2 orderSummaryWrapper">
        <div class="col-lg-12 col-xl-8 col-activity">
            <div class="card-common">
                <div class="card-topbar card-topbar-justify-center">
                    <div class="card-topbar-title">{{ __('messages.Order_Summary') }}</div>
                    <ul class="nav nav-pills dbrdTabs" id="pills-Ordertab">
                        <li class="nav-item">
                            <button class="nav-link active" id="pills-Order-Daily-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Order-Daily" type="button">{{ __('messages.Daily') }}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-Order-Weekly-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Order-Weekly" type="button">{{ __('messages.Weekly') }}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-Order-Monthly-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Order-Monthly"
                                type="button">{{ __('messages.Monthly') }}</button>
                        </li>
                    </ul>


                </div>
                <div class="card-common-body">
                    <div class="tab-content" id="pills-OrdertabContent">
                        <div class="tab-pane fade show active" id="pills-Order-Daily">
                            <canvas id="OrderDailyChart" style="height: 200px"></canvas>
                        </div>
                        <div class="tab-pane fade" id="pills-Order-Weekly">
                            <canvas id="OrderWeeklyChart"></canvas>
                        </div>
                        <div class="tab-pane fade" id="pills-Order-Monthly">
                            <canvas id="OrderMonthlyChart"></canvas>
                        </div>

                    </div>
                    {{-- <div style="width: 800px;"><canvas id="myChart"></canvas></div> --}}
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-4 col-activity">
            <div class="card-common">
                <div class="card-common-body totalOrdersChartBody">
                    <div class="totalOrdersChartWrapper">
                        <canvas id="totalOrdersChart"></canvas>
                    </div>
                    <div class="summaryDetail">
                        <div class="summaryRow cBlack">
                            <span>{{ __('messages.Total') }} {{ __('messages.Orders') }}</span>
                            <span class="text-right">130</span>
                        </div>
                        <div class="summaryRow cYellow">
                            <span>
                                <div class="tileSummary"></div>{{ __('messages.Total') }} {{ __('messages.Completed') }}
                                {{ __('messages.Orders') }}
                            </span>
                            <span>118</span>
                        </div>
                        <div class="summaryRow cRed">
                            <span>
                                <div class="tileSummary"></div>{{ __('messages.Total') }} {{ __('messages.Cancelled') }}
                                {{ __('messages.Orders') }}
                            </span>
                            <span>12</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="main-heading-container">
        <div class="common-title">{{ __('messages.Sales_Commissions') }}</div>
    </div>
    <div class="row total-sale-wraper total-many-wrapper SalesCommission">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/salesIcon1.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title hAuto">{{ __('messages.Todays') }} {{ __('messages.Sale') }}</div>
                    <div class="total-info-card-number"> 25</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/salesIcon2.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title hAuto">{{ __('messages.Total') }} {{ __('messages.Sale') }}</div>
                    <div class="total-info-card-number">45641</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/salesIcon3.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title hAuto">{{ __('messages.Todays') }} {{ __('messages.Commission') }}
                    </div>
                    <div class="total-info-card-number">47</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/salesIcon4.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title hAuto">{{ __('messages.Total') }} {{ __('messages.Commission') }}
                    </div>
                    <div class="total-info-card-number">254</div>
                </div>
            </div>
        </div>

    </div>
    <div class="row mb-2 SCSummary">
        <div class="col-lg-12 col-xl-6 col-activity">
            <div class="card-common">
                <div class="card-topbar card-topbar-justify card-topbar-justify-center">
                    <div class="card-topbar-title">{{ __('messages.Sales_Summary') }}</div>
                    <ul class="nav nav-pills dbrdTabs" id="pills-Salestab">
                        <li class="nav-item">
                            <button class="nav-link active" id="pills-Sales-Daily-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Sales-Daily" type="button">{{ __('messages.Daily') }}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-Sales-Weekly-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Sales-Weekly" type="button">{{ __('messages.Weekly') }}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-Sales-Monthly-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Sales-Monthly"
                                type="button">{{ __('messages.Monthly') }}</button>
                        </li>
                    </ul>
                </div>
                <div class="card-common-body">
                    <div class="tab-content" id="pills-SalestabContent">
                        <div class="tab-pane fade show active" id="pills-Sales-Daily">
                            <canvas id="SalesDailyChart" style="height: 200px"></canvas>
                        </div>
                        <div class="tab-pane fade" id="pills-Sales-Weekly">
                            <canvas id="SalesWeeklyChart"></canvas>
                        </div>
                        <div class="tab-pane fade" id="pills-Sales-Monthly">
                            <canvas id="SalesMonthlyChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-6 col-activity">
            <div class="card-common">
                <div class="card-topbar card-topbar-justify card-topbar-justify-center">
                    <div class="card-topbar-title">{{ __('messages.Commission_Summary') }}</div>
                    <ul class="nav nav-pills dbrdTabs" id="pills-Commissiontab">
                        <li class="nav-item">
                            <button class="nav-link active" id="pills-Commission-Daily-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Commission-Daily"
                                type="button">{{ __('messages.Daily') }}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-Commission-Weekly-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Commission-Weekly"
                                type="button">{{ __('messages.Weekly') }}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-Commission-Monthly-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-Commission-Monthly"
                                type="button">{{ __('messages.Monthly') }}</button>
                        </li>
                    </ul>
                </div>
                <div class="card-common-body">
                    <div class="tab-content" id="pills-CommissiontabContent">
                        <div class="tab-pane fade show active" id="pills-Commission-Daily">
                            <canvas id="CommissionDailyChart" style="height: 200px"></canvas>
                        </div>
                        <div class="tab-pane fade" id="pills-Commission-Weekly">
                            <canvas id="CommissionWeeklyChart"></canvas>
                        </div>
                        <div class="tab-pane fade" id="pills-Commission-Monthly">
                            <canvas id="CommissionMonthlyChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row customersEq">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-heading-container">
                        <div class="common-title">{{ __('messages.Customers') }}</div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row total-sale-wraper total-many-wrapper">

                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="total-info-card">
                                <div class="total-info-card-icon">
                                    <img src="{{ asset('assets/admin/images/customerIcon1.svg') }}">
                                </div>
                                <div class="total-info-card-detail">
                                    <div class="total-info-card-title hAuto">{{ __('messages.New') }}
                                        {{ __('messages.Customers') }}</div>
                                    <div class="total-info-card-number">58</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="total-info-card">
                                <div class="total-info-card-icon">
                                    <img src="{{ asset('assets/admin/images/customerIcon2.svg') }}">
                                </div>
                                <div class="total-info-card-detail">
                                    <div class="total-info-card-title hAuto">{{ __('messages.Total') }}
                                        {{ __('messages.Customers') }}</div>
                                    <div class="total-info-card-number">957</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @if (Session::has('message'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        </script>
    @endif
@endsection
