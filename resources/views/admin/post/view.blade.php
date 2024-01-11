@extends('admin.layout.main')
@section('title')Admin - {{$post->customer->first_name}} @endsection
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
            <h3 class="page-title mb-0 p-0">My Post</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('post.view') }}">My Post</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View new Post</li>
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
                <h4>View Post</h4>
                <div class="row mt-3 avtar-container">
                    <div @if($post->type == 1) class="col-md-3" @else class="col-md-4" @endif>
                        <div class="row">
                            <div class="col-md-12">
                                @if($post->type == 1)
                                <img src="{{ $post->post_url }}" alt="Avtar" class="img-fluid img-thumbnail" id="avtar-preview">
                                @else
                                    @if(str_contains($post->post_url, "https://www.youtube.com"))
                                    <iframe width="320" height="200" src="{{$post->post_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    @else
                                    <video width="300" controls>
                                        <source src="{{ $post->post_url }}" type="video/mp4" id="v-src">
                                    </video>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div @if($post->type == 1) class="col-md-9" @else class="col-md-8" @endif>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="firstname">Customer Name</label><br>
                                            <div class="info">
                                                {{$post->customer->first_name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="father/husband_name">Description</label>
                                            <div class="info">
                                                {!! $post->description !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="father/husband_name">Customer name</label>
                                            <div class="info">
                                                @if(!is_null($post->customer))
                                                {{$post->customer->first_name}}
                                                @else
                                                <span class="text-danger">Deleted</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!$post->is_approved || $post->is_approved == 2)
                <div class="row mt-3">
                    <form action="" method="post" id="">
                       {{-- @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <input type="hidden" name="type" id="type">
                        <input type="hidden" name="reason" id="reason"> --}}
                        {{-- <a type="button" href="{{url('disapprove_post',$post->id)}}" class="btn btn-danger action-approved" data-type="reject">Reject</a> --}}
                        {{-- <a type="button" href="{{url('approve_post',$post->id)}}" class="btn btn-success action-approved" data-type="approved">Approved</a> --}}
                        <a type="button" href="{{url('disapprove_post',$post->id)}}" class="btn btn-danger action-approved" data-type="reject">Reject</a>&nbsp;&nbsp;<a type="button" href="{{url('approve_post',$post->id)}}" class="btn btn-success action-approved" data-type="approved">Approved</a>
                        </form>
                </div>
                @endif
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
        $(".post-link").addClass('active');

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
