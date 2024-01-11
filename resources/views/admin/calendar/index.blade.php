@extends('admin.layout.main')
@section('title')Admin - Post @endsection
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Calendar</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Calendar Event</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
@if (Session::has('error'))
    <div class="alert alert-danger">
        <ul>
            <li>{{ Session::get('error') }}</li>
        </ul>
    </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{{ Session::get('success') }}</li>
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-md-12" style=" font-family: 'Noto Sans', sans-serif;">

        <div class="card">
            <div class="card-body">
                <div class="page-title mb-4" style="color: #435ebe;font-size:18px;">
                    <h3>Add Event on Calendar</h3>
                    <a href="{{ route('calendar.add','0') }}" class="btn btn-success link-btn float-right mb-2">+ Add New Event</a>
                </div>

                <table class="calender-datatable table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Date</th>
                            <th>Thought</th>
                            <th>Sanwat</th>
                            <th>Subh Day Time</th>
                            <th>Subh Time of Night</th>
                            <th>Event Details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($calendar as $r)
                        </tr>
                        <td>{{$r->id}}</td>
                        <td> {{ $r->eventDate }}</td>
                        <td>{{ substr($r->thought,0,32)}}..</td>
                        <td>
                            Veer sanwat: {{ $r->veer_sanwat }}<br>
                            Khartar sanwat: {{ $r->khartar_sanwat }}<br>
                            Vikram sanwat: {{ $r->vikram_sanwat }}<br>
                            Isavi sanwat: {{ $r->isavi_sanwat }}<br>
                        </td>
                        <td>
                        Shubh day time : {{ $r->shubh_day_time }}<br>
                        Chanchal day time  : {{ $r->chanchal_day_time }}<br>
                        Laabh day time   : {{ $r->laabh_day_time }}<br>
                        Amrit day time  : {{ $r->amrit_day_time }}<br>
                    </td>
                        <td>
                        Shubh night time : {{ $r->shubh_night_time }}<br>
                        Chanchal night time  : {{ $r->chanchal_night_time }}<br>
                        Laabh night time   : {{ $r->laabh_night_time }}<br>
                        Amrit night time  : {{ $r->amrit_night_time }}<br>
                            </td>
                        <td>{{$r->event}}</td>
                        <td>
                            <a href="{{route('calendar.add',$r->id)}}" style='font-size:16px;padding-right:15px;' title="Update" data-id="{{$r->id}}">
                                <i class="fa fa-edit"></i></a>

                            <a href="{{route('calendar.destroy',$r->id)}}" style='font-size:16px;padding-right:15px;' class='delete' title="Delete" data-id="{{$r->id}}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $calendar->appends(request()->query())->links() }}
                </div>
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
    $('.calender-datatable').DataTable({
        paging: false
    });
</script>
@endsection
