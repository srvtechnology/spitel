@extends('master-representative')
@section('content')

<div class="main-heading-container">
    <div class="common-title">{{ __('messages.total_business') }}</div>
</div>

<div class="row mb-4 total-sale-wraper total-many-wrapper ordersAll">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon6.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.Total') }} {{ __('messages.total_business') }}</div>
                <div class="total-info-card-number">36</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon1.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.Today') }} {{ __('messages.Registered') }}</div>
                <div class="total-info-card-number">75</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon2.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title"> {{ __('messages.Total_fee_collection') }}</div>
                <div class="total-info-card-number">20</div>
            </div>
        </div>
    </div>
</div>

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


<!-- {{-- <div class="row customersEq">
                <div class="col-md-12 col-lg-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-heading-container">
                                <div class="common-title">Customers</div>
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
                                            <div class="total-info-card-title hAuto">New Customers</div>
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
                                            <div class="total-info-card-title hAuto">Total Customers</div>
                                            <div class="total-info-card-number">957</div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-7">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-heading-container">
                                <div class="common-title">Providers Stats</div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="row total-sale-wraper total-many-wrapper">
                                
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="total-info-card">
                                        <div class="total-info-card-icon">
                                            <img src="{{ asset('assets/admin/images/WSIcon1.svg') }}">
                                        </div>
                                        <div class="total-info-card-detail">
                                            <div class="total-info-card-title hAuto">New Providers</div>
                                            <div class="total-info-card-number">54</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="total-info-card">
                                        <div class="total-info-card-icon">
                                            <img src="{{ asset('assets/admin/images/WSIcon2.svg') }}">
                                        </div>
                                        <div class="total-info-card-detail">
                                            <div class="total-info-card-title hAuto">Active Providers</div>
                                            <div class="total-info-card-number">246</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="total-info-card">
                                        <div class="total-info-card-icon">
                                            <img src="{{ asset('assets/admin/images/WSIcon3.svg') }}">
                                        </div>
                                        <div class="total-info-card-detail">
                                            <div class="total-info-card-title hAuto">Total Providers</div>
                                            <div class="total-info-card-number">564</div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}} -->


<!-- <div class="main-heading-container">
                <div class="common-title">Merchant</div>
            </div> -->
<!-- <div class="row total-sale-wraper total-many-wrapper SalesCommission">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="total-info-card">
                        <div class="total-info-card-icon">
                            <img src="{{ asset('assets/admin/images/salesIcon1.svg') }}">
                        </div>
                        <div class="total-info-card-detail">
                            <div class="total-info-card-title hAuto">New Merchants</div>
                            <div class="total-info-card-number"> 25</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="total-info-card">
                        <div class="total-info-card-icon">
                            <img src="{{ asset('assets/admin/images/salesIcon2.svg') }}">
                        </div>
                        <div class="total-info-card-detail">
                            <div class="total-info-card-title hAuto">Active Merchants</div>
                            <div class="total-info-card-number">45641</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="total-info-card">
                        <div class="total-info-card-icon">
                            <img src="{{ asset('assets/admin/images/salesIcon3.svg') }}">
                        </div>
                        <div class="total-info-card-detail">
                            <div class="total-info-card-title hAuto">Total Merchants</div>
                            <div class="total-info-card-number">47</div>
                        </div>
                    </div>
                </div>
            </div> -->
@endsection