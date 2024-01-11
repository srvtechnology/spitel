@extends('admin.layout.main')
@section('title')Admin - Detail @endsection
@section('styles')
<style>
    .info { font-weight: bold;}
    .img-avtar {width: 180px;}
</style>
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Engagements</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('customer.view') }}">Engagements</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Engagement Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')

<h4>Engagement Detail</h4>
<div class="row mb-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="alert-primary">
                    <h2 class="text-center">Bride Profile</h2>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center">
                            <div class="col-md-3 border mb-3">
                                @if(!is_null($engagement->bride_image_url) AND file_exists("storage/".$engagement->bride_image_url))
                                    <img src="{{ asset("storage/".$engagement->bride_image_url) }}" class="img-fluid img-avatar">
                                @else
                                    <br><br><br><br><br>
                                    <h3 class="text-center text-muted">No Image</h3>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Bride Name</label><br>
                            <div class="info">
                                {{$engagement->bride_name}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Bride Qualification</label><br>
                            <div class="info">
                                {{$engagement->bride_qualification}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Bride Grand Parents</label><br>
                            <div class="info">
                                {{ $engagement->bride_grandparents }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Bride Parents</label><br>
                            <div class="info">
                                {{ $engagement->bride_parents }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Bride Current City</label><br>
                            <div class="info">
                                {{ $engagement->bride_cur_city->city }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Bride Native City</label><br>
                            <div class="info">
                                {{ $engagement->bride_nat_city->city }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="alert-primary">
                    <h2 class="text-center">Groom Profile</h2>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center">
                            <div class="col-md-3 border mb-3">
                                @if(!is_null($engagement->groom_image_url) AND file_exists("storage/".$engagement->groom_image_url))
                                    <img src="{{ asset("storage/".$engagement->groom_image_url) }}" class="img-fluid img-avatar">
                                @else
                                    <br><br><br><br><br>
                                    <h3 class="text-center text-muted">No Image</h3>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Groom Name</label><br>
                            <div class="info">
                                {{$engagement->groom_name}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Groom Qualification</label><br>
                            <div class="info">
                                {{$engagement->groom_qualification}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Groom Grand Parents</label><br>
                            <div class="info">
                                {{ $engagement->groom_grandparents }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Groom Parents</label><br>
                            <div class="info">
                                {{ $engagement->groom_parents }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Groom Current City</label><br>
                            <div class="info">
                                {{ $engagement->groom_cur_city->city }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Groom Native City</label><br>
                            <div class="info">
                                {{ $engagement->groom_nat_city->city }}
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
        $(".engagement-link").addClass('active');
    });
</script>
@endsection
