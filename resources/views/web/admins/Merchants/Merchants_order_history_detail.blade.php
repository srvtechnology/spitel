@extends('master')
@section('content')

    <div class="main-heading-container">
        <div class="common-title">{{ __('messages.Merchant') }} {{ __('messages.Order_History') }}</div>
        <a href="{{ url('/admin/Merchants-order-history') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
    </div>
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card-common">
                <div class="card-topbar-inner">
                    <div class="card-topbar-title">{{ __('messages.Merchant') }} {{ __('messages.Order_History') }} {{ __('messages.Detail') }}</div>
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
                            <div class="label-txt"><a class="primaryLink" href="#!" target="_blank">Customer Name</a></div>
                        </div>
                        <!-- <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">Merchant Name {{ __('messages.Merchant') }}</div>
                            <div class="label-txt"><a class="primaryLink" href="#!" target="_blank">Merchant Name</a></div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">Provider Name {{ __('messages.Merchant') }}</div>
                            <div class="label-txt"><a class="primaryLink" href="#!" target="_blank">Provider Name</a></div>
                        </div> -->
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading"> {{ __('messages.Order_placed_Date_Time') }}</div>
                            <div class="label-txt">25/06/2023 | 01:45 am</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading"> {{ __('messages.Order_Takeway_Date_Time') }}</div>
                            <div class="label-txt">25/06/2023 | 01:45 am</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading"> {{ __('messages.Order_Type') }}</div>
                            <div class="label-txt">type</div>
                        </div>
                       <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading"> {{ __('messages.Total_Amount') }}</div>
                            <div class="label-txt">31254</div>
                        </div>
                        <!-- <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">Payment Method</div>
                            <div class="label-txt">Payment Method</div>
                        </div> -->
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
                        
                        
                        <div class="row">
                            <div class="row">
                                <div class="col-12">
                                    <div class="label-common-heading mb-0">{{ __('messages.Pickup_Address') }}</div>
                                </div>
                            </div>
                            <table id="pickupAddress" class="table tableCommon table-striped table-single-line mb-4">
                                <thead>
                                    <tr>
                                        <th>{{ __('messages.Name') }}</th>
                                        <th>{{ __('messages.Mobile_Number') }}</th>
                                        <th>{{ __('messages.Locations') }}</th>
                                        <th>{{ __('messages.Map_Pin') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="tbl-id">Name</td>
                                        <td class="tbl-id">54874564</td>
                                        <td>
                                            Address
                                        </td>
                                        <td>
                                            <div class="actions-col">
                                                <a class="actionIcon" href="#">
                                                    <span>{{ __('messages.Map') }}</span>
                                                    <i class="fa-solid fa-map-location-dot textRed"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>{{ __('messages.Name') }}</th>
                                        <th>{{ __('messages.Mobile_Number') }}</th>
                                        <th>{{ __('messages.Locations') }}</th>
                                        <th>{{ __('messages.Map_Pin') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row">
                            <div class="row">
                                <div class="col-12">
                                    <div class="label-common-heading mb-0">{{ __('messages.Delivery_Address') }}</div>
                                </div>
                            </div>
                            <table id="deliveryAddress" class="table tableCommon table-striped table-single-line mb-4">
                                <thead>
                                    <tr>
                                        <th>{{ __('messages.Name') }}</th>
                                        <th>{{ __('messages.Mobile_Number') }}</th>
                                        <th>{{ __('messages.Locations') }}</th>
                                        <th>{{ __('messages.Map_Pin') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="tbl-id">Name</td>
                                        <td class="tbl-id">54874564</td>
                                        <td>
                                            Address
                                        </td>
                                        <td>
                                            <div class="actions-col">
                                                <a class="actionIcon" href="#">
                                                    <span>{{ __('messages.Map') }}</span>
                                                    <i class="fa-solid fa-map-location-dot textRed"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>{{ __('messages.Name') }}</th>
                                        <th>{{ __('messages.Mobile_Number') }}</th>
                                        <th>{{ __('messages.Locations') }}</th>
                                        <th>{{ __('messages.Map_Pin') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="col-12">
                            <hr class="form-hr mt-4">
                        </div>
                        <!-- Section: Timeline -->
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Order_Tracking_Timeline') }}</div>
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
                                            <div class="timelineHeading">{{ __('messages.Merchant_preparing_order') }}</div>
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
                                            <div class="timelineHeading">{{ __('messages.Provider_gone_pickup') }}</div>
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
                                            <div class="timelineHeading">{{ __('messages.Merchant_completed_order_preparation') }}</div>
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
                                            <div class="timelineHeading">{{ __('messages.Provider_reached_pickup') }}</div>
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
                                            <div class="timelineHeading">{{ __('messages.Provider_left_delivery_after_pickup') }}</div>
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
                                            <div class="timelineHeading">{{ __('messages.Provider_reached_location_delivery') }}</div>
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
                                            <div class="timelineHeading">{{ __('messages.Provider_delivered_order') }}</div>
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
                    {{-- detail end --}}

                    <div class="row">
                        <div class="col-12">
                            <hr class="form-hr mt-4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-12">
                                <div class="label-common-heading mb-0">{{ __('messages.Payment_Methods') }}</div>
                            </div>
                        </div>
                        <table id="paymentMethod" class="table tableCommon table-striped table-single-line mb-4">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.Card_Logo') }}</th>
                                    <th>{{ __('messages.Card_Number') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img class="productImg" src="{{ asset('assets/admin/images/food-img-1.png') }}"></td>
                                    <td>
                                        XXXX-XXXX-XXXX-1234
                                    </td>
                                </tr>
                                

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('messages.Card_Logo') }}</th>
                                    <th>{{ __('messages.Card_Number') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

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
                    {{--   Billing section --}}

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
                            <div class="label-heading">{{ __('messages.Provider_Fee') }}</div>
                            <div class="label-txt">456456</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Subtotal_Order_Provider_Amount') }}</div>
                            <div class="label-txt">45645</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Platform_Fee') }}</div>
                            <div class="label-txt">456</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Total_Amount_Subtotal') }}</div>
                            <div class="label-txt">45645</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Discount') }}</div>
                            <div class="label-txt">456</div>
                        </div>
                        
                    </div>
                    {{-- billing section end --}}
                    
                    


                </div>  
            </div>
        </div>
    </div>
        
    
@endsection
