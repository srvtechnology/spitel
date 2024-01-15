@extends('master')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Staff') }}</div>
    <a href="{{ url('/admin/staff/list') }}" type="submit" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Staff') }} {{ __('messages.Detail') }}</div>
            </div>
            <div class="card-common-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Image') }}</div>
                        <div class="label-txt"><img class="productImg" alt="no image found" src="{{ asset('assets/admin/images/food-img-1.png') }}"></div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.ID') }}</div>
                        <div class="label-txt">211</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Name') }}</div>
                        <div class="label-txt"> Name</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Mobile_Number') }}</div>
                        <div class="label-txt">0321-*******-4</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Email') }}</div>
                        <div class="label-txt"> abc@gmail.com</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Shift') }}</div>
                        <div class="label-txt">Night</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection