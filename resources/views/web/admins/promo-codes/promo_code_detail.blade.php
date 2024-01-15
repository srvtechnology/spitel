@extends('master')
@section('content')

<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Promo_Code') }}</div>
    <a href="{{ url('/admin/promo-code/list') }}" type="submit" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>

<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Promo_Code') }} {{ __('messages.Detail') }}</div>
            </div>
            <div class="card-common-body">
                {{-- detail Start --}}
                <div class="row">
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Promo_Code') }} {{ __('messages.ID') }}</div>
                        <div class="label-txt">01</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Promo_Code') }} {{ __('messages.Title') }}(Arabic)</div>
                        <div class="label-txt">Promo Code Title</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Promo_Code') }} {{ __('messages.Title') }}(English)</div>
                        <div class="label-txt">Promo Code Title</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Promo_Code') }}</div>
                        <div class="label-txt">Promo Code</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Status') }}</div>
                        <div class="label-txt">active</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Discount_value') }}</div>
                        <div class="label-txt">value</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Discount_value_for') }}</div>
                        <div class="label-txt">All Product</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Discount_Type') }}</div>
                        <div class="label-txt">Type</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Valid_From') }}</div>
                        <div class="label-txt">Valid Form </div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Valid_To') }}</div>
                        <div class="label-txt">Valid to </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection