@extends('master')
@section('content')
    <div class="main-heading-container">
        <div class="common-title">{{ __('messages.Representative') }}</div>
        <a href="{{ url('/admin/representative/add') }}" class="btn btn-primary w-170">{{ __('messages.Add') }}</a>
    </div>
    @php
        count($representatives);
    @endphp
    <div class="row mb-4 total-sale-wraper total-many-wrapper ordersAll">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon1.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Total') }} {{ __('messages.Representative') }}</div>
                    <div class="total-info-card-number">{{ count($representatives) }}</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon2.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Active') }} {{ __('messages.Representative') }}</div>
                    <div class="total-info-card-number">{{ $activeRepresentative }}</div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <div class="total-info-card">
                <div class="total-info-card-icon">
                    <img src="{{ asset('assets/admin/images/orderIcon3.svg') }}">
                </div>
                <div class="total-info-card-detail">
                    <div class="total-info-card-title">{{ __('messages.Inactive') }} {{ __('messages.Representative') }}
                    </div>
                    <div class="total-info-card-number">{{ $inactiveRepresentative }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card-common">
                <div class="card-topbar-inner">
                    <div class="card-topbar-title">{{ __('messages.All') }} {{ __('messages.Representative') }}</div>
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
                        <form action="">
                            <div class="col-md-12">
                                <div class="filters-table-wrapper">
                                    <div class="filter-heading">{{ __('messages.Search_Filters') }}</div>
                                    <div class="filters-table">
                                        <div class="main-filters">
                                            <input type="text" class="form-control form-control-filters" name="id"
                                                value="{{ request('id') }}" placeholder="{{ __('messages.ID') }}">
                                            <input type="text" class="form-control form-control-filters"
                                                placeholder="{{ __('messages.Name') }}" name="name"
                                                value="{{ request('name') }}">
                                            <input type="text" class="form-control form-control-filters" name="mobile"
                                                value="{{ request('mobile') }}" placeholder="{{ __('messages.Mobile') }}">

                                            <select class="form-control form-control-filters" name="status">
                                                <option value="" selected hidden disabled>
                                                    {{ __('messages.Select_Status') }}</option>
                                                <option value="1" @selected(request('status') == 1)>
                                                    {{ __('messages.Active') }}</option>
                                                <option value="0" @selected(request('status') == 0)>
                                                    {{ __('messages.Inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="filters-control">
                                        <a href="#!"
                                            class="btn btn-transparent clear-filter">{{ __('messages.Clear_Filter') }}</a>
                                        <button type="submit" href="#!"
                                            class="btn btn-primary">{{ __('messages.Search') }}</button>
                                        <a href="#!" class="btn  btn-transparent btn-tra hide-filter">
                                            {{ __('messages.Hide_Filter') }}</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-table-responsive">
                        <table id="customers" class="table tableCommon table-striped table-single-line">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.ID') }}</th>
                                    <th>{{ __('messages.Name') }}</th>
                                    <th>{{ __('messages.Mobile_Number') }}</th>
                                    <th>{{ __('messages.Start_day') }}</th>
                                    <th>{{ __('messages.no_of_registered') }}</th>
                                    <th>{{ __('messages.Status') }}</th>
                                    <th>{{ __('messages.Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($representatives as $representative)
                                    <tr>
                                        <td class="tbl-id">{{ $representative->id }}</td>
                                        <td>
                                            {{ $representative->name }}
                                        </td>
                                        <td>
                                            {{ $representative->mobile_no }}
                                        </td>
                                        <td>{{ Carbon\Carbon::parse($representative->created_at)->format('d M Y') }}</td>
                                        <td>32</td>
                                        <td>
                                            <div class="btn-group dropdown-menu-action-active-group">
                                                <div class="status-common status-green dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">

                                                    @if ($representative->userList->status == 0)
                                                        <span class="status-dot">{{ __('messages.Deactive') }}</span>
                                                    @else
                                                        <span class="status-dot">{{ __('messages.Active') }}</span>
                                                    @endif
                                                </div>
                                                <ul class="dropdown-menu dropdown-menu-action dropdown-menu-action-active"
                                                    id="">
                                                    <li id="repesentative_id" value="{{ $representative->userList->id }}"
                                                        status="1"><a class="dropdown-item active"
                                                            href="#">{{ __('messages.Active') }}</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li class="inactive_popup_btn"
                                                        value="{{ $representative->userList->id }}" data="incactive"
                                                        status="0">
                                                        <a class="dropdown-item inactive"
                                                            href="#">{{ __('messages.Inactive') }}</a>
                                                        {{-- <a class="dropdown-item inactive" href="#rechargeWallet"
                                                            data-toggle="modal">{{ __('messages.Inactive') }}</a> --}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="actions-col">
                                                <a class="actionIcon"
                                                    href="{{ route('representativ.detail', $representative->userList->id) }}">
                                                    <span>{{ __('messages.Representative') }}
                                                        {{ __('messages.View') }}</span>
                                                    <i class="fa-solid fa-eye textOrange"></i>
                                                </a>
                                                <a class="actionIcon"
                                                    href="{{ route('representativ.edit', $representative->userList->id) }}">
                                                    <span>{{ __('messages.Representative') }}
                                                        {{ __('messages.Edit') }}</span>
                                                    <i class="fa-solid fa-pen-to-square editProfile textOrange"></i>
                                                </a>
                                                <a class="actionIcon" href="#myModal" class="trigger-btn"
                                                    data-toggle="modal">
                                                    <span>{{ __('messages.Representative') }}
                                                        {{ __('messages.Delete') }}</span>
                                                    <i class="fa-solid fa-trash-can textRed"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div id="myModal" class="modal fade">
                                        <form action="{{ route('representativ.delete', $representative->userList->id) }}"
                                            method="POST">
                                            @csrf
                                            <div class="modal-dialog modal-confirm">
                                                <div class="modal-content">
                                                    <div class="modal-header flex-column">
                                                        <div class="icon-box">
                                                            <i class="fa-solid fa-trash-can textRed"> </i>
                                                        </div>
                                                        <h4 class="modal-title w-100">Are you sure?</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you really want to delete these records? This process cannot
                                                            be undone.</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="submit" name="id"
                                                            value="{{ $representative->userList->id }}"
                                                            class="btn btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('messages.ID') }}</th>
                                    <th>{{ __('messages.Name') }}</th>
                                    <th>{{ __('messages.Mobile_Number') }}</th>
                                    <th>{{ __('messages.Start_day') }}</th>
                                    <th>{{ __('messages.no_of_registered') }}</th>
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
            <form action="{{ url('/admin/representative/chnage-status-inactive') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productStockLabel">{{ __('messages.Reason') }}</h5>
                        <button type="button" class="commission-close closerechargeWallet" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class=" form-group">
                                <input type="hidden" id="update_user_id" name="id">
                                <input type="hidden" name="status" id="update_status">
                                <input type="hidden" name="method" value="inactive">
                                <textarea name="reasonData" id="reasonData" cols="" rows="5" required
                                    placeholder="{{ __('messages.Reason') }}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger closerechargeWallet"
                            data-dismiss="modal">{{ __('messages.Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('messages.Confirm') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- delete model  -->
@endsection
@section('scripts')
    @if (Session::has('message'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        </script>
    @endif


    <script>
        $('#repesentative_id').click(function() {
            var data = $(this).attr("data");
            let updatedData = {
                id: $(this).attr("value"),
                status: status = $(this).attr("status"),
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/representative/chnage-status',
                type: 'post',
                data: updatedData,
                success: function(response) {
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true
                    }
                    toastr.success("Status Changed Successfully");
                    location.reload();
                }
            });
        });
        $(".inactive_popup_btn").on("click", function() {
            $("#rechargeWallet").modal("show");
            var id = $(this).attr("value");
            var status = $(this).attr("status");
            $("#update_user_id").val(id);
            $("#update_status").val(status);
        });
        $(".closerechargeWallet").on("click", function() {
            $("#rechargeWallet").modal("hide");
        });
    </script>
@endsection
