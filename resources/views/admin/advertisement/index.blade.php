@extends('admin.layout.main')
@section('title')Admin - Advertisement @endsection
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Advertisement</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Advertisement</li>
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
        <form action="{{ route('advertisement.approved') }}" method="post" id="advertisement_approved_form">
            @csrf
            <input type="hidden" name="reason" id="reason">
            <div class="card">
                <div class="card-body">
                    @if(Auth::user()->is_insert)
                    <div class="text-end upgrade-btn mb-3">
                        <a href="{{ route('advertisement.add') }}" class="btn btn-success link-btn">+ Add Advertisement</a>
                    </div>
                    @endif
                    <table class="add-datatable table">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="check_all" id="check_all">
                                </th>
                                <th>Sr#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Advertisement Name</th>
                                <th>City</th>
                                <th>To date</th>
                                {{-- <th>Slide</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="row mt-3 mt-3">
                        <div class="col-md-12 float-right justify-content-end align-right">
                            <div class="f-flex">
                                <button type="button" class="btn btn-light reject align-self-end" name="reject">Reject</button>
                                <button type="submit" class="btn btn-success align-self-end" name="approve">Approve</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

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
</div>
@endsection
@section('scripts')
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $(".sidebar-link").removeClass('active');
        $(".add-link").addClass('active');

        let i = 1;

        let glb_city = '';
        @if(isset($_GET['city']) && $_GET['city'] != '')
        glb_city = "{{$_GET['city']}}"
        @endif

        var table = $('.add-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('advertisement.list') }}",
                data: function(d) {
                    d.city = glb_city
                }
            },
            columns: [
                {data: 'add_id', name: 'add_id', "orderable": false},
                {
                    "render": function(data, type, full, meta) {
                        return i++;
                    }
                },
                {data: 'add_banner_url', name: 'add_banner_url'},
                {data: 'name', name: 'name'},
                {data: 'add_name', name: 'add_name'},
                {data: 'city', name: 'city'},
                {data: 'to_date', name: 'to_date'},
                // {data: 'slide', name: 'slide'},
                {data: 'actions', name: 'actions'}
            ],
            responsive: true,
            order: [[ 3, 'asc' ]]
        });

        $("#check_all").on("change", function(){
            let status = ($(this).is(":checked")) ? true : false;

            $(".add_ids").attr("checked", status);
        });

        $(".submit-reason").on("click", function(){
            let reject_reason = $("#reject_reason").val();

            if (reject_reason != '') {
                $("#reason").val(reject_reason);
                $("#advertisement_approved_form").submit();
            } else {
                alert("Please specify reason");
            }
        });

        $(".reject").on("click", function(){
            $("#reason_modal").modal('show');
        });

        $(".close-modal").on('click', function(){
            $("#reason_modal").modal('hide');
        });
    });
</script>
@endsection
