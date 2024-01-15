@extends('master')
@section('content')

<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Menu_Item_Add_on_Categories') }}</div>
    <div class="btns">
        <a href="{{ url('/admin/menu-item/list') }}" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
    </div>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.All') }} {{ __('messages.Menu_Item_Add_on_Categories') }}</div>
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
                                    <input type="text" class="form-control form-control-filters" placeholder="{{ __('messages.ID') }}">
                                    <input type="text" class="form-control form-control-filters" placeholder="{{ __('messages.Item_Name') }}">
                                    <select class="form-control form-control-filters" name="country">
                                        <option value="" selected>{{ __('messages.Select_Status') }}</option>
                                        <option value="Active">{{ __('messages.Active') }}</option>
                                        <option value="France">{{ __('messages.Inactive') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="filters-control">
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
                                <th>{{ __('messages.Category_Name') }} (English)</th>
                                <th>{{ __('messages.Category_Name') }} (Arabic)</th>
                                <th>{{ __('messages.No_of_Selectable_Option') }}</th>
                                <th>{{ __('messages.Status') }}</th>
                                <th>{{ __('messages.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tbl-id">01</td>
                                <td>
                                    Pizza ( English )
                                </td>
                                <td>
                                    Pizza ( Arabic )
                                </td>
                                <td>
                                    15
                                </td>
                                <td>
                                    <div class="status-common status-green">
                                        <span class="status-dot">{{ __('messages.Active') }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="actions-col">
                                        <a class="actionIcon" href="{{ url('/admin/menu-item/add-on-option') }}">
                                            <span>{{ __('messages.View_add_on_options') }}</span>
                                            <i class="fa-solid fa-eye textOrange"></i>
                                        </a>


                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tbl-id">01</td>
                                <td>
                                    Burger ( English )
                                </td>
                                <td>
                                    Burger ( Arabic )
                                </td>
                                <td>
                                    5
                                </td>
                                <td>
                                    <div class="status-common status-red">
                                        <span class="status-dot">Deactive</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="actions-col">
                                        <a class="actionIcon" href="{{ url('/admin/menu-item/add-on-option') }}">
                                            <span>{{ __('messages.View_add_on_options') }}</span>
                                            <i class="fa-solid fa-eye textOrange"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{ __('messages.ID') }}</th>
                                <th>{{ __('messages.Category_Name') }} (English)</th>
                                <th>{{ __('messages.Category_Name') }} (Arabic)</th>
                                <th>{{ __('messages.No_of_Selectable_Option') }}</th>
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
</div>
@endsection