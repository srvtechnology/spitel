@extends('admin.layout.main')
@section('title') Admin - News @endsection
@section('styles')
<style>
    .banner-container, .url_container, .upload_container{
        display: none;
    }
</style>
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">My News</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">My News</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add new News</li>
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
        <form action="{{ route('news.store') }}" method="post" enctype='multipart/form-data' id="news_form">
            @csrf
            @if(isset($news->id))
            <input type="hidden" name="id" value="{{ $news->id }}">
            @endif
            @if(isset($_GET['city']) && $_GET['city'] != '')
            <input type="hidden" name="url_city" value="{{$_GET['city']}}">
            @endif
            <div class="card">
                <div class="card-body">
                    <h4>Add News</h4>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="firstname">Upload Type</label>
                            <select name="upload_type" id="upload_type" class="form-control select">
                                <option value="">Choose...</option>
                                <option value="1">YouTube URL</option>
                                <option value="2">Upload from system</option>
                            </select>
                        </div>
                        <div class="col-md-4 url_container">
                            <label for="firstname">YouTube URL</label>
                            <input type="url" name="youtube_url" id="youtube_url" class="form-control" placeholder="Paste YouTube URL">
                        </div>                        
                        <div class="col-md-4 upload_container">
                            <label for="firstname">Upload</label>
                            <input type="file" class="form-control" name="news_banner" id="news_banner" onchange="previewFile(this);" >
                        </div>
                        <div class="col-md-4">
                            <label for="firstname">City</label>
                            <select class="form-control select" name="city_id" id="city_id"></select>
                        </div>
                    </div>
                    <div class="row mt-3 banner-container">
                        <div class="col-md-4">
                            <img src="" alt="Banner" class="img-fluid img-thumbnail" id="banner-preview">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Choose...</option>
                                    @foreach($news_category as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father/husband_name">Child Category</label>
                                <select name="child_category_id" id="child_category_id" class="form-control">
                                    <option value="">Choose...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">News Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="father/husband_name">Date</label>
                                <input type="date" class="form-control" id="news_date" name="news_date">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="father/husband_name">Description</label>
                                <textarea class="form-control editor" rows="5" id="description" name="description" placeholder="Enter your description">{!! !empty($news->description) ? $news->description : '' !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 align-right">
                            <a href="{{ route('news.view') }}" class="btn btn-light">Cancel</a>
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
<script>
    $(document).ready(function(){

        $(".sidebar-link").removeClass('active');
        $(".news-link").addClass('active');

        @if(isset($news->id))
            @if(!is_null($news->banner_url))
                @if(str_contains($news->banner_url, "https://www.youtube.com"))
                $("#upload_type").val(1);
                $("#youtube_url").val("{{$news->banner_url}}");
                $(".url_container").show();
                @else
                $("#upload_type").val(2);
                $("#banner-preview").attr("src", "{{ $news->banner_url }}");
                $(".banner-container").show();
                @endif
            @endif
            $("#name").val("{{ $news->name }}");
            $("#news_date").val("{{ $news->date }}");            
            $("#cust_id").val("{{ $news->customer_id }}");
            $("#category_id").val("{{ $news->category_id }}");
            city("#city_id", '', "{{ $news->city_id }}");
            getSubCat("{{ $news->category_id }}", "{{ $news->sub_category_id }}");
            $(".select").trigger('change');
        @else
        city("#city_id", '');
        @endif

        $("#upload_type").change(function(){
            let type = $(this).val();
            if (type != '') {
                if (type == 1) {
                    $(".url_container").show();
                    $(".upload_container").hide();
                } else {
                    $(".url_container").hide();
                    $(".upload_container").show();
                }
            } else {
                $(".url_container").hide();
                $(".upload_container").hide();
            }
        });

        $("#category_id").on("change", function(){
            let category_id = $(this).val();
            if (category_id != '') {
                getSubCat(category_id);
                $(".select").trigger('change');        
            }
        });

        $("#news_form").validate({
            rules: {
                @if(!isset($news->id))
                news_banner: {
                    required: true
                },
                @endif
                name: {
                    required: true
                },
                cust_id: {
                    required: true
                },
                category_id: {
                    required: true
                },
                child_category_id: {
                    required: true
                },
                news_date: {
                    required: true
                },
                description: {
                    required: true
                },
                city_id: {
                    // required: true
                }
            }
        });
        
    });

    function getSubCat(category_id, selected = null) {
        if (category_id != '') {
            let url = "{{ route('news-sub-category.list') }}"+"?parent_id="+category_id;

            let options = '<option value="">Choose...</option>';
            $.get(url, function(data, status){
                $.each(data, function(key, value){
                    let selected_op = (selected != null) ? (selected == value.id) ? "selected" : "" : "" ;

                    options += "<option value='"+value.id+"' "+selected_op+">"+value.name+"</option>";
                });
                $("#child_category_id").html(options);
            });
        }
    }

    function city(options_element, state, selected_value = null) {
        let cityUrl = "{{ route('getCity') }}?state_id="+state;
        let options = '<option value="">Choose...</option>';
        $.get(cityUrl, function(data, status){
            $.each(data, function(key, value){
                let attr = (selected_value != null) ? (value.id == selected_value) ? "selected" : "" : "";
                options += "<option value='"+value.id+"' "+attr+">"+value.city+"</option>";
            });
            $(options_element).html(options);
        });
    }

    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $(".banner-container").show();
                $("#banner-preview").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection