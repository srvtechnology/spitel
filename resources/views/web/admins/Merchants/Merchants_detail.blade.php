@extends('master')
@section('content')

<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Merchant') }}</div>
    <a href="{{ url('/admin/Merchants/list') }}" type="submit" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Merchant') }} {{ __('messages.Detail') }}</div>
            </div>
            <div class="card-common-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Image') }}</div>
                        <div class="label-txt"><img class="productImg" alt="no image found" src="{{ asset('assets/admin/images/food-img-1.png') }}"></div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Name') }}</div>
                        <div class="label-txt"> Name</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Category') }}</div>
                        <div class="label-txt"> xyz</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Type') }}</div>
                        <div class="label-txt"> Any type</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Registration_Number') }}</div>
                        <div class="label-txt">0321*****55</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.City') }}</div>
                        <div class="label-txt">gujranwala</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Mobile_Number') }}</div>
                        <div class="label-txt">0321-*******-4</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Start_day') }}</div>
                        <div class="label-txt">12/02/2023</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Date_to_collect') }}</div>
                        <div class="label-txt">12/02/2023</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Fee') }}</div>
                        <div class="label-txt">12</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Sales') }}</div>
                        <div class="label-txt">12</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Fee_after_sales') }}</div>
                        <div class="label-txt">12</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Total_Number_of_orders') }}</div>
                        <div class="label-txt">12</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Fee_to_collect') }}</div>
                        <div class="label-txt">12</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Fee_not_collect') }}</div>
                        <div class="label-txt">12</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Email') }}</div>
                        <div class="label-txt"> abc@gmail.com</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Referred_By') }}</div>
                        <div class="label-txt">
                            <a class="primaryLink" href="#!" target="_blank">  
                                hamza
                            </a>
                        </div>
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
                            <div class="label-common-heading"> {{ __('messages.Business_info') }}</div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Contact_person') }}</div>
                        <div class="label-txt">National</div>
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
                        <div class="label-heading">{{ __('messages.Owner') }}</div>
                        <div class="label-txt">National</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Owner_Mobile_Number') }}</div>
                        <div class="label-txt">0321-*******-4</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.CR_View') }}</div>
                        <div class="label-txt"><img class="productImg" alt="no image found" src="{{ asset('assets/admin/images/food-img-1.png') }}"></div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Other_View') }}</div>
                        <div class="label-txt"><img class="productImg" alt="no image found" src="{{ asset('assets/admin/images/food-img-1.png') }}"></div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr class="form-hr mt-0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-12">
                                <div class="label-common-heading">{{ __('messages.Business_Location_Address') }}</div>
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
                    </div>
                </div>
                <!-- <div class="btnWrapperPrimary">
                    <div class="col-12 d-flex form-btns">
                        <button class="btn btn-outline-danger w-170">Reject</button>
                        <button class="btn btn-primary w-170">Approve</button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

@endsection