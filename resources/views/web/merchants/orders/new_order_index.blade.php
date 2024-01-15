@extends('master-merchant')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.New') }} {{ __('messages.Orders') }}</div>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.All') }} {{ __('messages.New') }} {{ __('messages.Orders') }}</div>
            </div>
            <div class="card-common-body">
                <div class="row">
                    <div class="col-sm-12 lengthFilterCol">

                        <div class="searchFilter">
                            <i class="fa-regular fa-sliders"></i>
                        </div>
                    </div>
                </div>
                <div class="row no-margin filter-trigger" style="display: block;">
                    <div class="col-md-12">
                        <div class="filters-table-wrapper">
                            <div class="filter-heading">{{ __('messages.Search_Filters') }}</div>
                            <div class="filters-table">
                                <div class="main-filters">
                                    <input type="text" class="form-control form-control-filters" placeholder="{{ __('messages.ID') }}">
                                    <input type="text" class="form-control form-control-filters" placeholder="{{ __('messages.Customer') }} {{ __('messages.Name') }}">
                                    <select class="form-control form-control-filters" name="country">
                                        <option value="" selected hidden disabled> {{ __('messages.Select_Status') }}</option>
                                        <option value="Active"> {{ __('messages.Active') }}</option>
                                        <option value="France"> {{ __('messages.Inactive') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="filters-control">
                                <a href="#!" class="btn btn-transparent clear-filter">{{ __('messages.Clear_Filter') }}</a>
                                <button type="submit" href="#!" class="btn btn-primary">{{ __('messages.Search') }}</button>
                                <a href="#!" class="btn  btn-transparent btn-tra hide-filter"> {{ __('messages.Hide_Filter') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-table-responsive">
                    <table id="customers" class="table tableCommon table-striped table-single-line">
                        <thead>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Customer') }}</th>
                                <th>{{ __('messages.Order_Type') }}</th>
                                <th>{{ __('messages.Order_placed_Date_Time') }}</th>
                                <th>{{ __('messages.Order_Takeway_Date_Time') }}</th>
                                <th>{{ __('messages.Status') }}</th>
                                <th>{{ __('messages.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="tbl-id">01</td>
                                <td>
                                    <a class="primaryLink" href="#!" target="_blank">Customer</a>
                                </td>
                                <td>
                                    0321-6540255
                                </td>
                                <td>Type</td>
                                <td>Payment Method</td>
                                <td>
                                    <div class="btn-group dropdown-menu-action-active-group">
                                        <div class="status-common status-green dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="status-dot">Accept</span>
                                        </div>
                                        <ul class="dropdown-menu dropdown-menu-action dropdown-menu-action-active">
                                            <li><a class="dropdown-item" href="#!">Accept</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#!">Reject</a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <div class="actions-col">
                                        <a class="actionIcon" href="{{ url('/merchant/new-orders/view') }}">
                                            <span>{{ __('messages.View') }} {{ __('messages.Detail') }}</span>
                                            <i class="fa-solid fa-eye textOrange"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tbl-id">01</td>
                                <td>
                                    <a class="primaryLink" href="#!" target="_blank">Customer </a>
                                </td>
                                <td>
                                    0323-8913202
                                </td>
                                <td>Type</td>
                                <td>Payment Method</td>
                                <td>
                                    <div class="btn-group dropdown-menu-action-active-group">
                                        <div class="status-common status-red dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="status-dot">Reject</span>
                                        </div>
                                        <ul class="dropdown-menu dropdown-menu-action dropdown-menu-action-active">
                                            <li><a class="dropdown-item" href="#!">Accept</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#!">Reject</a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <div class="actions-col">
                                        <a class="actionIcon" href="{{ url('/merchant/new-orders/view') }}">
                                            <span>{{ __('messages.View') }} {{ __('messages.Detail') }}</span>
                                            <i class="fa-solid fa-eye textOrange"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Customer') }}</th>
                                <th>{{ __('messages.Order_Type') }}</th>
                                <th>{{ __('messages.Order_placed_Date_Time') }}</th>
                                <th>{{ __('messages.Order_Takeway_Date_Time') }}</th>
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


<!-- Modal -->
<div class="modal fade" id="rechargeWallet" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
        <form action="" name="rechargeWallet">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productStockLabel">Recharge Wallet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Recharge Amount</label>
                            <input type="text" class="form-control" placeholder="Recharge Amount">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Recharge</button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection