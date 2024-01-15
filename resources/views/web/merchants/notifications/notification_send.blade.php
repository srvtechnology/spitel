@extends('master-merchant')
@section('content')
    <div class="main-heading-container">
        <div class="common-title">Notification</div>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">

        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card-common">
                    <div class="card-topbar-inner">
                        <div class="card-topbar-title">Send Notification</div>
                    </div>

                    <div class="card-common-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-6 form-group">
                                <label>Notification Subject</label>
                                <input type="text" name="product_name" class="form-control" placeholder="Notification Subject">
                            </div>
                            <div class="col-md-12 col-lg-6 form-group">
                                <label>Notification Body</label>
                                <input type="text" name="notification_body" class="form-control" placeholder="Notification Body">
                            </div>
                            <div class="col-md-12 col-lg-6 form-group">
                                <div class="uploadImagesBarInner">
                                    <label>Attachment</label>
                                    <br>
                                    <div class="col-md-12 form-group uploadImgWrapper">
                                        <input type="file" name="image" class="file1" accept="image/*">
                                        <div class="uploadImgContainer">
                                            <div class="cameraIcon"><img class="browse1" src="{{asset('assets/admin/images/camera.svg')}}"></div>
                                            <img id="preview1" src="{{asset('assets/admin/images/placeholderBox.svg')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="btnWrapperPrimary">
                        <div class="col-12 d-flex form-btns">
                            <button class="btn btn-outline-danger w-170" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary w-170">Send</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
