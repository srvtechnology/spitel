
@extends('admin.layout.main')

@section('title')Admin - @if(isset($utilites->id)) Edit @else Add @endif @endsection

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

            <h3 class="page-title mb-0 p-0">My Utilites</h3>

            <div class="d-flex align-items-center">

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="#">My Utilites</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Add new Utilites</li>

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

        <form action="{{ route('utilites.store') }}" method="post" enctype='multipart/form-data' id="utilites_form">

            @csrf

            @if(isset($utilites->id))

            <input type="hidden" name="id" value="{{ $utilites->id }}">

            @endif

            @if(isset($_GET['city']) && $_GET['city'] != '')

            <input type="hidden" name="url_city" value="{{$_GET['city']}}">

            @endif

            <div class="card">

                <div class="card-body">

                    <h4>Add Utilites</h4>

                    <div class="row mt-3">

                        <div class="col-md-3">

                            <input type="file" class="form-control" name="banner" id="banner"  onchange="previewFile(this);" >

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

                                <label for="firstname">Category</label>

                                <select class="form-control" id="category" name="category">

                                    <option value="">Choose...</option>

                                    @foreach($category as $c)

                                    <option value="{{$c->id}}">{{$c->name}}</option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="col-md-4">

                        <div class="form-group">

                                <label for="father/husband_name">Sub category</label>

                                <select class="form-control" id="sub_category" name="sub_category">

                                    <option value="">Choose...</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label for="firstname">Name</label>

                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your name">

                            </div>

                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label for="father/husband_name">Country</label>

                                <select class="country_id form-control" id="country_id" name="country_id">

                                    <option value="">Choose...</option>

                                    @foreach($country as $c)

                                    <option value="{{$c->id}}" >{{$c->name}}</option>

                                    @endforeach

                                </select>

                            </div>

                        </div>                        

                        <div class="col-md-4">

                            <div class="form-group">

                                <label for="surnamr">State</label>

                                <select class="form-control" name="state_id" id="state_id">

                                    <option value="">Choose...</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label for="city">City</label>

                                <select class="city_id form-control" name="city_id" id="city_id">

                                    <option value="">Choose...</option>
                                    @foreach($city as $c)

                                        <option value="{{ $c->id }}">{{ $c->city }}</option>
                                    @endforeach

{{--                                    --}}
{{--                                    <option value="{{ $shopping->id }}" {{$company->shopping_id == $shopping->id  ? 'selected' : ''}}>{{ $shopping->fantasyname}}</option>--}}


                                </select>

                            </div>

                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label for="father/husband_name">Mobile Number</label>

                                <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter your mobile no">

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label for="surnamr">Office Number</label>

                                <input type="text" name="Office_no" id="Office_no" class="form-control" placeholder="Enter office Number">

                            </div>

                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-md-4">

                            <div class="form-group">

                                <label for="firstname">Address</label>

                                <textarea rows="5" name="address" id="address" class="form-control" placeholder="Enter your address">{{ !empty($utilites->address) ? $utilites->address : '' }}</textarea>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">

                                <label for="firstname">Upload File</label>

                                <input type="file" name="second_file" id="second_file" class="form-control">

                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-8">
                            <div class="form-group">

                                <label for="firstname">Description</label>

                                <textarea rows="5" name="description" id="description" class="form-control editor" placeholder="Enter your Description">{!! !empty($utilites->description) ? $utilites->description : '' !!}</textarea>

                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">

                        <div class="col-md-12 align-right">

                            <a href="{{ route('utilites.view') }}" class="btn btn-light">Cancel</a>

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

        $(".utilites-link").addClass('active');



        @if(isset($utilites->id))

            @if(!is_null($utilites->banner_url))

            $(".avtar-container").show();

            $("#avtar-preview").attr('src', "{{ $utilites->banner_url }}");

            @endif

            $("#name").val("{{ $utilites->name }}");

            $("#mobile_no").val("{{ $utilites->phone_no }}");

            $("#Office_no").val("{{ $utilites->office_no }}");      

            $("#country_id").val("{{$utilites->country_id}}");

        {{--$("#city_id").val("{{$utilites->city_id}}");--}}


            state("{{$utilites->country_id}}", "#state_id", "{{$utilites->state_id}}");


            setInterval(function () {
                city("{{$utilites->state_id}}", "#city_id", "{{$utilites->city_id}}");
            }, 500);



            $("#category").val("{{$utilites->category_id}}");

            sub_category("#sub_category", "{{$utilites->category_id}}", "{{$utilites->sub_category_id}}");

        @endif



        $("#category").on("change", function () {

            let parent = $(this).val();

            if (parent != '') {

                sub_category("#sub_category", parent);                

            } else {

                $("#sub_category").html("");

            }

            $(".select").trigger('change');

        });



        $("#country_id").change(function(){

            let country_id = $(this).val();

            state(country_id, "#state_id");

        });

        $("#state_id").change(function(){

            let country_id = $(this).val();

            city(country_id, "#city_id");

        });



        $("#utilites_form").validate({

            rules: {

                name: {

                    required: true

                },

                city_id: {

                    required: true

                },

                state_id: {

                    required: true

                },

                country_id: {

                    required: true

                },

                mobile_no: {

                    // required: true

                },

                Office_no: {

                    // required: true

                },

                address: {

                    required: true

                },
                category: {
                    required: true
                },
                sub_category: {
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



    function sub_category(options_element, parent, selected_value = null) {

        let cityUrl = "{{ route('manage.utilitesSubCategory.list') }}?ajax&parent_id="+parent;

        let options = '<option value="">Choose...</option>';

        $.get(cityUrl, function(data, status){

            $.each(data, function(key, value){

                let attr = (selected_value != null) ? (value.id == selected_value) ? "selected" : "" : "";

                options += "<option value='"+value.id+"' "+attr+">"+value.name+"</option>";

            });

            $(options_element).html(options);

        });

    }



    function state(country_id, city_element, selected_value = null) {

        let cityUrl = "{{ route('getState') }}?country_id="+country_id;

        let options = '<option value="">Choose...</option>';

        $.get(cityUrl, function(data, status){

            $.each(data, function(key, value){

                let attr = (selected_value != null) ? (value.id == selected_value) ? "selected" : "" : "";

                options += "<option value='"+value.id+"' "+attr+">"+value.name+"</option>";

            });

            $(city_element).html(options);

            $(city_element).trigger('change');

        });

    }



    function city(state_id, city_element, selected_value = null) {

        let cityUrl = "{{ route('getCity') }}?state_id="+state_id;

        let options = '<option value="">Choose...</option>';

        $.get(cityUrl, function(data, status){

            $.each(data, function(key, value){

                let attr = (selected_value != null) ? (value.id == selected_value) ? "selected" : "" : "";

                options += "<option value='"+value.id+"' "+attr+">"+value.city+"</option>";

            });

            $(city_element).html(options);

            // $(city_element).trigger('change');

        });

    }

</script>

@endsection