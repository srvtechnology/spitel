@extends('admin.layout.main')
@section('title')Admin - Family member @endsection
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Family member</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">{{$customer->first_name}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Family member</li>
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
        <form action="{{ route('customer.approved') }}" method="post" id="customer_approved_form">
            @csrf
            <input type="hidden" name="reason" id="reason">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-4 float-right">
                        <input type="text" class="form-control" name="search" id="custom_search" placeholder="Search...">
                    </div>
                    <table class="customer-datatable table table-hover">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Relation</th>
                                <th>Phone no</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="family_member_tbody">
                            @foreach($family_member as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>
                                    @php
                                    if (!empty($row->avtar)) {
                                        $avatar_path = $row->avtar;

                                        if (app()->environment() == "local") {
                                            $explode = explode("public/", $row->avtar);
                                            $avatar_url = $explode[1];
                                            $avatar_path = $avatar_url;
                                            $row->avtar = asset("/" . $avatar_url);
                                        }
                                    }
                                    @endphp
                                    @if (!empty($avatar_path) && file_exists($avatar_path))
                                    <img src="{{ $row->avtar }}" alt='Avatar' width='120' style='border-radius: 50px;'>
                                    @else - @endif
                                </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ ($row->gender == 1) ? "Male" : "Female" }}</td>
                                <td>{{ (!is_null($row->relationship)) ? $row->relationship->name : ""  }}</td>
                                <td>{{ !empty($row->phone_no) ? $row->phone_no : "-" }}</td>
                                <td>
                                    <span class='action'>
                                        @if(Auth::user()->is_update)
                                        <a href="{{ url('/admin/family-member/add/'.$row->cust_id.'/'.$row->id.'?city='.request('city')) }}"><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;
                                        @endif
                                        @if(Auth::user()->is_delete)
                                        <a href="{{ url('/admin/family-member/delete/member/'.$row->id.'?city='.request('city')) }}" onclick='return confirm("Are you sure?")'><i class='fa-solid fa-trash text-danger'></i></a>&nbsp;
                                        @endif
                                        @if(Auth::user()->is_view)
                                        <a href="{{ url('/admin/family-member/view/'.$row->id.'?city='.request('city')) }}"><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center" id="laravel_pagination">
                        {{ $family_member->appends(request()->query())->links() }}
                    </div>
                    <div class="row mt-3 mt-3">
                        <div class="col-md-12 float-right justify-content-end">
                            <div class="f-flex align-right">
                                {{-- <button type="button" class="btn btn-light reject align-self-end" name="reject">Reject</button>
                                <button type="submit" class="btn btn-success align-self-end" name="approve">Approve</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--
<div class="modal fade" id="reason_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reason for reject</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea name="reject_reason" id="reject_reason" cols="30" rows="7" placeholder="specify reason." class="form-control"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submit-reason">Ok</button>
            </div>
        </div>
    </div>
</div> -->
@endsection
@section('scripts')
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $(".sidebar-link").removeClass('active');
        $(".customer-link").addClass('active');

        let i = 1;

        let global_city = '';
        @if(isset($_GET['city']) && $_GET['city'] != '')
        global_city = "{{$_GET['city']}}";
        @endif

        $(".customer-datatable").DataTable({
            paging:false,
            searching:false,
        });

        $("#custom_search").on("keyup", function () {
            var search_title = $(this).val();
            if(search_title == null)
            {
                return false;
            }
            $("#family_member_tbody").html('Loading.....');
            $("#laravel_pagination").addClass("d-none");
            $.ajax({
                url: "{{ route('family_member.ajax_search') }}",
                method: "POST",
                data: {
                    _token : "{{ csrf_token() }}",
                    search: search_title
                },
                success: function (response) {
                    if (response) {
                        $("#family_member_tbody").html('');
                        $("#family_member_tbody").html(response);
                    }
                    if(response == 'no'){
                        location.reload();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr, status, error);
                }
            });
        });


        var table = $('.customer-datatable_KHVBKVJ').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('family_member.list') }}",
                "data": function(d){
                    d.city_id = global_city,
                    d.cust_id = "{{$customer->id}}"
                }
            },
            columns: [
                {
                    "render": function(data, type, full, meta) {
                        return i++;
                    }
                },
                {data: 'avtar', name: 'avtar'},
                {data: 'name', name: 'name'},
                {
  data: 'gender',
  name: 'gender',
  render: function(data, type, full, meta) {
      return data == 1 ? "Male" : "Female";
  }
},
                {data: 'relation', name: 'relation'},
                {data: 'phone_no', name: 'phone_no'},
                {data: 'actions', name: 'actions'}
            ],
            responsive: true,
            order: [[ 2, 'asc' ]],
        });
    });
</script>
@endsection
