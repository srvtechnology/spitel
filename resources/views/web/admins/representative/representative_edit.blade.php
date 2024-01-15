@extends('master')
@section('content')
    <div class="main-heading-container">
        <div class="common-title">{{ __('messages.Representative') }}</div>
        <a href="{{ url('/admin/representative/list') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
    </div>

    <form action="{{ route('representativ.update',$representative->userList->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card-common">
                    <div class="card-topbar-inner">
                        <div class="card-topbar-title">{{ __('messages.Edit_Representative') }}</div>
                    </div>
                    <div class="card-common-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Name') }}</label>
                                <input type="text" name="name" value="{{$representative->name}}" class="form-control"
                                    placeholder="{{ __('messages.Name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            {{-- <div class="col-md-6 form-group">
                                <label>{{ __('messages.Nationality') }}</label>
                                <input type="text" name="nationality" value="{{$representative->nationality}}" class="form-control"
                                    placeholder="{{ __('messages.Nationality') }}">
                                @error('nationality')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Mobile_Number') }}</label>
                                <input type="text" name="mobile_no" value="{{$representative->mobile_no}}"class="form-control"
                                    placeholder="{{ __('messages.Mobile_Number') }}">
                                @error('mobile_no')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.id_Number') }}</label>
                                <input type="text" name="id_number" value="{{$representative->id_number}}" class="form-control"
                                    placeholder="{{ __('messages.id_Number') }}">
                                @error('id_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="col-md-6 form-group">
                                <label>{{ __('messages.Email') }}</label>
                                <input type="text" name="email" value="{{$representative->email}}" class="form-control"
                                    placeholder="admin@demo.com">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}

                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Status') }}</label>
                                <select class="form-control" name="status">

                                    <option value="1" @selected($representative->userList->status==1)>Active</option>
                                    <option value="0" @selected($representative->userList->status==0)>Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Asing_city') }}</label>
                                <input class="form-control" name="city" value="{{$representative->city}}">


                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Neighborhood1') }}</label>
                                <input type="text" name="neighborhood" value="{{$representative->neighborhood}}" class="form-control"
                                    placeholder="{{ __('messages.Neighborhood1') }}">
                                @error('neighborhood')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Neighborhood2') }}</label>
                                <input type="text" name="neighborhood_1" value="{{$representative->neighborhood_1}}" class="form-control"
                                    placeholder="{{ __('messages.Neighborhood2') }}">
                                @error('neighborhood_1')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="col-md-6 form-group">
                                <label>{{ __('messages.Signup_Referral_Code') }}</label>
                                <input type="text" name="referral_code" value="{{$representative->referral_code}}" class="form-control"
                                    placeholder="{{ __('messages.Signup_Referral_Code') }}">
                                @error('referral_code')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            {{-- <div class="col-md-6 form-group">
                                <label>{{ __('messages.Password') }}</label>
                                <input type="password" name="password" value="{{$representative->name}}" class="form-control"
                                    placeholder="********">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.other_Doc') }}</label>
                                <input type="file" name="other_doc" value="" class="form-control"
                                    placeholder="{{ __('messages.other_Doc') }}">
                                @error('other_Doc')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-3 form-group">
                                <label>{{ __('messages.Image') }}</label>
                                <div class="col-md-12 form-group uploadImgWrapper">
                                    <input type="file" name="img" class="foodfile1" accept="image/*">
                                    <div class="uploadImgContainer">
                                        <div class="cameraIcon"><img class="foodbrowse1"
                                                src="{{ asset('assets/admin/images/camera.svg') }}"></div>
                                        <img id="foodpreview1"
                                            src="{{ asset('images/representative/'.$representative->img) }}">
                                    </div>
                                </div>
                                @error('img')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-3 form-group">
                                <label>{{ __('messages.ID_Image') }}</label>
                                <div class="col-md-12 form-group uploadImgWrapper">
                                    <input type="file" name="id_upload" class="foodfile2" accept="image/*">
                                    <div class="uploadImgContainer">
                                        <div class="cameraIcon"><img class="foodbrowse2"
                                                src="{{ asset('assets/admin/images/camera.svg') }}"></div>
                                        <img id="foodpreview2"
                                            src="{{ asset('images/representative/'.$representative->id_upload) }}">
                                    </div>
                                    @error('id_upload')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
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
