@extends('master')
@section('content')

<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Representative') }}</div>
    <a href="{{ url('/admin/representative-request/list') }}" type="submit" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>
<div class="row my-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Representative') }} {{ __('messages.Detail') }}</div>
            </div>
            <div class="card-common-body">
                {{-- detail Start --}}
                <div class="row">
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Representative') }} {{ __('messages.ID') }}</div>
                        <div class="label-txt">01</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Image') }}</div>
                        <div class="label-txt">
                            <img class="productImg" alt="no image found" src="{{ asset('assets/admin/images/food-img-1.png') }}">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Name') }}</div>
                        <div class="label-txt">Name</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Email') }}</div>
                        <div class="label-txt">admin@demo.com</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.City') }}</div>
                        <div class="label-txt">City</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Nationality') }}</div>
                        <div class="label-txt">Nationality</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Mobile_Number') }}</div>
                        <div class="label-txt">53242342342</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.id_Number') }}</div>
                        <div class="label-txt">53242342342</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Signup_Requests') }} {{ __('messages.Date') }}</div>
                        <div class="label-txt">53242342342</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Neighborhood1') }}</div>
                        <div class="label-txt">Neighborhood1</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Neighborhood2') }}</div>
                        <div class="label-txt">Neighborhood2</div>
                    </div>
                    {{-- <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Overall_registered_business') }}</div>
                        <div class="label-txt">01</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.type_of_business') }}</div>
                        <div class="label-txt">type</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Signup_Referral_Code') }}</div>
                        <div class="label-txt">2342</div>
                    </div> --}}

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
</div>
@endsection