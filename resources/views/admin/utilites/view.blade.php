@extends('admin.layout.main')
@section('title') Admin - {{$utilites->name}} @endsection
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
            <h3 class="page-title mb-0 p-0">My Utilites</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('customer.view') }}">My Utilites</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View new Utilites</li>
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
                <h4>View Utilites</h4>
                <div class="row mt-3 avtar-container">
                    <div class="col-md-4">
                        <img src="{{ $utilites->banner_url }}" alt="Avtar" class="img-fluid img-thumbnail" id="avtar-preview">
                        {{--
                        <form action="{{ route('utilites.approved') }}" method="post" id="customer_action_form">
                            @csrf
                            <input type="hidden" name="id" value="{{ $utilites->id }}">
                            <input type="hidden" name="type" id="type">
                            <input type="hidden" name="reason" id="reason">
                            <div class="mt-3">
                                <button type="button" class="btn btn-danger action-approved" data-type="reject">Reject</button>&nbsp;&nbsp;<button type="button" class="btn btn-success action-approved" data-type="approved">Approved</button>
                            </div>
                        </form>
                        --}}
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">Name</label><br>
                                            <div class="info">
                                                {{$utilites->name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="father/husband_name">City</label>
                                            <div class="info">
                                                @if(!is_null($utilites->city))
                                                {{$utilites->city->city}}
                                                @else
                                                <span class="text text-danger">Deleted</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="surnamr">State</label>
                                            <div class="info">
                                                @if(!is_null($utilites->state))
                                                {{$utilites->state->name}}
                                                @else
                                                <span class="text text-danger">Deleted</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">Country</label>
                                            <div class="info">
                                                @if(!is_null($utilites->country))
                                                {{$utilites->country->name}}
                                                @else
                                                <span class="text text-danger">Deleted</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="father/husband_name">Mobile Number</label>
                                            <div class="info">
                                                {{$utilites->phone_no}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="surnamr">Office No</label>
                                            <div class="info">
                                                {{$utilites->office_no}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">Address</label>
                                            <div class="info">
                                                {{$utilites->address}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">Description</label>
                                            <div class="info">
                                                {!! $utilites->description !!}
                                            </div>
                                        </div>
                                    </div>
                                    @if(!is_null($utilites->other_file))
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">Other file</label>
                                            <div class="info">
                                                <a href="{{$utilites->other_file}}" download="">Download</a>
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
        $(".utilites-link").addClass('active');

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