@extends('master')
@section('content')
    <div class="main-heading-container">
        <div class="common-title">{{ __('messages.Food_Categories') }}</div>
        <a href="{{ url('/admin/store-categories/list') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
    </div>

    <form action="{{ route('admin.merchant.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card-common">
                    <div class="card-topbar-inner">
                        <div class="card-topbar-title">{{ __('messages.Add') }} {{ __('messages.Food_Categories') }}</div>
                    </div>
                    <div class="card-common-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Category_Name') }} (English)</label>
                                <input type="text" name="name_eng" value="" class="form-control"
                                    placeholder="{{ __('messages.Category_Name') }}">
                                @error('name_eng')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Category_Name') }} (Arabic)</label>
                                <input type="text" name="name_arabic" value="" class="form-control"
                                    placeholder="{{ __('messages.Category_Name') }}">
                                @error('name_arabic')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Status') }}</label>
                                <select class="form-control" name="status">
                                    <option value="0" selected hidden disabled>{{ __('messages.Select_Status') }}
                                    </option>
                                    <option value="1">{{ __('messages.Active') }}</option>
                                    <option value="2">{{ __('messages.Inactive') }}</option>
                                </select>
                            </div>
                            <input type="hidden" name="business_type_id" value="1" />
                            <div class="col-md-6 form-group ">
                                <div class="uploadImagesBarInner">
                                    <label>{{ __('messages.Category_Image') }}</label>
                                    <div class="col-md-12 form-group uploadImgWrapper">
                                        <input type="file" name="img" class="foodfile1" accept="image/*">
                                        <div class="uploadImgContainer">
                                            <div class="cameraIcon"><img class="foodbrowse1"
                                                    src="{{ asset('assets/admin/images/camera.svg') }}"></div>
                                            <img id="foodpreview1"
                                                src="{{ asset('assets/admin/images/placeholderBox.svg') }}">
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
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
            </div>
        </div>
    </form>
@endsection
