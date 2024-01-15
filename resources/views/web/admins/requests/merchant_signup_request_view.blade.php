@extends('master')
@section('content')

<div class="main-heading-container">
    <div class="common-title"> {{ __('messages.Merchants') }} {{ __('messages.Signup_Requests') }}</div>
    <a href="{{ route('admin.merchant-signup-requests') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>

<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Merchants') }} {{ __('messages.Signup_Requests') }}</div>
            </div>
            <div class="card-common-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Business_Name') }}</div>
                        <div class="label-txt">{{ $user->business_name }}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Business_Type') }}</div>
                        <div class="label-txt">{{ (\App::isLocale('en')) ? $user->businessType->name_eng : $user->businessType->name_arabic }}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Product_Category') }}</div>
                        <div class="label-txt"> Any type</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Contact_Number') }}</div>
                        <div class="label-txt">{{ $user->contact_number }}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Contact_email') }}</div>
                        <div class="label-txt">{{ $user->contact_email }}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Director_Name') }}</div>
                        <div class="label-txt">{{ $user->director_name }}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Director_Number') }}</div>
                        <div class="label-txt">{{ $user->director_mob_no }}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Licence_Number') }}</div>
                        <div class="label-txt">{{ $user->license_no }}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Commercial_Registration_Number') }}</div>
                        <div class="label-txt">{{ $user->commercial_reg_no }}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Tax_number') }}</div>
                        <div class="label-txt">{{ $user->tax_no }}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Representative_Referral_Code') }}</div>
                        <div class="label-txt">{{ $user->representative_referral_code }}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Commercial_Certificate') }}</div>
                        <div class="label-txt"><img src="{{ asset('/storage/assets/merchant/commercialCertificates/'.$user->commercial_certificate) }}" class="img-responsive" /></div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Tax_Certificate') }}</div>
                        <div class="label-txt"><img src="{{ asset('/storage/assets/merchant/taxCertificates/'.$user->tax_certificate) }}" class="img-responsive" /></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr class="form-hr mt-0">
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-12">
                            <div class="label-common-heading">{{ __('messages.Address') }}</div>
                            <div class="label-txt mb-2">{{ $user->contact_address }}</div>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="col-md-12 form-group addressWrapper addressWrapperAdmin">
                            <div id="map"></div>
                            <input id="lat" name="lat" type="hidden" value="{{ $user->lat }}">
                            <input id="lng" name="lng" type="hidden" value="{{ $user->long }}">
                        </div>

                    </div>

                </div>
            </div>
            <div class="btnWrapperPrimary">
                <div class="col-12 d-flex form-btns">
                    <button class="btn btn-outline-danger w-170">{{ __('messages.Reject') }}</button>
                    <button class="btn btn-primary w-170">{{ __('messages.Approve') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection