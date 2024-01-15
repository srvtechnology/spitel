@extends('master')
@section('content')

<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Representative') }}  {{ __('messages.Signup_Requests') }}</div>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.All') }} {{ __('messages.Representative') }}  {{ __('messages.Signup_Requests') }}</div>
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
                                    <input type="text" class="form-control form-control-filters" placeholder="{{ __('messages.Name') }}">
                                    <input type="text" class="form-control form-control-filters" placeholder="{{ __('messages.Mobile') }}">
                                    <input type="text" class="form-control form-control-filters" placeholder="{{ __('messages.Email') }}">
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
                                <th>{{ __('messages.Email') }}</th>
                                <th>{{ __('messages.City') }}</th>
                                <th>{{ __('messages.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $item)
                            <tr>
                                <td class="tbl-id">{{ $item->id }}</td>
                                <td class="tbl-id">{{ $item->representative->name }}</td>
                                <td>{{ $item->representative->mobile_no }}</td>
                                <td>{{ $item->representative->email }}</td>
                                @if(\App::isLocale('en'))
                                <td>{{ $item->representative->city->name_eng }}</td>
                                @else
                                <td>{{ $item->representative->city->name_arb }}</td>
                                @endif
                                <td>
                                    <div class="actions-col">
                                        <a href="{{ url('/admin/Merchant-signup-request/view') }}" title="View Detail">
                                            <i class="fa-solid fa-eye textOrange"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Name') }}</th>
                                <th>{{ __('messages.Mobile_Number') }}</th>
                                <th>{{ __('messages.Email') }}</th>
                                <th>{{ __('messages.City') }}</th>
                                <th>{{ __('messages.Actions') }}</th>
                            </tr>
                        </tfoot>
                    </table>

                    {{ $list->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->

 {{-- <div class="modal fade" id="rechargeWallet" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
            <form action="" name="rechargeWallet">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productStockLabel">{{ __('messages.Reason') }}</h5>
                        <button type="button" class="commission-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class=" form-group">
                                <textarea name="" id="" cols="" rows="5" placeholder="{{ __('messages.Reason') }}"></textarea>
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
    </div> --}}

<!-- delete model  -->
{{-- 
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
            </div>
        </div>
    </div>
</div> --}}





@endsection