@extends('admin.layout.main')
@section('title')Admin - {{$family_member->name}} @endsection
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
            <h3 class="page-title mb-0 p-0">My Family Member</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">My Family Member</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Family Member</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row mb-3">
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 border">
                        @if(!is_null($family_member->avtar))
                        <img src="{{$family_member->avtar}}" class="img-fluid img-avtar">
                        @else
                        <br><br><br><br><br>
                        <h3 class="text-center text-muted">No Image</h3>
                        @endif
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Name</label><br>
                                    <div class="info">
                                        {{$family_member->name}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Phone no</label><br>
                                    <div class="info">
                                        {{$family_member->phone_no}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Panth</label><br>
                                    <div class="info">
                                        @if(!is_null($family_member->panth_id))
                                            @if(!is_null($family_member->panth))
                                            {{$family_member->panth->name}}
                                            @else
                                            <span class="text text-danger">Deleted</span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Gender</label><br>
                                    <div class="info">
                                        @if($family_member->gender == 1) Male @else Female @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Date of birth</label><br>
                                    <div class="info">
                                        {{$family_member->date_of_birth}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Phone no</label><br>
                                    <div class="info">
                                        {{$family_member->phone_no}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Status</label><br>
                                    <div class="info">
                                        @if($family_member->status == 1)
                                            Married
                                        @elseif($family_member->status == 2)
                                            UnMarried
                                        @elseif($family_member->status == 3)
                                            Expire
                                        @else
                                            Divorce
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if($family_member->status == 1 || $family_member->status == 3)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">@if($family_member->status == 1)Date of Anniversary @else Date of expire @endif</label>
                                    <div class="info">
                                        @if($family_member->status == 1)
                                            {{$family_member->date_of_anniversary}}
                                        @else
                                            {{$family_member->date_of_expire}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(in_array($family_member->status, [2, 4]))
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Birth Time</label>
                                    <div class="info">
                                        {{date("h:i:s a", strtotime($family_member->time_of_birth))}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Birth Place</label>
                                    <div class="info">
                                        {{$family_member->birth_place}}
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Relation</label>
                                    <div class="info">
                                        @if(!is_null($family_member->relationship))
                                        {{$family_member->relationship->name}}
                                        @else
                                        <span class="text text-danger">Deleted</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">Blood Group</label><br>
                            <div class="info">
                                @if(!is_null($family_member->blood_group_id))
                                    @if(!is_null($family_member->blood_group))
                                    {{$family_member->blood_group->name}}
                                    @else
                                    <span class="text text-danger">Deleted</span>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">About</label><br>
                            <div class="info">
                                {!! $family_member->about !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">Education</label><br>
                            <div class="info">
                                {{$family_member->education}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">Matrimony</label><br>
                            <div class="info">
                                @if($family_member->allow_matrimony)
                                Yes
                                @else
                                No
                                @endif
                            </div>
                        </div>
                    </div>
                    @if($family_member->allow_matrimony)
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">Naniyal Gautra</label><br>
                            <div class="info">
                                @if(!is_null($family_member->naniyal_gautra))
                                {{$family_member->naniyal_gautra->name}}
                                @else
                                <span class="text-danger">Delete</span> 
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
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
        $(".customer-link").addClass('active');

        $(".action-approved").on("click", function(){
            let type = $(this).data('type');
            $("#type").val(type);
            if (type == 'reject') {
                $("#reason_modal").modal('show');
                return false;
            } else {
                $("#from_to_modal").modal('show');
            }
        });
    });
</script>
@endsection