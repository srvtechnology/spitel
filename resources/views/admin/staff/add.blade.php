@extends('admin.layout.main')
@section('title')Admin - Staff @endsection
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
            <h3 class="page-title mb-0 p-0">Staff</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Staff</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add new staff</li>
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
        <form action="{{ route('staff.store') }}" method="post" id="staff_form">
            @csrf
            @if(isset($staff->id))
            <input type="hidden" name="id" value="{{ $staff->id }}">
            @endif
            @if(isset($_GET['city']) && $_GET['city'] != '')
            <input type="hidden" name="url_city" value="{{$_GET['city']}}">
            @endif
            <div class="card">
                <div class="card-body">
                    <h4>Add Staff</h4>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Staff name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Phone no</label>
                                <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter staff phone no">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father/husband_name">Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">Choose...</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Sub admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="firstname">Insert</label><br>
                                <input type="checkbox" class="form-check-input ml-3" id="is_insert" name="is_insert">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="firstname">Update</label><br>
                                <input type="checkbox" class="form-check-input ml-3" id="is_update" name="is_update">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="firstname">Delete</label><br>
                                <input type="checkbox" class="form-check-input ml-3" id="is_delete" name="is_delete">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="firstname">View</label><br>
                                <input type="checkbox" class="form-check-input ml-3" id="is_view" name="is_view">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Password</label><br>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Confirm Password</label><br>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 align-right">
                            <a href="{{ route('staff.view') }}" class="btn btn-light">Cancel</a>
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
        $(".staff-link").addClass('active');

        @if(isset($staff->id))
            $("#phone_no").val("{{ $staff->phone_no }}");
            $("#role").val("{{ $staff->role }}");
            $("#name").val("{{ $staff->name }}");
            @if($staff->is_insert)
                $("#is_insert").attr("checked", true);
            @endif
            @if($staff->is_update)
                $("#is_update").attr("checked", true);
            @endif
            @if($staff->is_delete)
                $("#is_delete").attr("checked", true);
            @endif
        @endif

        $("#staff_form").validate({
            rules: {
                name: {
                    required: true
                },
                phone_no: {
                    required: true,
                    digits: true
                },
                role: {
                    required: true
                },
                @if(!isset($staff->id))
                password: {
                    required: true,
                    minlenth: 8
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                }
                @endif
            }
        });
    });
</script>
@endsection