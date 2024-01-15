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
            <h3 class="page-title mb-0 p-0">My Birthday</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">My Birthday</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add new Birthday</li>
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
        <form action="{{ route('birthday.store') }}" method="post" enctype='multipart/form-data' id="add_form">
            @csrf
            @if(isset($birthday->id))
            <input type="hidden" name="id" value="{{ $birthday->id }}">
            @endif
            <div class="card">
                <div class="card-body">
                    <h4>Add Birthday</h4>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <input type="file" class="form-control" name="birthday_banner" id="birthday_banner" onchange="previewFile(this);" >
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
                                <label for="surnamr">Birthday Date</label>
                                <input type="date" class="form-control" id="birthday_date" name="birthday_date">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 align-right">
                            <a href="{{ route('birthday.view') }}" class="btn btn-light">Cancel</a>
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
        $(".birthday-link").addClass('active');

        @if(isset($birthday->id))
            $(".banner-container").show();
            $("#banner-preview").attr("src", "{{ $birthday->banner_url }}");
            $("#name").val("{{ $birthday->name }}");
            $("#phone_no").val("{{ $birthday->mobile_no }}");
            $("#birthday_date").val("{{ $birthday->date }}");
        @endif
        
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