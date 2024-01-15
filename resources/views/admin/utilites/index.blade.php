@extends('admin.layout.main')
@section('title') Admin - Utilites @endsection
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style type="text/css">
    select{margin-top: 5px;margin-bottom: 5px;}
    #reportrange { cursor: pointer; padding: 2px 3px; border: 1px solid #ccc; display: inline-block; font-family: Verdana, Geneva, Tahoma, sans-serif; }
    #daterange {border: 0;cursor: pointer;}
</style>
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Utilites</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Utilites</li>
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
        <form action="{{ route('utilites.approved') }}" method="post" id="utilites-approved-form">
            @csrf
            <input type="hidden" name="reason" id="reason">
            <div class="card">
                <div class="card-body">
                    @if(Auth::user()->is_insert)
                    <div class="text-end upgrade-btn mb-3">
                        <a href="{{ route('utilites.add') }}" class="btn btn-success link-btn">+ Add new Utilites</a>
                    </div>
                    @endif
<!--                     <div id="reportrange">
                        <i class="fa fa-calendar"></i>
                        <i class="fa fa-caret-down"></i>
                        <input type="text" name="daterange" id="daterange" />
                    </div> -->
                    <select name="category_id" id="category_id">
                        <option value="">Category</option>
                        @foreach($category as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                    <select name="sub_category" id="sub_category">
                        <option value="">Sub Category</option>
                        @foreach($sub_category as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-sm btn-primary search-btn" type="button" id="search-btn">Search</button>
                    <table class="utilites-datatable table">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="check_all" id="check_all">
                                </th>
                                <th>Sr#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Mobile no</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($utilites as $row)
                            <tr>
                                <td>
                                    <input type='checkbox' name='utilities_id[]' class='utilities_id' value='{{ $row->id }}'>
                                </td>
                                <td>{{ $row->id }}</td>
                                <td><img src='{{ $row->banner_url }}' alt='Avtar' width='120' style='border-radius: 50px;'></td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->phone_no }}</td>
                                <td>{{ $row->address }}</td>
                                <td>{{ (!is_null($row->city_id)) ? (!is_null($row->city)) ? $row->city->city : "deleted" : null }}</td>
                                <td>
                                    <span class='action'>
                                        @if(Auth::user()->is_update)
                                        <a href="{{ url('/admin/utilites/add/'.$row->id.'?city='.request('city')) }}"><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;
                                        @endif
                                        @if(Auth::user()->is_delete)
                                        <a href="{{ url('/admin/utilites/delete/'.$row->id.'?city='.request('city')) }}" onclick='return confirm("Are you sure?")'><i class='fa-solid fa-trash text-danger'></i></a>&nbsp;
                                        @endif
                                        @if(Auth::user()->is_view)
                                        <a href="{{ url('/admin/utilites/view/'.$row->id.'?city='.request('city')) }}"><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                            <tr></tr>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $utilites->appends(request()->query())->links() }}
                    </div>
                    <div class="row mt-3 mt-3">
                        <div class="col-md-12 align-right float-right justify-content-end">
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(document).ready(function(){
        $(".sidebar-link").removeClass('active');
        $(".utilites-link").addClass('active');

        let i = 1;
        let g_city = category_id = sub_category = "";
        @if(isset($_GET['city']) && $_GET['city'] != '')
        g_city = "{{$_GET['city']}}"
        @endif

        var date = new Date();
        var filter_from = new Date(date.getFullYear(), date.getMonth(), 1);
        var filter_to = new Date(date.getFullYear(), date.getMonth() + 1, 0);

        // $('#daterange').daterangepicker({
        //     "showDropdowns": true,
        //     "showWeekNumbers": true,
        //     "showISOWeekNumbers": true,
        //     ranges: {
        //         'Today': [moment(), moment()],
        //         'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        //         'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        //         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        //         'This Month': [moment().startOf('month'), moment().endOf('month')],
        //         'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
        //         'This Year': [moment().startOf('year'), moment().endOf('year')]
        //     },
        //     "locale": {
        //         "format": "MM/DD/YYYY",
        //         "separator": " - ",
        //         "applyLabel": "Apply",
        //         "cancelLabel": "Cancel",
        //         "fromLabel": "From",
        //         "toLabel": "To",
        //         "customRangeLabel": "Custom",
        //         "weekLabel": "W",
        //         "daysOfWeek": [
        //             "Su",
        //             "Mo",
        //             "Tu",
        //             "We",
        //             "Th",
        //             "Fr",
        //             "Sa"
        //         ],
        //         "monthNames": [
        //             "January",
        //             "February",
        //             "March",
        //             "April",
        //             "May",
        //             "June",
        //             "July",
        //             "August",
        //             "September",
        //             "October",
        //             "November",
        //             "December"
        //         ],
        //         "firstDay": 1
        //     },
        //     "linkedCalendars": false,
        //     "startDate": filter_from,
        //     "endDate": filter_to
        // }, function(start, end, label) {
        //     filter_from = start.format('YYYY-MM-DD');
        //     filter_to = end.format('YYYY-MM-DD');
        // });

        $("#search-btn").click(function(){
            category_id = $("#category_id").val();
            sub_category = $("#sub_category").val();
            table.draw();
        });

        $('.utilites-datatable').DataTable({
            paging:false
        });

        var table = $('.utilites-datatable_sakjbadbsa').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('utilites.list') }}",
                data: function(d) {
                    d.city = g_city,
                    d.filter_from = filter_from,
                    d.filter_to = filter_to,
                    d.category_id = category_id,
                    d.sub_category = sub_category
                }
            },
            columns: [
                {data: 'utilities_id', name: 'utilities_id', "orderable": false},
                {
                    "render": function(data, type, full, meta) {
                        return i++;
                    }
                },
                {data: 'banner_url', name: 'banner_url'},
                {data: 'name', name: 'name'},
                {data: 'mobile_no', name: 'mobile_no'},
                {data: 'address', name: 'address'},
                {data: 'city', name: 'city'},
                {data: 'actions', name: 'actions'}
            ],
            order: [[ 3, 'asc' ]],
            responsive: true
        });

        $("#check_all").on("change", function(){
            let status = ($(this).is(":checked")) ? true : false;

            $(".utilities_id").attr("checked", status);
        });

        $(".submit-reason").on("click", function(){
            let reject_reason = $("#reject_reason").val();

            if (reject_reason != '') {
                $("#reason").val(reject_reason);
                $("#utilites-approved-form").submit();
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
