@extends('admin.layout.main')
@section('title') Admin - @if(isset($customer->id)) Edit @else Add @endif @endsection
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
            <h3 class="page-title mb-0 p-0">My Anniversary</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">My Anniversary</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add new Anniversary</li>
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
        <form action="{{ route('anniversary.store') }}" method="post" enctype='multipart/form-data' id="add_form">
            @csrf
            @if(isset($anniversary->id))
            <input type="hidden" name="id" value="{{ $anniversary->id }}">
            @endif
            @if(isset($_GET['city']) && $_GET['city'] != '')
            <input type="hidden" name="url_city" value="{{$_GET['city']}}">
            @endif
            <div class="card">
                <div class="card-body">
                    <h4>Add Anniversary</h4>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Upload</label>
                            <input type="file" class="form-control" name="anniversary_banner" id="anniversary_banner" onchange="previewFile(this);" >
                        </div>
                        <div class="col-md-4">
                            <label>Customer</label>
                            <select name="customer_id" name="customer_id" class="form-control">
                                <option value="">Choose...</option>
                                @foreach($customers as $c)
                                <option value="{{$c->id}}">{{$c->first_name}}</option>
                                @endforeach
                            </select>
                        </div>
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
                                <label for="father/husband_name">Mobile number</label>
                                <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter your phone no">
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                                <label for="surnamr">Anniversary Date</label>
                                <input type="date" class="form-control" id="anniversary_date" name="anniversary_date">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 align-right">
                            <a href="{{ route('anniversary.view') }}" class="btn btn-light">Cancel</a>
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
        $(".anni-link").addClass('active');
        
        @if(isset($anniversary->id))
            $(".banner-container").show();
            $("#banner-preview").attr("src", "{{ $anniversary->banner_url }}");
            $('#name').val("{{ $anniversary->name }}");
            $("#phone_no").val("{{ $anniversary->mobile_no }}");
            $("#anniversary_date").val("{{ $anniversary->date }}");
            $("#customer_id").val("{{ $anniversary->customer_id }}");
        @endif

        $("#add_form").validate({
            rules: {
                @if(!isset($anniversary->id))
                anniversary_banner: {
                    required: true
                },
                @endif
                name: {
                    required: true
                },
                phone_no: {
                    required: true
                },
                anniversary_date: {
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
                $(".banner-container").show();
                $("#banner-preview").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection