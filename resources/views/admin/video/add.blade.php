@extends('admin.layout.main')
@section('title') Admin - Video @endsection
@section('styles')
<style>
    .banner-container, .url_container, .file_container, .system-video-container {
        display: none;
    }
</style>
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Videos</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Videos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add video</li>
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
        <form action="{{ route('video.create') }}" method="post" enctype='multipart/form-data' id="video_form">
            @csrf
            @if(isset($_GET['city']) && $_GET['city'] != '')
            <input type="hidden" name="url_city" value="{{$_GET['city']}}">
            @endif
            @if(!is_null($video))
            <input type="hidden" name="id" value="{{$video->id}}">
            @endif
            <div class="card">
                <div class="card-body">
                    <h4>Add Videos</h4>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="firstname">Upload Type</label>
                                    <select name="upload_type" id="upload_type" class="form-control select">
                                        <option value="">Choose...</option>
                                        <option value="1">Upload from system</option>
                                        <option value="2">Youtube URL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 url_container">
                            <div class="form-group">
                                <label for="firstname">Youtube URL</label>
                                <input type="url" name="video_url" id="video_url" class="form-control" placeholder="Paste your YouTube URL">
                            </div>
                        </div>
                        <div class="col-md-6 file_container">
                            <div class="form-group">
                                <label for="firstname">Upload Video</label>
                                <input type="file" class="form-control" id="video_file" name="video_file">
                                <span class="text-muted rules mt-3">(Supported format: mp4 only, max 20 MB)</span><br>
                            </div>
                        </div>
                        @if(!is_null($video) && !str_contains($video->video_url, "https://www.youtube.com"))
                        <div class="col-md-12">
                            <div class="form-group">
                                <video width="80%" height="240" controls>
                                    <source src="{{$video->video_url}}" type="video/mp4" id="system-video">
                                </video>
                            </div>                            
                        </div>
                        @endif
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="father/husband_name">Description</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Enter video description">
                            </div>
                        </div>
                        {{--
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Customer</label>
                                <select name="customer_id" id="customer_id" class="form-control select">
                                    <option value="">Choose...</option>
                                    @foreach($customer as $c)
                                    <option value="{{$c->id}}">{{$c->first_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        --}}
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 align-right">
                            <a href="{{ route('video.view') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
    $(document).ready(function(){

        $(".sidebar-link").removeClass('active');
        $(".video-link").addClass('active');

        @if(!is_null($video))
            @if(str_contains($video->video_url, "https://www.youtube.com"))
            $("#video_url").val("{{$video->video_url}}");
            $("#upload_type").val(2);
            $(".url_container").show();
            $(".file_container").hide();
            @else
            $("#upload_type").val(1);
            $(".url_container").hide();
            $(".file_container").show();
            @endif
            $("#description").val("{{$video->description}}");
            $("#customer_id").val("{{$video->customer_id}}");
            $(".select").trigger("change");
        @endif

        $("#video_form").validate({
            rules: {
                @if(is_null($video))
                video_file: {
                    required: true,
                    extension: "mp4",
                    video_size: 20000000 
                },
                @endif
                description: {
                    required: true
                },
                customer_id: {
                    // required: true
                },
                video_url: {
                    required: true
                }
            },
            messages: {
                video_file: {
                    extension: "please upload only mp4 file",
                    video_size: "Please upload max 20 mb video"
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("type") == "file") {
                    error.insertAfter($(".rules"))
                } else if(element.attr("text") == "file"){
                    error.insertAfter($("#description"));
                } else {
                    error.insertAfter($("#customer_id"));
                }
            }
        });
        $.validator.addMethod('video_size', function(value, element, param) {
            // size in byte
            return this.optional(element) || (element.files[0].size <= param) 
        });
        $("#upload_type").change(function(){
            let type = $(this).val();
            if (type != '') {
                if (type == 1) {
                    $(".url_container").hide();
                    $(".file_container").show();
                } else {
                    $(".url_container").show();
                    $(".file_container").hide();
                }
            } else {
                $(".url_container").hide();
                $(".file_container").hide();
            }
        });
    });
</script>
@endsection