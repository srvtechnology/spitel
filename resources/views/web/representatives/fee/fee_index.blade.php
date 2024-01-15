@extends('master-representative')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.fee_collection') }}</div>
</div>
<div class="row mb-4 total-sale-wraper total-many-wrapper ordersAll">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
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
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon4.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.Total') }} {{ __('messages.Active') }}</div>
                <div class="total-info-card-number">257</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon5.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.Total') }} {{ __('messages.Inactive') }}</div>
                <div class="total-info-card-number">234</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon6.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.Total_fee_collection') }}</div>
                <div class="total-info-card-number">36</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon2.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title"> {{ __('messages.Total_collected') }}</div>
                <div class="total-info-card-number">20</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon3.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.rest_collection') }}</div>
                <div class="total-info-card-number">02</div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.All') }} {{ __('messages.fee_collection') }}</div>
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
                                <th>{{ __('messages.Date_to_collect') }}</th>
                                <th>{{ __('messages.Fee_to_collect') }}</th>
                                <th>{{ __('messages.Contact_person') }}</th>
                                <th>{{ __('messages.Contact_person_number') }}</th>
                                <th>{{ __('messages.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="tbl-id">
                                    01
                                </td>
                                <td class="tbl-id">
                                    Merchant Name
                                </td>
                                <td>
                                    <span class="tbl-name">city</span>
                                </td>
                                <td>
                                    02/02/2022
                                </td>
                                <td>
                                    10/05/2022
                                </td>
                                <td>
                                    Name
                                </td>
                                <td>
                                    0321-6406525
                                </td>
                                <td>
                                    <div class="btn-group dropdown-menu-action-active-group">
                                        <div class="status-common status-green dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="status-dot">{{ __('messages.Status') }}</span>
                                        </div>
                                        <ul class="dropdown-menu dropdown-menu-action dropdown-menu-action-active">
                                            <li><a class="dropdown-item" href="#Collected" data-toggle="modal">{{ __('messages.Collected') }}</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#!">{{ __('messages.Not_Collected') }}</a></li>
                                        </ul>
                                    </div>
                                </td>
                                {{-- <td>
                                    <div class="actions-col">
                                        <a class="actionIcon" href="{{ url('/representative/fee-detail') }}">
                                            <span>{{ __('messages.View') }}</span>
                                            <i class="fa-solid fa-eye textOrange"></i>
                                        </a>
                                    </div>
                                </td> --}}
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Name') }}</th>
                                <th>{{ __('messages.City') }}</th>
                                <th>{{ __('messages.Date_to_collect') }}</th>
                                <th>{{ __('messages.Fee_to_collect') }}</th>
                                <th>{{ __('messages.Contact_person') }}</th>
                                <th>{{ __('messages.Contact_person_number') }}</th>
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

 <div class="modal fade" id="Collected" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
        <form action="" name="rechargeWallet">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productStockLabel">{{ __('messages.collected_option') }}</h5>
                    <button type="button" class="commission-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="radio" name="option"/>
                            <label>{{ __('messages.Cash') }}</label>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="radio" name="option"/>
                            <label>{{ __('messages.Online') }}</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">{{ __('messages.Cancel') }}</button>
                    <button type="button" class="btn btn-primary">{{ __('messages.Confirm') }}</button>
                </div>
            </div>
        </form>
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


@endsection