@extends('master-merchant')
@section('content')


<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Staff') }}</div>
    <a href="{{ url('/merchant/staff') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card-common">
                <div class="card-topbar-inner">
                    <div class="card-topbar-title">{{ __('messages.Add') }} {{ __('messages.Staff') }}</div>
                </div>
                <div class="card-common-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Name') }} </label>
                            <input type="text" name=product_nam" value="" class="form-control" placeholder="{{ __('messages.Name') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Mobile_Number') }}</label>
                            <input type="text" name="" value="" class="form-control" placeholder="{{ __('messages.Mobile_Number') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Email') }}</label>
                            <input type="text" name="" value="" class="form-control" placeholder="{{ __('messages.Email') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Start_date') }}</label>
                            <input type="text" name="" value="" class="form-control" placeholder="{{ __('messages.Start_date') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Shift') }}</label>
                            <select class="form-control" name="status">
                                <option value="0" selected hidden disabled>{{ __('messages.Shift') }}</option>
                                <option value="1">{{ __('messages.Morning') }}</option>
                                <option value="2">{{ __('messages.Evening') }}</option>
                                <option value="3">{{ __('messages.Night') }}</option>
                                <option value="4">{{ __('messages.All_Day') }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Status') }}</label>
                            <select class="form-control" name="status">
                                <option value="0" selected hidden disabled>{{ __('messages.Select_Status') }}</option>
                                <option value="1">{{ __('messages.Active') }}</option>
                                <option value="2">{{ __('messages.Inactive') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-topbar-title my-3">{{ __('messages.Healthy_certification') }}</div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Start_date') }} </label>
                            <input type="text"  value="" class="form-control" placeholder="{{ __('messages.Start_date') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Number') }}</label>
                            <input type="text" name="" value="" class="form-control" placeholder="{{ __('messages.Number') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.End_date') }}</label>
                            <input type="text" name="" value="" class="form-control" placeholder="{{ __('messages.End_date') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-topbar-title my-3">{{ __('messages.Type_of_identification') }}</div>
                        <div class="col-md-6 form-group">
                            <div class="col-md-6 col-3 form-group">
                                <input type="radio" name="checked">
                                <label>{{ __('messages.ID') }} {{ __('messages.Number') }}</label>
                            </div>
                            <div class="col-md-6 col-3 form-group">
                                <input type="radio" name="checked">
                                <label>{{ __('messages.Password') }} {{ __('messages.Number') }}</label>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Number') }}</label>
                            <input type="text"  value="" class="form-control" placeholder="{{ __('messages.Number') }}">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>{{ __('messages.Upload_idea') }}</label>
                            <div class="col-md-12 form-group uploadImgWrapper">
                                <input type="file" name="icon" class="stafffile2" accept="image/*">
                                <div class="uploadImgContainer">
                                    <div class="cameraIcon"><img class="staffbrowse2" src="{{asset('assets/admin/images/camera.svg')}}"></div>
                                    <img id="staffpreview2" src="{{asset('assets/admin/images/placeholderBox.svg')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>{{ __('messages.Upload_health_CR') }}</label>
                            <div class="col-md-12 form-group uploadImgWrapper">
                                <input type="file" name="icon" class="stafffile3" accept="image/*">
                                <div class="uploadImgContainer">
                                    <div class="cameraIcon"><img class="staffbrowse3" src="{{asset('assets/admin/images/camera.svg')}}"></div>
                                    <img id="staffpreview3" src="{{asset('assets/admin/images/placeholderBox.svg')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>{{ __('messages.Image') }}</label>
                            <div class="col-md-12 form-group uploadImgWrapper">
                                <input type="file" name="icon" class="stafffile1" accept="image/*">
                                <div class="uploadImgContainer">
                                    <div class="cameraIcon"><img class="staffbrowse1" src="{{asset('assets/admin/images/camera.svg')}}"></div>
                                    <img id="staffpreview1" src="{{asset('assets/admin/images/placeholderBox.svg')}}">
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