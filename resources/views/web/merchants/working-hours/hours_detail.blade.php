@extends('master-merchant')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Working_Hours') }}</div>
    <a href="{{ url('/merchant/hours-list') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>

<form action="" method="POST" enctype="multipart/form-data">

    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card-common">
                <div class="card-topbar-inner">
                    <div class="card-topbar-title">{{ __('messages.Working_Hours') }} {{ __('messages.Detail') }}</div>
                </div>
                <div class="card-common-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.ID') }}</div>
                            <div class="label-txt">01</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Shift') }}</div>
                            <div class="label-txt">Morning</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Opening_Time') }}</div>
                            <div class="label-txt">9:00 am</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Closing_Time') }}</div>
                            <div class="label-txt">6:00 pm</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Status') }} </div>
                            <div class="label-txt">Active</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection