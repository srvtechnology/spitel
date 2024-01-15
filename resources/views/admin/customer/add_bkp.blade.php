@extends('admin.layout.main')
@section('title')Admin - @if(isset($customer->id)) Edit @else Add @endif @endsection
@section('styles')
<style>
    .avtar-container {
        display: none;
    }
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
            <input type="hidden" name="id" value="{{ $customer->id }}">
            @endif
            @if(isset($_GET['city']) && $_GET['city'] != '')
            <input type="hidden" name="url_city" value="{{$_GET['city']}}">
            @endif
            <div class="card">
                <div class="card-body">
                    <h4>Add Registration</h4>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <input type="file" class="form-control" name="avtar" id="avtar" onchange="previewFile(this);" >
                        </div>
                    </div>
                    <div class="row mt-3 avtar-container">
                        <div class="col-md-4">
                            <img src="" alt="Avtar" class="img-fluid img-thumbnail" id="avtar-preview">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Your name">
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                                <label for="father/husband_name">Father Name / Husband Name</label>
                                <input type="text" class="form-control" id="father_husband_name" name="father_husband_name" placeholder="Father Name / Husband Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                                <label for="surnamr">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter your discription">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Select Gender</label>
                                <select name="gender" id="gender" class="form-control select">
                                    <option value="">Choose</option>
                                    <option value="1">Male</option>
                                    <option value="2">FeMale</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father/husband_name">Mobile Number</label>
                                <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter your mobile no">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="surnamr">State</label>
                                <select name="state_id" id="state_id" class="form-control select">
                                    <option value="">Choose</option>
                                    @foreach($state as $s)
                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Current City</label>
                                <select name="city_id" id="city_id" class="form-control select">
                                    <option value="">Choose...</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father/husband_name">Native Place</label>
                                <input type="text" class="form-control" id="native_place" name="native_place" placeholder="Enter your Native place">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father/husband_name">Date of birth</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 align-right">
                            <a href="{{ route('customer.view') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>
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
<script>
    $(document).ready(function(){

        $(".sidebar-link").removeClass('active');
        $(".customer-link").addClass('active');

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

        @if(isset($customer->id))
            $("#fname").val("{{ $customer->first_name }}");
            $(".avtar-container").show();
            $("#avtar-preview").attr("src", "{{ $customer->avtar_url }}");
            $("#father_husband_name").val("{{ $customer->father_husband_name }}");
            $("#surname").val("{{ $customer->surname }}");
            $("#gender").val("{{ $customer->gender }}");
            $("#mobile_no").val("{{ $customer->phone_no }}");
            $("#state_id").val("{{ $customer->state_id }}");
            $("#city_id").val("{{ $customer->city_id }}");
            $("#native_place").val("{{ $customer->native_place }}");
            $("#date_of_birth").val("{{ $customer->date_of_birth }}");
            city("#city_id", "{{ $customer->state_id }}", "{{ $customer->city_id }}");
            $('.select').trigger('change');
        @endif

        $("#state_id").on("change", function(){
            let state_id = $(this).val();
            let cityUrl = "{{ route('getCity') }}?state_id="+state_id;
            let options = '<option value="">Choose...</option>';
            $.get(cityUrl, function(data, status){
                $.each(data, function(key, value){
                    options += "<option value='"+value.id+"'>"+value.city+"</option>";
                });
                $("#city_id").html(options);
                $("#city_id").trigger('change');
            });
        });

        $("#register_form").validate({
            rules: {
                @if(is_null($customer))
                avtar: {
                    required: true
                },
                @endif
                fname: {
                    required: true
                },
                father_husband_name: {
                    required: true
                },
                surname: {
                    required: true
                },
                gender: {
                    required: true
                },
                mobile_no: {
                    required: true,
                    digits: true
                },
                state_id: {
                    required: true
                },
                city: {
                    required: true
                },
                native_place: {
                    required: true
                },
                date_of_birth: {
                    required: true
                }
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
</script>
@endsection