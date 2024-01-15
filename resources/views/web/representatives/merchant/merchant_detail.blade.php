@extends('master-representative')
@section('content')

<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Merchant') }}</div>
    <a href="{{ url('/representative/merchant/list') }}" type="submit" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
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
                        <div class="label-heading">{{ __('messages.Start_date') }}</div>
                        <div class="label-txt">02/05/2022</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Status') }}</div>
                        <div class="label-txt">Active</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.CR_View') }}</div>
                        <div class="label-txt">
                            <img class="productImg" alt="no image found" src="{{ asset('assets/admin/images/food-img-1.png') }}">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.other') }}</div>
                        <div class="label-txt">
                            <img class="productImg" alt="no image found" src="{{ asset('assets/admin/images/food-img-1.png') }}">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.other') }}</div>
                        <div class="label-txt">
                            <img class="productImg" alt="no image found" src="{{ asset('assets/admin/images/food-img-1.png') }}">
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
                            <div class="label-common-heading"> {{ __('messages.Contact_person') }}</div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.ID') }}</div>
                        <div class="label-txt">023*****655</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Name') }}</div>
                        <div class="label-txt">Name</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Mobile_Number') }}</div>
                        <div class="label-txt">0321-4569855</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Email') }}</div>
                        <div class="label-txt">example@gmail.com</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr class="form-hr mt-0">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                            <div class="label-common-heading"> {{ __('messages.Owner_Name') }}</div>
                    </div>
                
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Name') }}</div>
                        <div class="label-txt">Name</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Mobile_Number') }}</div>
                        <div class="label-txt">0321-4569855</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.ID') }}</div>
                         <div class="label-txt">023*****655</div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-12">
                            <div class="label-common-heading mb-0">Location</div>
                        </div>
                    <table id="pickupAddress" class="table tableCommon table-striped table-single-line mb-4">
                        <thead>
                            <tr>
                                <th>{{ __('messages.City') }}</th>
                                <th>{{ __('messages.Neighborhood') }}</th>
                                <th>{{ __('messages.Street') }}</th>
                                <th>{{ __('messages.Drop_Pin') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tbl-id">Name</td>
                                <td class="tbl-id">54874564</td>
                                <td>
                                    Address
                                </td>
                                <td>
                                    <div class="actions-col">
                                        <a class="actionIcon" href="#">
                                            <span>map</span>
                                            <i class="fa-solid fa-map-location-dot textRed"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('messages.City') }}</th>
                                <th>{{ __('messages.Neighborhood') }}</th>
                                <th>{{ __('messages.Street') }}</th>
                                <th>{{ __('messages.Drop_Pin') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                 {{-- <div class="btnWrapperPrimary">
                    <div class="col-12 d-flex form-btns">
                        <button class="btn btn-outline-danger w-170">Reject</button>
                        <button class="btn btn-primary w-170">Approve</button>
                    </div>
                </div>  --}}
            </div>
        </div>
    </div>
</div>

@endsection