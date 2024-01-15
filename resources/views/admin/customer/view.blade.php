@extends('admin.layout.main')
@section('title')Admin - {{$customer->first_name}} @if(!is_null($customer->surname)) {{$customer->surname->name}} @endif @endsection
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
            <h3 class="page-title mb-0 p-0">My Registration</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('customer.view') }}">My Registration</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View new Registration</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')

<h4>View Registration</h4>
<div class="row mb-3">
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 border">
                        @php
                        $avatar_url = $avatar_path= null;
                        if(!empty($customer->avtar_url))
                        {
                            $avatar_path =$customer->avtar_url;
                            if(app()->environment() == "local")
                            {
                                $explode = explode("public/",$customer->avtar_url);
                                $avatar_url = $explode[1];
                                $avatar_path =$avatar_url;
                                $customer['avtar_url'] = asset("/".$avatar_url);
                            }
                        }
                        @endphp
                        @if(!empty($avatar_path) AND file_exists($avatar_path))
                        <img src="{{ $customer->avtar_url }}" alt='Avtar' class="img-fluid img-avtar">
                        @else <h3 class="text-center text-muted">No Image</h3> @endif
                    </div>
                    <div class="col-md-9">
                        <div class="alert-primary">
                            <h2 class="text-center">Personal Details</h2>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Full Name</label><br>
                                    <div class="info">
                                        {{$customer->first_name}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Father/Husband Name</label><br>
                                    <div class="info">
                                        {{$customer->father_husband_name}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Surname</label><br>
                                    <div class="info">
                                        @if($customer->surname)
                                        {{$customer->surname->name}}
                                        @else

                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Panth</label><br>
                                    <div class="info">
                                        @if(!is_null($customer->panth_id))
                                            @if(!is_null($customer->panth))
                                            {{$customer->panth->name}}
                                            @else

                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Patti</label><br>
                                    <div class="info">
                                        @if(!is_null($customer->patti_id))
                                            @if(!is_null($customer->patti))
                                            {{$customer->patti->name}}
                                            @else

                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Date of birth</label><br>
                                    <div class="info">
                                        {{date("d-m-Y",strtotime($customer->date_of_birth))}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Phone no</label><br>
                                    <div class="info">
                                        {{$customer->phone_no}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Alt Phone no</label><br>
                                    <div class="info">
                                        {{$customer->alt_phone_no}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="firstname">Email Address</label><br>
                                    <div class="info">
                                        {{$customer->email_id}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">Gender</label><br>
                            <div class="info">
                                @if($customer->gender == 1)
                                Male
                                @else
                                Female
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">Blood Group</label><br>
                            <div class="info">
                                @if(!is_null($customer->blood_group_id))
                                    @if(!is_null($customer->blood_group))
                                    {{$customer->blood_group->name}}
                                    @else

                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">Address</label><br>
                            <div class="info">
                                {{$customer->address}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="firstname">Pincode</label><br>
                            <div class="info">
                                {{$customer->pincode}}
                            </div>
                        </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">State</label><br>
                            <div class="info">
                                @if(!is_null($customer->state_id))
                                    {{$customer->state->name}}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">City</label><br>
                            <div class="info">
                                @if(!is_null($customer->city_id))
                                    @if(!is_null($customer->city))
                                    {{$customer->city->city}}
                                    @else

                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">Status</label><br>
                            <div class="info">
                                @if($customer->status == 1)
                                    Married
                                @elseif($customer->status == 2)
                                    UnMarried
                                @elseif($customer->status == 3)
                                    Expire
                                @elseif($customer->status == 4)
                                    Divorce
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                    </div>
                    @if($customer->status == 1 || $customer->status == 3)
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">@if($customer->status == 1)Date of Anniversary @else Date of expire @endif</label>
                            <div class="info">
                                @if($customer->status == 1)
                                    {{$customer->date_of_anniversary}}
                                @else
                                    {{$customer->date_of_expired}}
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($customer->status == 1)
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">Gautra Surname</label>
                            <div class="info">
                                @if(!is_null($customer->sasural_gautra_id))
                                    @if(!is_null($customer->sasural_surname))
                                        {{$$customer->sasural_surname->name}}
                                    @else

                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    {{--
                    @if(in_array($customer->status, [2, 4]))
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">Time Of Birth</label>
                            <div class="info">
                                {{date("h:i:s a", strtotime($customer->time_of_birth))}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">Birth Place</label>
                            <div class="info">
                                {{$customer->birth_place}}
                            </div>
                        </div>
                    </div>
                    @endif
                    --}}
                    @if($customer->system_status == 1)
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">From</label>
                            <div class="info">
								{{ !empty($customer->start) && $customer->start != '0000-00-00' ? date("Y-m-d", strtotime($customer->start)) : ''}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="firstname">To</label>
                            <div class="info">
                                {{ !empty($customer->end) && $customer->end != '0000-00-00' ? date("Y-m-d", strtotime($customer->end)) : ''}}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="alert-primary">
                    <h2 class="text-center">Native Details</h2>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Address</label><br>
                            <div class="info">
                                {{$customer->native_address}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Pincode</label><br>
                            <div class="info">
                                {{$customer->native_pincode}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">State</label><br>
                            <div class="info">
                                @if(!is_null($customer->native_state_id))
                                    @if(!is_null($customer->native_state))
                                        {{$customer->native_state->name}}
                                    @else

                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">City</label><br>
                            <div class="info">
                                @if(!is_null($customer->native_city_id))
                                    @if(!is_null($customer->native_city))
                                        {{$customer->native_city->city}}
                                    @else

                                    @endif
                                @endif
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
                    <h2 class="text-center">Business Details</h2>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Category</label><br>
                            <div class="info">
                                @if(!is_null($customer->business_category_id))
                                    @if(!is_null($customer->business_category))
                                        {{$customer->business_category->name}}
                                    @else

                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Company/Firm name</label><br>
                            <div class="info">
                                {{$customer->company_firm_name}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Designation</label>
                            <div class="info">
                                {{$customer->business_designation}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Address</label><br>
                            <div class="info">
                                {{$customer->business_address}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">Pincode</label><br>
                            <div class="info">
                                {{$customer->business_pincode}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">State</label><br>
                            <div class="info">
                                @if(!is_null($customer->business_state_id))
                                    @if(!is_null($customer->business_state))
                                        {{$customer->business_state->name}}
                                    @else

                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">City</label><br>
                            <div class="info">
                                @if(!is_null($customer->business_city_id))
                                    @if(!is_null($customer->business_city))
                                        {{$customer->business_city->city}}
                                    @else

                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if($customer->system_status != 1)
<div class="row mt-3">
    <div class="align-right">
        {{-- <form action="{{ route('customer.approved') }}" method="post" id="customer_action_form">
            @csrf
            <input type="hidden" name="id" value="{{ $customer->id }}">
            <input type="hidden" name="type" id="type">
            <input type="hidden" name="reason" id="reason"> --}}
            <a type="button" href="{{url('disapprove_cus',$customer->id)}}" class="btn btn-danger action-approved" data-type="reject">Reject</a>
            &nbsp;&nbsp;
            {{-- <a type="button" href="{{url('approve_cus',$customer->id)}}" class="btn btn-success action-approved" data-type="approved">Approve</a> --}}
            {{-- <a type="button" href="" class="btn btn-success action-approved" data-type="approved">Approve</a> --}}
            <button type="button" class="btn btn-success action-approved" data-type="approved">Approve</button>
        {{-- </form> --}}
    </div>
</div>
@endif

<!-- Modal -->
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


<!-- Modal -->
<div class="modal fade" id="from_to_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{route('customer.profileApprove')}}" method="post">
        @csrf
        <input type="hidden" name="customer_id" id="customer_id" value="{{$customer->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Approved</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">From</label>
                        <input type="date" name="start" id="start" value="{{date('Y-m-d')}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">To</label>
                        <input type="date" name="end" id="end" value="{{date('Y-m-d', strtotime('+364 days'))}}" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Approv</button>
                </div>
            </div>
        </div>
    </form>
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

        $("#start").on("change", function(){
            let start = $(this).val();
            var date = new Date(start);
            date.setDate(date.getDate() + 364);
            date = date.toISOString().split('T')[0];
            $("#end").val(date);
        });

        // $(".action-approved").on("click", function(){
        //     let type = $(this).data('type');
        //     $("#type").val(type);
        //     if (type == 'reject') {
        //         $("#reason_modal").modal('show');
        //         return false;
        //     } else {
        //         $("#customer_action_form").submit();
        //     }
        // });

        $(".submit-reason").on("click", function(){
            let reject_reason = $("#reject_reason").val();

            if (reject_reason != '') {
                $("#reason").val(reject_reason);
                $("#customer_action_form").submit();
            } else {
                alert("Please specify reason");
            }
        });

        $(".close-modal").on('click', function(){
            $(".modal").modal('hide');
        });
    });
</script>
@endsection
