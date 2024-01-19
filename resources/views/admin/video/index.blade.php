@extends('admin.layout.main')
@section('title')Admin - Videos @endsection
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<style>
    video {
        width: 100%;
        height: auto;
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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Videos</li>
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
        <form action="" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    @if(Auth::user()->is_insert)
                    <div class="text-end upgrade-btn">
                        <a href="{{ route('video.add') }}" class="btn btn-success link-btn">+ Add new video</a>
                    </div>
                    @endif
                    <div class="dropdown-divider"></div>
                    <table class="video-datatable table table-striped">
                        <thead>
                            <tr>
                                <th>#sr</th>
                                <th>Video</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="video_tbody">
                            @foreach ($videos as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>
                                    @if(str_contains($row->video_url, "https://www.youtube.com"))
                                        <iframe width="350" height="200" src="{{ $row->video_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    @else
                                        <video width="200" height="240" controls><source src="{{ $row->video_url }}" type="video/mp4"></video>
                                    @endif
                                </td>
                                <td>{{ (strlen($row->description) > 50) ? substr($row->description, 0, 50) : $row->description }}</td>
                                <td>
                                    <span class='action'>
                                        @if(Auth::user()->is_update)
                                        <a href="{{ url('/admin/video/add/'.$row->id.'?city='.request('city')) }}"><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;
                                        @endif
                                        @if(Auth::user()->is_delete)
                                        <a href="{{ url('/admin/video/delete/'.$row->id.'?city='.request('city')) }}" onclick='return confirm("Are you sure?")'><i class='fa-solid fa-trash text-danger'></i></a>&nbsp;
                                        @endif
                                        @if(Auth::user()->is_view)
                                        <a href="{{ url('/admin/video/view/'.$row->id.'?city='.request('city')) }}"><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center" id="laravel_pagination">
                        {{ $videos->appends(request()->query())->links() }}
                    </div>

                    {{--  <div class="row">
                        @foreach($videos as $v)
                        <div class="col-md-3">
                            <iframe width="250" height="200" src="{{$v->video_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <p class="text-muted">
                                @if(strlen($v->description) > 150)
                                {{ substr($v->description, 0, 150) }} ......
                                @else
                                {{ $v->description }}
                                @endif
                            </p>
                        </div>
                        @endforeach
                    </div>  --}}
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
        $(".video-link").addClass('active');

        let city_id = "";
        <?php if (isset($_GET['city']) && $_GET['city'] != ""): ?>
            city_id = "{{$_GET['city']}}";
        <?php endif ?>

        $('.video-datatable').DataTable({
            paging:false,
        });

        let i = 1;
        var table = $('.video-datatable_JKJKBKJ').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('video.list') }}",
                data: function(d) {
                    d.city = city_id
                }
            },
            columns: [
                {
                    "render": function(data, type, full, meta) {
                        return i++;
                    }
                },
                {data: 'video', name: 'video'},
                {data: 'desc', name: 'desc'},
                {data: 'actions', name: 'actions'}
            ],
            responsive: true,
            ordering: false
        });

    });
</script>
@endsection
