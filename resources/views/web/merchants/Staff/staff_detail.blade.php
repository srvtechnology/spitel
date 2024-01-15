@extends('master-merchant')
@section('content')

<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Staff') }}</div>
    <a href="{{ url('/merchant/staff') }}" class="btn btn-primary w-170">Back</a>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Staff') }} {{ __('messages.Detail') }}</div>
            </div>
            <div class="card-common-body">
                {{-- detail Start --}}
                <div class="row">
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.ID') }}</div>
                        <div class="label-txt">01</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Name') }}</div>
                        <div class="label-txt">Name</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Email') }}</div>
                        <div class="label-txt">abc@gmail.com</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Mobile_Number') }}</div>
                        <div class="label-txt">0321-6409166</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Shift') }}</div>
                        <div class="label-txt">Shift</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Status') }}</div>
                        <div class="label-txt">All</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Start_date') }}</div>
                        <div class="label-txt">date</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Status') }} </div>
                        <div class="label-txt">Active</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.certification_number') }} </div>
                        <div class="label-txt">03251523</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Identification_number') }} </div>
                        <div class="label-txt">0265456</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Healthy_certification_ex_date') }} </div>
                        <div class="label-txt">05/02/2021</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Image') }}</div>
                        <div class="label-txt"><img class="productImg" src="{{ asset('assets/admin/images/food-img-1.png') }}"></div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Healthy_certification') }}</div>
                        <div class="label-txt"><img class="productImg" src="{{ asset('assets/admin/images/food-img-1.png') }}"></div>
                        <div class="d-flex form-btns">
                            <button type="submit" class="btn btn-primary ">{{ __('messages.downLoad') }}</button>
                            <button type="submit" class="btn btn-primary ">{{ __('messages.view') }}</button>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Idea') }}</div>
                        <div class="label-txt"><img class="productImg" src="{{ asset('assets/admin/images/food-img-1.png') }}"></div>
                        <div class="d-flex form-btns">
                            <button type="submit" class="btn btn-primary ">{{ __('messages.downLoad') }}</button>
                            <button type="submit" class="btn btn-primary ">{{ __('messages.view') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection