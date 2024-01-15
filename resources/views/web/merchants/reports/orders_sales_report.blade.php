@extends('master-merchant')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Sales_Report') }}</div>
</div>


<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Sales_Report') }}</div>
            </div>
            <div class="card-common-body">
                <div class="row">
                    <div class="col-12">
                        <div class="row rangeFilterRow">
                            <div class="col-date-heading">
                                <div class="label-common-heading mb-0">{{ __('messages.Date_Wise_Records') }}</div>
                            </div>
                            <div class="rangeFilterRowCol">
                                <select class="form-control form-control-filters" name="merchant">
                                    <option value="" selected>{{ __('messages.Select_Merchant') }}</option>
                                    <option value="1">Merchant 1</option>
                                    <option value="2">Merchant 2</option>
                                </select>
                                <div class="input-group date filterDateRight">
                                    <input type="text" class="form-control" id="input_from" placeholder="{{ __('messages.From_Date') }}">
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-light">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                                <div class="input-group date filterDateRight">
                                    <input type="text" class="form-control" id="input_to" placeholder="{{ __('messages.To_Date') }}">
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-light">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <table id="savedPayment" class=" table tableCommon table-striped table-single-line mb-4">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.Date') }}</th>
                                    <th>{{ __('messages.Orders') }}</th>
                                    <th>{{ __('messages.Cancelled') }}</th>
                                    <th>{{ __('messages.Completed') }}</th>
                                    <th>{{ __('messages.Pending') }}</th>
                                    <th>{{ __('messages.Total_Sales') }}</th>
                                    {{-- <th>{{ __('messages.Total_Refunds') }}</th>
                                    <th>{{ __('messages.Total_Earning') }}</th> --}}
                                </tr>
                            </thead>
                            <tbody id="data_table_sales">
                                <tr style="text-align: center; vertical-align: middle;">
                                    <th colspan="8"> select dates</th>
                                </tr>
                            <tfoot>
                                <tr>
                                    <th>{{ __('messages.Date') }}</th>
                                    <th>{{ __('messages.Orders') }}</th>
                                    <th>{{ __('messages.Cancelled') }}</th>
                                    <th>{{ __('messages.Completed') }}</th>
                                    <th>{{ __('messages.Pending') }}</th>
                                    <th>{{ __('messages.Total_Sales') }}</th>
                                    {{-- <th>{{ __('messages.Total_Refunds') }}</th>
                                    <th>{{ __('messages.Total_Earning') }}</th> --}}
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <hr class="form-hr mt-4">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="label-common-heading mb-0">{{ __('messages.Total_Records') }}</div>
                    </div>
                    <div class="col-12">
                        <table id="totalPayment" class="table tableCommon table-striped table-single-line mb-4">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.Date') }}</th>
                                    <th>{{ __('messages.Orders') }}</th>
                                    <th>{{ __('messages.Cancelled') }}</th>
                                    <th>{{ __('messages.Completed') }}</th>
                                    <th>{{ __('messages.Pending') }}</th>
                                    <th>{{ __('messages.Total_Sales') }}</th>
                                    {{-- <th>{{ __('messages.Total_Refunds') }}</th>
                                    <th>{{ __('messages.Total_Earning') }}</th> --}}
                                </tr>
                            </thead>
                            <tbody id="total_record_sales">
                                {{-- <tr>
                                        <td>{{$data->order_count ?? '0' }}</td>
                                <td>{{$data->cancelled_orders ?? '0' }}</td>
                                <td>{{$data->completed_orders ?? '0' }}</td>
                                <td>{{$data->pending_orders ?? '0' }}</td>
                                <td>{{$data->total_sales ?? '0' }}</td>
                                <td>{{$data->total_refunds ?? '0' }}</td>
                                <td>{{$data->total_earnings ?? '0' }}</td>
                                </tr> --}}
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    {{-- <td>0</td>
                                    <td>0</td> --}}
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('messages.Date') }}</th>
                                    <th>{{ __('messages.Orders') }}</th>
                                    <th>{{ __('messages.Cancelled') }}</th>
                                    <th>{{ __('messages.Completed') }}</th>
                                    <th>{{ __('messages.Pending') }}</th>
                                    <th>{{ __('messages.Total_Sales') }}</th>
                                    {{-- <th>{{ __('messages.Total_Refunds') }}</th>
                                    <th>{{ __('messages.Total_Earning') }}</th> --}}
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        var from_$input = $("#input_from").pickadate(),
            from_picker = from_$input.pickadate("picker");

        var to_$input = $("#input_to").pickadate(),
            to_picker = to_$input.pickadate("picker");

        // Check if there’s a “from” or “to” date to start with.
        if (from_picker.get("value")) {
            to_picker.set("min", from_picker.get("select"));
        }
        if (to_picker.get("value")) {
            from_picker.set("max", to_picker.get("select"));
        }

        // When something is selected, update the “from” and “to” limits.
        from_picker.on("set", function(event) {
            if (event.select) {
                to_picker.set("min", from_picker.get("select"));
            } else if ("clear" in event) {
                to_picker.set("min", false);
            }
        });
        to_picker.on("set", function(event) {
            if (event.select) {
                from_picker.set("max", to_picker.get("select"));
                var fromDate = from_picker.get("select", "yyyy-mm-dd"); // input from
                console.log(fromDate);
                var toDate = to_picker.get("select", "yyyy-mm-dd");
                console.log(toDate); // input to
                const method = 'POST';
                const url = "";
                const data = {
                    fromDate: fromDate,
                    toDate: toDate,
                    "_token": "",
                };
                $.ajax({
                    method,
                    url,
                    data,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        const {
                            status,
                            message,
                            record,
                            total_record
                        } = data;
                        const sales_table = $('#data_table_sales');
                        const sale_table_total_record = $("#total_record_sales");
                        sales_table.empty();
                        sale_table_total_record.empty();
                        if (status === 'success') {
                            $.each(record, function(i, row) {
                                sales_table
                                    .append(`<tr>
                                                <td>${row.date}</td>
                                                <td>${row.order_count}</td>
                                                <td>${row.cancelled_orders}</td>
                                                <td>${row.completed_orders}</td>
                                                <td>${row.pending_orders}</td>
                                                <td>${row.total_sales}</td>
                                                <td>${row.total_refunds}</td>
                                                <td>${row.total_earnings}</td>
                                            </tr>`);
                            });
                            $.each(total_record, function(i, row) {
                                sale_table_total_record
                                    .append(`<tr>
                                                <td>${row.order_count}</td>
                                                <td>${row.cancelled_orders}</td>
                                                <td>${row.completed_orders}</td>
                                                <td>${row.pending_orders}</td>
                                                <td>${row.total_sales}</td>
                                                <td>${row.total_refunds}</td>
                                                <td>${row.total_earnings}</td>
                                            </tr>`);
                            });
                        } else {
                            sales_table
                                .append(`<tr  style="text-align: center; vertical-align: middle;">
                                                    <th colspan="8"  >{{ __('messages.no_record')}}</th>
                                            </tr>`);
                            sale_table_total_record
                                .append(`<tr  style="text-align: center; vertical-align: middle;">
                                                    <th colspan="7"  >{{ __('messages.no_record')}}</th>
                                            </tr>`);
                        }

                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            } else if ("clear" in event) {
                from_picker.set("max", false);
            }
        });

    });
</script>
@endsection