@extends('master')
@section('content')
<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Fee_history') }}</div>
</div>
<div class="row mb-4 total-sale-wraper total-many-wrapper ordersAll">

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon1.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.Date') }} </div>
                <div class="total-info-card-number">75</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon6.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.Date_to_collect') }}</div>
                <div class="total-info-card-number">36</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon2.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title"> {{ __('messages.Fee') }}</div>
                <div class="total-info-card-number">20</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon3.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.Sales') }}</div>
                <div class="total-info-card-number">02</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg">
        <div class="total-info-card">
            <div class="total-info-card-icon">
                <img src="{{ asset('assets/admin/images/orderIcon4.svg') }}">
            </div>
            <div class="total-info-card-detail">
                <div class="total-info-card-title">{{ __('messages.Total') }} {{ __('messages.Fee_after_sales') }}</div>
                <div class="total-info-card-number">257</div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-common-body">
                <div class="row">
                    <div class="col-12">
                        <div class="row rangeFilterRow">
                            <div class="col-date-heading">
                                <div class="label-common-heading mb-0">{{ __('messages.Fee_history') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <table id="savedPayment" class=" table tableCommon table-striped table-single-line mb-4">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.Date') }}</th>
                                    <th>{{ __('messages.No_Orders') }}</th>
                                    <th>{{ __('messages.Fee_to_collect') }}</th>
                                    <th>{{ __('messages.Collected') }}</th>
                                    <th>{{ __('messages.Not_Collected') }}</th>
                                </tr>
                            </thead>
                            <tbody id="data_table_sales">
                                <tr style="vertical-align: middle;">
                                    <th>02/01/2022</th>
                                    <th>10</th>
                                    <th>05</th>
                                    <th>02</th>
                                    <th>03</th>
                                </tr>
                            <tfoot>
                                <tr>
                                    <th>{{ __('messages.Date') }}</th>
                                    <th>{{ __('messages.No_Orders') }}</th>
                                    <th>{{ __('messages.Fee_to_collect') }}</th>
                                    <th>{{ __('messages.Collected') }}</th>
                                    <th>{{ __('messages.Not_Collected') }}</th>
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