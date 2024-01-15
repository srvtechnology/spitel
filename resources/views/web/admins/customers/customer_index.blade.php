@extends('master')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Customer') }}</div>
</div>


<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.All') }} {{ __('messages.Customers') }}</div>
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
                                    <input type="text" class="form-control form-control-filters" placeholder="{{ __('messages.Mobile_Number') }}">
                                    <input type="text" class="form-control form-control-filters" placeholder="{{ __('messages.Name') }}">
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
                                <th>{{ __('messages.Name') }}</th>
                                <th>{{ __('messages.Mobile_Number') }}</th>
                                <th>{{ __('messages.No_of_Order') }}</th>
                                <th>{{ __('messages.Status') }}</th>
                                <th>{{ __('messages.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tbl-id">01</td>
                                <td> Name</td>
                                <td>5646867878</td>
                                <td>02</td>
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
                                        <a class="actionIcon" href="{{ url('/admin/customer-detail') }}">
                                            <span>{{ __('messages.Customer') }} {{ __('messages.View') }}</span>
                                            <i class="fa-solid fa-eye textOrange"></i>
                                        </a>
                                        <a class="actionIcon" href="#myModal" class="trigger-btn" data-toggle="modal">
                                            <span>{{ __('messages.Customer') }} {{ __('messages.Delete') }}</span>
                                            <i class="fa-solid fa-trash-can textRed"> </i>
                                        </a>
                                        <div class="btn-group">
                                            <div class="top-bar-avatar dropdown-toggle drop-bar-actions actionIcon" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span>{{ __('messages.More') }} {{ __('messages.option') }}</span>
                                                <i class="fa-solid fa-ellipsis-vertical textayDarkGrey"></i>
                                            </div>
                                            <ul class="dropdown-menu dropdown-menu-action">
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/admin/customer-order-history') }}">
                                                        {{ __('messages.View_Order_History') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tbl-id">02</td>
                                <td> Name</td>
                                <td>5646867878</td>
                                <td>04</td>
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
                                        <a class="actionIcon" href="{{ url('/admin/customer-detail') }}">
                                            <span>{{ __('messages.Customer') }} {{ __('messages.View') }}</span>
                                            <i class="fa-solid fa-eye textOrange"></i>
                                        </a>
                                        <a class="actionIcon" href="#myModal" class="trigger-btn" data-toggle="modal">
                                            <span>{{ __('messages.Customer') }} {{ __('messages.Delete') }}</span>
                                            <i class="fa-solid fa-trash-can textRed"> </i>
                                        </a>
                                        <div class="btn-group">
                                            <div class="top-bar-avatar dropdown-toggle drop-bar-actions actionIcon" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span>{{ __('messages.More') }} {{ __('messages.option') }}</span>
                                                <i class="fa-solid fa-ellipsis-vertical textayDarkGrey"></i>
                                            </div>
                                            <ul class="dropdown-menu dropdown-menu-action">
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/admin/customer-order-history') }}">
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
                                <th>{{ __('messages.Mobile_Number') }}</th>
                                <th>{{ __('messages.No_of_Order') }}</th>
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

<!-- <div class="modal fade" id="rechargeWallet" tabindex="-1">
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
    </div> -->

<!-- delete model  -->

<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="fa-solid fa-trash-can textRed"> </i>
                </div>
                <h4 class="modal-title w-100">{{ __('messages.Are_you_sure') }} </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>{{ __('messages.Do_you_really') }}</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('messages.Cancel') }}</button>
                <button type="button" class="btn btn-danger">{{ __('messages.Delete') }}</button>
            </div>
        </div>
    </div>
</div>



@endsection