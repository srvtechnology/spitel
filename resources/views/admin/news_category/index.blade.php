@extends('admin.layout.main')
@section('title')Admin - News Category @endsection
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">News Category</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">News Category</li>
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
                        <a href="{{ route('news-category.add') }}" class="btn btn-success link-btn">+ Add news category</a>
                    </div>
                    @endif
                    <div class="col-md-4 float-right">
                        <input type="text" class="form-control" name="search" id="custom_search" placeholder="Search...">
                    </div>
                    <table class="realtionship_datatable table">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Category name</th>
                                @if(Auth::user()->is_update)
                                <th>Edit</th>
                                @endif
                                @if(Auth::user()->is_delete)
                                <th>Delete</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="realtionship_datatable_tbody">
                            @php($city = (isset($_GET['city']) && $_GET['city'] != '') ? $_GET['city'] : "")
                            @php($i = $news_category->firstItem())
                            @foreach($news_category as $c)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{ $c->name }}</td>
                                @if(Auth::user()->is_update)
                                <td>
                                     @if($c->id !== 9 && $c->id !== 10)
                                    <a href="{{ route('news-category.add', ['id' => $c->id]) }}?city={{$city}}">
                                        <i class='fa-solid text-success fa-pen-to-square'></i>
                                    </a>
                                    @endif
                                </td>
                                @endif
                                @if(Auth::user()->is_delete)
                                <td>
                                    @if($c->id !== 9 && $c->id !== 10)
                                    <a href="{{ route('news-category.delete', ['id' => $c->id]) }}?city={{$city}}" onClick="return confirm('Do you want to delete?')">
                                        <i class='fa-solid fa-trash text-danger'></i>
                                    </a>
                                    @endif
                                </td>
                                @endif
                            </tr>
                            @php($i++)
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex mt-3 justify-content-center" id="laravel_pagination">
                        {{ $news_category->appends($_GET)->links("pagination::bootstrap-4"); }}
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
        $(".news-cat-link").addClass('active');

        $('.realtionship_datatable').DataTable({
            searching:false,
            paging:false,
        });

        $("#custom_search").on("keyup", function () {
            var search_title = $(this).val();
            if(search_title == null)
            {
                return false;
            }
            $(".realtionship_datatable_tbody").html('Loading.....');
            $("#laravel_pagination").addClass("d-none");
            $.ajax({
                url: "{{ route('news_category.ajax_search') }}",
                method: "POST",
                data: {
                    _token : "{{ csrf_token() }}",
                    search: search_title
                },
                success: function (response) {
                    if (response) {
                        $(".realtionship_datatable_tbody").html('');
                        $(".realtionship_datatable_tbody").html(response);
                    }
                    if(response == 'no'){
                        location.reload();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr, status, error);
                }
            });
        });
    });
</script>
@endsection
