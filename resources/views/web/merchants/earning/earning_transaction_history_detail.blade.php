@extends('master-merchant')
@section('content')

<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Earning_History') }}</div>
    <a href="{{ url('/merchant/earning-transactions/history') }}" type="submit" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Earning_History_Detail') }}</div>
            </div>
            <div class="card-common-body">
                <div class="row">
                    
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.ID') }}</div>
                        <div class="label-txt">12</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Transaction_ID') }}</div>
                        <div class="label-txt">4523</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Order_ID') }}</div>
                        <div class="label-txt">4523</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Merchant_Name') }}</div>
                        <div class="label-txt">Merchant Name</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.App_Fee') }}</div>
                        <div class="label-txt">0.40 SAR</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Total_Amount') }}</div>
                        <div class="label-txt">50 SAR</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Payment_Method') }}</div>
                        <div class="label-txt">Card</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Date') }}</div>
                        <div class="label-txt">12:00 AM to 02:00 PM</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Payment_Gateway_Transaction_ID') }}</div>
                        <div class="label-txt">TS02A3220242n1KP</div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection