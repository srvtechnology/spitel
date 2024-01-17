@extends('admin.layout.main')
@section('title')Admin - Engagement @endsection
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Engagement</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Engagement</li>
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
                @if(Auth::user()->is_insert)
                <div class="text-end upgrade-btn mb-3">
                    <a href="{{ route('engagements.add') }}" class="btn btn-success link-btn">+ Add Engagement</a>
                </div>
                @endif
                <table class="post-datatable table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Bride Name</th>
                            <th>Groom Name</th>
                            <th>Bride Current City</th>
                            <th>Groom Current City</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($engagements as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->bride_name }}</td>
                            <td>{{ $row->groom_name }}</td>
                            <td>{{ $row->bride_current_city }}</td>
                            <td>{{ $row->groom_current_city }}</td>
                            {{--  <td>{{ $row->bride_cur_city->city }}</td>
                            <td>{{ $row->groom_cur_city->city }}</td>  --}}
                            <td>
                                <span class='action'>
                                    @if(Auth::user()->is_view)
                                    <a href="{{ url('/admin/engagements/view/'.$row->id.'?city='.request('city')) }}"><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;
                                    @endif
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $engagements->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
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
        $(".engagement-link").addClass('active');
        $('.post-datatable').css('width', '');


        let glb_city = '';
        @if(isset($_GET['city']) && $_GET['city'] != '')
        glb_city = "{{$_GET['city']}}"
        @endif

        $('.post-datatable').DataTable({
            paging:false
        });
        var table = $('.post-datatable_sadsad').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('post.list') }}",
                data: function(d) {
                    d.city = glb_city
                }
            },
            columns: [
                {data: 'post_id', name: 'post_id', "orderable": false, width: "10%"},
                {data: 'id', id: 'post_id', "orderable": true, width: "10%"},
                {data: 'customer_name', name: 'customer_name', width: "20%"},
                {data: 'file', name: 'file', width: "30%"},
                {data: 'is_approved', name: 'is_approved', width: "10%"},
                {data: 'active_inactive', name: 'active_inactive', width: "10%"},
                {data: 'desc', name: 'desc', width: "10%"},
                {data: 'actions', name: 'actions', width: "10%"}
            ],
            responsive: true,
            order: [[ 2, 'asc' ]]
        });

        $(".submit-reason").on("click", function(){
            let reject_reason = $("#reject_reason").val();

            if (reject_reason != '') {
                $("#reason").val(reject_reason);
                $("#post_action").submit();
            } else {
                alert("Please specify reason");
            }
        });

        $(".reject").on("click", function(){
            $("#reason_modal").modal('show');
        });

        $("#check_all").on("change", function(){
            let status = ($(this).is(":checked")) ? true : false;

            $(".post_ids").attr("checked", status);
        });

        $(".close-modal").on('click', function(){
            $("#reason_modal").modal('hide');
        });
    });
</script>
@endsection
