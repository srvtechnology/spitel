@extends('master-representative')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Merchant') }}</div>
    <a href="{{ url('/representative/merchant-add') }}" class="btn btn-primary w-170">{{ __('messages.Add') }}</a>
</div>

<div class="row mb-4">
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
                                <th>{{ __('messages.type_of_business') }}</th>
                                <th>{{ __('messages.Mobile_Number') }}</th>
                                <th>{{ __('messages.Fee_to_collect') }}</th>
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
                                    05
                                </td>
                                <td>
                                    02365553655
                                </td>
                                <td>
                                    23 SAR
                                </td>
                                <td>
                                    <div class="btn-group dropdown-menu-action-active-group">
                                        <div class="status-common status-green dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="status-dot">{{ __('messages.Status') }}</span>
                                        </div>
                                        <ul class="dropdown-menu dropdown-menu-action dropdown-menu-action-active">
                                            <li><a class="dropdown-item" >{{ __('messages.Active') }}</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#!">{{ __('messages.Inactive') }}</a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <div class="actions-col">
                                        <a class="actionIcon" href="{{ url('/representative/merchant-detail') }}">
                                            <span>{{ __('messages.View') }} {{ __('messages.Detail') }}</span>
                                            <i class="fa-solid fa-eye textOrange"></i>
                                        </a>
                                        <a class="actionIcon" href="{{ url('/representative/merchant-edit') }}">
                                            <span>{{ __('messages.Merchant') }} {{ __('messages.Edit') }}</span>
                                            <i class="fa-solid fa-pen-to-square editProfile textOrange"></i>
                                        </a>
                                        {{-- <a class="actionIcon" href="#myModal" class="trigger-btn" data-toggle="modal">
                                            <span>{{ __('messages.Delete') }}</span>
                                            <i class="fa-solid fa-trash-can textRed"></i>
                                        </a> --}}
                                        <div class="btn-group">
                                            <div class="top-bar-avatar dropdown-toggle drop-bar-actions actionIcon" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span>{{ __('messages.More') }} {{ __('messages.option') }}</span>
                                                <i class="fa-solid fa-ellipsis-vertical textayDarkGrey"></i>
                                            </div>
                                            <ul class="dropdown-menu dropdown-menu-action">
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/representative/menucategories/list') }}">
                                                        {{ __('messages.View') }}  {{ __('messages.Menu_Categories') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ url('/representative/menu-item/list') }}">
                                                        {{ __('messages.View') }} {{ __('messages.Menu_Item') }}
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
                                <th>{{ __('messages.type_of_business') }}</th>
                                <th>{{ __('messages.Mobile_Number') }}</th>
                                <th>{{ __('messages.Fee_to_collect') }}</th>
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
{{-- <div id="myModal" class="modal fade">
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
</div> --}}

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