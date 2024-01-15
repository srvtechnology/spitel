@extends('master')
@section('content')

<div class="main-heading-container">
    <div class="common-title">{{ __('messages.Representative') }}</div>
    <a href="{{ url('/admin/representative/list') }}" type="submit" class="btn btn-primary w-170">{{ __('messages.Back') }}</a>
</div>
<div class="row my-4">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.Representative') }} {{ __('messages.Detail') }}</div>
            </div>
            <div class="card-common-body">
                {{-- detail Start --}}
                <div class="row">
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Representative') }} {{ __('messages.ID') }}</div>
                        <div class="label-txt">{{$representative->id}}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Image') }}</div>
                        <div class="label-txt">
                            <img class="productImg" alt="no image found" src="{{ asset('images/representative/'.$representative->img) }}">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Name') }}</div>
                        <div class="label-txt">{{$representative->name}}</div>
                    </div>
                    {{-- <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Nationality') }}</div>
                        <div class="label-txt">{{$representative->nationality}}</div>
                    </div> --}}
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Mobile_Number') }}</div>
                        <div class="label-txt">{{$representative->mobile_no}}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.id_Number') }}</div>
                        <div class="label-txt">{{$representative->id_number}}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Start_day') }}</div>
                        <div class="label-txt">{{Carbon\Carbon::parse($representative->created_at)->format('d M Y') }}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Email') }}</div>
                        <div class="label-txt">{{$representative->email}}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Status') }}</div>
                        @if($representative->userList->status==1)
                        <div class="label-txt">active</div>
                        @else
                        <div class="label-txt">Deactive</div>
                        @endif
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Asing_city') }}</div>
                        <div class="label-txt">{{$representative->city}}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Neighborhood1') }}</div>
                        <div class="label-txt">{{$representative->neighborhood}}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Neighborhood2') }}</div>
                        <div class="label-txt">{{$representative->neighborhood_1}}</div>
                    </div>
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Overall_registered_business') }}</div>
                        <div class="label-txt">01</div>
                    </div>
                    {{-- <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.type_of_business') }}</div>
                        <div class="label-txt">type</div>
                    </div> --}}
                    <div class="col-md-12 col-lg-6 form-group col-detail-view">
                        <div class="label-heading">{{ __('messages.Signup_Referral_Code') }}</div>
                        <div class="label-txt">{{$representative->reference_code}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 my-4">
            <div class="card-common">
                <div class="card-topbar-inner">
                    <div class="card-topbar-title">{{ __('messages.type_of_business') }}</div>
                </div>
                <div class="card-common-body">
                    <div class="card-table-responsive">
                        <table class="customers table tableCommon table-striped table-single-line">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.Type') }}</th>
                                    <th>{{ __('messages.Count') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="tbl-id">{{ __('messages.Buffet') }}</td>
                                    <td class="tbl-id">15</td>
                                </tr>
                                <tr>
                                    <td class="tbl-id">{{ __('messages.Bakery') }}</td>
                                    <td class="tbl-id">5</td>
                                </tr>
                                <tr>
                                    <td class="tbl-id">{{ __('messages.Grill') }}</td>
                                    <td class="tbl-id">15</td>
                                </tr>
                                <tr>
                                    <td class="tbl-id">{{ __('messages.Buffet') }}</td>
                                    <td class="tbl-id">5</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{ __('messages.Type') }}</th>
                                    <th>{{ __('messages.Count') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
    </div>

    <div class="col-lg-12">
        <div class="card-common">
                <div class="card-topbar-inner">
                    <div class="card-topbar-title">{{ __('messages.fee_collected') }} </div>
                </div>
                <div class="card-common-body">
                    {{-- detail Start --}}
                    <div class="row">
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Fee_to_collect') }}</div>
                            <div class="label-txt">01</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.fee_collected') }}</div>
                            <div class="label-txt">Fee collect</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Fee_not_collect') }}</div>
                            <div class="label-txt">Fee not collect</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Rest_to_collect') }}</div>
                            <div class="label-txt">Rest to collect</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Previous_fee_not_collected') }}</div>
                            <div class="label-txt">Previous fee not collected</div>
                        </div>
                        <div class="col-md-12 col-lg-6 form-group col-detail-view">
                            <div class="label-heading">{{ __('messages.Total_to_be_collected') }}</div>
                            <div class="label-txt">Total to be collected.</div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection