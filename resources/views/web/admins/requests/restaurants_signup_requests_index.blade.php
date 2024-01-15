@extends('master')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Merchants') }} {{ __('messages.Signup_Requests') }}</div>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.All') }} {{ __('messages.Merchants') }} {{ __('messages.Signup_Requests') }}</div>
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
                                    <input type="text" class="form-control form-control-filters" placeholder="{{ __('messages.Merchants') }} {{ __('messages.ID') }}">
                                    <input type="text" class="form-control form-control-filters" placeholder="{{ __('messages.Merchants') }} {{ __('messages.Name') }}">
                                    <input type="text" class="form-control form-control-filters" placeholder="{{ __('messages.Merchants') }} {{ __('messages.Number') }}">
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
                    <table id="washStations" class="table tableCommon table-striped table-single-line">
                        <thead>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Name') }}</th>
                                <th>{{ __('messages.City') }}</th>
                                <th>{{ __('messages.Number') }}</th>
                                <th>{{ __('messages.Email') }}</th>
                                <th>{{ __('messages.Referred_By') }}</th>
                                <th>{{ __('messages.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="tbl-id">
                                    01
                                </td>
                                <td class="tbl-id">Name</td>
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
                                    <div class="actions-col">
                                        <a class="actionIcon" href="{{ url('/admin/merchant-signup-request/view') }}">
                                            <span>{{ __('messages.View') }} {{ __('messages.Detail') }}</span>
                                            <i class="fa-solid fa-eye textOrange"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tbl-id">
                                    01
                                </td>
                                <td class="tbl-id">Name</td>
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
                                    <div class="actions-col">
                                        <a class="actionIcon" href="{{ url('/admin/merchant-signup-request/view') }}">
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
                                <th> {{ __('messages.Name') }}</th>
                                <th>{{ __('messages.City') }} </th>
                                <th>{{ __('messages.Number') }}</th>
                                <th>{{ __('messages.Email') }}</th>
                                <th>{{ __('messages.Referred_By') }}</th>
                                <th>{{ __('messages.Actions') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection