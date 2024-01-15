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
                <a href="{{ url('/admin/profile/edit') }}" class="topBarIcon"><i class="fa-solid fa-pen-to-square editProfile"></i></a>
            </div>

            <div class="card-common-body">
                <div class="row">
                    <div class="col-md-12 form-group profileImgWrapper">
                        <div class="profileImgContainer">
                            <img src="{{asset('assets/admin/images/user.png')}}">
                        </div>
                    </div>
                    <div class="col-md-12 form-group nameTitleCol">
                        <div class="nameProfile">Dev Admin</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group mb-5 nameTitleCol">
                        <div class="emailProfile">demo@demo.com</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection