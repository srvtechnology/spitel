@extends('master-merchant')
@section('content')

<div class="main-heading-container">
    <div class="common-title">Promo Code</div>
    <a href="{{ url('/merchant/promo-code/list') }}" class="btn btn-primary w-170">Back</a>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">Detail Promo Code</div>
            </div>
            <div class="card-common-body">
                {{-- detail Start --}}
                <div class="row">
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">Order ID</div>
                        <div class="label-txt">01</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">Promo Title</div>
                        <div class="label-txt">Promo Title</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">Promo Code</div>
                        <div class="label-txt">Promo Code</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">Status</div>
                        <div class="label-txt">active</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">Discount value</div>
                        <div class="label-txt">value</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">Discount value For</div>
                        <div class="label-txt">All Product</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">Discount type</div>
                        <div class="label-txt">Type</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">Valid Form </div>
                        <div class="label-txt">Valid Form </div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">Valid to </div>
                        <div class="label-txt">Valid to </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection