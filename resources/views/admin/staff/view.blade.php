@extends('admin.layout.main')
@section('title')Admin - staff @endsection
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
            <h3 class="page-title mb-0 p-0">View Staff</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('staff.view') }}">View Staff</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View new Staff</li>
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
                <h4>View staff</h4>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="firstname">Name</label><br>
                            <div class="info">
                                {{$staff->name}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="firstname">Phone</label><br>
                            <div class="info">
                                {{$staff->phone_no}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="father/husband_name">Role</label>
                            <div class="info">
                                @if($staff->role == 1) Admin @else Sub admin @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="firstname">Insert</label>
                            <div class="info">
                                @if($staff->is_insert)
                                Yes
                                @else
                                No
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="firstname">Update</label>
                            <div class="info">
                                @if($staff->is_update)
                                Yes
                                @else
                                No
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="firstname">Delete</label>
                            <div class="info">
                                @if($staff->is_delete)
                                Yes
                                @else
                                No
                                @endif
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
        $(".staff-link").addClass('active');
    });
</script>
@endsection