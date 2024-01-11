@extends('admin.layout.main')
@section('title')Admin - Post @endsection
@section('styles')
<style>
    .avtar-container, .video-container, .upload-container, .url_container {
        display: none;
    }
    video {
        max-width: 100%;
        height: auto;
    }
</style>
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Post</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">My Post</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add new Post</li>
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
        <form action="{{ route('post.store') }}" method="post" enctype='multipart/form-data' id="post_form">
            @csrf
            @if(isset($post->id))
            <input type="hidden" name="id" value="{{ $post->id }}">
            @endif
            @if(isset($_GET['city']) && $_GET['city'] != '')
            <input type="hidden" name="url_city" value="{{$_GET['city']}}">
            @endif
            <div class="card">
                <div class="card-body">
                    <h4>Add Post</h4>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Upload Type</label>
                            <select id="upload_type" name="upload_type" class="form-control">
                                <option value="">Choose...</option>
                                <option value="1">YouTube Url</option>
                                <option value="2">Upload From system</option>
                            </select>
                        </div>
                        <div class="col-md-4 url_container">
                            <label for="firstname">Youtube URL</label>
                            <input type="url" name="video_url" id="video_url" class="form-control" placeholder="Paste your YouTube URL">
                        </div>
                        <div class="col-md-4 upload-container">
                            <label for="firstname">Upload post</label>
                            <input type="file" class="form-control" name="post_file" id="post_file" onchange="previewFile(this);" >
                        </div>
                        <div class="col-md-4">
                            <label for="firstname">Customer</label>
                            <select name="cust_id" id="cust_id" class="form-control">
                                <option value="">Choose...</option>
                                @foreach($customers as $c)
                                <option value="{{ $c->id }}">{{$c->first_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3 avtar-container">
                        <div class="col-md-4">
                            <img src="" alt="Avtar" class="img-fluid img-thumbnail" id="avtar-preview">
                        </div>
                    </div>
                    <div class="row mt-3 video-container">
                        <div class="col-md-4">
                            <video width="400" controls>
                                <source src="" type="video/mp4" id="v-src">
                            </video>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="firstname">Description</label>
                                <!-- <input type="text" class="form-control" id="description" name="description" placeholder="Enter post description"> -->
                                <textarea name="description" class="form-control editor" id="description" cols="30" rows="7" placeholder="Enter post description">{!! !empty($post->description) ? $post->description : '' !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 align-right">
                            <a href="{{ route('post.view') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>
                            {{-- @isset($post->is_approved)


                            @if($post->is_approved == 0)
                            <a href="{{url('approve_post',$post->id)}}" class="btn btn-light">Approve</a>
                            @else
                            <a href="{{url('disapprove_post',$post->id)}}" class="btn btn-light">Disapprove</a>
                            @endif
                            @endisset --}}
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
        $(".post-link").addClass('active');

        $("#upload_type").change(function(){
            let type = $(this).val();
            if (type != "") {
                if (type == 1) {
                    $(".url_container").show();
                    $(".upload-container").hide();
                } else {
                    $(".url_container").hide();
                    $(".upload-container").show();
                }
            } else {
                $(".url_container").hide();
                $(".upload-container").hide();
                $(".video-container").hide();
            }
        });

        @if(isset($post->id))
            $("#cust_id").val("{{$post->customer_id}}");
            @if($post->type == 1)
                $("#upload_type").val(2);
                $(".url_container").hide();
                $(".upload-container").show();
                $(".avtar-container").show();
                $("#avtar-preview").attr('src', "{{$post->post_url}}");
            @else
                $("#upload_type").val(1);
                @if(str_contains($post->post_url, "https://www.youtube.com"))
                $("#video_url").val("{{$post->post_url}}");
                $(".url_container").show();
                @else
                $(".upload-container").hide();
                $(".video-container").show();
                $("#v-src").attr('src', "{{$post->post_url}}");
                $(".video-container video")[0].load();
                @endif
            @endif
        @endif

        $("#post_form").validate({
            rules: {
                cust_id: {
                    required: true
                },
                @if(!isset($post->id))
                post_file: {
                    extension: "mp4|jpg|jpeg|png"
                },
                @endif
                description: {
                    required: true
                },
                video_url: {
                    required: true
                }
            },
            messages: {
                post_file: {
                    extension: "Upload only jpg, jpeg, png, and mp4 file"
                }
            }
        });

    });

    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
        fileName = document.querySelector('#post_file').value;
        extension = fileName.split('.').pop();
        let required_extension = [
            'jpg',
            'jpeg',
            'png'
        ]
        if (required_extension.includes(extension)) {
            $(".video-container").hide();
            if(file){
                var reader = new FileReader();

                reader.onload = function(){
                    $(".avtar-container").show();
                    $("#avtar-preview").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        } else {
            $(".avtar-container").hide();
        }
    }
</script>
@endsection
