@extends('master')
@section('content')

<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Customer') }}</div>
    <a href="{{ url('admin/customers/list') }}" type="submit" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Customer') }} {{ __('messages.Detail') }} </div>
            </div>
            <div class="card-common-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.ID') }}</div>
                        <div class="label-txt">4654</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Image') }}</div>
                        <div class="label-txt"><img class="productImg" alt="no image found" src="{{ asset('assets/admin/images/food-img-1.png') }}"></div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Mobile_Number') }}</div>
                        <div class="label-txt">4565455</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Name') }}</div>
                        <div class="label-txt">Customer Name</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Address') }}</div>
                        <div class="label-txt">Address</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Status') }}</div>
                        <div class="label-txt">
                            <div class="status-common status-green">
                                <span class="status-dot">{{ __('messages.Active') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Signup_Date_Time') }}</div>
                        <div class="label-txt"> 06/03/2022 | 02:00 am</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.No_of_Order') }}</div>
                        <div class="label-txt">545</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Rating') }}</div>
                        <div class="label-txt label-txt-icon"><i class="fa-solid fa-star"></i> 4</div>
                    </div>
                    <!-- <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">Wallet Balance</div>
                        <div class="label-txt">4567</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">Subscription Plans</div>
                        <div class="label-txt">45525</div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection