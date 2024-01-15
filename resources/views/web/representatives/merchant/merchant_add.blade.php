@extends('master-representative')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Merchant') }}</div>
    <a href="{{ url('/representative/merchant/list') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card-common">
                <div class="card-topbar-inner">
                    <div class="card-topbar-title">{{ __('messages.Add') }} {{ __('messages.Merchants') }}</div>
                </div>
                <div class="card-common-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Name') }}</label>
                            <input type="text" name="rep_name" value="" class="form-control" placeholder="{{ __('messages.Name') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Mobile_Number') }}</label>
                            <input type="text" name="rep-mobile" value="" class="form-control" placeholder="{{ __('messages.Mobile_Number') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.type_of_business') }}</label>
                            <select class="form-control" name="status">
                                <option value="0" selected hidden disabled>{{ __('messages.type_of_business') }}</option>
                                <option value="1">Restaurant</option>
                                <option value="2">Buffet</option>
                                <option value="3">Grocery</option>
                                <option value="4">Bakery</option>
                                <option value="5">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.City') }}</label>
                            <input type="text"  value="" class="form-control" placeholder="{{ __('messages.City') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Neighborhood') }}</label>
                            <input type="text"  value="" class="form-control" placeholder="{{ __('messages.Neighborhood') }}">
                        </div>
                        <div class="col-md-6 form-group posRel">
                            <label>{{ __('messages.Fee_to_collect') }}</label>
                            <input type="text" class="form-control" id="input_to"  placeholder=" {{ __('messages.Fee_to_collect') }}">
                        </div>
                        <div class="col-md-6 col-lg-12 form-group">
                            <label> {{ __('messages.Product_Category')}}</label>
                            <select multiple name="categories" id="categories" class="form-control">
                                <option value="Category1">Category 1</option>
                                <option value="Category2">Category 2</option>
                                <option value="Category3">Category 3</option>
                                <option value="Category4">Category 4</option>
                                <option value="Category5">Category 5</option>
                                <option value="Category6">Category 6</option>
                                <option value="Category7">Category 7</option>
                                <option value="Category8">Category 8</option>
                                <option value="Category9">Category 9</option>
                                <option value="Category10">Category 10</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label> {{ __('messages.Contact_Number')}}</label>
                                    <input type="text" name="licence_number" class="form-control" placeholder="{{ __('messages.Contact_Number')}}">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>{{ __('messages.Contact_email')}}</label>
                                    <input type="text" name="commercial_reg_number" class="form-control" placeholder="{{ __('messages.Contact_email')}}">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>{{ __('messages.Director_Name')}}</label>
                                    <input type="text" name="commercial_reg_number" class="form-control" placeholder="{{ __('messages.Director_Name')}}">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>{{ __('messages.Director_Number')}}</label>
                                    <input type="text" name="commercial_reg_number" class="form-control" placeholder="{{ __('messages.Director_Number')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="row">
                                <div class="col-md-12 form-group addressWrapper">
                                    <label> {{ __('messages.Address')}}</label>
                                    <input type="text" name="address" id="pac-input" class="form-control" placeholder="{{ __('messages.Address')}}">
                                    <div id="map" class="map"></div>
                                    <input id="lat" name="lat" type="hidden" value="">
                                    <input id="lng" name="lng" type="hidden" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <div class="card-topbar-title"> {{ __('messages.Registration_Detail')}}</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group">
                            <label> {{ __('messages.Licence_Number')}}</label>
                            <input type="text" name="licence_number" class="form-control" placeholder="{{ __('messages.Licence_Number')}}">
                        </div>
                        <div class="col-md-12 col-lg-6 form-group">
                            <label> {{ __('messages.Commercial_Registration_Number')}}</label>
                            <input type="text" name="" class="form-control" placeholder="{{ __('messages.Commercial_Registration_Number')}}">
                        </div>
                        <div class="col-md-12 col-lg-6 form-group">
                            <label> {{ __('messages.Tax_number')}}</label>
                            <input type="text" name="" class="form-control" placeholder="{{ __('messages.Tax_number')}}">
                        </div>
                        <div class="col-md-12 col-lg-6 form-group">
                            <label>{{ __('messages.Representative_Referral_Code')}}</label>
                            <input type="text" name="" class="form-control" placeholder="{{ __('messages.Representative_Referral_Code')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6 form-group col-detail-view uploadImagesBarInner">
                            <label> {{ __('messages.Commercial_Certificate')}}</label>
                            <div class="col-md-12 uploadImgWrapper">
                                <input type="file" name="icon" class="customefile1" accept="image/*">
                                <div class="uploadImgContainer customebrowse1">
                                    <img id="customepreview1" src="{{asset('assets/images/svg/upload.svg')}}">
                                    <span>{{ __('messages.Upload_Tax_Certificate')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view uploadImagesBarInner">
                            <label>{{ __('messages.Tax_Certificate')}}</label>
                            <div class="col-md-12 uploadImgWrapper">
                                <input type="file" name="icon" class="customefile2" accept="image/*">
                                <div class="uploadImgContainer customebrowse2">
                                    <img id="customepreview2" src="{{asset('assets/images/svg/upload.svg')}}">
                                    <span>{{ __('messages.Upload_Commercial_Certificate')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btnWrapperPrimary">
                    <div class="col-12 d-flex form-btns">
                        <button type="submit" class="btn btn-primary w-170">{{ __('messages.Add') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection