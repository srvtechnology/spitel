@extends('master')
@section('content')
    <div class="main-heading-container">
        <div class="common-title">{{ __('messages.Grocery_Categories') }}</div>
        <a href="{{ url('/admin/other-categories/add') }}" class="btn btn-primary w-170">{{ __('messages.Add') }}</a>
    </div>
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card-common">
                <div class="card-topbar-inner">
                    <div class="card-topbar-title">{{ __('messages.All_Grocery_Categories') }}</div>

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
                        <form method="GET">
                            <div class="col-md-12">
                                <div class="filters-table-wrapper">
                                    <div class="filter-heading">{{ __('messages.Search_Filters') }}</div>
                                    <div class="filters-table">
                                        <div class="main-filters">
                                            <input type="text" class="form-control form-control-filters" name="id"
                                                placeholder="System ID">
                                            <input type="text" class="form-control form-control-filters" name="name"
                                                placeholder="Category Name">
                                            <select class="form-control form-control-filters" name="status">
                                                <option value="" selected>{{ __('messages.Select_Status') }}</option>
                                                <option value="1">{{ __('messages.Active') }}</option>
                                                <option value="2">{{ __('messages.Inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="filters-control">
                                        <a href="{{ url('admin/other-categories/list') }}"
                                            class="btn btn-transparent clear-filter">{{ __('messages.Clear_Filter') }}</a>
                                        <button type="submit" href="#!"
                                            class="btn btn-primary">{{ __('messages.Search') }}</button>
                                        <a href="#!"
                                            class="btn  btn-transparent btn-tra hide-filter">{{ __('messages.Hide_Filter') }}</a>
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
                                    <th>{{ __('messages.Name') }} (English)</th>
                                    <th>{{ __('messages.Name') }} (Arabic)</th>
                                    <th>{{ __('messages.No_Merchants') }}</th>
                                    <th>{{ __('messages.Status') }}</th>
                                    <th>{{ __('messages.Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($businessProductCategories as $index => $merchant_category)
                                    <tr>
                                        <td class="tbl-id">{{ $merchant_category->id }}</td>

                                        <td>
                                            {{ $merchant_category->name_eng }}
                                        </td>
                                        <td>
                                            {{ $merchant_category->name_arabic }}
                                        </td>
                                        <td>0099</td>
                                        <td>
                                            <div class="btn-group dropdown-menu-action-active-group">
                                                <div class="status-common status-green dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    @if ($merchant_category->status == 0)
                                                        <span class="status-dot">{{ __('messages.Deactive') }}</span>
                                                    @else
                                                        <span class="status-dot">{{ __('messages.Active') }}</span>
                                                    @endif
                                                </div>
                                                <ul
                                                    class="dropdown-menu dropdown-menu-action dropdown-menu-action-active"id="category_id">
                                                    <li value="{{ $merchant_category->id }}" data="1"><a
                                                            class="dropdown-item active"
                                                            href="#!">{{ __('messages.Active') }}</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li value="{{ $merchant_category->id }}" data-="0"><a
                                                            class="dropdown-item inactive"
                                                            href="#!">{{ __('messages.Deactive') }}</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="actions-col">
                                                <a class="actionIcon"
                                                    href="{{ route('merchant.edit', $merchant_category->id) }}">
                                                    <span>{{ __('messages.Categories') }} {{ __('messages.Edit') }}</span>
                                                    <i class="fa-solid fa-pen-to-square editProfile textOrange"></i>
                                                </a>
                                                <a class="actionIcon" href="#myModal" class="trigger-btn"
                                                    data-toggle="modal">
                                                    <span>{{ __('messages.Categories') }}
                                                        {{ __('messages.Delete') }}</span>
                                                    <i class="fa-solid fa-trash-can textRed"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div id="myModal" class="modal fade">
                                        <form action="{{ route('merchant.delete', $merchant_category->id) }}"
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
                                                            value="{{ $merchant_category->id }}"
                                                            class="btn btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endforeach
                            </tbody>


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
    </div>
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
        $('#category_id li').click(function() {

            let updatedData = {
                id: $(this).attr("value"),
                status: $(this).attr("data"),
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/store-categories/chnage-status',
                type: 'post',
                data: updatedData,
                success: function(response) {
                    location.reload();
                }
            });
        });
    </script>
@endsection
