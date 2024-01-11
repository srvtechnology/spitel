@extends('admin.layout.main')
@section('title')Admin - @if(isset($customer->id)) Edit @else Add @endif @endsection
@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<style>
    .avtar-container, .date_of_anniversary_container, .date_of_expiry_container, .sarusal_gautra_container, .img-row, .birth_place_container. .time_of_birth_container {display: none !important;}
    .select2-container {width: 100%!important;}
    .img-container {display: inline-block;position: relative;width: 35%}
    .close-image {position: absolute;top: -17px;right: -8px;font-size: 30px;}
</style>
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">My Registration</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">My Registration</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add new Registration</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('customer.store') }}" method="post" enctype='multipart/form-data' id="register_form">
            @csrf
            @if(isset($customer->id))
            <input type="hidden" name="id" id="id" value="{{ $customer->id }}">
            @endif
            @if(isset($_GET['city']) && $_GET['city'] != '')
            <input type="hidden" name="url_city" value="{{$_GET['city']}}">
            @endif
            @php
                // dd($customer->date_of_birth);
            @endphp
            <input type="hidden" name="token" id="token" value="{{$token}}">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert-primary">
                                <h2 class="text-center">Personal Details</h2>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" name="avtar" id="avtar" class="form-control">
                            </div>
                            <div class="row img-row mb-3">
                                <div class="img-container">
                                    <a href="javascript:void(0)" class="close-image" id="close-image-id">&times;</a>
                                    <img src="" class="img-fluid" id="preview_image">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Father/Husband Name</label>
                                        <input type="text" name="father_husband_name" id="father_husband_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Surname</label>
                                <select class="form-control select" id="surname_id" name="surname_id"></select>
                                {{-- <select name="surname_id" id="mySelect" class="mySelect form-control">
                                    @php
                                        $surname_ids = DB::table('surname')->get();
                                    @endphp
                                    <option value="0">Select</option>
                                    @foreach ($surname_ids as $sni)
                                        <option value="{{$sni->id}}" @if($sni->id == $customer->surname_id) selected @endif>{{$sni->name}}</option>
                                    @endforeach
                                </select> --}}
                                {{-- <select name="" class="select" id=""></select> --}}
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Panth</label>
                                        <select name="panth_id" class="form-control select mySelect" id="panth_id">
                                            <option value="0">Choose...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Patti</label>
                                        <select name="patti_id" class="form-control select" id="patti_id">
                                            <option value="">Choose...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone no
                                            @error('phone_no')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </label>
                                        <input type="number" name="phone_no" id="phone_no" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Alt Phone no</label>
                                        <input type="number" name="alt_phone_no" id="alt_phone_no" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input type="email" name="email_address" id="email_address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Gender</label>
                                        <select class="form-control select" name="gender" id="gender">
                                            <option value="">Choose...</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Date of birth</label>
                                        <input type="date" name="date_of_birth" id="date_of_birth" value="{{$customer->date_of_birth ?? ''}}" class="form-control">
                                        {{-- <input type="text" name="" id="" value="{{$customer->date_of_birth}}"> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Blood Group</label>
                                        <select class="form-control select" name="blood_group_id" id="blood_group_id">
                                            <option value="">Choose...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" id="address" rows="5" class="form-control">{{ !empty($customer->address) ? $customer->address : '' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pincode</label>
                                <input type="number" name="pincode" id="pincode" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">State</label>
                                        <select name="state_id" id="state_id" class="form-control select">
                                            <option value="">Choose...</option>
                                            @foreach($state as $s)
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <select name="city_id" id="city_id" class="form-control select">
                                                <option value="">Choose...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status_id" id="status_id" class="form-control select">
                                            <option value="">Choose...</option>
                                            <option value="1">Married</option>
                                            <option value="2">Unmarried</option>
                                            <option value="3">Expired</option>
                                            <option value="4">Divorce</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 date_of_anniversary_container">
                                        <label class="form-label">Date of anniversary</label>
                                        <input type="date" name="date_of_anniversary" class="form-control date" id="date_of_anniversary">
                                    </div>
                                    <div class="mb-3 date_of_expiry_container">
                                        <label class="form-label">Date of Expire</label>
                                        <input type="date" name="date_of_expiry" class="form-control date" id="date_of_expiry">
                                    </div>
<!--                                     <div class="mb-3 time_of_birth_container">
                                        <label class="form-label">Time of Birth</label>
                                        <input type="time" name="time_of_birth" class="form-control" id="time_of_birth">
                                    </div> -->
                                </div>
                            </div>
                            <div class="mb-3 sarusal_gautra_container">
                                <label class="form-label">Sasural Gautra</label>
                                <select name="sasural_gautra_id" id="sasural_gautra_id" class="form-control select">
                                </select>
                            </div>
<!--                             <div class="mb-3 birth_place_container">
                                <label class="form-label">Birth Place</label>
                                <input type="text" name="birth_place" id="birth_place" class="form-control">
                            </div> -->
                            <div class="mb-3">
                                <label class="form-label">Education</label><br>
                                <input type="text" name="education" id="education" class="form-control">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">To</label>
                                        <input type="date" name="to" id="to" value="{{$customer->start ?? ''}}" class="form-control">
                                        {{-- <input type="text" name="" id="" value="{{$customer->date_of_birth}}"> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">From</label>
                                        <input type="date" name="from" id="from" value="{{$customer->end ?? ''}}" class="form-control">
                                        {{-- <select class="form-control select" name="blood_group_id" id="blood_group_id">
                                            <option value="">Choose...</option>
                                        </select> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert-primary">
                                <h2 class="text-center">Native Details</h2>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" cols="5" name="native_address" id="native_address">{{ !empty($customer->native_address) ? $customer->native_address : '' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pincode</label>
                                <input type="number" name="native_pincode" id="native_pincode" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">State</label>
                                <select id="native_state_id" name="native_state_id" class="form-control select">
                                    <option value="">Choose...</option>
                                    @foreach($state as $s)
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">City</label>
                                <select id="native_city_id" name="native_city_id" class="form-control select">
                                    <option value="">Choose...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="alert-primary">
                                <h2 class="text-center">Business Details</h2>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Business Category</label>
                                <select class="form-control select" name="business_category_id" id="business_category_id">
                                    <option value="">Choose...</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Company/firm name</label>
                                <input type="text" name="company_firm_name" id="company_firm_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Designation</label>
                                <input type="text" name="designation" id="designation" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" cols="5" name="business_address" id="business_address">{{ !empty($customer->business_address) ? $customer->business_address : '' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pincode</label>
                                <input type="number" name="business_pincode" id="business_pincode" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">State</label>
                                <select name="business_state_id" id="business_state_id" class="form-control select">
                                    <option value="">Choose...</option>
                                    @foreach($state as $s)
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">City</label>
                                <select id="business_city_id" name="business_city_id" class="form-control select">
                                    <option value="">Choose...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="align-right">
                <a href="" class="btn btn-light">Cancel</a>
                <button type="submit" class="btn btn-success">Save</button>
                {{-- @isset($customer->system_status)
                    @if ($customer->system_status == 0)
                        <a href="{{url('approve_cus',$customer->id)}}" class="btn btn-light">Approve</a>
                    @else
                    <a href="{{url('disapprove_cus',$customer->id)}}" class="btn btn-light">Disapprove</a>
                    @endif
                @endisset --}}

            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    // initialize the Select2 plugin on the select element
// $('#mySelect').select2();

// // set the placeholder text for the search box
// $('#mySelect').data('select2').$search.attr('placeholder', 'Search...');

// // set the width of the search box
// $('#mySelect').data('select2').$search.css('width', '100%');
// initialize the Select2 plugin on the select element
$('#mySelect').select2();

// set the tabindex and aria-hidden attributes on the original select element
$('#mySelect').attr('tabindex', '0');
$('#mySelect').removeAttr('aria-hidden');

// set the aria-hidden attribute on the Select2 container element
$('#mySelect').next('.select2-container').attr('aria-hidden', 'true');


    const selectElements = document.querySelectorAll(".mySelect");
    selectElements.forEach(selectElement => {
      selectElement.addEventListener("focus", () => {
        $('.mySelect').val('0');
        setTimeout(() => {
        selectElement.click();
      }, 10);
      });
    });
  </script>
<script>
    $(document).ready(function(){

        $(".sidebar-link").removeClass('active');
        $(".customer-link").addClass('active');

        $(".time_of_birth_container").hide();
        $(".birth_place_container").hide();
        $(".date_of_expiry_container").hide();
        $(".date_of_anniversary_container").hide();
        $(".sarusal_gautra_container").hide();
        $(".img-row").hide();

        @if(!is_null($customer))
            @if(!empty($customer->avtar_url))
                $("#preview_image").attr("src", "{{$customer->avtar_url}}");
                $("#close-image-id").data('id', "{{$customer->id}}");
                $(".img-row").show();
            @endif
            $("#first_name").val("{{$customer->first_name}}");
            $("#father_husband_name").val("{{$customer->father_husband_name}}");
            surname("#surname_id", "{{$customer->surname_id}}");
            panth("#panth_id", "{{$customer->panth_id}}");
            patti("#patti_id", "{{$customer->patti_id}}");
            blood_group("#blood_group_id", "{{$customer->blood_group_id}}");
            surname("#sasural_gautra_id", "{{$customer->sasural_gautra_id}}");
            business_category("#business_category_id", "{{$customer->business_category_id}}");
            $("#phone_no").val("{{$customer->phone_no}}");
            $("#alt_phone_no").val("{{$customer->alt_phone_no}}");
            $("#email_address").val("{{$customer->email_id}}");
            $("#gender").val("{{$customer->gender}}");
            $("#gender").trigger('change');
            $("#date_of_birth").val("{{$customer->date_of_birth}}");
            $("#pincode").val("{{$customer->pincode}}");
            $("#state_id").val("{{$customer->state_id}}");
            $("#state_id").trigger("change");
            city("#city_id", "{{$customer->state_id}}", "{{$customer->city_id}}");
            $("#status_id").val("{{$customer->status}}");
            $("#status_id").trigger("change");
            @if($customer->status == 1)
                $("#date_of_anniversary").val("{{$customer->date_of_anniversary}}");
                $("#sasural_gautra_id").val("{{$customer->sasural_gautra_id}}");
                $(".date_of_anniversary_container").show();
                $(".sarusal_gautra_container").show();
            @elseif($customer->status == 3)
                $("#date_of_expiry").val("{{$customer->date_of_expired}}");
                $("#date_of_expiry_container").show();
            @elseif(in_array($customer->status, [2, 4]))
                $("#time_of_birth").val("{{$customer->time_of_birth}}");
                $("#birth_place").val("{{$customer->birth_place}}");
                $(".time_of_birth_container").show();
                $(".birth_place_container").show();
            @endif
            $("#education").val("{{$customer->education}}");
            $("#native_address").val("{{$customer->native_address}}");
            $("#native_pincode").val("{{$customer->native_pincode}}");
            $("#native_state_id").val("{{$customer->native_state_id}}");
            $("#native_state_id").trigger("change");
            city("#native_city_id", "{{$customer->native_state_id}}", "{{$customer->native_city_id}}");
            $("#company_firm_name").val("{{$customer->company_firm_name}}");           
            $("#business_pincode").val("{{$customer->business_pincode}}");
            $("#business_state_id").val("{{$customer->business_state_id}}");
            $("#designation").val("{{$customer->business_designation}}");
            $("#business_state_id").trigger("change");
            city("#business_city_id", "{{$customer->business_state_id}}", "{{$customer->business_city_id}}");
            $("#business_city_id").trigger('change');
        @else
            surname("#surname_id");
            panth("#panth_id");
            patti("#patti_id");
            blood_group("#blood_group_id");
            surname("#sasural_gautra_id");
            business_category("#business_category_id");
        @endif

        let glb_city = '';
        @if(isset($_GET['city']) && $_GET['city'] != '')
            glb_city = "{{$_GET['city']}}";
        @endif

        if (glb_city != '') {
            let req_url = "{{ route('customer.getStateByCity', ['city_id' => ':city_id']) }}";
            req_url = req_url.replace(":city_id", glb_city);
            $.get(req_url, function(data, status){
                $("#state_id").val(data);
                $("#state_id").trigger('change');
            });
            $( document ).ajaxComplete(function() {
                $("#city_id").val(glb_city);
            });
        }
        $("#avtar").on("change", function(){
            if ($(".img-row").css('display') == 'none' || $(".img-row").css("visibility") == "hidden"){
                let id = "";
                @if(!is_null($customer))
                id = "{{$customer->id}}";
                @endif
                let fd = new FormData();
                let files = $(this)[0].files[0];
                fd.append('avtar', files);
                fd.append('id', id);
                fd.append('token', $("#token").val());
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{route('customer.uploadAvtar')}}",
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        console.log(response);
                        $("#preview_image").attr('src', response.avtar_url);
                        $("#close-image-id").data("id", response.id);
                        $(".img-row").show();
                    },
                });
            } else {
                alert("Please remove first uploaded image");
            }
        });
        $("#register_form").validate({
            rules: {
                first_name: {
                    required: true
                },
                father_husband_name: {
                    required: true
                },
                surname_id: {
                    required: true
                },
                phone_no: {
                    required: true
                },
                gender: {
                    required: true
                },
                state_id: {
                    required: true
                },
                city_id: {
                    required: true
                },
                status_id: {
                    required: true
                },
                sasural_gautra_id: {
                    // required: true
                },
                date_of_expiry: {
                    required: true
                },
                date_of_anniversary: {
                    // required: true
                },
                date_of_birth: {
                    // required: true
                },
                time_of_birth: {
                    required: true
                },
                birth_place: {
                    required: true
                }
            }
        });

        // $(".date").datepicker({
        //     dateFormat: 'dd-mm-yy'
        // });
        $("#state_id").on("change", function(){
            let state_id = $(this).val();
            if (state_id != '') {
                state(state_id, "#city_id");
            } else {
                $("#city_id").html("");
                $("#city_id").html("<option value=''>Choose...</option>");
            }
        });
        $("#native_state_id").on("change", function(){
            let state_id = $(this).val();
            if (state_id != '') {
                state(state_id, "#native_city_id");
            } else {
                $("#native_city_id").html("");
                $("#native_city_id").html("<option value=''>Choose...</option>");
            }
        });
        $("#business_state_id").on("change", function(){
            let state_id = $(this).val();
            if (state_id != '') {
                state(state_id, "#business_city_id");
            } else {
                $("#business_city_id").html("");
                $("#native_city_id").html("<option value=''>Choose...</option>");
            }
        });
        $("#status_id").on("change", function(){
            let status = $(this).val();
            if (status == 1) {
                $(".date_of_anniversary_container").show();
                $(".sarusal_gautra_container").show();
                $(".date_of_expiry_container").hide();
                $(".time_of_birth_container").hide();
                $(".birth_place_container").hide();
            } else if(status == 3) {
                $(".date_of_expiry_container").show();
                $(".date_of_anniversary_container").hide();
                $(".sarusal_gautra_container").hide();
                $(".time_of_birth_container").hide();
                $(".birth_place_container").hide();
            } else if(status == 4 || status == 2) {
                $(".time_of_birth_container").show();
                $(".birth_place_container").show();
                $(".date_of_expiry_container").hide();
                $(".date_of_anniversary_container").hide();
                $(".sarusal_gautra_container").hide();
            } else {
                $(".time_of_birth_container").hide();
                $(".birth_place_container").hide();
                $(".date_of_expiry_container").hide();
                $(".date_of_anniversary_container").hide();
                $(".sarusal_gautra_container").hide();
            }
        });
    });

    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){
                $(".avtar-container").show();
                $("#avtar-preview").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }

    function city(options_element, state, selected_value = null) {
        let cityUrl = "{{ route('getCity') }}?state_id="+state;
        let options = '<option value="">Choose...</option>';
        $.get(cityUrl, function(data, status){
            $.each(data, function(key, value){
                let attr = (selected_value != null) ? (value.id == selected_value) ? "selected" : "" : "";
                options += "<option value='"+value.id+"' "+attr+">"+value.city+"</option>";
            });
            $(options_element).html(options);
        });
    }

    function surname(options_element, selected_value = null) {
        let url = "{{route('customer.getSurname')}}";
        let options = '<option value="">Choose...</option>';
        $.get(url, function(data, status){
            $.each(data, function(key, value){
                let attr = (selected_value != null) ? (value.id == selected_value) ? "selected" : "" : "";
                options += "<option value='"+value.id+"' "+attr+">"+value.name+"</option>";
            });
            $(options_element).html(options);
        });
    }

    function panth(options_element, selected_value = null) {
        let url = "{{route('customer.getPanth')}}";
        let options = '<option value="0">Choose...</option>';
        $.get(url, function(data, status){
            $.each(data, function(key, value){
                let attr = (selected_value != null) ? (value.id == selected_value) ? "selected" : "" : "";
                options += "<option value='"+value.id+"' "+attr+">"+value.name+"</option>";
            });
            $(options_element).html(options);
        });
    }

    function patti(options_element, selected_value = null) {
        let url = "{{route('customer.getPatti')}}";
        let options = '<option value="">Choose...</option>';
        $.get(url, function(data, status){
            $.each(data, function(key, value){
                let attr = (selected_value != null) ? (value.id == selected_value) ? "selected" : "" : "";
                options += "<option value='"+value.id+"' "+attr+">"+value.name+"</option>";
            });
            $(options_element).html(options);
        });
    }

    function blood_group(options_element, selected_value = null) {
        let url = "{{route('customer.getBloodGroup')}}";
        let options = '<option value="">Choose...</option>';
        $.get(url, function(data, status){
            $.each(data, function(key, value){
                let attr = (selected_value != null) ? (value.id == selected_value) ? "selected" : "" : "";
                options += "<option value='"+value.id+"' "+attr+">"+value.name+"</option>";
            });
            $(options_element).html(options);
        });
    }

    function business_category(options_element, selected_value = null) {
        let url = "{{route('customer.getBusinessCategory')}}";
        let options = '<option value="">Choose...</option>';
        $.get(url, function(data, status){
            $.each(data, function(key, value){
                let attr = (selected_value != null) ? (value.id == selected_value) ? "selected" : "" : "";
                options += "<option value='"+value.id+"' "+attr+">"+value.name+"</option>";
            });
            $(options_element).html(options);
        });
    }

    function state(state_id, city_element) {
        let cityUrl = "{{ route('getCity') }}?state_id="+state_id;
        let options = '<option value="">Choose...</option>';
        $.get(cityUrl, function(data, status){
            $.each(data, function(key, value){
                options += "<option value='"+value.id+"'>"+value.city+"</option>";
            });
            $(city_element).html(options);
            $(city_element).trigger('change');
        });
    }

    $(document).on("click", "#close-image-id", function(){
        let customer_id = $(this).data("id");
        let _this = this;
        let url = "{{route('customer.removeAvtar', ['id' => ':id'])}}";
        url = url.replace(":id", customer_id);
        $.get(url, function(data, status){
            if (data) {
                $(_this).data("id", "");
                $(_this).siblings("#preview_image").attr("src", "");
                $(".img-row").hide();
                $("#avtar").val("");
            }
        });
    });
</script>
@endsection
