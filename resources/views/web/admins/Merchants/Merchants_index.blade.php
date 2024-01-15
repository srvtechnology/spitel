@extends('master')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Merchant') }}</div>
</div>
<div class="row mb-4 total-sale-wraper total-many-wrapper ordersAll">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon1.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.Total') }} {{ __('messages.Merchant') }}</div>
                <div class="total-info-card-number">75</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon2.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.Active') }} {{ __('messages.Merchant') }}</div>
                <div class="total-info-card-number">20</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon3.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.Inactive') }} {{ __('messages.Merchant') }}</div>
                <div class="total-info-card-number">02</div>
            </div>
        </div>
    </div>
</div>

<div class="row my-2">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.type_of_business') }}</div>
            </div>
            <div class="card-common-body">
                <div class="card-table-responsive">
                    <table class="customers table tableCommon table-striped table-single-line">
                        <thead>
                            <tr>
                                <th>{{ __('messages.Type') }}</th>
                                <th>{{ __('messages.Count') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tbl-id">{{ __('messages.Buffet') }}</td>
                                <td class="tbl-id">15</td>
                            </tr>
                            <tr>
                                <td class="tbl-id">{{ __('messages.Bakery') }}</td>
                                <td class="tbl-id">5</td>
                            </tr>
                            <tr>
                                <td class="tbl-id">{{ __('messages.Grill') }}</td>
                                <td class="tbl-id">15</td>
                            </tr>
                            <tr>
                                <td class="tbl-id">{{ __('messages.Buffet') }}</td>
                                <td class="tbl-id">5</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('messages.Type') }}</th>
                                <th>{{ __('messages.Count') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row my-2">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.All') }} {{ __('messages.Merchants') }}</div>
            </div>
            <div class="card-common-body">
                <div class="row">
                    <div class="col-sm-12 lengthFilterCol">

                        <div class="searchFilter">
                            <i class="fa-regular fa-sliders"></i>
                        </div>
                    </div>
                </div>
                <div class="row no-margin filter-trigger">
                    <div class="col-md-12">
                        <div class="filters-table-wrapper">
                            <div class="filter-heading">{{ __('messages.Search_Filters') }}</div>
                            <div class="filters-table">
                                <div class="main-filters">
                                    <input type="text" class="form-control form-control-filters" placeholder="{{ __('messages.City') }}">
                                    <input type="text" class="form-control form-control-filters" placeholder="{{ __('messages.Mobile_Number') }}">
                                    <input type="text" class="form-control form-control-filters" placeholder="{{ __('messages.Name') }}">
                                    <select class="form-control form-control-filters" name="country">
                                        <option value="" selected>{{ __('messages.Select_Status') }}</option>
                                        <option value="Active">{{ __('messages.Active') }}</option>
                                        <option value="France">{{ __('messages.Inactive') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="filters-control gradient">
                                <a href="#!" class="btn btn-transparent clear-filter">{{ __('messages.Clear_Filter') }}</a>
                                <button type="submit" href="#!" class="btn btn-primary">{{ __('messages.Search') }}</button>
                                <a href="#!" class="btn  btn-transparent btn-tra hide-filter">{{ __('messages.Hide_Filter') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-table-responsive">
                    <table id="customers" class="table tableCommon table-striped table-single-line">
                        <thead>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Name') }}</th>
                                <th>{{ __('messages.City') }}</th>
                                <th>{{ __('messages.Mobile_Number') }}</th>
                                <th>{{ __('messages.Email') }}</th>
                                <th>{{ __('messages.Referred_By') }}</th>
                                <th>{{ __('messages.Status') }}</th>
                                <th>{{ __('messages.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tbl-id">
                                    01
                                </td>
                                <td class="tbl-id">
                                    Name
                                </td>
                                <td>
                                    <span class="tbl-name">city</span>
                                </td>
                                <td>
                                    02365553655
                                </td>
                                <td>
                                    abc@gmail.com
                                </td>
                                <td>
                                    <a class="primaryLink" href="#!" target="_blank">  
                                        hamza
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group dropdown-menu-action-active-group">
                                        <div class="status-common status-green dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="status-dot">{{ __('messages.Active') }}</span>
                                        </div>
                                        <ul class="dropdown-menu dropdown-menu-action dropdown-menu-action-active">
                                            <li><a class="dropdown-item" href="#!">{{ __('messages.Active') }}</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#!">{{ __('messages.Inactive') }}</a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <div class="actions-col">
                                        <a class="actionIcon" href="{{ url('/admin/Merchants-detail') }}">
                                            <span>{{ __('messages.View') }} {{ __('messages.Detail') }}</span>
                                            <i class="fa-solid fa-eye textOrange"></i>
                                        </a>
                                        <a class="actionIcon" href="#myModal" class="trigger-btn" data-toggle="modal">
                                            <span>{{ __('messages.Merchant') }} {{ __('messages.Delete') }}</span>
                                            <i class="fa-solid fa-trash-can textRed"> </i>
                                        </a>
                                        <div class="btn-group">
                                            <div class="top-bar-avatar dropdown-toggle drop-bar-actions actionIcon" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span>{{ __('messages.More') }} {{ __('messages.option') }}</span>
                                                <i class="fa-solid fa-ellipsis-vertical textayDarkGrey"></i>
                                            </div>
                                            <ul class="dropdown-menu dropdown-menu-action">
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/admin/menu-item/list') }}">
                                                       {{ __('messages.View') }} {{ __('messages.Merchant') }} {{ __('messages.Menu') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/admin/discount/list') }}">
                                                        {{ __('messages.View') }} {{ __('messages.Merchant') }} {{ __('messages.Discounts') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/admin/staff/list') }}">
                                                        {{ __('messages.View') }} {{ __('messages.Merchant') }} {{ __('messages.Staff') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#myModalcommission" class="trigger-btn" data-toggle="modal">
                                                        {{ __('messages.Merchant') }} {{ __('messages.Commission') }} {{ __('messages.Setting') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/admin/Merchants-order-history') }}">
                                                        {{ __('messages.View_Order_History') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/admin/history-collection') }}">
                                                        {{ __('messages.View_fee_History') }}
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tbl-id">
                                    01
                                </td>
                                <td class="tbl-id">
                                    Name
                                </td>
                                <td>
                                    <span class="tbl-name">city</span>
                                </td>
                                <td>
                                    02365553655
                                </td>
                                <td>
                                    abc@gmail.com
                                </td>
                                <td>
                                    <a class="primaryLink" href="#!" target="_blank">  
                                        hamza
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group dropdown-menu-action-active-group">
                                        <div class="status-common status-red dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="status-dot">{{ __('messages.Inactive') }}</span>
                                        </div>
                                        <ul class="dropdown-menu dropdown-menu-action dropdown-menu-action-active">
                                            <li><a class="dropdown-item" href="#!">{{ __('messages.Active') }}</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#!">{{ __('messages.Inactive') }}</a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <div class="actions-col">
                                        <a class="actionIcon" href="{{ url('/admin/Merchants-detail') }}">
                                            <span>{{ __('messages.View') }} {{ __('messages.Detail') }}</span>
                                            <i class="fa-solid fa-eye textOrange"></i>
                                        </a>
                                        <a class="actionIcon" href="#myModal" class="trigger-btn" data-toggle="modal">
                                            <span>{{ __('messages.Merchant') }} {{ __('messages.Delete') }}</span>
                                            <i class="fa-solid fa-trash-can textRed"> </i>
                                        </a>
                                        <div class="btn-group">
                                            <div class="top-bar-avatar dropdown-toggle drop-bar-actions actionIcon" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span> {{ __('messages.More') }} {{ __('messages.option') }}</span>
                                                <i class="fa-solid fa-ellipsis-vertical textayDarkGrey"></i>
                                            </div>
                                            <ul class="dropdown-menu dropdown-menu-action">
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/admin/menu-item/list') }}">
                                                        {{ __('messages.View') }} {{ __('messages.Merchant') }} {{ __('messages.Menu') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/admin/discount/list') }}">
                                                        {{ __('messages.View') }} {{ __('messages.Merchant') }} {{ __('messages.Discounts') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/admin/staff/list') }}">
                                                        {{ __('messages.View') }} {{ __('messages.Merchant') }} {{ __('messages.Staff') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#myModalcommission" class="trigger-btn" data-toggle="modal">
                                                        {{ __('messages.Merchant') }} {{ __('messages.Commission') }} {{ __('messages.Settings') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/admin/Merchants-order-history') }}">
                                                        {{ __('messages.View_Order_History') }}
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Name') }}</th>
                                <th>{{ __('messages.City') }}</th>
                                <th>{{ __('messages.Mobile_Number') }}</th>
                                <th>{{ __('messages.Email') }}</th>
                                <th>{{ __('messages.Referred_By') }}</th>
                                <th>{{ __('messages.Status') }}</th>
                                <th>{{ __('messages.Actions') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal delete HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="fa-solid fa-trash-can textRed"> </i>
                </div>
                <h4 class="modal-title w-100">{{ __('messages.Are_you_sure') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>{{ __('messages.Do_you_really') }}</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('messages.Cancel') }}</button>
                <button type="button" class="btn btn-danger">{{ __('messages.Delete') }}</button>
                <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalsuccess">Success</button> -->
            </div>
        </div>
    </div>
</div>

<!-- model success  -->

<!-- <div class="modal fade" id="myModalsuccess" role="dialog">
    <div class="modal-dialog">
        <div class="card">
            <div class="card-img">
                <img src="{{ asset('assets/admin/images/success.svg') }}">
            </div>
            <div class="card-title">
                <p>Success!</p>
            </div>
            <div class="card-text">
                <p>Yay! It's a nice order! <br>It will arrive soon.</p>
            </div> <button class="btn">Successfully</button>
        </div>
    </div>
</div> -->

<!-- Model commission -->
<div class="modal fade" id="myModalcommission" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
        <form action="" method="POST" name="rechargeWallet">

            <div class="modal-content">
                <div class="card-topbar-inner">
                    <div class="card-topbar-title"> {{ __('messages.Commission_Setting') }}</div>
                    <button type="button" class="commission-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 form-group update_amount">
                            <label>{{ __('messages.Commission_Per_Booking') }}</label>
                            <!-- <input type="hidden" name="customer_id" id="customer_id"> -->
                            <input type="text" name="recharge_amount" id="recharge_amount" class="form-control" placeholder="{{ __('messages.Commission_Per_Booking') }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">{{ __('messages.Cancel') }}</button>
                    <button type="submit" class="btn btn-primary"> {{ __('messages.Update') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection