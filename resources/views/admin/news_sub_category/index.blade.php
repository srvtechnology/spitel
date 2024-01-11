@extends('admin.layout.main')
@section('title')Admin - News sub Category @endsection
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">News Sub Category</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">News Sub Category</li>
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
        <form action="">
            <div class="card">
                <div class="card-body">
                    @if(Auth::user()->is_insert)
                    <div class="text-end upgrade-btn mb-3">
                        <a href="{{ route('news-sub-category.add') }}" class="btn btn-success">+ Add news sub category</a>
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Parent Category name</th>
                                <th>Category name</th>
                                @if(Auth::user()->is_update)
                                <th>Edit</th>
                                @endif
                                @if(Auth::user()->is_delete)
                                <th>Delete</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php($city = (isset($_GET['city']) && $_GET['city'] != '') ? $_GET['city'] : "")
                            @php($i = $news_sub_category->firstItem())
                            @foreach($news_sub_category as $c)
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    @if(!is_null($c->news_category))
                                    {{ $c->news_category->name }}
                                    @else
                                    <span class="text-danger">Deleted</span>
                                    @endif
                                </td>
                                <td>{{ $c->name }}</td>
                                @if(Auth::user()->is_update)
                                <td>
                                    <a href="{{ route('news-sub-category.add', ['id' => $c->id]) }}?city={{$city}}">
                                        <i class='fa-solid text-success fa-pen-to-square'></i>
                                    </a>
                                </td>
                                @endif
                                @if(Auth::user()->is_delete)
                                <td>
                                    <a href="{{ route('news-sub-category.delete', ['id' => $c->id]) }}?city={{$city}}" onClick="return confirm('Do you want to delete?')">
                                        <i class='fa-solid fa-trash text-danger'></i>
                                    </a>
                                </td>
                                @endif
                            </tr>
                            @php($i++)
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex mt-3 justify-content-center">
                        {{ $news_sub_category->appends($_GET)->links("pagination::bootstrap-4"); }}
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $(".sidebar-link").removeClass('active');
        $(".manage-link").addClass('active');
        $(".list-unstyled").addClass('in');
        $(".news-sub-cat-link").addClass('active');

        $(".table-hover").DataTable({
            "bPaginate": false,
            order: [[ 2, 'asc' ]]
        });
    });
</script>
@endsection