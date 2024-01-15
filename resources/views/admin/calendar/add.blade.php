@extends('admin.layout.main')
@section('title')Admin - Post @endsection
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('breadcrumb')
@php
    $lasst = \App\Models\Calendar::first();
    // dd($lasst);
@endphp
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Calendar</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Calendar Event</li>
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
                <div class="page-title mb-4" style="color: #236cba;font-size:18px;">
                    <h3>Add Event on Calendar</h3>
                </div>
                <form action="{{route('calendar.save')}}" method="post" id="" class="mb-5" style=" font-family: 'Noto Sans', sans-serif;">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Select Date* </label>
                            <input type="date" name="date" id="date" class="form-control" value="{{$date}}" required>
                            <input type="hidden" name='id' value="{{$id}}">
                            <input type="hidden" name='pageType' value="add">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">तारीख* </label>
                            <input type="text" name="eventDateHindi" id="eventDateHindi" class="form-control" value="{{$eventDateHindi}}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">दिन* </label>
                            <input type="text" name="eventDayHindi" id="eventDayHindi" class="form-control" value="{{$eventDayHindi}}" required>
                        </div>
                        <div class="alert-primary" style="color: #236cba; background-color:#fff;border:none;">
                            <h5 class="text-left">जैन Month Details</h5>
                            <h6 class="text-left month-alert" style="color: #49d949; font-size: 13px;margin-bottom:20px;"> </h6>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname"> जैन Month Name* </label>
                                <input type="text" class="form-control" id="jain_month" name="jain_month" value="{{$jain_year->jain_month}}" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" style="color:#fff;">Update Year* </label>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname"> Select जैन Month Number* </label>
                                <select class="form-control" id="jain_month_no" name="jain_month_no" required style=" font-family: 'Noto Sans', sans-serif;">
                                    <option value="">Select</option>
                                    @for($i=0;$i<count($hindi_num);$i++) <option value="{{$hindi_num[$i]}}" style=" font-family: 'Noto Sans', sans-serif;" {{(isset($cal->jain_month_no)==$hindi_num[$i])?'selected':''}}>{{$hindi_num[$i]}}</option>
                                        @endfor

                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">शुभ विचार* </label>
                            <input type="text" name="thought" id="thought" class="form-control" value="{{isset($cal->thought)?$cal->thought :' '}}" required>
                        </div>
                        <div class="alert-primary" style="color: #236cba; background-color:#fff;border:none;">
                            <h5 class="text-left">संवत Details <i class="fa fa-edit"> </i> </h5>
                            <h6 class="text-left year-alert" style="color: #49d949; font-size: 13px;"> </h6>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">वीर संवत * </label>
                            <input type="text" name="veer_sanwat" id="veer_sanwat" class="form-control" value="{{$jain_year['veer_sanwat']}}" required>
                        </div>
                        <div class="col-md-3" style=" font-family: 'Noto Sans', sans-serif;">
                            <label class="form-label">खरतर संवत* </label>
                            <input type="text" name="khartar_sanwat" id="khartar_sanwat" class="form-control" value="{{$jain_year['khartar_sanwat']}}" required>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">विक्रम संवत* </label>
                            <input type="text" name="vikram_sanwat" id="vikram_sanwat" class="form-control" value="{{$jain_year['vikram_sanwat']}}" required>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">ईस्वी सन* </label>
                            <input type="text" name="isavi_sanwat" id="isavi_sanwat" class="form-control" value="{{$jain_year['isavi_sanwat']}}" required>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label" style="color:#fff;">Update Year* </label>

                        </div>
                        <div class="alert-primary" style="color: #236cba; background-color:#fff;border:none;">
                            <h5 class="text-left">दिन के शुभ समय </h5>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">शुभ* </label>
                            <input type="text" name="shubh_day_time" id="shubh_day_time" class="form-control" value="@if(isset($cal->shubh_day_time)){{isset($cal->shubh_day_time)?$cal->shubh_day_time :' '}}@else {{$lasst->shubh_day_time}} @endif" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">चंचल* </label>
                            <input type="text" name="chanchal_day_time" id="chanchal_day_time" class="form-control" value="@if(isset($cal->chanchal_day_time)){{isset($cal->chanchal_day_time)?$cal->chanchal_day_time:' '}}@else {{$lasst->chanchal_day_time}} @endif" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">लाभ* </label>
                            <input type="text" name="laabh_day_time" id="laabh_day_time" class="form-control" value="@if(isset($cal->laabh_day_time)){{isset($cal->laabh_day_time)?$cal->laabh_day_time :' '}}@else {{$lasst->laabh_day_time}} @endif" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">अमृत* </label>
                            <input type="text" name="amrit_day_time" id="amrit_day_time" class="form-control" value="@if(isset($cal->amrit_day_time)){{isset($cal->amrit_day_time)?$cal->amrit_day_time :' '}}@else {{$lasst->amrit_day_time}} @endif" required>
                        </div>
                        <div class="alert-primary" style="color: #236cba; background-color:#fff;border:none;">
                            <h5 class="text-left">रात्रि के शुभ समय</h5>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">शुभ* </label>
                            <input type="text" name="shubh_night_time" id="shubh_night_time" class="form-control" value="@if(isset($cal->shubh_night_time)){{isset($cal->shubh_night_time)?$cal->shubh_night_time :' '}}@else {{$lasst->shubh_night_time}} @endif" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">चंचल* </label>
                            <input type="text" name="chanchal_night_time" id="chanchal_night_time" class="form-control" value="@if(isset($cal->chanchal_night_time)){{isset($cal->chanchal_night_time)?$cal->chanchal_night_time :' '}}@else {{$lasst->chanchal_night_time}} @endif" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">लाभ* </label>
                            <input type="text" name="laabh_night_time" id="laabh_night_time" class="form-control" value="@if(isset($cal->laabh_night_time)){{isset($cal->laabh_night_time)?$cal->laabh_night_time :' '}}@else {{$lasst->laabh_night_time}} @endif" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">अमृत* </label>
                            <input type="text" name="amrit_night_time" id="amrit_night_time" class="form-control" value="@if(isset($cal->amrit_night_time)){{isset($cal->amrit_night_time)?$cal->amrit_night_time :' '}}@else {{$lasst->amrit_night_time}} @endif" required>
                        </div>

                        <div class="alert-primary" style="color: #236cba; background-color:#fff;border:none;display:inherit;">
                            <h5 class="text-left">Add सूर्योदय & सूर्यास्त Time of City</h5>


                        </div>
                        <div class="text-left sunrise-alert" style="color: #49d949; font-size: 13px;margin-bottom:30px;"> </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="firstname"> City </label>
                                <input type="text" class="form-control" id="city_1" value="{{$jain_year->city_1 }}" name="city_1">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="firstname"> सूर्योदय </label>
                                <input type="text" class="form-control" id="sunrise_1" value="{{$jain_year->sunrise_1}}" name="sunrise_1">
                            </div>
                        </div>
                        <div class="col-md-2" style="border-right: 1px solid #ccc;">
                            <div class="form-group">
                                <label for="firstname"> सूर्यास्त </label>
                                <input type="text" class="form-control" id="sunset_1" value="{{$jain_year->sunset_1}}" name="sunset_1">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="firstname"> City </label>
                                <input type="text" class="form-control" id="city_2" value="{{$jain_year->city_2}}" name="city_2">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="firstname"> सूर्योदय </label>
                                <input type="text" class="form-control" id="sunrise_2" value="{{$jain_year->sunrise_2}}" name="sunrise_2">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="firstname"> सूर्यास्त </label>
                                <input type="text" class="form-control" id="sunset_2" value="{{$jain_year->sunset_2}}" name="sunset_2">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="firstname"> City </label>
                                <input type="text" class="form-control" id="city_3" value="{{$jain_year->city_3}}" name="city_3">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="firstname"> सूर्योदय </label>
                                <input type="text" class="form-control" id="sunrise_3" value="{{$jain_year->sunrise_3}}" name="sunrise_3">
                            </div>
                        </div>
                        <div class="col-md-2" style="border-right: 1px solid #ccc;">
                            <div class="form-group">
                                <label for="firstname"> सूर्यास्त </label>
                                <input type="text" class="form-control" id="sunset_3" value="{{$jain_year->sunset_3}}" name="sunset_3">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="firstname"> City </label>
                                <input type="text" class="form-control" id="city_4" value="{{$jain_year->city_4}}" name="city_4">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="firstname"> सूर्योदय </label>
                                <input type="text" class="form-control" id="sunrise_4" value="{{$jain_year->sunrise_4}}" name="sunrise_4">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="firstname"> सूर्यास्त </label>
                                <input type="text" class="form-control" id="sunset_4" value="{{$jain_year->sunset_4}}" name="sunset_4">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="firstname"> City </label>
                                <input type="text" class="form-control" id="city_5" value="{{$jain_year->city_5 }}" name="city_5">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="firstname"> सूर्योदय </label>
                                <input type="text" class="form-control" id="sunrise_5" value="{{$jain_year->sunrise_5 }}" name="sunrise_5">
                            </div>
                        </div>
                        <div class="col-md-2" style="border-right: 1px solid #ccc;">
                            <div class="form-group">
                                <label for="firstname"> सूर्यास्त </label>
                                <input type="text" class="form-control" id="sunset_5" value="{{$jain_year->sunset_5 }}" name="sunset_5">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="firstname"> City </label>
                                <input type="text" class="form-control" id="city_6" value="{{$jain_year->city_6}}" name="city_6">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="firstname"> सूर्योदय </label>
                                <input type="text" class="form-control" id="sunrise_6" value="{{$jain_year->sunrise_6}}" name="sunrise_6">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="firstname"> सूर्यास्त </label>
                                <input type="text" class="form-control" id="sunset_6" value="{{$jain_year->sunset_6}}" name="sunset_6">
                            </div>
                        </div>

                        <div class="col-md-12 mt-5" style="text-align: center;">
                            <button class="btn btn-success" style="margin-top:10px;" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@extends('admin.calendar.add-jain-year')


@endsection
@section('scripts')
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

@endsection
