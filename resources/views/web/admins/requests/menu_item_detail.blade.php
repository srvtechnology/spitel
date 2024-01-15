{{-- @extends('master')
@section('content')

<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Menu_Item') }} {{ __('messages.Signup_Requests') }}</div>
    <a href="{{ url('/admin/Menu-item-signup-request/list') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Menu_Item') }} {{ __('messages.Signup_Requests') }}</div>
            </div>
            <div class="card-common-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Item_Name') }} (English)</div>
                        <div class="label-txt"> Name</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Item_Name') }} (Arabic)</div>
                        <div class="label-txt"> Name</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Description') }} (English)</div>
                        <div class="label-txt">Description</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Description') }} (Arabic)</div>
                        <div class="label-txt">Description</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Category') }}</div>
                        <div class="label-txt">Business xyz</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Image') }}</div>
                        <div class="label-txt"><img class="productImg" alt="no image found" src="{{ asset('assets/admin/images/food-img-1.png') }}"></div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-12">
                        <hr class="form-hr mt-0">
                    </div>
                </div> -->
                <!-- <div class="row">
                    <div class="row">
                        <div class="col-12">
                            <div class="label-common-heading">Bank Details</div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">Bank Name</div>
                        <div class="label-txt">National</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">Branch</div>
                        <div class="label-txt">abc**cd</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">IBAN</div>
                        <div class="label-txt">023*****655</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">Account Number</div>
                        <div class="label-txt">1020235*****</div>
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
                            <div class="label-common-heading">Address</div>
                            <div class="label-txt mb-2">abc...</div>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="col-md-12 form-group addressWrapper addressWrapperAdmin">
                            <div id="map"></div>
                            <input id="lat" name="lat" type="hidden" value="">
                            <input id="lng" name="lng" type="hidden" value="">
                        </div>

                    </div>
                </div> -->
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

@endsection --}}