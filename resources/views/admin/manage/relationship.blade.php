@extends('admin.layout.main')
@section('title')Admin - Relationship @endsection
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
</style>
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Relationship</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Manage</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Relationship</li>
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
        <form action="" method="get">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        @if(Auth::user()->is_insert)
                        <div class="align-right">
                            <div class="text-end upgrade-btn mb-3">
                                <a href="javascript:void(0)" class="btn btn-success link-btn add-native-place">+ Add Relationship</a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <table class="surname-datatable table">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{route('manage.relationship.store')}}" method="post">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add/edit Relationship</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label class="form-label">Relationship</label>
                        <input type="text" name="name" id="name" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
@section('scripts')
<!-- Datatable scripts -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- Date range picker scripts -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(document).ready(function(){
        $(".sidebar-link").removeClass('active');
        $(".list-unstyled").addClass('in');
        $(".manage-link").addClass('active');
        $(".relationship-link").addClass('active');
        $(".add-native-place").click(function(){
            $("#name").val("");
            $("#id").val("");
            $("#modal").modal('show');
        });
        $(".close-modal").click(function(){
            $("#modal").modal('hide');
        });
        var i = 1;
        var table = $('.surname-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('manage.relationship.list') }}"
            },
            columns: [
                {
                    "render": function(data, type, full, meta) {
                        return i++;
                    }
                },
                {data: 'name', name: 'name'},
                {data: 'actions', name: 'actions'}
            ],
            responsive: true,
            order: [[ 1, 'asc' ]]
        });
    });
    $(document).on("click", '.edit', function(){
        let id = $(this).data('id');
        let name = $(this).data('name');
        $("#name").val(name);
        $("#id").val(id);
        $("#modal").modal('show');
    });
</script>
@endsection