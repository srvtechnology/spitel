@extends('admin.layout.main')
@section('title')Admin - Anniversary @endsection
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style type="text/css">
    #reportrange { cursor: pointer; padding: 2px 3px; border: 1px solid #ccc; display: inline-block; font-family: Verdana, Geneva, Tahoma, sans-serif; }
    #daterange {border: 0;cursor: pointer;}
</style>
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Anniversary</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Anniversary</li>
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
        <form action="{{ route('anniversary.approved') }}" method="post" id="anniversary-approved">
            @csrf
            <input type="hidden" name="reason" id="reason">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-10">
                            <div id="reportrange">
                                <i class="fa fa-calendar"></i>
                                <i class="fa fa-caret-down"></i>
                                <input type="text" name="daterange" id="daterange" />
                            </div>
                            <button class="btn btn-primary btn-sm search-btn" type="button"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                        </div>
                    </div>
                    @if(Auth::user()->is_insert)
                    <!-- <div class="text-end upgrade-btn mb-3">
                        <a href="{{ route('anniversary.add') }}" class="btn btn-success link-btn">+ Add Anniversary</a>
                    </div> -->
                    @endif
                    <table class="anniversary-datatable table">
                        <thead>
                            <tr>
<!--                                 <th>
                                    <input type="checkbox" name="check_all" id="check_all">
                                </th> -->
                                <th>Sr#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Mobile no</th>
                                <th>Anniversary Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anniversary as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>
                                    @if (class_basename($row) == "Customer")
                                    @php
                                        $avatar_url = $avatar_path= null;
                                        if(!empty($row->avtar_url))
                                        {
                                            $avatar_path =$row->avtar_url;
                                            if(app()->environment() == "local")
                                            {
                                                $explode = explode("public/",$row->avtar_url);
                                                $avatar_url = $explode[1];
                                                $avatar_path =$avatar_url;
                                                $row['avtar_url'] = asset("/".$avatar_url);
                                            }
                                        }
                                        @endphp
                                        @if(!empty($avatar_path) AND file_exists($avatar_path))
                                        <img src='{{ $row->avtar_url }}' alt='Avtar' width='120' style='border-radius: 50px;'>
                                        @else - @endif
                                    @else
                                    {{ (!is_null($row->avtar)) ? "<img src='". $row->avtar ."' alt='Avtar' width='120' style='border-radius: 50px;'>" : "" }}
                                    @endif
                                </td>
                                <td>
                                    @if(class_basename($row) == "Customer")
                                         {{ $row->first_name }} {{ $row->father_husband_name }} {{ (!is_null($row->surname)) ? $row->surname->name : "" }}
                                    @else
                                        return $row->name;
                                    @endif
                                </td>
                                <td>
                                    {{ $row->phone_no }}
                                </td>
                                {{--  <td>{{ date("d-m-Y", strtotime($row->date_of_birth)) }}</td>  --}}
                                <td>{{ date("d-m-Y",strtotime($row->date_of_anniversary)) }}</td>
                                {{--  <td>{{ date("Y").'-'.date("m-d",strtotime($row->date_of_anniversary)) }}</td>  --}}
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $anniversary->appends(request()->query())->links() }}
                    </div>
                    <div class="row mt-3 mt-3">
                        <div class="col-md-12 float-right justify-content-end align-right">
                           <!--  <div class="f-flex">
                                <button type="button" class="btn btn-light reject align-self-end" name="reject">Reject</button>
                                <button type="submit" class="btn btn-success align-self-end" name="approve">Approve</button>
                            </div> -->
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
        $(".anni-link").addClass('active');

        let i = 1;
        let g_city = "";

        @if(isset($_GET['city']) && $_GET['city'] != '')
        g_city = "{{$_GET['city']}}";
        @endif

        var date = new Date();
        var filter_from = new Date(date.getFullYear(), date.getMonth(), 1);
        var filter_to = new Date(date.getFullYear(), date.getMonth() + 1, 0);

        $('#daterange').daterangepicker({
            "showDropdowns": true,
            "showWeekNumbers": true,
            "showISOWeekNumbers": true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                'This Year': [moment().startOf('year'), moment().endOf('year')]
            },
            "locale": {
                "format": "MM/DD/YYYY",
                "separator": " - ",
                "applyLabel": "Apply",
                "cancelLabel": "Cancel",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "weekLabel": "W",
                "daysOfWeek": [
                    "Su",
                    "Mo",
                    "Tu",
                    "We",
                    "Th",
                    "Fr",
                    "Sa"
                ],
                "monthNames": [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ],
                "firstDay": 1
            },
            "linkedCalendars": false,
            "startDate": filter_from,
            "endDate": filter_to
        }, function(start, end, label) {
            filter_from = start.format('YYYY-MM-DD');
            filter_to = end.format('YYYY-MM-DD');
        });

        $('.anniversary-datatable').DataTable({
            paging:false
        });
        var table = $('.anniversary-datatable_JKBDSKB').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('anniversary.list') }}",
                data: function(d) {
                    d.city = g_city,
                    d.f_from = filter_from,
                    d.f_to = filter_to
                }
            },
            columns: [
                // {data: 'birthday_id', name: 'birthday_id', "orderable": false},
                {
                    "render": function(data, type, full, meta) {
                        return i++;
                    }
                },
                {data: 'image', name: 'image'},
                {data: 'name', name: 'name'},
                {data: 'phone_no', name: 'phone_no'},
                {data: 'date', name: 'date'}
            ],
            order: [[ 2, 'asc' ]],
            responsive: true
        });
        $(".search-btn").on("click", function(){
            table.draw();
        })

        $("#check_all").on("change", function(){
            let status = ($(this).is(":checked")) ? true : false;

            $(".ann_ids").attr("checked", status);
        });

        $(".submit-reason").on("click", function(){
            let reject_reason = $("#reject_reason").val();

            if (reject_reason != '') {
                $("#reason").val(reject_reason);
                $("#anniversary-approved").submit();
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
