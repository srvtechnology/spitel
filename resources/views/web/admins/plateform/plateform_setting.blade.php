@extends('master')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Platform_Settings') }}</div>
</div>
<form action="/" method="POST" enctype="multipart/form-data">

    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card-common">
                <div class="card-topbar-inner">
                    <div class="card-topbar-title">{{ __('messages.Platform_Settings') }}</div>
                </div>
                <div class="card-common-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>{{ __('messages.Platform_Commission_Per_Booking') }}</label>
                            <input type="text" class="form-control" name="" placeholder="{{ __('messages.Platform_Commission_Per_Booking') }}" value="">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>{{ __('messages.Platform_merchant_per_booking') }}</label>
                            <input type="text" class="form-control" name="" placeholder="{{ __('messages.Platform_merchant_per_booking') }}" value="">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>{{ __('messages.Platform_Representative') }}</label>
                            <input type="text" class="form-control" name="" placeholder="{{ __('messages.Platform_Representative') }}" value="">
                        </div>
                        {{-- <div class="col-md-4 form-group">
                            <label>{{ __('messages.Vat') }}</label>
                            <input type="text" class="form-control" name="vat_value" placeholder="{{ __('messages.Vat') }}" value="">
                        </div> --}}
                    </div>
                </div>
                <div class="btnWrapperPrimary">
                    <div class="col-12 d-flex form-btns">
                        <button type="submit" class="btn btn-primary w-170">{{ __('messages.Update') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection