@extends('master')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Featured_Slider') }}</div>
    <a href="{{ url('/admin/featured-slider/add') }}" class="btn btn-primary w-170">{{ __('messages.Add') }}</a>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.All') }} {{ __('messages.Featured_Slider') }}</div>

            </div>
            <div class="card-common-body">
                <div class="card-table-responsive">
                    <table id="customers" class="table tableCommon table-striped table-single-line">
                        <thead>
                            <tr>
                                <th>{{ __('messages.Slider_ID') }}</th>
                                <th>{{ __('messages.Featured_Slider_Image') }}</th>
                                <th>{{ __('messages.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="tbl-id">01</td>
                                <td>
                                    <img class="productImg" src="{{ asset('assets/admin/images/food-img-1.png') }}">
                                </td>
                                <td>
                                    <div class="actions-col">
                                        <a class="actionIcon" href="{{ url('/admin/featured-slider/edit') }}">
                                            <span>{{ __('messages.Featured_Slider') }} {{ __('messages.Edit') }}</span>
                                            <i class="fa-solid fa-pen-to-square editProfile textOrange"></i>
                                        </a>
                                        <a class="actionIcon" href="#!">
                                            <span>{{ __('messages.Featured_Slider') }} {{ __('messages.Delete') }}</span>
                                            <i class="fa-solid fa-trash-can textRed"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tbl-id">01</td>
                                <td>
                                    <img class="productImg" src="{{ asset('assets/admin/images/food-img-1.png') }}">
                                </td>
                                <td>
                                    <div class="actions-col">
                                        <a class="actionIcon" href="{{ url('/admin/featured-slider/edit') }}">
                                            <span>{{ __('messages.Featured_Slider') }} {{ __('messages.Edit') }}</span>
                                            <i class="fa-solid fa-pen-to-square editProfile textOrange"></i>
                                        </a>
                                        <a class="actionIcon" href="#!">
                                            <span>{{ __('messages.Featured_Slider') }} {{ __('messages.Delete') }}</span>
                                            <i class="fa-solid fa-trash-can textRed"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('messages.Slider_ID') }}</th>
                                <th>{{ __('messages.Featured_Slider_Image') }}</th>
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