@extends('master-representative')
@section('content')

    <div class="main-heading-container">
        <div class="common-title">{{ __('messages.Menu_Categories_Detail') }}</div>
        <a href="{{ url('/representative/menucategories/list') }}" type="submit" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
    </div>


    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card-common">
                <div class="card-topbar-inner">
                    <div class="card-topbar-title">{{ __('messages.Menu_Categories_Detail') }}</div>
                </div>
                
                <div class="card-common-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Customer_ID') }}</div>
                            <div class="label-txt">4654</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Image') }}</div>
                            <div class="label-txt"><img class="productImg" alt="no image found" src="{{ asset('assets/admin/images/food-img-1.png') }}"></div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Mobile_Number') }}</div>
                            <div class="label-txt">4565455</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Provider_Name') }}</div>
                            <div class="label-txt">Provider Name</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Vehicle_Type') }}</div>
                            <div class="label-txt">Vehicle Type</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Plate_Number') }}</div>
                            <div class="label-txt">654646</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Available') }}</div>
                            <div class="label-txt text-green">Online</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Status') }}</div>
                            <div class="label-txt">
                                <div class="status-common status-green">
                                    <span class="status-dot">{{ __('messages.Active') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.No_Orders') }}</div>
                            <div class="label-txt">545</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Rating') }}</div>
                            <div class="label-txt label-txt-icon"><i class="fa-solid fa-star"></i> 4</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Wallet_Balance') }}</div>
                            <div class="label-txt">4567</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Signup_Date_Time') }}</div>
                            <div class="label-txt"> 06/03/2022 | 02:00 am</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Medical_Checkup_Document') }}</div>
                            <div class="label-txt">Medical Checkup Document</div>
                        </div>
                        <div class="col-md-12 form-group uploadImagesBar">
                            <div class="uploadImagesBarInner">
                                <label>{{ __('messages.Civil_ID_Photo') }}</label>
                                <br>
                                <div class="label-txt">
                                    <img class="productImg" alt="no image found" src="{{ asset('assets/admin/images/food-img-1.png') }}">
                                </div>
                            </div>
                            <div class="uploadImagesBarInner">
                                <label>{{ __('messages.Driving_License_Photo') }}</label>
                                <br>
                                <div class="label-txt">
                                    <img class="productImg" alt="no image found" src="{{ asset('assets/admin/images/food-img-1.png') }}">
                                </div>
                            </div>
                            <div class="uploadImagesBarInner">
                                <label>{{ __('messages.Vehicle_Photo') }}</label>
                                <br>
                                <div class="label-txt">
                                    <img class="productImg" alt="no image found" src="{{ asset('assets/admin/images/food-img-1.png') }}">
                                </div>
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
                                <div class="label-common-heading mb-0">{{ __('messages.Bank_Details') }}</div>
                            </div>
                        </div>
                        <table id="savedAddress" class="table tableCommon table-striped table-single-line mb-4">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.Bank_Name') }}</th>
                                    <th>{{ __('messages.Account_Title') }}</th>
                                    <th>{{ __('messages.Account_Number') }}</th>
                                    <th>{{ __('messages.IBAN') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="tbl-id">Bank Name</td>
                                    <td>
                                        Account Title
                                    </td>
                                    <td>
                                        2134102315424
                                    </td>
                                    <td>
                                        464123546
                                    </td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('messages.Bank_Name') }}</th>
                                    <th>{{ __('messages.Account_Title') }}</th>
                                    <th>{{ __('messages.Account_Number') }}</th>
                                    <th>{{ __('messages.IBAN') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
        
    
@endsection
