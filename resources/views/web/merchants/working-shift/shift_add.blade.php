@extends('master-merchant')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Working_Shift') }}</div>
    <a href="{{ url('/merchant/shift-list') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card-common">
                <div class="card-topbar-inner">
                    <div class="card-topbar-title">{{ __('messages.Add') }} {{ __('messages.Working_Shift') }}</div>
                </div>
                <div class="card-common-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Shift_Type') }}</label>
                            <select class="form-control" name="status">
                                <option value="0" selected hidden disabled>{{ __('messages.Shift_Type') }}</option>
                                <option value="1">{{ __('messages.Morning') }}</option>
                                <option value="2">{{ __('messages.Evening') }}</option>
                                <option value="3">{{ __('messages.Night') }}</option>
                                <option value="4">{{ __('messages.All_Day') }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Shift_Starting_Time') }}</label>
                            <input type="time" name="product_name" value="" class="form-control" placeholder="{{ __('messages.Shift_Starting_Time') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Shift_Ending_Time') }}</label>
                            <input type="time" name="product_name" value="" class="form-control" placeholder="{{ __('messages.Shift_Ending_Time') }}">
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
                    <!-- <div class="col-md-12 form-group uploadImagesBar">
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-md-6 form-group posRel">
                                    <label>Valid From</label>
                                    <input type="text" class="form-control" id="input_from" name="valid_from" placeholder="From date">
                                </div>
                                <div class="col-md-6 form-group posRel">
                                    <label>Valid To</label>
                                    <input type="text" class="form-control" id="input_to" name="valid_till" placeholder="Till date">
                                </div>
                            </div>
                        </div>
                    </div> -->
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