@extends('admin.layout.main')
@section('title')Admin - Customer @endsection
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Staff</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Staff</li>
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
        <form action="" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    @if(Auth::user()->is_insert)
                    <div class="text-end upgrade-btn mb-3">
                        <a href="{{ route('staff.add') }}" class="btn btn-success">+ Add staff</a>
                    </div>
                    @endif
                    <table class="staff-datatable table">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Phone no</th>
                                <th>Insert</th>
                                <th>Update</th>
                                <th>Delete</th>
                                <th>View</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                    <!-- <div class="row mt-3 mt-3">
                        <div class="col-md-5"></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2 float-right justify-content-end">
                            <div class="f-flex">
                                <button type="submit" class="btn btn-light align-self-end" name="reject">Reject</button>
                                <button type="submit" class="btn btn-success align-self-end" name="approve">Approve</button>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $(".sidebar-link").removeClass('active');
        $(".staff-link").addClass('active');

        let i = 1;

        var table = $('.staff-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('staff.list') }}",
            columns: [
                {
                    "render": function(data, type, full, meta) {
                        return i++;
                    }
                },
                {data: 'phone_no', name: 'phone_no'},
                {data: 'insert', name: 'insert'},
                {data: 'update', name: 'update'},
                {data: 'delete', name: 'delete'},
                {data: 'view', name: 'view'},
                {data: 'actions', name: 'actions'}
            ],
            responsive: true
        });

    });
</script>
@endsection