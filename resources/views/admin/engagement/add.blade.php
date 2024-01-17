@extends('admin.layout.main')
@section('title') Admin - Engagement @endsection
@section('styles')
<style>
    .banner-container {
        display: none;
    }
</style>
@endsection
@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Engagement</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Engagement</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add new Engagement</li>
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
        <form action="{{ route('engagements.add') }}" method="post" enctype='multipart/form-data' id="">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Engagement Details</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="alert alert-success" role="alert">Bride Profile</div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="bride_image_url">Bride Upload</label>
                                    <input type="file" class="form-control @error('bride_image_url') is-invalid @enderror" name="bride_image_url" id="bride_image_url">
                                    @error('bride_image_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="bride_name">Bride Name</label>
                                    <input type="text" class="form-control @error('bride_name') is-invalid @enderror" id="bride_name" name="bride_name" placeholder="Enter Your full name">
                                    @error('bride_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="bride_qualification">Bride Qualification</label>
                                    <input type="text" class="form-control @error('bride_qualification') is-invalid @enderror" id="bride_qualification" name="bride_qualification" placeholder="Qualification">
                                    @error('bride_qualification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="bride_grandparents">Bride Grand Parents</label>
                                    <input type="text" class="form-control @error('bride_grandparents') is-invalid @enderror" id="bride_grandparents" name="bride_grandparents" placeholder="Enter grand parents">
                                    @error('bride_grandparents')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="bride_parents">Bride Parents</label>
                                    <input type="text" class="form-control @error('bride_parents') is-invalid @enderror" id="bride_parents" name="bride_parents" placeholder="Enter parents">
                                    @error('bride_parents')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="bride_current_city">Bride Current City</label>
                                    <input type="text" name="bride_current_city" class="form-control @error('bride_current_city') is-invalid @enderror" id="bride_current_city">
                                    {{--  <select class="form-control @error('bride_current_city') is-invalid @enderror" name="bride_current_city" id="bride_current_city">
                                        <option value="">Choose...</option>
                                        @foreach($cities as $item)
                                        <option value="{{$item->id}}">{{$item->city}}</option>
                                        @endforeach
                                    </select>  --}}
                                    @error('bride_current_city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="bride_native_city">Bride Native City</label>
                                    <input type="text" name="bride_native_city" class="form-control @error('bride_native_city') is-invalid @enderror" id="bride_native_city">
                                    {{--  <select class="form-control @error('bride_native_city') is-invalid @enderror" name="bride_native_city" id="bride_native_city">
                                        <option value="">Choose...</option>
                                        @foreach($cities as $item)
                                        <option value="{{$item->id}}">{{$item->city}}</option>
                                        @endforeach
                                    </select>  --}}
                                    @error('bride_native_city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="alert alert-success" role="alert">Groom Profile</div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="groom_image_url">Groom Upload</label>
                                    <input type="file" class="form-control @error('groom_image_url') is-invalid @enderror" name="groom_image_url" id="groom_image_url">
                                    @error('groom_image_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="groom_name">Groom Name</label>
                                    <input type="text" class="form-control @error('groom_name') is-invalid @enderror" id="groom_name" name="groom_name" placeholder="Enter Your full name">
                                    @error('groom_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="groom_qualification">Groom Qualification</label>
                                    <input type="text" class="form-control @error('groom_qualification') is-invalid @enderror" id="groom_qualification" name="groom_qualification" placeholder="Qualification">
                                    @error('groom_qualification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="groom_grandparents">Groom Grand Parents</label>
                                    <input type="text" class="form-control @error('groom_grandparents') is-invalid @enderror" id="groom_grandparents" name="groom_grandparents" placeholder="Enter grand parents">
                                    @error('groom_grandparents')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="groom_parents">Groom Parents</label>
                                    <input type="text" class="form-control @error('groom_parents') is-invalid @enderror" id="groom_parents" name="groom_parents" placeholder="Enter parents">
                                    @error('groom_parents')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="groom_current_city">Groom Current City</label>
                                    <input type="text" name="groom_current_city" class="form-control @error('groom_current_city') is-invalid @enderror" id="groom_current_city">
                                    {{--  <select class="form-control @error('groom_current_city') is-invalid @enderror" name="groom_current_city" id="groom_current_city">
                                        <option value="">Choose...</option>
                                        @foreach($cities as $item)
                                        <option value="{{$item->id}}">{{$item->city}}</option>
                                        @endforeach
                                    </select>  --}}
                                    @error('groom_current_city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="groom_native_city">Groom Native City</label>
                                    <input type="text" name="groom_native_city" class="form-control @error('groom_native_city') is-invalid @enderror" id="groom_native_city">
                                    {{--  <select class="form-control @error('groom_native_city') is-invalid @enderror" name="groom_native_city" id="groom_native_city">
                                        <option value="">Choose...</option>
                                        @foreach($cities as $item)
                                        <option value="{{$item->id}}">{{$item->city}}</option>
                                        @endforeach
                                    </select>  --}}
                                    @error('groom_native_city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 align-right">
                            <a href="{{ route('engagements.add') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>


@endsection
