@extends('master-merchant')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Promo_Code') }}</div>
    <a href="{{ url('/merchant/promo-code/list') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card-common">
                <div class="card-topbar-inner">
                    <div class="card-topbar-title">{{ __('messages.Edit') }} {{ __('messages.Promo_Code') }}</div>
                </div>
                <div class="card-common-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Promo_Code') }}</label>
                            <input type="text" name="product_name" value="" class="form-control" placeholder="{{ __('messages.Promo_Code') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Promo_Code') }} {{ __('messages.Title') }}(Arabic)</label>
                            <input type="text" name="p_c_t_a" value="" class="form-control" placeholder="Title{{ __('messages.Title') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Promo_Code') }} {{ __('messages.Title') }}(English)</label>
                            <input type="text" name="p_c_t_e" value="" class="form-control" placeholder="Title{{ __('messages.Title') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Status') }}</label>
                            <select class="form-control" name="status">
                                <option value="0" selected hidden disabled>Select Status</option>
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Discount_value') }}</label>
                            <input type="text" name="product_name" value="" class="form-control" placeholder="{{ __('messages.Discount_value') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Discount_Type') }}</label>
                            <select class="form-control" name="status">
                                <option value="0" selected hidden disabled>{{ __('messages.Discount_Type') }}</option>
                                <option value="1">Percentage</option>
                                <option value="2">Fixed</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{ __('messages.Discount_value_for') }}</label>
                            <select class="form-control" name="status">
                                <option value="0" selected hidden disabled>{{ __('messages.Discount_Type') }}</option>
                                <option value="1">All Products</option>
                                <option value="2">Pizza</option>
                                <option value="3">Burdger</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group uploadImagesBar">
                            <div class="col-md-6 form-group">
                                <div class="row">
                                    <div class="col-md-6 form-group posRel">
                                        <label>{{ __('messages.Valid_From') }}</label>
                                        <input type="text" class="form-control" id="input_from" name="valid_from" placeholder="{{ __('messages.From_date') }}">
                                    </div>
                                    <div class="col-md-6 form-group posRel">
                                        <label>{{ __('messages.Valid_To') }}</label>
                                        <input type="text" class="form-control" id="input_to" name="valid_till" placeholder="{{ __('messages.Till_date') }}">
                                    </div>
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