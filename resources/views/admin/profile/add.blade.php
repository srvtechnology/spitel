@extends('admin.layout.main')
@section('title')Admin - Profile @endsection
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
            <h3 class="page-title mb-0 p-0">Profile</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">My Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add new Profile</li>
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
        <form action="{{ route('profile.store') }}" method="post" enctype='multipart/form-data' id="profile_form">
            @csrf
            @if(isset($profile->id))
            <input type="hidden" name="id" value="{{ $profile->id }}">
            @endif
            @if(isset($_GET['city']) && $_GET['city'] != '')
            <input type="hidden" name="url_city" value="{{$_GET['city']}}">
            @endif
            <div class="card">
                <div class="card-body">
                    <h4>Add Profile</h4>
                    <div class="row mt-3">
                        <div class="col-md-3">
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
                                <label for="firstname">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your name">
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                                <label for="father/husband_name">Mobile number</label>
                                <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter your mobile number">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="surnamr">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="surnamr">Customer name</label>
                                <select class="form-control" id="customer_id" name="customer_id">
                                    <option value="">Choose...</option>
                                    @foreach($customer as $c)
                                    <option value="{{ $c->id }}">{{$c->first_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 align-right">
                            <a href="{{ route('profile.view') }}" class="btn btn-light">Cancel</a>
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
        $(".profile-link").addClass('active');

        @if(isset($profile->id))
            $(".avtar-container").show();
            $("#avtar-preview").attr("src", "{{ $profile->avtar }}");
            $("#name").val("{{ $profile->name }}");
            $("#mobile_number").val("{{ $profile->mobile_no }}");
            $("#email").val("{{ $profile->email }}");
            $("#customer_id").val("{{ $profile->customer_id }}");
        @endif

        $("#profile_form").validate({
            rules: {
                @if(!isset($profile->id))
                avtar: {
                    required: true
                },
                @endif
                name: {
                    required: true
                },
                mobile_number: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
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
</script>
@endsection