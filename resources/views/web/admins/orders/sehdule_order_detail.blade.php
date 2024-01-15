@extends('master')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Scheduled') }} {{ __('messages.Orders') }}</div>
    <a href="{{ url('/admin/sehdule-orders/list') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Scheduled') }} {{ __('messages.Orders') }} {{ __('messages.Detail') }}</div>
            </div>
            <div class="card-common-body">
                {{-- detail Start --}}
                <div class="row">
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Order_ID') }}</div>
                        <div class="label-txt">01</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading"> {{ __('messages.Customer_Name') }}</div>
                        <div class="label-txt">Contact Name</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Customer_Number') }}</div>
                            <div class="label-txt">Number</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Order_placed_Date_Time') }}</div>
                            <div class="label-txt">25/06/2023 | 01:45 am</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Order_Takeway_Date_Time') }}</div>
                            <div class="label-txt">25/06/2023 | 01:45 am</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Order_Type') }}</div>
                            <div class="label-txt">type</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Total_Amount') }}</div>
                            <div class="label-txt">31254</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Status') }}</div>
                            <div class="label-txt">
                                <div class="status-common status-green">
                                    <span class="status-dot">{{ __('messages.Complete') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Customer_Notes') }}</div>
                            <div class="label-txt">Customer Notes</div>
                        </div>
                    </div>
                    {{-- detail end --}}

                    <div class="row">
                        <div class="col-12">
                            <hr class="form-hr mt-4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-12">
                                <div class="label-common-heading mb-0">{{ __('messages.Ordered_Items') }}</div>
                            </div>
                        </div>
                        <table id="orders" class="table tableCommon table-striped table-single-line mb-4">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.Item_Image') }}</th>
                                    <th>{{ __('messages.Item_Name') }}</th>
                                    <th>{{ __('messages.Item_Quantity') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img class="productImg" src="{{ asset('assets/admin/images/food-img-1.png') }}"></td>
                                    <td>
                                        Item Name
                                    </td>
                                    <td>
                                        Item Quantity
                                    </td>
                                </tr>
                                <tr>
                                    <td><img class="productImg" src="{{ asset('assets/admin/images/food-img-1.png') }}"></td>
                                    <td>
                                        Item Name
                                    </td>
                                    <td>
                                        Item Quantity
                                    </td>
                                </tr>
                                <tr>
                                    <td><img class="productImg" src="{{ asset('assets/admin/images/food-img-1.png') }}"></td>
                                    <td>
                                        Item Name
                                    </td>
                                    <td>
                                        Item Quantity
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('messages.Item_Image') }}</th>
                                    <th>{{ __('messages.Item_Name') }}</th>
                                    <th>{{ __('messages.Item_Quantity') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <hr class="form-hr mt-4">
                        </div>
                    </div>
                    {{-- Billing section --}}

                    <div class="row">
                        <div class="row">
                            <div class="col-12">
                                <div class="label-common-heading">{{ __('messages.Billing_Details') }}</div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Order_Cost') }}</div>
                            <div class="label-txt">6456</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Platform_Fee') }}</div>
                            <div class="label-txt">456</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading"> {{ __('messages.Total_Amount_cost_discount') }}</div>
                            <div class="label-txt">45645</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Discount') }}</div>
                            <div class="label-txt">456</div>
                        </div>

                    </div>
                    {{-- billing section end --}}

                    <div class="row">
                        <div class="col-12">
                            <hr class="form-hr mt-4">
                        </div>
                    </div>

                    <!-- Section: Timeline -->
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading"> {{ __('messages.Order_Tracking_Timeline') }}</div>
                        <div class="main-timeline-5 mt-3 ps-2">
                            <div class="timeline-5 right-5">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="timelineHeading">{{ __('messages.Order_is_placed') }}</div>
                                        <span class="timelineDate">
                                            <i class="fas fa-clock me-1"></i>
                                            2023-03-05 | 12:15 am
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-5 right-5">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="timelineHeading">{{ __('messages.Merchant_order_is_Accepted') }}</div>
                                        <span class="timelineDate">
                                            <i class="fas fa-clock me-1"></i>
                                            2023-03-05 | 12:15 am
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-5 right-5">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="timelineHeading">{{ __('messages.Order_is_being_prepaired') }}</div>
                                        <span class="timelineDate">
                                            <i class="fas fa-clock me-1"></i>
                                            2023-03-05 | 12:15 am
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-5 right-5">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="timelineHeading">{{ __('messages.Order_is_ready_or_pickup') }} </div>
                                        <span class="timelineDate">
                                            <i class="fas fa-clock me-1"></i>
                                            2023-03-05 | 12:15 am
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-5 right-5">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="timelineHeading">{{ __('messages.Customer_arrived_for_pickup') }}</div>
                                        <span class="timelineDate">
                                            <i class="fas fa-clock me-1"></i>
                                            2023-03-05 | 12:15 am
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-5 right-5">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="timelineHeading">{{ __('messages.Order_is_picked') }}</div>
                                        <span class="timelineDate">
                                            <i class="fas fa-clock me-1"></i>
                                            2023-03-05 | 12:15 am
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-5 right-5">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="timelineHeading">{{ __('messages.Customer_completed_order') }}</div>
                                        <span class="timelineDate">
                                            <i class="fas fa-clock me-1"></i>
                                            2023-03-05 | 12:15 am
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection