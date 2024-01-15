@extends('master')
@section('content')
<div class="row main-heading-container justify-content-center">
    <div class="col-lg-12">
        <div class="common-title ps-2">{{ __('messages.Notifications') }}</div>
    </div>
</div>
<div class="row mb-4 justify-content-center">
    <div class="col-lg-12">
        <div class="card-common">
            <div class="card-topbar-inner">
                <div class="card-topbar-title">{{ __('messages.All') }} {{ __('messages.Notifications') }}</div>
                <a href="{{ url('/admin/notification/send') }}" class="topBarIcon"><span> {{ __('messages.Send_Notification') }}</span></a>
            </div>
            <div class="card-common-body">
                <div class="row">
                    <div class="col-md-12 form-group nameTitleCol">
                        <div class="accordion accordionNotify" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </button>
                                    <div class=" btn-group-notify">
                                        <a class="actionIcon" href="#myModal" class="trigger-btn" data-toggle="modal"><span>{{ __('messages.Notification') }} {{ __('messages.Delete') }}</span><i class="fa-solid fa-trash-can textRed"></i></a>
                                    </div>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at aliquet felis. Donec gravida venenatis neque nec tincidunt. Sed vel ultricies nunc, ac laoreet tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse fermentum nisi vitae justo vestibulum vestibulum. Donec velit dui, rutrum eget pellentesque at, pharetra nec mauris. Donec tempus congue velit nec vulputate. Sed felis magna, scelerisque sed erat non, euismod ullamcorper neque. Sed sit amet ultrices mi. Vestibulum lobortis ex eros, et consectetur sapien ultricies laoreet. Donec vulputate dui nec varius blandit.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </button>
                                    <div class=" btn-group-notify">
                                        <a class="actionIcon" href="#myModal" class="trigger-btn" data-toggle="modal"><span>{{ __('messages.Notification') }} {{ __('messages.Delete') }}</span><i class="fa-solid fa-trash-can textRed"></i></a>
                                    </div>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at aliquet felis. Donec gravida venenatis neque nec tincidunt. Sed vel ultricies nunc, ac laoreet tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse fermentum nisi vitae justo vestibulum vestibulum. Donec velit dui, rutrum eget pellentesque at, pharetra nec mauris. Donec tempus congue velit nec vulputate. Sed felis magna, scelerisque sed erat non, euismod ullamcorper neque. Sed sit amet ultrices mi. Vestibulum lobortis ex eros, et consectetur sapien ultricies laoreet. Donec vulputate dui nec varius blandit.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </button>
                                    <div class=" btn-group-notify">
                                        <a class="actionIcon" href="#myModal" class="trigger-btn" data-toggle="modal"><span>{{ __('messages.Notification') }} {{ __('messages.Delete') }}</span><i class="fa-solid fa-trash-can textRed"></i></a>
                                    </div>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at aliquet felis. Donec gravida venenatis neque nec tincidunt. Sed vel ultricies nunc, ac laoreet tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse fermentum nisi vitae justo vestibulum vestibulum. Donec velit dui, rutrum eget pellentesque at, pharetra nec mauris. Donec tempus congue velit nec vulputate. Sed felis magna, scelerisque sed erat non, euismod ullamcorper neque. Sed sit amet ultrices mi. Vestibulum lobortis ex eros, et consectetur sapien ultricies laoreet. Donec vulputate dui nec varius blandit.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </button>
                                    <div class=" btn-group-notify">
                                        <a class="actionIcon" href="#myModal" class="trigger-btn" data-toggle="modal"><span>{{ __('messages.Notification') }} {{ __('messages.Delete') }}</span><i class="fa-solid fa-trash-can textRed"></i></a>
                                    </div>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at aliquet felis. Donec gravida venenatis neque nec tincidunt. Sed vel ultricies nunc, ac laoreet tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse fermentum nisi vitae justo vestibulum vestibulum. Donec velit dui, rutrum eget pellentesque at, pharetra nec mauris. Donec tempus congue velit nec vulputate. Sed felis magna, scelerisque sed erat non, euismod ullamcorper neque. Sed sit amet ultrices mi. Vestibulum lobortis ex eros, et consectetur sapien ultricies laoreet. Donec vulputate dui nec varius blandit.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </button>
                                    <div class=" btn-group-notify">
                                        <a class="actionIcon" href="#myModal" class="trigger-btn" data-toggle="modal"><span>{{ __('messages.Notification') }} {{ __('messages.Delete') }}</span><i class="fa-solid fa-trash-can textRed"></i></a>
                                    </div>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at aliquet felis. Donec gravida venenatis neque nec tincidunt. Sed vel ultricies nunc, ac laoreet tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse fermentum nisi vitae justo vestibulum vestibulum. Donec velit dui, rutrum eget pellentesque at, pharetra nec mauris. Donec tempus congue velit nec vulputate. Sed felis magna, scelerisque sed erat non, euismod ullamcorper neque. Sed sit amet ultrices mi. Vestibulum lobortis ex eros, et consectetur sapien ultricies laoreet. Donec vulputate dui nec varius blandit.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </button>
                                    <div class=" btn-group-notify">
                                        <a class="actionIcon" href="#myModal" class="trigger-btn" data-toggle="modal"><span>{{ __('messages.Notifications') }} {{ __('messages.Delete') }}</span><i class="fa-solid fa-trash-can textRed"></i></a>
                                    </div>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc at aliquet felis. Donec gravida venenatis neque nec tincidunt. Sed vel ultricies nunc, ac laoreet tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse fermentum nisi vitae justo vestibulum vestibulum. Donec velit dui, rutrum eget pellentesque at, pharetra nec mauris. Donec tempus congue velit nec vulputate. Sed felis magna, scelerisque sed erat non, euismod ullamcorper neque. Sed sit amet ultrices mi. Vestibulum lobortis ex eros, et consectetur sapien ultricies laoreet. Donec vulputate dui nec varius blandit.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="fa-solid fa-trash-can textRed"> </i>
                </div>
                <h4 class="modal-title w-100">{{ __('messages.Are_you_sure') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>{{ __('messages.Do_you_really') }}</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('messages.Cancel') }}</button>
                <button type="button" class="btn btn-danger">{{ __('messages.Delete') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection