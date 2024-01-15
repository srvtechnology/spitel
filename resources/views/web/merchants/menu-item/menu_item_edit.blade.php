@extends('master-merchant')
@section('content')


    <div class="main-heading-container">
        <div class="common-title">{{ __('messages.Menu_Items') }}</div>
        <a href="{{ url('/merchant/menu-item/list') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">

        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card-common">
                    <div class="card-topbar-inner">
                        <div class="card-topbar-title">{{ __('messages.Edit_Menu_Items') }}</div>
                    </div>
                    
                    <div class="card-common-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Category_Selection') }}</label>
                                <select class="form-control" name="status" >
                                    <option value="0">{{ __('messages.Select_Category') }}</option>
                                    <option value="1">Category  1</option>
                                    <option value="2">Category  2</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Item_Name') }} (English)</label>
                                <input type="text" name="product_name" value=""  class="form-control" placeholder="{{ __('messages.Item_Name') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Item_Name') }} (Arabic)</label>
                                <input type="text" name="product_name" value=""  class="form-control" placeholder="{{ __('messages.Item_Name') }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Description') }} (English)</label>
                                <textarea class="text-area" name="" id="" cols="30" rows="3" placeholder="{{ __('messages.Description') }}"></textarea>
                            </div>
                            <div class="col-md-6 form-group ">
                                <label>{{ __('messages.Description') }} (Arabic)</label>
                                <textarea class="text-area" name="" id="" cols="30" rows="3" placeholder="{{ __('messages.Description') }}"></textarea>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Price') }}</label>
                                <input type="text" name="product_name" class="form-control" placeholder="{{ __('messages.Price') }}">
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Status') }}</label>
                                <select class="form-control" name="status" >
                                    <option value="0">{{ __('messages.Select_Status') }}</option>
                                    <option value="1">{{ __('messages.Active') }}</option>
                                    <option value="2">{{ __('messages.Inactive') }}</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 form-group ">
                                <div class="col-md-6 form-group">
                                    <label>{{ __('messages.Item_Image') }}</label>
                                    <div class="col-md-12 form-group uploadImgWrapper">
                                        <input type="file" name="icon" class="foodfile2" accept="image/*">
                                        <div class="uploadImgContainer">
                                            <div class="cameraIcon"><img class="foodbrowse2" src="{{asset('assets/admin/images/camera.svg')}}"></div>
                                            <img id="foodpreview2" src="{{asset('assets/admin/images/placeholderBox.svg')}}">
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
