@extends('master')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Featured_Slider') }}</div>
    <a href="{{ url('/admin/featured-slider/list') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div> 
<form action="" method="POST" enctype="multipart/form-data">
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card-common">
                <div class="card-topbar-inner">
                    <div class="card-topbar-title">{{ __('messages.Add') }} {{ __('messages.Featured_Slider') }}</div>
                </div>
                <div class="card-common-body">
                    <div class="row">

                        <div class="col-md-12 form-group uploadImagesBar">
                            <div class="uploadImagesBarInner">
                                <label>{{ __('messages.Featured_Slider_Image') }}</label>
                                <br>
                                <div class="col-md-12 form-group uploadImgWrapper">
                                    <input type="file" name="image" class="file2" accept="image/*">
                                    <div class="uploadImgContainer">
                                        <div class="cameraIcon"><img class="browse2" src="{{asset('assets/admin/images/camera.svg')}}"></div>
                                        <img id="preview2" src="{{asset('assets/admin/images/placeholderBox.svg')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btnWrapperPrimary">
                    <div class="col-12 d-flex form-btns">
                        <button type="submit" class="btn btn-primary w-170">{{ __('messages.Save') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection