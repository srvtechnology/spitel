@extends('admin.layout.main')
@section('title')Admin - News subCategory @endsection
@section('styles')
<style>
</style>
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">News sub Category</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">My news sub Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add new news sub category</li>
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
        <form action="{{ route('news-sub-category.store') }}" method="post">
            @csrf
            @if(isset($news_sub_category->id))
            <input type="hidden" name="id" value="{{ $news_sub_category->id }}">
            @endif
            @if(isset($_GET['city']) && $_GET['city'] != '')
            <input type="hidden" name="city_param" value="{{$_GET['city']}}">
            @endif
            <div class="card">
                <div class="card-body">
                    <h4>Add News sub Category</h4>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="firstname">Parent Category</label>
                                <select name="parent_id" id="parent_id" class="form-control" required>
                                    <option value="">Choose...</option>
                                    @foreach($news_category as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="firstname">Category</label>
                                <input type="text" class="form-control" id="category" name="category" placeholder="Enter news category" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 align-right">
                            <a href="{{ route('news-sub-category.view') }}" class="btn btn-light">Cancel</a>
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
<script>
    $(document).ready(function(){
        $(".sidebar-link").removeClass('active');
        $(".manage-link").addClass('active');
        $(".list-unstyled").addClass('in');
        $(".news-sub-cat-link").addClass('active');

        @if(isset($news_sub_category->id))
            $("#parent_id").val("{{ $news_sub_category->parent_category_id }}");
            $("#category").val("{{ $news_sub_category->name }}");
        @endif
    });
</script>
@endsection