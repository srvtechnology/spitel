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
                    </table>
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

        var table = $('.customer-datatable').DataTable({
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
