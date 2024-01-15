@extends('master-merchant')
@section('content')

    <div class="main-heading-container">
        <div class="common-title">Setting</div>
    </div>

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Bank Account</button>
        </li>
        <!-- <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Delivery Area</button>
        </li> -->
        <li class="nav-item" role="presentation">
            <button class="nav-link " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Subscription Plan</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link " id="pills-withdraw-tab" data-bs-toggle="pill" data-bs-target="#pills-withdraw" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Withdraw Cycle</button>
        </li>
    </ul>



    <div class="tab-content" id="pills-tabContent">

        {{-- Bank Account Start --}} 

        <div class="tab-pane fade  show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="card-common">
                            <div class="card-topbar-inner">
                                <div class="card-topbar-title">Bank Account</div>
                            </div>
                            <div class="card-common-body">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Bank Name</label>
                                            <select class="form-control" name="status" >
                                            <option value="0">Select Status</option>
                                            <option value="1">National Bank</option>
                                            <option value="2">National Bank</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                         <label>Bank Title</label>
                                        <input type="text" name="product_name" value=""  class="form-control" placeholder=" Bank Title">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>IBAN</label>
                                       <input type="text" name="product_name" value=""  class="form-control" placeholder="IBAN">
                                   </div>
                                    <div class="col-md-6 form-group">
                                        <label>Bank Number</label>
                                       <input type="text" name="product_name" value=""  class="form-control" placeholder="Bank Number">
                                   </div>
                                    
                                </div>
                            </div>
                            <div class="btnWrapperPrimary">
                                <div class="col-12 d-flex form-btns">
                                    <button type="submit" class="btn btn-primary w-170">{{ __('messages.Save') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- Bank Account End --}} 


        {{-- Delivery area Start  --}}

        <!-- <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="card-common">
                        <div class="card-topbar-inner Plans">
                            <div class="card-topbar-title">Delivery Area</div>
                           
                        </div>
                        <div class="col-md-12 form-group addressWrapper addressWrapperAdmin">
                            <div id="map"></div>
                            <input id="lat" name="lat" type="hidden" value="">
                            <input id="lng" name="lng" type="hidden" value="">
                        </div>
                        <div class="btnWrapperPrimary">
                            <div class="col-12 d-flex form-btns">
                                <button type="submit" class="btn btn-primary w-170">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        {{-- Delivery area  End --}}


        {{-- Subscription Plan Start--}}

        <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="card-common">
                        <div class=" Plans">
                            <div class="card-topbar-title">PLan 1</div>
                            <div>
                                <button type="submit" class="btn btn-outline-danger w-170">Unjoin</button>
                                <button type="submit" class="btn btn-primary w-170">Join</button>
                            </div>
                        </div>
                        <div class=" Plans">
                            <div class="card-topbar-title">PLan 2</div>
                            <div>
                                <button type="submit" class="btn btn-outline-danger w-170">Unjoin</button>
                                <button type="submit" class="btn btn-primary w-170">Join</button>
                            </div>
                        </div>
                        <div class=" Plans">
                            <div class="card-topbar-title">PLan 3</div>
                            <div>
                                <button type="submit" class="btn btn-outline-danger w-170">Unjoin</button>
                                <button type="submit" class="btn btn-primary w-170">Join</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Subscription Plan End--}}

        {{-- Withdraw start--}}
        <div class="tab-pane fade" id="pills-withdraw" role="tabpanel" aria-labelledby="pills-withdraw-tab">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="card-common">
                            <div class="card-common-body">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="radio" id="Monthly" name="same">
                                        <label for="Monthly">Monthly Withdraw </label>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="radio" id="Y/Monthly"  name="same">
                                        <label for="Y/Monthly">By/Weekly Withdraw </label>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="radio" id="Weekly" name="same">
                                        <label for="Weekly">Weekly Withdraw </label>
                                    </div>
                                </div> 
                                <div class="btnWrapperPrimary">
                                    <div class="col-12 d-flex form-btns">
                                        <button type="submit" class="btn btn-primary w-170">Update</button>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- Withdraw End--}}
    </div>
    


@endsection
