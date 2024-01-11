@extends('admin.layout.main')
@section('title')Admin - Matrimony @endsection
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
            <h3 class="page-title mb-0 p-0">My matrimony</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">My matrimony</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add new matrimony</li>
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
        <form action="{{ route('matrimony.store') }}" method="post" enctype='multipart/form-data' id="matrimony_form">
            @csrf
            @if(isset($matrimony->id))
            <input type="hidden" name="id" value="{{ $matrimony->id }}">
            @endif
            @if(isset($_GET['city']) && $_GET['city'] != '')
            <input type="hidden" name="url_city" value="{{$_GET['city']}}">
            @endif
            <div class="card">
                <div class="card-body">
                    <h4>Add Matrimony</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">Profile</div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="firstname">Upload</label>
                            <input type="file" class="form-control" name="avtar" id="avtar" onchange="previewFile(this);" >
                        </div>
                        <div class="col-md-4">
                            <label for="firstname">Customer</label>
                            <select class="form-control" name="customer_id" id="customer_id">
                                <option value="">Choose...</option>
                                @foreach($customers as $c)
                                <option value="{{$c->id}}">{{$c->first_name}}</option>
                                @endforeach
                            </select>
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
                                <label for="firstname">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter Your full name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father/husband_name">Gautra</label>
                                <input type="text" class="form-control" id="gautra" name="gautra" placeholder="Enter your Gautra">
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                                <label for="surnamr">Nanihal Gautra</label>
                                <input type="text" class="form-control" id="nanihal_gautra" name="nanihal_gautra" placeholder="Enter your Nanihal Gautra">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Date of Birth</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father/husband_name">Birth time</label>
                                <input type="time" class="form-control" id="birth_time" name="birth_time">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="surnamr">Birth Place</label>
                                <input type="text" name="birth_place" id="birth_place" class="form-control" placeholder="Enter your birth place">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Blood Group</label>
                                <input type="text" name="blood_group" id="blood_group" class="form-control" placeholder="Enter your blood group">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father/husband_name">Education</label>
                                <input type="text" class="form-control" id="education" name="education" placeholder="Enter your education">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">Work</div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Designation</label>
                                <input type="text" name="designation" id="designation" class="form-control" placeholder="Enter your Designation">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father/husband_name">Company</label>
                                <input type="text" class="form-control" id="company" name="company" placeholder="Enter your company name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father/husband_name">Offiec no</label>
                                <input type="text" class="form-control" id="office_no" name="office_no" placeholder="Enter your Office number">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Address</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Enter your address">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father/husband_name">City</label>
                                <select name="city_id" id="city_id" class="form-control select">
                                    <option value="">Choose...</option>
                                </select>
                                <!-- <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city"> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father/husband_name">State</label>
                                <select name="state_id" id="state_id" class="form-control select">
                                    <option value="">Choose...</option>
                                    @foreach($state as $s)
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                </select>
                                <!-- <input type="text" class="form-control" id="state" name="state" placeholder="Enter your state"> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">Family</div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Father Name</label>
                                <input type="text" name="father_name" id="father_name" class="form-control" placeholder="Enter your father name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father/husband_name">Mother name</label>
                                <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Enter your mother name">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father/husband_name">Sister name</label>
                                <input type="text" class="form-control" id="sister_name" name="sister_name" placeholder="Enter your sister name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father/husband_name">Brother name</label>
                                <input type="text" class="form-control" id="brother_name" name="brother_name" placeholder="Enter your brother name">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 align-right">
                            <a href="{{ route('matrimony.view') }}" class="btn btn-light">Cancel</a>
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
        $(".matrimony-link").addClass('active');

        let glb_city = '';
        @if(isset($_GET['city']) && $_GET['city'] != '')
            glb_city = "{{$_GET['city']}}";
        @endif

        if (glb_city != '') {
            let req_url = "{{ route('customer.getStateByCity', ['city_id' => ':city_id']) }}";
            req_url = req_url.replace(":city_id", glb_city);
            console.log("The method was run");
            $.get(req_url, function(data, status){
                $("#state_id").val(data);
                $("#state_id").trigger('change');
            });
            $( document ).ajaxComplete(function() {
                $("#city_id").val(glb_city);
            });
        }

        $("#state_id").on("change", function(){
            let state_id = $(this).val();
            let cityUrl = "{{ route('getCity') }}?state_id="+state_id;
            let options = '<option value="">Choose...</option>';
            $.get(cityUrl, function(data, status){
                $.each(data, function(key, value){
                    options += "<option value='"+value.id+"'>"+value.city+"</option>";
                });
                $("#city_id").html(options);
            });
        });

        @if(isset($matrimony->id))
            $(".avtar-container").show();
            $("#avtar-preview").attr("src", "{{ $matrimony->avtar_url }}");
            $("#full_name").val("{{ $matrimony->full_name }}");
            $("#gautra").val("{{ $matrimony->gautra }}");
            $("#nanihal_gautra").val("{{ $matrimony->nanihal_gautra }}");
            $("#date_of_birth").val("{{ $matrimony->date_of_birth }}");
            $("#birth_time").val("{{ $matrimony->birth_time }}");
            $("#birth_place").val("{{ $matrimony->birth_place }}");
            $("#blood_group").val("{{ $matrimony->blood_group }}");
            $("#education").val("{{ $matrimony->education }}");
            $("#designation").val("{{ $matrimony->designation }}");
            $("#company").val("{{ $matrimony->company }}");
            $("#office_no").val("{{ $matrimony->office_no }}");
            $("#address").val("{{ $matrimony->address }}");
            $("#city_id").val("{{ $matrimony->city_id }}");
            $("#state_id").val("{{ $matrimony->state_id }}");
            $("#father_name").val("{{ $matrimony->father_name }}");
            $("#mother_name").val("{{ $matrimony->mother_name }}");
            $("#sister_name").val("{{ $matrimony->sister_name }}");
            $("#brother_name").val("{{ $matrimony->brother_name }}");
            $("#customer_id").val("{{ $matrimony->customer_id }}");
        @endif

        $("#matrimony_form").validate({
            rules: {
                @if(!isset($matrimony->id))
                avtar: {
                    required: true
                },
                @endif
                full_name: {
                    required: true
                },
                gautra: {
                    required: true
                },
                nanihal_gautra: {
                    required: true
                },
                date_of_birth: {
                    required: true
                },
                birth_time: {
                    required: true
                },
                birth_place: {
                    required: true
                },
                blood_group: {
                    required: true
                },
                education: {
                    required: true
                },
                designation: {
                    required: true
                },
                company: {
                    required: true
                },
                office_no: {
                    required: true
                },
                address: {
                    required: true
                },
                city_id: {
                    required: true
                },
                state_id: {
                    required: true
                },
                father_name: {
                    required: true
                },
                mother_name: {
                    required: true
                },
                sister_name: {
                    required: true
                },
                brother_name: {
                    required: true
                },
                customer_id: {
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