@extends('master-representative')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Extras_Menu_Options') }}</div>
    <a href="{{ url('/representative/menu-item/add-on-option') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>

<form action="" method="POST" enctype="multipart/form-data">

    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card-common">
                <div class="card-topbar-inner">
                    <div class="card-topbar-title">{{ __('messages.Extras_Menu_Options') }}</div>
                </div>
                <div class="card-common-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Addon_Name') }} (English)</label>
                            <input type="text" name="product_name" value="" class="form-control" placeholder="{{ __('messages.Addon_Name') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Addon_Name') }} (Arabic)</label>
                            <input type="text" name="product_name" value="" class="form-control" placeholder="{{ __('messages.Addon_Name') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Price') }}</label>
                            <input type="text" name="product_name" class="form-control" placeholder="{{ __('messages.Price') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Status') }}</label>
                            <select class="form-control" name="status">
                                <option value="0" disabled visible hidden>{{ __('messages.Select_Status') }}</option>
                                <option value="1">{{ __('messages.Active') }}</option>
                                <option value="2">{{ __('messages.Inactive') }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Image') }}</label>
                            <div class="col-md-12 form-group uploadImgWrapper">
                                <input type="file" name="icon" class="editfile1" accept="image/*">
                                <div class="uploadImgContainer">
                                    <div class="cameraIcon"><img class="editbrowse1" src="{{asset('assets/admin/images/camera.svg')}}"></div>
                                    <img id="editpreview1" src="{{asset('assets/admin/images/placeholderBox.svg')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btnWrapperPrimary">
                    <div class="col-12 d-flex form-btns">
                        <button type="submit" class="btn btn-primary w-170">{{ __('messages.Update') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection