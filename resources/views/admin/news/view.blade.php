@extends('admin.layout.main')
@section('title')Admin - News @endsection
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
            <h3 class="page-title mb-0 p-0">View News</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('customer.view') }}">View News</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View new News</li>
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
                <h4>View News</h4>
                <div class="row mt-3 avtar-container">
                    <div class="col-md-4">
                        @if(!is_null($news->banner_url))
                            @if(str_contains($news->banner_url, "https://www.youtube.com"))
                            <iframe width="310" height="200" src="{{$news->banner_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @else
                            <img src="{{ $news->banner_url }}" alt="Avtar" class="img-fluid img-thumbnail" id="avtar-preview">
                            @endif
                        @else
                        <h2 class="text-center text-muted">No Image/video</h2>
                        @endif
                        @if(!$news->is_approved)
                        <form action="{{ route('news.approved') }}" method="post" id="customer_action_form">
                            @csrf
                            <input type="hidden" name="id" value="{{ $news->id }}">
                            <input type="hidden" name="type" id="type">
                            <input type="hidden" name="reason" id="reason">
                            <div class="mt-3">
                                <button type="button" class="btn btn-danger action-approved" data-type="reject">Reject</button>&nbsp;&nbsp;<button type="button" class="btn btn-success action-approved" data-type="approved">Approve</button>
                            </div>
                        </form>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Category</label><br>
                                            <div class="info">
                                                @if(!is_null($news->category))
                                                {{$news->category->name}}
                                                @else
                                                <span class="text-danger">Deleted</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="father/husband_name">Sub Category</label>
                                            <div class="info">
                                                @if(!is_null($news->sub_category))
                                                {{$news->sub_category->name}}
                                                @else
                                                <span class="text-danger">Deleted</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">News Name</label><br>
                                            <div class="info">
                                                {{$news->name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="father/husband_name">Date</label>
                                            <div class="info">
                                                {{$news->date}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Description</label>
                                            <div class="info">
                                                {!! $news->description !!}
                                            </div>
                                        </div>
                                    </div>
                                    @if(!is_null($news->city_id))
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">City</label>
                                            <div class="info">
                                                @if(!is_null($news->city))
                                                {{$news->city->city}}
                                                @else
                                                <span class="text-center">Deleted</span>
                                                @endif
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
        $(".news-link").addClass('active');

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