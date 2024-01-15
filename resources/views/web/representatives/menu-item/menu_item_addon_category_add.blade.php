@extends('master-representative')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Extra_Options_Menu_Category') }}</div>
    <a href="{{ url('/representative/menu-item/view') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card-common">
                <div class="card-topbar-inner">
                    <div class="card-topbar-title">{{ __('messages.Add_Extra_Options_Menu_Category') }}</div>
                </div>
                <div class="card-common-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Category_Name') }} (English)</label>
                            <input type="text" name="product_name" value="" class="form-control" placeholder="{{ __('messages.Category_Name') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Category_Name') }} (Arabic)</label>
                            <input type="text" name="product_name" value="" class="form-control" placeholder="{{ __('messages.Category_Name') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Status') }}</label>
                            <select class="form-control" name="status">
                                <option value="0">{{ __('messages.Select_Status') }}</option>
                                <option value="1">{{ __('messages.Active') }}</option>
                                <option value="2">{{ __('messages.Inactive') }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Selection_Status') }}</label>
                            <select class="form-control" name="status">
                                <option value="0" disabled hidden>{{ __('messages.Selection_Status') }}</option>
                                <option value="1">{{ __('messages.Compulsory') }}</option>
                                <option value="2">{{ __('messages.Optional') }}</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Number_of_Selectable_Option') }}</label>
                            <input type="Number" class="form-control" placeholder="{{ __('messages.Number_of_Selectable_Option') }}">
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