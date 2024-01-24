@extends('admin.layout.main')
@section('title')Admin - Customer @endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<style type="text/css">
    .cursor-poiner {cursor: pointer;}
    #reportrange { cursor: pointer; padding: 2px 3px; border: 1px solid #ccc; display: inline-block; font-family: Verdana, Geneva, Tahoma, sans-serif; }
    #daterange {border: 0;cursor: pointer;}
</style>
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Member Approval</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Member Approval</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-3 cursor-poiner" data-status="1">
        <a href="{{ URL::current() }}?type=approve">
            <div class="card">
                <div class="card-body bg-warning">
                    <h3 style="color: white;">{{$approved_customer}}</h3>
                    <p style="color: white;">Approve Customer</p>
                </div>
            </div>
        </a>
    </div>
	<div class="col-md-3 cursor-poiner" data-status="3">
        <a href="{{ URL::current() }}?type=active">
            <div class="card">
                <div class="card-body bg-success">
                    <h3 style="color: white;">{{$active_customer}}</h3>
                    <p style="color: white;">Active Customer</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 cursor-poiner" data-status="0">
        <a href="{{ URL::current() }}?type=pending">
            <div class="card">
                <div class="card-body bg-info">
                    <h3 style="color: white;">{{$pending_customer}}</h3>
                    <p style="color: white;">Pending Customer</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 cursor-poiner" data-status="2">
        <a href="{{ URL::current() }}?type=expired">
            <div class="card">
                <div class="card-body bg-danger">
                    <h3 style="color: white;">{{$membership_expired_customer}}</h3>
                    <p style="color: white;">Membership Expired Customer</p>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('customer.approved') }}" method="post" id="customer_approved_form">
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
                            <button class="btn btn-primary btn-sm search-btn" type="button"><i class="fa-solid fa-magnifying-glass"></i> Search Expire</button>
                        </div>
                    </div>
                    @if(Auth::user()->is_insert)
                    <div class="text-end upgrade-btn mb-3">
                        <a href="{{ route('customer.add') }}" class="btn btn-success link-btn">+ Add new Registration</a>
                    </div>
                    @endif
                    <div class="col-md-4 float-right">
                        <input type="text" class="form-control" name="search" id="customer_search" placeholder="Search...">
                    </div>
                    <div class="table-responsive">
                        <table class="customer-datatable table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" name="check_all" id="check_all">
                                    </th>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Phone no</th>
                                    <th>City</th>
                                    <th>Native City</th>
                                    <th>Firm name</th>
                                    <th>Membership Expired Date</th>
                                    <th>Status</th>
                                    <th>View Family</th>
                                    <th>Add new Family Memeber</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="customer_tbody">
                                @if(count($customers) > 0)
                                @foreach($customers as $customer)
                                <tr>
                                    <td><input type='checkbox' name='customer_ids[]' class='customer_ids' value='{{ $customer->id }}'></td>
                                    <td>{{ $customer->id }}</td>
                                    <td>
                                        @php
                                        $avatar_url = $avatar_path= null;
                                        if(!empty($customer->avtar_url))
                                        {
                                            $avatar_path =$customer->avtar_url;
                                            if(app()->environment() == "local")
                                            {
                                                $explode = explode("public/",$customer->avtar_url);
                                                $avatar_url = $explode[1];
                                                $avatar_path =$avatar_url;
                                                $customer['avtar_url'] = asset("/".$avatar_url);
                                            }
                                        }
                                        @endphp
                                        @if(!empty($avatar_path) AND file_exists($avatar_path))
                                        <img src="{{ $customer->avtar_url }}" alt='Avtar' width='50' style='border-radius: 50%;'>
                                        @else - @endif
                                    </td>
                                    <td>{{ $customer->first_name }} {{ $customer->father_husband_name }} {{ (!is_null($customer->surname)) ? $customer->surname->name : "" }}</td>
                                    <td>{{ $customer->phone_no }}</td>
                                    <td>{{ (!is_null($customer->city)) ? $customer->city->city : "" }}</td>
                                    <td>{{ (!is_null($customer->native_city)) ? $customer->native_city->city : "" }}</td>
                                    <td>{{ $customer->company_firm_name }}</td>
                                    <td>{{ $customer->date_of_expired ?? '-' }}</td>
                                    <td>
                                        @if ($customer->system_status == 1)
                                            <span class='badge badge-success' title='From:- {{ $customer->start }} End:- {{ $customer->end }}'>Approved</span>

                                        @elseif($customer->system_status == 0)
                                            <span class='badge badge-info'>Pending</span>

                                        @else
                                            <span class='badge badge-danger' title='{{ $customer->comment }}'>Reject</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ url('/admin/family-member/'.$customer->id)  }}" class='btn btn-dark btn-sm'>View Family Member</a></td>
                                    <td><a href="{{ url('/admin/family-member/add/'.$customer->id) }}" class='btn btn-warning btn-sm'>Add Family Member</a></td>
                                    <td>
                                        <span class='action'>
                                            @if(Auth::user()->is_update)
                                            <a href="{{ url('/admin/customer/add/'.$customer->id.'?city='.request('city')) }}"><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;
                                            @endif
                                            @if(Auth::user()->is_delete)
                                            <a href="{{ url('/admin/customer/delete/'.$customer->id.'?city='.request('city')) }}" onclick='return confirm("Are you sure?")'><i class='fa-solid fa-trash text-danger'></i></a>&nbsp;
                                            @endif
                                            @if(Auth::user()->is_view)
                                            <a href="{{ url('/admin/customer/view/'.$customer->id.'?city='.request('city')) }}"><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center" id="laravel_pagination">
                        {{ $customers->appends(request()->query())->links() }}
                    </div>
                    <div class="row mt-3 mt-3">
                        <div class="col-md-12 float-right justify-content-end">
                            <div class="f-flex align-right">
                                <button type="button" class="btn btn-light reject align-self-end" value="0" name="reject">Reject</button>
                                <button type="submit" class="btn btn-success align-self-end" value="1" name="approve" id="approve">Approve</button>
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
        $(".customer-link").addClass('active');

        $("#customer_search").on("keyup", function () {
            var search_title = $(this).val();
            $.ajax({
                url: "{{ route('customer.customer_ajax_search') }}",
                method: "POST",
                data: {
                    _token : "{{ csrf_token() }}",
                    search: search_title
                },
                success: function (response) {
                    $("#customer_tbody").html('');
                    if(response == "no")
                    {
                        location.reload();
                    }
                    if (response.length > 0) {
                        $("#laravel_pagination").addClass("d-none");
                        $.each(response, function (index, value) {
                            var statusBadge = null;
                            var customerAvatar = null;
                            var action_btn = null;

                            if (value.system_status == 1) {
                                statusBadge = `<span class='badge badge-success' title='From:- ${value.start} End:- ${value.end}'>Approved</span>`;
                            } else if (value.system_status == 0) {
                                statusBadge = `<span class='badge badge-info'>Pending</span>`;
                            } else {
                                statusBadge = `<span class='badge badge-danger' title='${value.comment}'>Reject</span>`;
                            }

                            if (value.avtar_url != null) {
                                customerAvatar = `<img src="${value.avtar_url}" alt='Avatar' width='50' style='border-radius: 50%;'>`;
                            } else {
                                customerAvatar = `-`;
                            }

                            if (value.is_update) {
                                action_btn = `<a href="${value.is_update_url}"><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;`;
                            }

                            if (value.is_delete) {
                                action_btn += `<a href="${value.is_delete_url}" onclick='return confirm("Are you sure?")'><i class='fa-solid fa-trash text-danger'></i></a>&nbsp;`;
                            }

                            if (value.is_view) {
                                action_btn += `<a href="${value.is_view_url}"><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;`;
                            }

                            $("#customer_tbody").append(`
                                <tr>
                                    <td><input type='checkbox' name='customer_ids[]' class='customer_ids' value='${value.id}'></td>
                                    <td>${value.id}</td>
                                    <td>${customerAvatar}</td>
                                    <td>${value.first_name} ${value.father_husband_name} ${value.surname?.name }</td>
                                    <td>${value.phone_no}</td>
                                    <td>${value.city? value.city.city : ""}</td>
                                    <td>${value.native_city? value.native_city.city : ""}</td>
                                    <td>${value.company_firm_name}</td>
                                    <td>${value.date_of_expired ?? "-"}</td>
                                    <td>${statusBadge}</td>
                                    <td><a href="${value.view_family_member}" class='btn btn-dark btn-sm'>View Family Member</a></td>
                                    <td><a href="${value.add_family_member}" class='btn btn-warning btn-sm'>Add Family Member</a></td>
                                    <td>
                                        <span class='action'>
                                            ${action_btn}
                                        </span>
                                    </td>
                                </tr>
                            `);
                        });
                    }




                },
                error: function (xhr, status, error) {
                    console.error(xhr, status, error);
                }
            });
        });



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

        // let i = 1;

        let global_city = system_status = '';
        @if(isset($_GET['city']) && $_GET['city'] != '')
        global_city = "{{$_GET['city']}}";
        @endif

        $('.customer-datatable').DataTable({
            paging: false,
            searching:false,
        });



        var table = $('.customer-datatable_SASDSA1').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ route('customer.list') }}",
                "data": function(d){
                    d.city_id = global_city,
                    d.system_status = system_status,
                    d.f_from = filter_from,
                    d.f_to = filter_to
                }
            },
            columns: [
                {data: 'customer_id', name: 'customer_id', "orderable": false},
                {data: 'id', name: 'id', "orderable": true},

                {data: 'avtar_url', name: 'avtar_url'},
                {data: 'name', name: 'name'},
                {data: 'phone', name: 'phone'},
                {data: 'city', name: 'native_city'},
                {data: 'native_city', name: 'city'},
                {data: 'company_firm_name', name: 'company_firm_name'},
                {data: 'end', name: 'end'},
                {data: 'status', name: 'status'},
                {data: 'view_member', name: 'view_member'},
                {data: 'add_family_member', name: 'add_family_member'},
                {data: 'actions', name: 'actions'}
            ],
            responsive: true,
            order: [[ 3, 'asc' ]],
        });

        $(".search-btn").click(function(){
            table.draw();
        });

        $(".cursor-poiner").on("click", function(){
            system_status = $(this).data("status");
            table.draw();
        });

        $("#check_all").on("change", function(){
            let status = ($(this).is(":checked")) ? true : false;

            $(".customer_ids").attr("checked", status);
        });

        $(".submit-reason").on("click", function(){
            let reject_reason = $("#reject_reason").val();

            if (reject_reason != '') {
                $("#reason").val(reject_reason);
                $("#approve").val(0);
                $("#customer_approved_form").submit();
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
