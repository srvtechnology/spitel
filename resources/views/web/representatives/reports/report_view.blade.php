@extends('master-representative')
@section('content')

<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Merchant') }}</div>
    <a href="{{ url('/representative/order-sales-report/list') }}" type="submit" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Merchant') }} {{ __('messages.Detail') }}</div>
            </div>
            <div class="card-common-body">
                <div class="row">
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Name') }}</div>
                        <div class="label-txt"> Name</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Type') }}</div>
                        <div class="label-txt"> Any type</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.City') }}</div>
                        <div class="label-txt">gujranwala</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Neighborhood') }}</div>
                        <div class="label-txt">0321*****55</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Start_date') }}</div>
                        <div class="label-txt">02/05/2022</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Date_to_collect') }}</div>
                        <div class="label-txt">02/05/2022</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Fee') }}</div>
                        <div class="label-txt">Fee</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.percentag_of_merchant') }}</div>
                        <div class="label-txt">25%</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.No_Orders') }}</div>
                        <div class="label-txt">orders</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Total_fee_collection') }}</div>
                        <div class="label-txt">10</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Not_Collected') }}</div>
                        <div class="label-txt">10</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr class="form-hr mt-0">
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-12">
                            <div class="label-common-heading"> {{ __('messages.Contact_person') }}</div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Name') }}</div>
                        <div class="label-txt">Name</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Mobile_Number') }}</div>
                        <div class="label-txt">0321-4569855</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Email') }}</div>
                        <div class="label-txt">example@gmail.com</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr class="form-hr mt-0">
                    </div>
                </div>
                <div class="row">
                        <div class="col-12">
                            <div class="label-common-heading mb-0">{{ __('messages.Total_orders_period') }}</div>
                        </div>
                    <table id="pickupAddress" class="table tableCommon table-striped table-single-line mb-4">
                        <thead>
                            <tr>
                                <th>{{ __('messages.Period') }}</th>
                                <th>{{ __('messages.Orders') }}</th>
                                <th>{{ __('messages.Fee_to_collect') }}</th>
                                <th>{{ __('messages.Fee_not_collect') }}</th>
                                <th>{{ __('messages.rest') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tbl-id">02/10/2022 - 02/11/2023</td>
                                <td class="tbl-id">order</td>
                                <td class="tbl-id">fee collected</td>
                                <td>
                                    Not collected
                                </td>
                                <td>
                                    Rest collected
                                </td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('messages.Period') }}</th>
                                <th>{{ __('messages.Orders') }}</th>
                                <th>{{ __('messages.Fee_to_collect') }}</th>
                                <th>{{ __('messages.Fee_not_collect') }}</th>
                                <th>{{ __('messages.rest') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection