@extends('admin.layout.main')
@section('title')Admin - Surname @endsection
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
            <h3 class="page-title mb-0 p-0">Surname</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Manage</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Surname</li>
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
                        <!-- <div class="col-md-10">
                            <div id="reportrange">
                                <i class="fa fa-calendar"></i>
                                <i class="fa fa-caret-down"></i>
                                <input type="text" name="daterange" id="daterange" />
                            </div>
                            <button class="btn btn-primary btn-sm search-btn" type="button"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                        </div> -->
                        @if(Auth::user()->is_insert)
                        <div class="align-right">
                            <div class="text-end upgrade-btn mb-3">
                                <a href="javascript:void(0)" class="btn btn-success link-btn add-surname">+ Add Surname</a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-4 float-right">
                        <input type="text" class="form-control" name="search" id="custom_search" placeholder="Search...">
                    </div>
                    <table class="surname-datatable table">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="surname_datatable_tbody">
                            @foreach($surname as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>
                                    <span class='action'>
                                        @if(Auth::user()->is_update)
                                        <a href='javascript:void(0)' class='edit-surname' data-id='{{ $row->id }}' data-surname='{{ $row->name }}'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;
                                        @endif
                                        @if(Auth::user()->is_delete)
                                        <a href="{{ url('/admin/manage/delete/surname/'.$row->id) }}" onclick='return confirm("Are you sure?")'><i class='fa-solid fa-trash text-danger'></i></a>&nbsp;
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center" id="laravel_pagination">
                        {{ $surname->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="surname-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{route('manage.surname.store')}}" method="post">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add/edit Surname</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label class="form-label">Surname</label>
                        <input type="text" name="surname" id="surname" required class="form-control">
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
        $(".surname-list").addClass('active');
        $(".add-surname").click(function(){
            $("#surname-modal").modal('show');
        });
        $(".close-modal").click(function(){
            $("#surname-modal").modal('hide');
        });
        var i = 1;
        $('.surname-datatable').DataTable({
            searching:false,
            paging:false,
        });

        $("#custom_search").on("keyup", function () {
            var search_title = $(this).val();
            if(search_title == null)
            {
                return false;
            }
            $(".surname_datatable_tbody").html('Loading.....');
            $("#laravel_pagination").addClass("d-none");
            $.ajax({
                url: "{{ route('manage.surname.ajax_search') }}",
                method: "POST",
                data: {
                    _token : "{{ csrf_token() }}",
                    search: search_title
                },
                success: function (response) {
                    if (response) {
                        $(".surname_datatable_tbody").html('');
                        $(".surname_datatable_tbody").html(response);
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
        var table = $('.surname-datatable_JHJABV').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('manage.surname.list') }}"
            },
            columns: [
                // {data: 'id', name: 'id', "orderable": false},
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
    $(document).on("click", '.edit-surname', function(){
        let id = $(this).data('id');
        let surname = $(this).data('surname');
        $("#surname").val(surname);
        $("#id").val(id);
        $("#surname-modal").modal('show');
    });
</script>
@endsection
