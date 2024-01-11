@extends('admin.layout.main')
@section('title')Admin - Family Member @endsection
@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<style>
    .avtar-container, .date_of_anniversary_container, .date_of_expiry_container, .sarusal_gautra_container, .img-row, .matrimony-container, .time_of_birth_container, .birth_place_container {display: none; }
    .select2-container {width: 100%!important;}
    .img-container {display: inline-block;position: relative;width: 35%}
    .close-image {position: absolute;top: -17px;right: -8px;font-size: 30px;}
</style>
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Family Member</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">{{$customer->first_name}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add new Family Member</li>
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
        <form action="{{ route('family_member.store') }}" method="post" enctype='multipart/form-data' id="family_member_form">
            @csrf
            @if(isset($_GET['city']) && $_GET['city'] != '')
            <input type="hidden" name="url_city" value="{{$_GET['city']}}">
            @endif
            <input type="hidden" name="token" id="token" value="{{$token}}">
            <input type="hidden" name="cust_id" id="cust_id" value="{{$customer->id}}">
            <input type="hidden" name="family_member_id" id="family_member_id" value="">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
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
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone no</label>
                                        <input type="number" name="phone_no" id="phone_no" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Panth</label>
                                        <select name="panth_id" class="form-control select" id="panth_id">
                                            <option value="">Choose...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Gender</label>
                                        <select name="gender" class="form-control select" id="gender">
                                            <option value="">Choose...</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status_id" id="status_id" class="form-control select">
                                        <option value="">Choose...</option>
                                        <option value="1">Married</option>
                                        <option value="2">Unmarried</option>
                                        <option value="3">Expired</option>
                                        <option value="4">Divorce</option>
                                    </select>
                                </div>
                                <div class="col-md-6 date_of_anniversary_container">
                                    <label class="form-label">Date of anniversary</label>
                                    <input type="date" name="date_of_anniversary" id="date_of_anniversary" class="form-control">
                                </div>
                                <div class="col-md-6 date_of_expiry_container">
                                    <label class="form-label">Date of Expire</label>
                                    <input type="date" name="date_of_expire" id="date_of_expire" class="form-control">
                                </div>
                                <div class="col-md-6 time_of_birth_container">
                                    <label class="form-label">Time of Birth</label>
                                    <input type="time" name="time_of_birth" class="form-control" id="time_of_birth">
                                </div>
                            </div>
                            <div class="mb-3 birth_place_container">
                                <label class="form-label">Birth Place</label>
                                <input type="text" name="birth_place" id="birth_place" class="form-control">
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Relationship</label>
                                        <select name="relationship_id" class="form-control select" id="relationship_id">
                                            <option value="">Choose...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">About</label>
                                    <textarea class="form-control editor" name="about" id="about" cols="5">{!! $family_member->about !!}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Education</label>
                                        <input type="text" name="education" class="form-control" id="education">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Blood Group</label>
                                        <select class="form-control select" name="blood_group_id" id="blood_group_id">
                                            <option value="">Choose...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 matrimony-container">
                                    <br>
                                    <input type="checkbox" class="mt-3" name="allow_matrimony" id="allow_matrimony" />&nbsp;
                                    <label class="form-label">Allow Metrimony</label>
                                </div>
                            </div>
                            <div class="mb-3 sarusal_gautra_container">
                                <label class="form-label">Naniyal Gautra</label>
                                <select name="naniyal_gautra_id" id="naniyal_gautra_id" class="form-control select">
                                </select>
                            </div>
                            <div class="align-right">
                                <a href="" class="btn btn-light">Cancel</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(document).ready(function(){

        $(".sidebar-link").removeClass('active');
        $(".customer-link").addClass('active');

        @if(!is_null($family_member))
            @if(!is_null($family_member->avtar))
            $("#preview_image").attr('src', "{{$family_member->avtar}}");
            $("#close-image-id").val("{{$family_member->id}}");
            $(".img-row").show();
            @endif
            $("#family_member_id").val("{{$family_member->id}}");
            $("#name").val("{{$family_member->name}}");
            $("#phone_no").val("{{$family_member->phone_no}}");
            $("#panth_id").val("{{$family_member->panth_id}}");
            $("#gender").val("{{$family_member->gender}}");
            $("#status_id").val("{{$family_member->status}}");
            @if(in_array($family_member->status, [2, 4]))
                @if($family_member->allow_matrimony)
                $("#allow_matrimony").attr('checked', true);
                @else
                $("#allow_matrimony").attr('checked', false);
                @endif
                $("#time_of_birth").val("{{$family_member->time_of_birth}}");
                $("#birth_place").val("{{$family_member->birth_place}}");
                $(".time_of_birth_container").show();
                $(".birth_place_container").show();
                $(".matrimony-container").show();
                $(".date_of_anniversary_container").hide();
                $(".date_of_expiry_container").hide();
            @elseif($family_member->status == 1)
                $("#date_of_anniversary").val("{{$family_member->date_of_anniversary}}");
                $(".date_of_anniversary_container").show();
                $(".date_of_expiry_container").hide();
                $(".matrimony-container").hide();
            @elseif($family_member->status == 3)
                $("#date_of_expire").val("{{$family_member->date_of_expire}}");
                $(".date_of_anniversary_container").hide();
                $(".date_of_expiry_container").show();
                $(".matrimony-container").hide();
            @else
                $(".date_of_anniversary_container").hide();
                $(".date_of_expiry_container").hide();
                $(".matrimony-container").hide();
            @endif
            
            panth("#panth_id", "{{$family_member->panth_id}}");
            blood_group("#blood_group_id", "{{$family_member->blood_group_id}}");
            relationship('#relationship_id', "{{$family_member->relationship_id}}");
            $("#date_of_birth").val("{{$family_member->date_of_birth}}");
            $("#education").val("{{$family_member->education}}");
            $(".select").trigger('change');
            @if($family_member->allow_matrimony)
                $(".sarusal_gautra_container").show();
            @endif
            surname("#naniyal_gautra_id", "{{$family_member->naniyal_gautra_id}}");
        @else
            panth("#panth_id");
            blood_group("#blood_group_id");
            relationship('#relationship_id');
            surname("#naniyal_gautra_id");
        @endif

        $("#allow_matrimony").on("change", function(){
            if($(this).prop('checked') == true){
                $(".sarusal_gautra_container").show();
            } else {
                $(".sarusal_gautra_container").hide();
            }
        });

        $("#family_member_form").validate({
            rules: {
                name: {
                    required: true
                },
                gender: {
                    required: true
                },
                relationship_id: {
                    required: true
                },
                date_of_birth: {
                    // required: true
                },
                phone_no: {
                    digits: true
                },
                time_of_birth: {
                    // required: true
                },
                birth_place: {
                    // required: true
                }
            }
        });

        $("#avtar").on("change", function(){
            if ($(".img-row").css('display') == 'none' || $(".img-row").css("visibility") == "hidden"){
                let id = "";
                @if(!is_null($family_member))
                id = "{{$family_member->id}}";
                @endif
                let fd = new FormData();
                let files = $(this)[0].files[0];
                fd.append('avtar', files);
                fd.append('id', id);
                fd.append('token', $("#token").val());
                fd.append('_token', "{{ csrf_token() }}");
                fd.append('is_family_member', 1);
                fd.append('cust_id', "{{$customer->id}}");
                $.ajax({
                    url: "{{route('customer.uploadAvtar')}}",
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        console.log(response);
                        $("#preview_image").attr('src', response.avtar);
                        $("#close-image-id").data("id", response.id);
                        $(".img-row").show();
                    },
                });
            } else {
                alert("Please remove first uploaded image");
            }
        });

        $(".date").datepicker({
            dateFormat: 'dd-mm-yy'
        });
        $("#status_id").on("change", function(){
            let status = $(this).val();
            if (status == 2 || status == 4) {
                $(".time_of_birth_container").show();
                $(".birth_place_container").show();
                $(".matrimony-container").show();
                $(".date_of_anniversary_container").hide();
                $(".date_of_expiry_container").hide();
            } else if (status == 1) {
                $(".date_of_anniversary_container").show();
                $(".date_of_expiry_container").hide();
                $(".matrimony-container").hide();
                $(".time_of_birth_container").hide();
                $(".birth_place_container").hide();
            } else if (status == 3) {
                $(".matrimony-container").hide();
                $(".date_of_anniversary_container").hide();
                $(".date_of_expiry_container").show();
                $(".time_of_birth_container").hide();
                $(".birth_place_container").hide();
            } else {
                $(".matrimony-container").hide();
                $(".date_of_anniversary_container").hide();
                $(".date_of_expiry_container").hide();
                $(".time_of_birth_container").hide();
                $(".birth_place_container").hide();
            }
        });

    });

    function panth(options_element, selected_value = null) {
        let url = "{{route('customer.getPanth')}}";
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

    function relationship(options_element, selected_value = null) {
        let url = "{{route('family.getRelationShip')}}";
        let options = '<option value="">Choose...</option>';
        $.get(url, function(data, status){
            $.each(data, function(key, value){
                let attr = (selected_value != null) ? (value.id == selected_value) ? "selected" : "" : "";
                options += "<option value='"+value.id+"' "+attr+">"+value.name+"</option>";
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

    $(document).on("click", "#close-image-id", function(){
        let family_memeber_id = $(this).val();
        let customer_id = "{{$customer->id}}";
        let _this = this;
        let url = "{{route('customer.removeAvtar', ['id' => ':id'])}}?family_memeber";
        url = url.replace(":id", family_memeber_id);
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