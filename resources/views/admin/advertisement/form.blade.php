@extends('admin.layout.main')
@section('title')Admin - @if(isset($customer->id)) Edit @else Add @endif @endsection
@section('styles')
<style>
    .banner-container {
        display: none;
    }
</style>
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">My Advertisement</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">My Advertisement</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add new Advertisement</li>
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
        <form action="{{ route('advertisement.store') }}" method="post" enctype='multipart/form-data' id="add_form">
            @csrf
            @if(! is_null($add))
            <input type="hidden" name="id" value="{{ $add->id }}">
            @endif
            @if(isset($_GET['city']) && $_GET['city'] != '')
            <input type="hidden" name="url_city" value="{{$_GET['city']}}">
            @endif
            <div class="card">
                <div class="card-body">
                    <h4>Add Addvertisement</h4>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Upload</label>
                            <input type="file" class="form-control" name="banner" id="banner" onchange="previewFile(this);" >
                        </div>
                        <div class="col-md-4">
                            <label>Customer</label>
                            <select name="customer_id" id="customer_id" class="form-control select">
                                <option value="">Choose...</option>
                                @foreach($customers as $c)
                                <option value="{{$c->id}}">{{$c->first_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="col-md-4">
                            <label>Slide</label>
                            <select class="form-control select" id="slide_id" name="slide_id"></select>
                        </div> --}}
                    </div>
                    <div class="row mt-3 banner-container">
                        <div class="col-md-4">
                            <img src="" alt="Banner" class="img-fluid img-thumbnail" id="banner-preview">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your name">
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                                <label for="father/husband_name">Advertisement Name</label>
                                <input type="text" class="form-control" id="add_name" name="add_name" placeholder="Enter Advertisement Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <!--   <label for="surnamr">Description</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Enter your discription"> -->
                                <label for="surnamr">City</label>
                                <select name="city_id" id="city_id" class="form-control select"></select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="surnamr">To date</label>
                                <input type="datetime-local" name="to_date" id="to_date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 align-right">
                            <a href="{{ route('advertisement.view') }}" class="btn btn-light">Cancel</a>
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
        $(".add-link").addClass('active');

        @if(! is_null($add))
            $(".banner-container").show();
            $("#banner-preview").attr("src", "{{ $add->banner_url }}");
            $("#name").val("{{ $add->name }}");
            $("#add_name").val("{{ $add->advertisement_name }}");
            $("#description").val("{{ $add->description }}");
            $("#customer_id").val("{{ $add->customer_id }}");
            $("#to_date").val("{{ $add->to_date }}");
            city("#city_id", '', "{{$add->city_id}}");
            slide("#slide_id", "{{$add->slide_id}}");
            $(".select").trigger("change");
        @else
            city("#city_id", '');
            slide("#slide_id");
        @endif

        $("#customer_id").on("change", function(){
            $("#name").val($('#customer_id :selected').text());
        });


        $("#add_form").validate({
            rules: {
                @if(is_null($add))
                banner: {
                    required: true
                },
                @endif
                customer_id: {
                    // required: true
                },
                name: {
                    required: true
                },
                add_name: {
                    required: true
                },
                description: {
                    required: true
                },
                city_id: {
                    required: true
                },
                slide_id: {
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
                $(".banner-container").show();
                $("#banner-preview").attr("src", reader.result);
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

    function slide(options_element, selected_value = null) {
        let cityUrl = "{{ route('advertisement.getSlide') }}";
        let options = '<option value="">Choose...</option>';
        $.get(cityUrl, function(data, status){
            $.each(data, function(key, value){
                let attr = (selected_value != null) ? (value.id == selected_value) ? "selected" : "" : "";
                options += "<option value='"+value.id+"' "+attr+">"+value.name+"</option>";
            });
            $(options_element).html(options);
        });
    }
</script>
@endsection
