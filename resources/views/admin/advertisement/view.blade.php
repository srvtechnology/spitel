@extends('admin.layout.main')
@section('title') Admin - {{$addvertisement->name}} @endsection
@section('styles')
<style>
    .info {
        font-weight: bold;
    }
</style>
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">My Advertisement</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('customer.view') }}">My Advertisement</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Advertisement Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4>View Advertisement</h4>
                <div class="row mt-3 avtar-container">
                    <div class="col-md-4">
                        <img src="{{ $addvertisement->banner_url }}" alt="Avtar" class="img-fluid img-thumbnail" id="avtar-preview">
                        @if(!$addvertisement->is_approved)
                        <div class="row mt-3">
                            <form action="{{ route('advertisement.approved') }}" method="post" id="customer_action_form">
                                @csrf
                                <input type="hidden" name="id" value="{{ $addvertisement->id }}">
                                <input type="hidden" name="type" id="type">
                                <input type="hidden" name="reason" id="reason">
                                <button type="button" class="btn btn-danger action-approved" data-type="reject">Reject</button>&nbsp;&nbsp;<button type="submit" class="btn btn-success action-approved" data-type="approved">Approved</button>
                            </form>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">Name</label><br>
                                            <div class="info">
                                                {{$addvertisement->name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="father/husband_name">Advertisement Name</label>
                                            <div class="info">
                                                {{$addvertisement->advertisement_name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="surnamr">city</label>
                                            <div class="info">
                                                @if(!is_null($addvertisement->city))
                                                    {{$addvertisement->city->city}}
                                                @else
                                                    <span class="text-center text-danger">Deleted</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    {{--
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="surnamr">description</label>
                                            <div class="info">
                                                {{$addvertisement->description}}
                                            </div>
                                        </div>
                                    </div>
                                    --}}
                                    @if($addvertisement->customer_id != 0)
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="surnamr">Customer name</label>
                                            <div class="info">
                                                @if(!is_null($addvertisement->customer))
                                                {{$addvertisement->customer->first_name}}
                                                @else
                                                <span class="text-center text-danger">Deleted</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(!is_null($addvertisement->to_date))
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="surnamr">To date</label>
                                            <div class="info">
                                                {{date("d-m-Y h:i:s", strtotime($addvertisement->to_date))}}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="reason_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reason for reject</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea name="reject_reason" id="reject_reason" cols="30" rows="7" placeholder="specify reason." class="form-control"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submit-reason">Ok</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $(".sidebar-link").removeClass('active');
        $(".add-link").addClass('active');

        $(".action-approved").on("click", function(){
            let type = $(this).data('type');
            $("#type").val(type);
            if (type == 'reject') {
                $("#reason_modal").modal('show');
                return false;
            } else {
                $("#customer_action_form").submit();
            }
        });

        $(".submit-reason").on("click", function(){
            let reject_reason = $("#reject_reason").val();
            
            if (reject_reason != '') {
                $("#reason").val(reject_reason);
                $("#customer_action_form").submit();
            } else {
                alert("Please specify reason");
            }
        });

        $(".close-modal").on('click', function(){
            $("#reason_modal").modal('hide');
        });
    });
</script>
@endsection