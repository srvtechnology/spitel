@extends('admin.layout.main')
@section('title')Admin - Video @endsection
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
            <h3 class="page-title mb-0 p-0">My Video</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('post.view') }}">My Video</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View new Video</li>
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
                <h4>View Video</h4>
                <div class="row mt-3 avtar-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mt-3">
                                @if($video->customer_id != 0)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="firstname">Customer Name</label><br>
                                        <div class="info">
                                            {{$video->customer->first_name}}
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Video</label>
                                        <div class="info">
                                            @if(str_contains($video->video_url, "https://www.youtube.com"))
                                            <iframe width="400" height="200" src="{{$video->video_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>;
                                            @else
                                             <video width="500" height="240" controls><source src="{{$video->video_url}}" type="video/mp4"></video>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="father/husband_name">Description</label>
                                        <div class="info">
                                            {{$video->description}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $(".sidebar-link").removeClass('active');
        $(".video-link").addClass('active');
    });
</script>
@endsection