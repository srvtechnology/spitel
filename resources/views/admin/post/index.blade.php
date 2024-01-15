@extends('admin.layout.main')
@section('title')Admin - Post @endsection
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Post</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Post</li>
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
        <form action="{{ route('post.approved') }}" method="post" id="post_action">
            <input type="hidden" name="reason" id="reason">
            @csrf
            <div class="card">
                <div class="card-body">
                    @if(Auth::user()->is_insert)
                    <div class="text-end upgrade-btn mb-3">
                        <a href="{{ route('post.add') }}" class="btn btn-success link-btn">+ Add Post</a>
                    </div>
                    @endif
                    <table class="post-datatable table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="check_all" id="check_all">
                                </th>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Image / Video</th>
                                <th>Is Approved</th>
                                <th>Active/Inactive</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td><input type='checkbox' name='post_ids[]' class='post_ids' value='{{ $post->id }}'></td>
                                <td>{{ $post->id }}</td>
                                <td>{{ (!is_null($post->customer)) ? $post->customer->first_name : "<span class='text text-danger'>Deleted</span>" }}</td>
                                <td>
                                    @php
                                    if ($post->type == 0) {

                                    }
                                    if ($post->type == 1) {
                                        $avatar_url = $avatar_path= null;
                                        if(!empty($post->post_url))
                                        {
                                            $avatar_path = $post->post_url;
                                            $post_explode = explode("/post/",$post->post_url);
                                            $avatar_path = "post/".$post_explode[1];
                                            if(app()->environment() != "local")
                                            {
                                                $avatar_path =$avatar_path;
                                                $post['post_url'] = asset("public/".$avatar_path);
                                            }
                                        }
                                        if(!empty($avatar_path) AND file_exists($avatar_path))
                                        {
                                            echo "<img src='". $post->post_url ."' alt='Avtar' height='120px;' width='120' style='border-radius: 50px;overflow: hidden;'>";
                                        }
                                        echo "-";
                                        // echo "<img src='". $post->post_url ."' alt='Avtar' height='120px;' width='120' style='border-radius: 50px;overflow: hidden;'>";
                                    } else {
                                        if (str_contains($post->post_url, "https://www.youtube.com")) {
                                            echo '<iframe width="310" height="200" src="'.$post->post_url.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                        }
                                        echo "<video width='300' controls><source src='". $post->post_url ."' type='video/mp4'></video>";
                                    }
                                    @endphp
                                </td>
                                <td>
                                    @if ($post->is_approved==0)
                                        <span class='badge badge-secondary'>Pending</span>
                                    @elseif ($post->is_approved==1)
                                        <span class='badge badge-info'>Approved</span>
                                    @else
                                        <span class='badge badge-danger'>Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    @if($post->is_active)
                                        <a class='btn btn-danger btn-sm' href='{{ url("/admin/post/active-inactive/".$post->id."/inactive") }}'>Make Inactive</a>
                                    @endif
                                    <a class='btn btn-success btn-sm' href='{{ url("/admin/post/active-inactive/".$post->id."/active") }}'>Make Active</a>
                                </td>
                                <td>
                                    {!! $post->description !!}
                                </td>
                                <td>
                                    <span class='action'>
                                        @if(Auth::user()->is_update)
                                        <a href="{{ url('/admin/post/add/'.$post->id.'?city='.request('city')) }}"><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;
                                        @endif
                                        @if(Auth::user()->is_delete)
                                        <a href="{{ url('/admin/post/delete/'.$post->id.'?city='.request('city')) }}" onclick='return confirm("Are you sure?")'><i class='fa-solid fa-trash text-danger'></i></a>&nbsp;
                                        @endif
                                        @if(Auth::user()->is_view)
                                        <a href="{{ url('/admin/post/view/'.$post->id.'?city='.request('city')) }}"><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $posts->appends(request()->query())->links() }}
                    </div>
                    <div class="row mt-3 mt-3">
                        <div class="col-md-12 float-right justify-content-end align-right">
                            <div class="f-flex">
                                <button type="button" class="btn btn-light reject align-self-end" name="reject">Reject</button>
                                <button type="submit" class="btn btn-success align-self-end" name="approve">Approve</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

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
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $(".sidebar-link").removeClass('active');
        $(".post-link").addClass('active');
        $('.post-datatable').css('width', '');


        let glb_city = '';
        @if(isset($_GET['city']) && $_GET['city'] != '')
        glb_city = "{{$_GET['city']}}"
        @endif

        $('.post-datatable').DataTable({
            paging:false
        });
        var table = $('.post-datatable_sadsad').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('post.list') }}",
                data: function(d) {
                    d.city = glb_city
                }
            },
            columns: [
                {data: 'post_id', name: 'post_id', "orderable": false, width: "10%"},
                {data: 'id', id: 'post_id', "orderable": true, width: "10%"},
                {data: 'customer_name', name: 'customer_name', width: "20%"},
                {data: 'file', name: 'file', width: "30%"},
                {data: 'is_approved', name: 'is_approved', width: "10%"},
                {data: 'active_inactive', name: 'active_inactive', width: "10%"},
                {data: 'desc', name: 'desc', width: "10%"},
                {data: 'actions', name: 'actions', width: "10%"}
            ],
            responsive: true,
            order: [[ 2, 'asc' ]]
        });

        $(".submit-reason").on("click", function(){
            let reject_reason = $("#reject_reason").val();

            if (reject_reason != '') {
                $("#reason").val(reject_reason);
                $("#post_action").submit();
            } else {
                alert("Please specify reason");
            }
        });

        $(".reject").on("click", function(){
            $("#reason_modal").modal('show');
        });

        $("#check_all").on("change", function(){
            let status = ($(this).is(":checked")) ? true : false;

            $(".post_ids").attr("checked", status);
        });

        $(".close-modal").on('click', function(){
            $("#reason_modal").modal('hide');
        });
    });
</script>
@endsection
