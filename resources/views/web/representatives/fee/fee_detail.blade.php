@extends('master-representative')
@section('content')

<div class="main-heading-container">
    <div class="common-title">{{ __('messages.fee_collection') }}</div>
    <a href="{{ url('/representative/fee/list') }}" type="submit" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.fee_collection') }} {{ __('messages.Detail') }}</div>
            </div>
            <div class="card-common-body">
                <div class="row">
                    {{-- <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Image') }}</div>
                        <div class="label-txt"><img class="productImg" alt="no image found" src="{{ asset('assets/admin/images/food-img-1.png') }}"></div>
                    </div> --}}
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Name') }}</div>
                        <div class="label-txt"> Name</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Type') }}</div>
                        <div class="label-txt"> Any type</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.City') }}</div>
                        <div class="label-txt">gujranwala</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Neighborhood') }}</div>
                        <div class="label-txt">0321*****55</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.No_Orders') }}</div>
                        <div class="label-txt">03</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Start_date') }}</div>
                        <div class="label-txt">02/05/2022</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Date_to_collect') }}</div>
                        <div class="label-txt">05/05/2022</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Fee_to_collect') }}</div>
                        <div class="label-txt">fee</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Contact_person') }}</div>
                        <div class="label-txt">Name</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Contact_person') }} {{ __('messages.Mobile_Number') }}</div>
                        <div class="label-txt">0321-4589655</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Status') }}</div>
                        <div class="label-txt">Collected</div>
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
                            <div class="label-common-heading"> {{ __('messages.Bank_Details') }}</div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Bank_Name') }}</div>
                        <div class="label-txt">National</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Branch') }}</div>
                        <div class="label-txt">abc**cd</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.IBAN') }}</div>
                            <div class="label-txt">023*****655</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Account_Number') }}</div>
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