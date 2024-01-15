{{-- @extends('master')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Menu_Item') }} {{ __('messages.Signup_Requests') }}</div>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.All') }} {{ __('messages.Menu_Item') }} {{ __('messages.Signup_Requests') }}</div>
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
                                    <input type="text" class="form-control form-control-filters" placeholder="{{ __('messages.City') }}">
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
                    <table class="customers table tableCommon table-striped table-single-line">
                        <thead>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Image') }}</th>
                                <th>{{ __('messages.Item_Name') }} (English)</th>
                                <th>{{ __('messages.Item_Name') }} (Arabic)</th>
                                <th>{{ __('messages.Price') }}</th>
                                <th>{{ __('messages.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tbl-id">01</td>
                                <td><img class="productImg" src="{{ asset('assets/admin/images/food-img-1.png') }}"></td>
                                <td>Name ( English )</td>
                                <td>Name ( Arabic )</td>
                                <td>15 SAR</td>
                                <td>
                                    <div class="actions-col">
                                        <a href="{{ url('/admin/Menu-item-signup-request/view') }}" title="View Detail">
                                            <i class="fa-solid fa-eye textOrange"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tbl-id">01</td>
                                <td><img class="productImg" src="{{ asset('assets/admin/images/food-img-1.png') }}"></td>
                                <td>Name ( English )</td>
                                <td>Name ( Arabic )</td>
                                <td>15 SAR</td>
                                <td>
                                    <div class="actions-col">
                                        <a href="{{ url('/admin/Menu-item-signup-request/view') }}" title="View Detail">
                                            <i class="fa-solid fa-eye textOrange"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Image') }}</th>
                                <th>{{ __('messages.Item_Name') }} (English)</th>
                                <th>{{ __('messages.Item_Name') }} (Arabic)</th>
                                <th>{{ __('messages.Price') }}</th>
                                <th>{{ __('messages.Actions') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection --}}