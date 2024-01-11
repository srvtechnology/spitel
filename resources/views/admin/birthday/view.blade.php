@extends('admin.layout.main')
@section('title') Admin - {{$birthday->name}} @endsection
@section('styles')
<style>
    .info {
        font-weight: bold;
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
                        <li class="breadcrumb-item"><a href="{{ route('birthday.view') }}">My Birthday</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Birthday Details</li>
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
        <div class="card">
            <div class="card-body">
                <h4>View Advertisement</h4>
                <div class="row mt-3 avtar-container">
                    <div class="col-md-4">
                        <img src="{{ $birthday->banner_url }}" alt="Avtar" class="img-fluid img-thumbnail" id="avtar-preview">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="firstname">Name</label><br>
                            <div class="info">
                                {{$birthday->name}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="father/husband_name">Mobile number</label>
                            <div class="info">
                                {{$birthday->mobile_no}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="surnamr">Birthday date</label>
                            <div class="info">
                                {{date("d-m-Y", strtotime($birthday->date))}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $(".sidebar-link").removeClass('active');
        $(".birthday-link").addClass('active');
    });
</script>
@endsection