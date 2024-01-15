@extends('master')
@section('content')
<div class="row main-heading-container justify-content-center">
    <div class="col-lg-6">
        <div class="common-title ps-2">{{ __('messages.Profile') }}</div>
    </div>
</div>
<div class="row mb-4 justify-content-center">
    <div class="col-lg-6">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">Dev Admin</div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-common-body">
                    <div class="row">
                        <div class="col-md-12 form-group profileImgWrapper">
                            <input type="file" name="img[]" class="file1" style="visibility: hidden; height: 0; width: 0" accept="image/*">
                            <div class="profileImgContainer">
                                <div class="cameraIcon"><img class="browse1" src="{{asset('assets/admin/images/camera.svg')}}"></div>
                                <img id="preview1" src="{{asset('assets/admin/images/user.png')}}">
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>{{ __('messages.Name') }}</label>
                            <input type="text" class="form-control" name="admin_name" value="Dev Admin" placeholder="{{ __('messages.Name') }}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>{{ __('messages.Email') }}</label>
                            <input type="text" class="form-control" name="admin_email" value="demo@demo.com" placeholder="{{ __('messages.Email') }}">
                        </div>
                        <div class="col-md-6 col-lg-6 form-group">
                            <label>{{ __('messages.Password') }}</label>
                            <input type="text" class="form-control" name="admin_pass" value="" placeholder="******">
                        </div>
                        <div class="col-md-6 col-lg-6 form-group">
                            <label>{{ __('messages.Confirm_Password') }}</label>
                            <input type="text" class="form-control" name="admin_Cpass" value="" placeholder="******">
                        </div>
                    </div>
                </div>
                <div class="btnWrapperPrimary">
                    <div class="col-12 d-flex form-btns">
                        <button class="btn btn-outline-danger w-170">{{ __('messages.Cancel') }}</button>
                        <button class="btn btn-primary w-170">{{ __('messages.Update') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection