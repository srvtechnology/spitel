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
                        <tbody>
                            @foreach ($staff as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{$row->phone_no}}</td>
                                <td>{{ ($row->is_insert) ? "Yes" : "No" }}</td>
                                <td>{{ ($row->is_update) ? "Yes" : "No" }}</td>
                                <td>{{ ($row->is_delete) ? "Yes" : "No" }}</td>
                                <td>{{ ($row->is_view) ? "Yes" : "No" }}</td>
                                <td>
                                    <span class='action'>
                                        @if(Auth::user()->is_update)
                                        <a href="{{ url('/admin/staff/add/'.$row->id.'?city='.request('city')) }}"><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;
                                        @endif
                                        @if(Auth::user()->is_delete)
                                        <a href="{{ url('/admin/staff/delete/'.$row->id.'?city='.request('city')) }}" onclick='return confirm("Are you sure?")'><i class='fa-solid fa-trash text-danger'></i></a>&nbsp;
                                        @endif
                                        @if(Auth::user()->is_view)
                                        <a href="{{ url('/admin/staff/view/'.$row->id.'?city='.request('city')) }}"><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $staff->appends(request()->query())->links() }}
                    </div>
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

        $('.staff-datatable').DataTable({
            paging:false
        });
        var table = $('.staff-datatable_BSAKJBSKAB').DataTable({
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
