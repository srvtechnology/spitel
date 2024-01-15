@extends('master-merchant')
@section('content')
    <div class="main-heading-container">
        <div class="common-title">{{ __('messages.Today') }} {{ __('messages.Orders') }}</div>
    </div>

    <div class="row mb-4 total-sale-wraper total-many-wrapper ordersAll">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon1.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Today') }} {{ __('messages.Orders') }}</div>
                    <div class="total-info-card-number">75</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon2.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Completed') }}</div>
                    <div class="total-info-card-number">20</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon3.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Cancelled') }}</div>
                    <div class="total-info-card-number">02</div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon3.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Earning') }} </div>
                    <div class="total-info-card-number">02</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon3.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Fee') }} </div>
                    <div class="total-info-card-number">02</div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-heading-container">
        <div class="common-title">{{ __('messages.Orders') }}</div>
        <div class="col-md-4 form-group posRel">
            <label>{{ __('messages.From_Date') }}</label>
            <input type="text" class="form-control" id="input_from" name="valid_till"
                placeholder="{{ __('messages.From_Date') }}">
        </div>
        <div class="col-md-4 form-group posRel">
            <label>{{ __('messages.Till_date') }}</label>
            <input type="text" class="form-control" id="input_to" name="valid_till"
                placeholder="{{ __('messages.Till_date') }}">
        </div>
    </div>

    <div class="row mb-4 total-sale-wraper total-many-wrapper ordersAll">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon3.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Total') }} {{ __('messages.Number') }}</div>
                    <div class="total-info-card-number">02</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon2.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Completed') }}</div>
                    <div class="total-info-card-number">20</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon3.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Cancelled') }}</div>
                    <div class="total-info-card-number">02</div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon3.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Earning') }} </div>
                    <div class="total-info-card-number">02</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon3.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Fee') }} </div>
                    <div class="total-info-card-number">02</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @if (Session::has('message'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        </script>
    @endif
@endsection
