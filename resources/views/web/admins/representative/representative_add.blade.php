@extends('master')
@section('content')
    <div class="main-heading-container">
        <div class="common-title">{{ __('messages.Representative') }}</div>
        <a href="{{ url('/admin/representative/list') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
    </div>

    <form action="{{ route('representativ.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card-common">
                    <div class="card-topbar-inner">
                        <div class="card-topbar-title">{{ __('messages.Add') }} {{ __('messages.Representative') }}</div>
                    </div>
                    <div class="card-common-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Name') }}</label>
                                <input type="text" name="name" value="" class="form-control" id="name"
                                    placeholder="{{ __('messages.Name') }}">
                                    <p class="text-danger name"></p>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            {{-- <div class="col-md-6 form-group">
                                <label>{{ __('messages.Nationality') }}</label>
                                <input type="text" name="nationality" value="" class="form-control" id="nationality"
                                    placeholder="{{ __('messages.Nationality') }}">
                                    <p class="text-danger nationality"></p>
                                @error('nationality')
                                    <p class="text-danger"></p>
                                @enderror
                            </div> --}}
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Mobile_Number') }}</label>
                                <input type="text" name="mobile_no" value="" class="form-control" id="mobile_no"
                                    placeholder="{{ __('messages.Mobile_Number') }}">
                                    <p class="mobile_no text-danger"></p>
                                @error('mobile_no')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.id_Number') }}</label>
                                <input type="text" name="id_number" value="" class="form-control" id="id_number"
                                    placeholder="{{ __('messages.id_Number') }}">
                                    <p class="text-danger id_number"></p>
                                @error('id_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Email') }}</label>
                                <input type="text" name="email" value="" class="form-control" id="email"
                                    placeholder="admin@demo.com">
                                    <p class="text-danger email"></p>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="col-md-6 form-group ">
                                <label>{{ __('messages.Start_day') }}</label>
                                <input type="text" name="start_day" value="" class="form-control" id="start_day"
                                    placeholder="{{ __('messages.Start_day') }}">
                                    <p class="text-danger start_day"></p>
                                @error('start_day')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Status') }}</label>
                                <select class="form-control" name="status">
                                    <option value=selected hidden disabled>Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Asing_city') }}</label>
                                <input class="form-control" name="city"  placeholder="City">

                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Neighborhood1') }}</label>
                                <input type="text" name="neighborhood" value="" class="form-control" id="neighborhood"
                                    placeholder="{{ __('messages.Neighborhood1') }}">
                                    <p class="text-danger neighborhood"></p>
                                @error('neighborhood')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Neighborhood2') }}</label>
                                <input type="text" name="neighborhood_1" value="" class="form-control" id="neighborhood_1"
                                    placeholder="{{ __('messages.Neighborhood2') }}">
                                    <p class="text-danger neighborhood_1"></p>
                                @error('neighborhood_1')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="col-md-6 form-group">
                                <label>{{ __('messages.Signup_Referral_Code') }}</label>
                                <input type="text" name="referral_code" value="" class="form-control" id="referral_code"
                                    placeholder="{{ __('messages.Signup_Referral_Code') }}">
                                    <p class="text-danger referral_code"></p>
                                @error('referral_code')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <div class="col-md-6 form-group">
                                <label>{{ __('messages.Password') }}</label>
                                <input type="password" name="password" value="" class="form-control" id="password"
                                    placeholder="********">
                                    <p class="text-danger password"></p>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
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
                                            src="{{ asset('assets/admin/images/placeholderBox.svg') }}">
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
                                            src="{{ asset('assets/admin/images/placeholderBox.svg') }}">
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
                            <button type="submit" id="submit" class="btn btn-primary w-170">{{ __('messages.Add') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('click', '#submit', function() {
                var name = $('#name').val();
                var mobile_no = $('#mobile_no').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var neighborhood = $('#neighborhood').val();
                var neighborhood_1 = $('#neighborhood_1').val();
                var nationality = $('#nationality').val();
                var start_day = $('#start_day').val();
                var referral_code = $('#referral_code').val();
                if (name.trim() === '') {
                    $(".name").append(" Name field is required");
                    return false;
                } else if (mobile_no.trim() === '') {
                    $(".mobile_no").append(" Name field is required");
                    return false;
                } else if (email.trim() === '') {
                    $(".email").append(" email field is required");
                    return false;
                } else if (neighborhood.trim() === '') {
                    $(".neighborhood").append(" neighborhood field is required");
                    return false;
                } else if (neighborhood_1.trim() === '') {
                    $(".neighborhood_1").append(" neighborhood 1 field is required");
                    return false;
                } else if (id_number.trim() === '') {
                    $(".id_number").append(" Id number field is required");
                    return false;
                }
                else if (nationality.trim() === '') {
                    $(".nationality").append(" nationality field is required");
                    return false;
                }
                else if (start_day.trim() === '') {
                    $(".start_day").append(" start day field is required");
                    return false;
                }
                else if (referral_code.trim() === '') {
                    $(".referral_code").append(" referral code field is required");
                    return false;
                }

            });
        });
    </script>
@endsection
