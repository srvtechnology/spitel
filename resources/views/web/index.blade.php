@php
    use App\Models\User;
    use App\Models\BusinessType;
    use App\Models\City;
    use Illuminate\Support\Facades\Auth;

    $getBusinessType = BusinessType::all();
    $getCities = City::all();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    {{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'dir=rtl' : 'dir=ltr' }}>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jaai</title>
    <link rel=icon href="{{ asset('assets/images/svg/logo-icon.svg') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" />
</head>

<body @if (str_replace('_', '-', app()->getLocale()) === 'en') class="direction-ltr main-body" dir="ltr" @else class="direction-rtl main-body" dir="rtl" @endif>
    <header class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-content">
                        <div class="header-logo">
                            <img src="{{ asset('assets/images/svg/logo.svg') }}" />
                        </div>
                        <div class="work-lang-btns">
                            <nav class="navbar navbar-expand-lg">
                                <div class="collapse navbar-collapse menu_links" id="navbarSupportedContent">
                                    <ul class="navbar-nav nav me-auto mb-lg-0">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="#home">{{ __('messages.home') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#about">{{ __('messages.about') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#features-list">{{ __('messages.features') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="#how-it-works">{{ __('messages.How_it_Works') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#contact">{{ __('messages.contact') }}</a>
                                        </li>
                                        <li class="nav-item item-work">
                                            <a class="nav-link" href="#" data-bs-toggle="modal"
                                                data-bs-target="#workWithUs">{{ __('messages.Work_With_Us') }}</a>
                                        </li>

                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <div class="buttons">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle work-btn-hover" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('messages.Work_With_Us') }}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#workWithUs">{{ __('messages.Merchant') }}</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#workWithRepresent">{{ __('messages.Representative') }}</a>
                                    </li>
                                </ul>
                            </div>

                            {{-- <button class="Select-btn work-btn" data-bs-toggle="modal" data-bs-target="#workWithUs">
									{{ __('messages.Work_With_Us') }}
								</button> --}}
                            <!-- <button class="Select-btn work-btn" data-bs-toggle="modal" data-bs-target="#provider">
         Provider
        </button> -->

                            @if (app()->getLocale() === 'en')
                                <a href="{{ route('setLocale', 'ar') }}"
                                    class="Select-btn lang-btn select-lang-arabic">
                                    <img class="flag-icon-squared"
                                        src="{{ asset('assets/admin/flags/langIcon/sa.svg') }}" alt="">
                                    <span>{{ __('messages.Arabic') }}</span></a>
                            @else
                                <a href="{{ route('setLocale', 'en') }} " class="Select-btn lang-btn select-lang-eng">
                                    <img class="flag-icon-squared"
                                        src="{{ asset('assets/admin/flags/langIcon/au.svg') }}" alt="">
                                    <span>English</span> </a>
                            @endif
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="container-fluid banner-area" id="home">
        <div class="container position-relative header-container">
            <div class="row">
                <div class="col-12 header-section-content-wrapper">
                    <div class="h-s-c-small-heading">{{ __('messages.Browse_Hundreds_of') }}</div>
                    <div class="h-s-c-large-heading">{{ __('messages.Stores_and_Restaurants') }}</div>
                    <div class="header-section-content">

                        <div class="download_section">
                            <div class="banner-sm-img">
                                <span>{{ __('messages.Unbeatable_Offers_Irresistible_Promotions') }}</span>
                                <img src="{{ asset('assets/images/png/unbeatable-offer.png') }}">
                            </div>
                            <div class="download_inner">
                                <div class="heading-now-container">
                                    <span class="heading-now">
                                        {{ __('messages.Download') }}
                                    </span>
                                    <span class="heading-now">
                                        {{ __('messages.our_app_NOW') }}
                                    </span>
                                </div>
                                <div class="h-s-c-download-btn h-s-c-download-btn-header">
                                    <a href="#!"><img
                                            src="{{ asset('assets/images/png/google-paly.png') }}" /></a>
                                    <a href="#!"><img
                                            src="{{ asset('assets/images/png/app-store.png') }}" /></a>
                                </div>
                            </div>


                        </div>
                        <div class="mobile-desgin">
                            <img class="mobile-desgin-img" src="{{ asset('assets/images/png/banner-img.png') }}">
                        </div>
                        <div class="download_section">
                            <div class="banner-sm-img banner-sm-img-right">
                                <span>{{ __('messages.Simplified_Ordering_Pickup') }}</span>
                                <img src="{{ asset('assets/images/png/simplify-order.png') }}">
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="container-fluid common-section primary-content-wrapper" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row about-row content-row">
                        <div class="col-lg-12">
                            <div class="h-s-c-small-heading">{{ __('messages.Ultimate_Convenience') }}</div>
                            <div class="h-s-c-large-heading">{{ __('messages.for_Fresh_Essentials') }}</div>
                            <div class="detail-text main-paragraph">
                                {{ __('messages.Experience_future_hassle') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid container-fluid-discover primary-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="highlight-banner">
                        <div class="app-ss-tilt">
                            <img class="app-ss-en" src="{{ asset('assets/images/png/discover-app-ss.png') }}">
                            <img class="app-ss-ar" src="{{ asset('assets/images/png/discover-app-ss-ar.png') }}">
                        </div>
                        <div class="discover-content-wrapper">
                            <div class="discover-sm-h">
                                {{ __('messages.Discover_new_level') }}
                            </div>
                            <div class="discover-lg-h">
                                {{ __('messages.convenience') }}
                            </div>
                            <div class="discover-txt">
                                {{ __('messages.Say_goodbye_hassle') }}
                            </div>
                        </div>
                        <div class="app-man-veg">
                            <img
                                src="{{ asset('assets/images/png/man-holding-brown-paper-bag-full-fruits-vegetable-showing-thumb-up-sign.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid common-section primary-content-wrapper" id="features-list">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row about-row content-row">
                        <div class="col-lg-12">
                            <div class="h-s-c-small-heading">{{ __('messages.Explore_Our_App') }}</div>
                            <div class="h-s-c-large-heading">{{ __('messages.Unparalleled_Shopping_Experience') }}
                            </div>
                            <div class="detail-text main-paragraph mb-5">
                                {{ __('messages.plethora_cutting_edge_features_designed') }}
                            </div>
                            <div class="features-content-row">
                                <div class="features-content-img">
                                    <img src="{{ asset('assets/images/png/stores-res.png') }}">
                                </div>
                                <div class="features-content">
                                    <div class="h-s-c-small-heading">{{ __('messages.Browse_Hundreds') }}</div>
                                    <div class="h-s-c-large-heading">{{ __('messages.Stores_Restaurants') }}</div>
                                    <div class="detail-text main-paragraph">
                                        {{ __('messages.plethora_cutting_edge_features') }}
                                    </div>
                                    <img class="features-content-sm-img"
                                        src="{{ asset('assets/images/png/shop.png') }}">
                                </div>
                            </div>
                            <div class="features-content-row fcr-reverse">
                                <div class="features-content-img">
                                    <img src="{{ asset('assets/images/png/delight-ease.png') }}">
                                </div>
                                <div class="features-content">
                                    <div class="h-s-c-small-heading">{{ __('messages.Shop_Few_Clicks') }}</div>
                                    <div class="h-s-c-large-heading">{{ __('messages.Delight_in_Ease') }}</div>
                                    <div class="detail-text main-paragraph">
                                        {{ __('messages.Discover_shopping_made_effortless') }}
                                    </div>
                                    <img class="features-content-sm-img"
                                        src="{{ asset('assets/images/png/delight-ease2.png') }}">
                                </div>
                            </div>
                            <div class="features-content-row mb-0">
                                <div class="features-content-img">
                                    <img src="{{ asset('assets/images/png/time-table.png') }}">
                                </div>
                                <div class="features-content">
                                    <div class="h-s-c-small-heading">{{ __('messages.Scheduled_Order_Pickup') }}</div>
                                    <div class="h-s-c-large-heading">{{ __('messages.Ease_Your_Timetable') }}</div>
                                    <div class="detail-text main-paragraph">
                                        {{ __('messages.Embrace_seamless_shopping_experience') }}
                                    </div>
                                    <img class="features-content-sm-img fcs-img"
                                        src="{{ asset('assets/images/png/calendar-alarm.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid container-fluid-partner primary-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="highlight-banner-part">
                        <div class="part-imgs part-1-img">
                            <img src="{{ asset('assets/images/png/partener-img.png') }}">
                        </div>
                        <div class="part-content-wrapper">
                            <div class="part-sm-h">
                                {{ __('messages.Partner_with_Us') }}
                            </div>
                            <div class="part-lg-h">
                                {{ __('messages.Expand_Your_Reach') }}
                            </div>
                            <div class="part-btn-w">
                                <button class="btn btn-primary btn-part" data-bs-toggle="modal"
                                    data-bs-target="#workWithUs">
                                    {{ __('messages.Get_Started') }}
                                </button>
                            </div>
                        </div>
                        <div class="part-imgs part-2-img">
                            <img src="{{ asset('assets/images/png/partener-img2.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid common-section primary-content-wrapper" id="how-it-works">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row about-row content-row">
                        <div class="col-lg-12">
                            <div class="h-s-c-large-heading">{{ __('messages.Seamless_Ordering_Process') }}</div>
                            <div class="detail-text main-paragraph mb-5">
                                {{ __('messages.Browse_diverse_range') }}
                            </div>
                            <div class="row process-content-row">
                                <div class="col-lg-3 process-content-col">
                                    <div class="process-icon-wrapper bg-red">
                                        <div class="process-icon-inner">
                                            <img class="process-icon-1"
                                                src="{{ asset('assets/images/png/process-icon-1.png') }}">
                                        </div>
                                    </div>
                                    <div class="process-number bg-red">
                                        <span>1</span>
                                    </div>
                                    <div class="process-heading process-heading-1">
                                        {{ __('messages.Browse_Stores_Restaurants') }}
                                    </div>
                                </div>
                                <div class="col-lg-3 process-content-col">
                                    <div class="process-icon-wrapper bg-blue">
                                        <div class="process-icon-inner">
                                            <img class="process-icon-2"
                                                src="{{ asset('assets/images/png/process-icon-2.png') }}">
                                        </div>
                                    </div>
                                    <div class="process-number bg-blue">
                                        <span>2</span>
                                    </div>
                                    <div class="process-heading process-heading-2">
                                        {{ __('messages.Select_Products') }}
                                    </div>
                                </div>
                                <div class="col-lg-3 process-content-col">
                                    <div class="process-icon-wrapper bg-red">
                                        <div class="process-icon-inner">
                                            <img class="process-icon-3"
                                                src="{{ asset('assets/images/png/process-icon-3.png') }}">
                                        </div>
                                    </div>
                                    <div class="process-number bg-red">
                                        <span>3</span>
                                    </div>
                                    <div class="process-heading process-heading-3">
                                        {{ __('messages.Place_Order') }}
                                    </div>
                                </div>
                                <div class="col-lg-3 process-content-col">
                                    <div class="process-icon-wrapper bg-blue">
                                        <div class="process-icon-inner">
                                            <img class="process-icon-4"
                                                src="{{ asset('assets/images/png/process-icon-4.png') }}">
                                        </div>
                                    </div>
                                    <div class="process-number bg-blue">
                                        <span>4</span>
                                    </div>
                                    <div class="process-heading process-heading-4">
                                        {{ __('messages.Pick_Your_Order') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid common-section contact-wrapper" id="contact">
        <div class="container">
            <div class="row contact-row">
                <div class="col-12 col-container">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 contact-col-first">

                            <div class="row">
                                <div class="contactHeading">
                                    {{ __('messages.Contact_Us_Assistance') }}
                                </div>
                                <div class="contactText">
                                    {{ __('messages.Connect_Us_Assistance_Support') }}
                                </div>
                                <div class="col-md-12 contactDetailRow">
                                    <div class="contactDetailIcon contactDetailIconPhone">
                                        <img src="{{ asset('assets/images/svg/call2.svg') }}" alt="call" />
                                    </div>
                                    <div class="contactDetailText contactDetailTextPhone">
                                        <a href="tel:+966587654321" target="_blank">
                                            +966 (0) 987654321
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-12 contactDetailRow">
                                    <div class="contactDetailIcon">
                                        <img src="{{ asset('assets/images/svg/email.svg') }}" alt="email" />
                                    </div>
                                    <div class="contactDetailText contactDetailTextEmail">
                                        <a href="mailto:info@fowl.sa" target="_blank">
                                            info@fowl.sa
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12 contactDetailRow">
                                    <div class="contactDetailIcon">
                                        <img src="{{ asset('assets/images/svg/location.svg') }}" alt="location" />
                                    </div>
                                    <div class="contactDetailText contactDetailTextAddress">
                                        {{ __('messages.location_Address') }}
                                    </div>
                                </div>
                                <div class="col-md-12 contactSocialRow">
                                    <div class="contactSocialHeading">{{ __('messages.Follow_US') }}</div>
                                    <div class="contactSocialLinks">
                                        <a href="#!"><img
                                                src="{{ asset('assets/images/svg/_FacebookContact.svg') }}"></a>
                                        <a href="#!"><img
                                                src="{{ asset('assets/images/svg/_TwitterContact.svg') }}"></a>
                                        <a href="#!"><img
                                                src="{{ asset('assets/images/svg/_instagramContact.svg') }}"></a>
                                        <a href="#!"><img
                                                src="{{ asset('assets/images/svg/_SnapchatContact.svg') }}"></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 col-lg-6 contact-col-second">
                            <form id="contact-us-form" action="javascript:void(0)" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-12 form-group">
                                        <label>{{ __('messages.Name') }}</label>
                                        <div class="formInputRow">
                                            <div class="contactFormIcon">
                                                <img src="{{ asset('assets/images/svg/name.svg') }}" alt="name">
                                            </div>
                                            <input type="text" name="contact_name" class="form-control"
                                                placeholder="{{ __('messages.Enter_your_name') }}">
                                        </div>
                                    </div>


                                    <div class="col-12 form-group">
                                        <label>{{ __('messages.Phone') }}</label>
                                        <div class="formInputRow">
                                            <div class="contactFormIcon">
                                                <img class="phone-input"
                                                    src="{{ asset('assets/images/svg/call-input.svg') }}"
                                                    alt="call">
                                            </div>
                                            <input type="tel" name="contact_phone"
                                                class="form-control contactFormInputPhone"
                                                placeholder="{{ __('messages.Enter_your_number') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>{{ __('messages.Your_Message') }}</label>
                                        <div class="formInputRow">
                                            <div class="contactFormIcon contactFormIconMessage">
                                                <img src="{{ asset('assets/images/svg/message.svg') }}">
                                            </div>
                                            <textarea name="message_input" class="form-control" id="" cols="30" rows="10"
                                                placeholder="{{ __('messages.Write_your_message') }}"></textarea>
                                        </div>

                                    </div>

                                </div>
                                <button type="submit" id="submit" class="btn btn-primary float-end">
                                    {{ __('messages.Send') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
            <img class="contact-img" src="{{ asset('assets/images/png/contact.png') }}" alt="contact" />
        </div>
    </section>

    {{-- <section class="container-fluid common-section primary-content-wrapper" id="features-list">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="row features-list">
							<div class="col-12 feature-list-col">
								<div class=" main-heading"> {{ __('messages.Our_Core_Features') }}</div>
								<div class="primary-c-small-heading">{{ __('messages.sub_heading_Features') }}</div>
								<div class="primary-c-detail-text main-paragraph">
									{{ __('messages.Features_content') }}
								</div>
								<img class="elements element12" src="{{ asset('assets/images/svg/blue-gradient.svg') }}">
							</div>
						</div>
						<div class="row feature-list-row content-row feature-section">
							<div class="col-md-6">
								<div class="number-content">
									<span class="Number">01</span>
									<div class="main-heading"> {{ __('messages.Vast_Range_of_Shops_Restaurants') }}</div>
								</div>
								<div class="main-paragraph">
									{{ __('messages.Vast_Range_content') }}
								</div>
							</div>
							<div class="col-md-6 img-c-box features-list-img features-list-img-1">
								<img src="{{ asset('assets/images/png/screen1.png') }}">
							</div>
							<img class="elements element28" src="{{ asset('assets/images/svg/gradient-round.svg') }}">
						</div>
						<div class="row feature-list-row feature-list-row-2 content-row ">
							<div class="col-md-6 img-c-box features-list-img-2">
								<img src="{{ asset('assets/images/png/screen2.png') }}">
							</div>
							<div class="col-md-6 ">
								<div class="number-content">
									<span class="Number">02</span>
									<div class="main-heading"> {{ __('messages.Easy_Delivery') }}</div>
								</div>
								<div class="main-paragraph">
									{{ __('messages.Easy_Delivery_content') }}
								</div>
							</div>
							<img class="elements blue-gradient" src="{{ asset('assets/images/svg/blue-gradient.svg') }}">
							<!-- <img class="elements leaf" src="{{ asset('assets/images/svg/leaf.svg') }}"> -->
						</div>
						<div class="row feature-list-row feature-list-row-3 content-row">
							<div class="col-md-6 ">
								<div class="number-content">
									<span class="Number">03</span>
									<div class="main-heading"> {{ __('messages.Secure_Payment') }}</div>
								</div>
								<div class="main-paragraph">
									{{ __('messages.Secure_Payment_content') }}
								</div>
							</div>
							<div class="col-md-6 img-c-box features-list-img features-list-img-3">
								<img src="{{ asset('assets/images/png/screen3.png') }}">
							</div>
							<img class="elements blue-gradient-2" src="{{ asset('assets/images/svg/blue-gradient.svg') }}">
							<!-- <img class="elements box" src="{{ asset('assets/images/svg/box.svg') }}"> -->
						</div>
						<div class="row feature-list-row feature-list-row-4 content-row">
							<div class="col-md-6 img-c-box features-list-img-4">
								<img src="{{ asset('assets/images/png/screen4.png') }}">
							</div>
							<div class="col-md-6 ">
								<div class="number-content">
									<span class="Number">04</span>
									<div class="main-heading">{{ __('messages.Track_Orders') }} </div>
								</div>
								<div class="main-paragraph">
									{{ __('messages.Track_Orders_content') }}
								</div>
							</div>
							<img class="elements orange-gradient" src="{{ asset('assets/images/svg/gradient-round.svg') }}">
						</div>

						<div class="row">
							<div class="col-12 provider-box">
								<div class=" delivery-provider">
									<img class="elements provider-img" src="{{ asset('assets/images/svg/bike.svg') }}">
								</div>
								<div class="provider-content">
									<div class="discover-heading"> {{ __('messages.Work_with_Provider') }}</div>
									<div class="providertext"> {{ __('messages.Work_with_Provider_content') }}</div>
									<button class="provider-btn" data-bs-toggle="modal" data-bs-target="#provider">
										<span> {{ __('messages.Get_Started') }}</span>
										<img src="{{ asset('assets/images/svg/arrow-right.svg') }}" alt="">
									</button>
								</div>

								<img class="elements  blue-shadow" src="{{ asset('assets/images/svg/blue-shadow.svg') }}">
							</div>
						</div>
					</div>
				</div>
			</div>

		</section>

		<section class="container-fluid common-section primary-content-wrapper process-content-wrapper" id="how-it-works">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="row features-list">
							<div class="col-12 feature-list-col">
								<div class=" main-heading"> {{ __('messages.Ordering_Process') }}</div>
								<div class="primary-c-detail-text main-paragraph">
									{{ __('messages.Ordering_Process_content') }}
								</div>
							</div>
						</div>
						<div class="row process-row content-row">
							<div class="col-sm-12 col-md-6  col-lg-3 ">
								<div class="process-content">
									<div class="process-icon"><img src="{{ asset('assets/images/svg/find.svg') }}"></div>
									<div class="process-txt">
										{{ __('messages.Find_Merchant') }}
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-6  col-lg-3 ">
								<div class="process-content">
									<div class="process-icon"><img src="{{ asset('assets/images/svg/choose.svg') }}"></div>
									<div class="process-txt">
										{{ __('messages.Choose_Products') }}
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-6  col-lg-3 ">
								<div class="process-content">
									<div class="process-icon"><img src="{{ asset('assets/images/svg/checkout.svg') }}"></div>
									<div class="process-txt">
										{{ __('messages.Checkout_Payment') }}
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-6  col-lg-3">
								<div class="process-content">
									<div class="process-icon"><img src="{{ asset('assets/images/svg/delivery.svg') }}"></div>
									<div class="process-txt">
										{{ __('messages.Delivery') }}
									</div>
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-12 process-box">
								<img class=" elements devliery-pizza-boy" src="{{ asset('assets/images/png/pizza-deliver.png') }}">
								<div class="process-content merchant-box">
									<div class="discover-heading"> {{ __('messages.Join_Merchant') }}</div>
									<!-- <div class="provider-btn" >
									<a href="" class="btn-color">Get Started</a>
									<img src="{{ asset('assets/images/svg/arrow-right-or.svg') }}" alt="">
								</div> -->
									<button class="provider-btn" data-bs-toggle="modal" data-bs-target="#merchant">
										<span class="btn-color"> {{ __('messages.Get_Started') }}</span>
										<img src="{{ asset('assets/images/svg/arrow-right-or.svg') }}" alt="">
									</button>

								</div>
								<img class="elements delivery-grocery-boy" src="{{ asset('assets/images/png/grocery-deliver.png') }}">
								<img class="elements element9" src="{{ asset('assets/images/png/shadow.png') }}">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="container-fluid common-section features-wrapper" id="contact">
			<div class="container container-contact">
				<div class="row row-contact">
					<div class="col-sm-12 col-md-6 col-lg-6">
						<div class="contact-heading">{{ __('messages.Contact_Us') }}</div>
						<div class="contact-detail-text">
							{{ __('messages.Contact_Us_content') }}
						</div>
						<div class="contact-cr">
							<img src="{{ asset('assets/images/svg/phone.svg') }}" dir="ltr"> <span dir="ltr">{{ __('messages.phone') }} </span>
						</div>
						<div class="contact-cr">
							<img src="{{ asset('assets/images/svg/email.svg') }}" dir="ltr"> <span dir="ltr"> {{ __('messages.email') }}</span>
						</div>
						<div class="contact-cr">
							<img src="{{ asset('assets/images/svg/location.svg') }}"> <span>{{ __('messages.location') }}</span>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6 contact-img-container">
						<img class="contact-img" src="{{ asset('assets/images/svg/contect-img.svg') }}">
					</div>

				</div>
			</div>
		</section>
 		--}}
    <footer class="container-fluid bg-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 footer-content">
                    <div class="footer-logo"><img src="{{ asset('assets/images/svg/logo-white.svg') }}"></div>
                    <div class="footer-nav menu_links">
                        <ul>
                            <li class="active"><a class="nav-link" href="#home">{{ __('messages.home') }}</a></li>
                            <li><a class="nav-link" href="#about">{{ __('messages.about') }}</a></li>
                            <li><a class="nav-link" href="#features-list">{{ __('messages.features') }}</a></li>
                            <li><a class="nav-link" href="#how-it-works">{{ __('messages.How_it_Works') }}</a></li>
                            <li><a class="nav-link" href="#contact">{{ __('messages.contact') }}</a></li>
                            {{-- <li><a class="nav-link" href="{{ url('/privacy') }}">{{ __('messages.privacyTerms')}}</a></li> --}}
                        </ul>

                        {{-- <div class="footer-copyright">&copy; {{date('Y')}} . {{ __('messages.all_rights') }}</div> --}}
                    </div>
                    <div class="social-footer">
                        <a href="#"><img src="{{ asset('assets/images/svg/_Facebook.svg') }}" /></a>
                        <a href="#"><img src="{{ asset('assets/images/svg/_Twitter.svg') }}" /></a>
                        <a href="#"><img src="{{ asset('assets/images/svg/_instagram.svg') }}" /></a>
                        <a href="#"><img src="{{ asset('assets/images/svg/_Snapchat.svg') }}" /></a>
                    </div>
                    <div class="h-s-c-download-btn">
                        <a href="#!"><img src="{{ asset('assets/images/png/google-paly.png') }}" /></a>
                        <a href="#!"><img src="{{ asset('assets/images/png/app-store.png') }}" /></a>
                    </div>
                    {{-- <div class="footer-copyright footer-copyright-2">&copy; {{date('Y')}} {{ __('messages.appName') }}. {{ __('messages.all_rights') }}</div> --}}
                </div>
            </div>
        </div>
    </footer>



    <!-- model -->
    <div class="modal fade" id="workWithUs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <input type="hidden" id="base_url" value="{{url('/')}}">
        <input type="hidden" id="current_lang" value="{{app()->getLocale()}}">
        <form method="POST"  enctype="multipart/form-data" id="merchant_form">
            @csrf
            <div class="modal-dialog modal-xl modal-dialog-wwu">
                <div class="modal-content">
                    <div class="modal-body modal-body-wwu">
                        <div class="row features-row order-swipe-1">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="Mainheading-model">
                                        <div class="main-heading-mod">{{ __('messages.Work_Merchant') }}</div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-submission-message" id="form-submission-message">
                                            <div class="alert form-msg-type" role="alert">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="wwu-card">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="model-heading"> {{ __('messages.Business_Detail') }}
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-lg-6 form-group">
                                                    <label> {{ __('messages.Business_Name') }}</label>
                                                    <input type="text" name="business_name" id="business_name"
                                                           class="form-control"
                                                           placeholder="{{ __('messages.Business_Name') }}">
                                                    <p class="business_name text-danger"></p>
                                                    @error('business_name')
                                                    <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror

                                                </div>
                                                <div class="col-md-12 col-lg-6 form-group">
                                                    <label> {{ __('messages.Business_Type') }}</label>
                                                    <select class="form-select category_id"
                                                            aria-label="Default select example "
                                                            name="business_type" id="business_type" required>
                                                        <option selected disabled>{{ __('messages.Select_Business_Type') }}
                                                        </option>
                                                        @if(app()->getLocale() == 'ar')
                                                        @foreach($getBusinessType as $types)
                                                        <option value="{{$types->id}}">{{ $types->name_arabic}}</option>
                                                        @endforeach
                                                        @else
                                                            @foreach($getBusinessType as $types)
                                                                <option value="{{$types->id}}">{{ $types->name_eng}}</option>
                                                            @endforeach
                                                        @endif
{{--                                                        <option value="food">{{ __('messages.food') }}</option>--}}
{{--                                                        <option value="grocery">{{ __('messages.grocery') }}</option>--}}
                                                    </select>

                                                </div>

                                                <div class="col-md-12 form-group">
                                                    <label> {{ __('messages.Select_Product_Category') }}</label>
                                                    <div class="div-pc" id="div-pc">
                                                        <select multiple name="poroduct_category[]" id="categories"
                                                                class="form-select categories_data selectpicker"  required>
                                                        </select>
                                                    </div>
                                                    <div class="error-product-category">

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="wwu-card">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="model-heading">{{ __('messages.Contact_Detail') }}
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-lg-6">
                                                            <div class="row">
                                                                <div class="col-md-12 form-group">
                                                                    <label>
                                                                        {{ __('messages.Contact_Number') }}</label>
                                                                    <input type="text" name="contact_number"
                                                                           id="contact_number" class="form-control"
                                                                           placeholder="{{ __('messages.Contact_Number') }}">
                                                                    <p class="contact_number text-danger"></p>
                                                                    @error('contact_number')
                                                                    <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label>{{ __('messages.Contact_email') }}</label>
                                                                    <input type="text" name="email_communication"
                                                                           class="form-control" id="email_communication"
                                                                           placeholder="{{ __('messages.Contact_email') }}">
                                                                    <p class="email_communication-error text-danger"></p>
                                                                    @error('email_communication')
                                                                    <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label>{{ __('messages.Director_Name') }}</label>
                                                                    <input type="text" name="manager_name"
                                                                           id="manager_name" class="form-control"
                                                                           placeholder="{{ __('messages.Director_Name') }}">
                                                                    <p class="manager_name text-danger"></p>
                                                                    @error('manager_name')
                                                                    <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-12 form-group">
                                                                    <label>{{ __('messages.Director_Number') }}</label>
                                                                    <input type="text" name="mob_of_manger"
                                                                           id="mob_of_manger" class="form-control"
                                                                           placeholder="{{ __('messages.Director_Number') }}">
                                                                    <p class="mob_of_manger text-danger"></p>
                                                                    @error('mob_of_manger')
                                                                    <span class="text-danger">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-lg-6">
                                                            <div class="row">
                                                                <div class="col-md-12 form-group addressWrapper">
                                                                    <label> {{ __('messages.Address') }}</label>
                                                                    <input type="text" name="address"
                                                                           class="pac-input form-control"
                                                                           placeholder="{{ __('messages.Address') }}" id="searchInput">
                                                                    <div id="map" class="map"></div>
                                                                    <input id="lat" name="lat"
                                                                           type="hidden" value="">
                                                                    <input id="lng" name="lng"
                                                                           type="hidden" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="wwu-card">
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <div class="model-heading">
                                                        {{ __('messages.Registration_Detail') }}</div>
                                                </div>
                                                <div class="col-md-12 col-lg-6 form-group">
                                                    <label> {{ __('messages.Licence_Number') }}</label>
                                                    <input type="text" name="license_no" class="form-control"
                                                           id="license_no"
                                                           placeholder="{{ __('messages.Licence_Number') }}">
                                                    <p class="license_no text-danger"></p>
                                                    @error('license_no')
                                                    <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 col-lg-6 form-group">
                                                    <label>
                                                        {{ __('messages.Commercial_Registration_Number') }}</label>
                                                    <input type="text" name="communication_reg_no"
                                                           id="communication_reg_no" class="form-control"
                                                           placeholder="{{ __('messages.Commercial_Registration_Number') }}">
                                                    <p class="communication_reg_no text-danger"></p>
                                                    @error('communication_reg_no')
                                                    <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 col-lg-6 form-group">
                                                    <label> {{ __('messages.Tax_number') }}</label>
                                                    <input type="text" name="tax_no" class="form-control"
                                                           id="tax_no"
                                                           placeholder="{{ __('messages.Tax_number') }}">
                                                    <p class="tax_no text-danger"></p>
                                                    @error('tax_no')
                                                    <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 col-lg-6 form-group">
                                                    <label>{{ __('messages.Representative_Referral_Code') }}</label>
                                                    <input type="text" name="representative_offer"
                                                           id="representative_offer" class="form-control"
                                                           placeholder="{{ __('messages.Representative_Referral_Code') }}">
                                                    <p class="representative_offer-error text-danger"></p>
                                                    @error('representative_offer')
                                                    <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-md-12 col-lg-6 form-group col-detail-view uploadImagesBarInner">
                                                    <label> {{ __('messages.Commercial_Certificate') }}</label>
                                                    <div class="col-md-12 uploadImgWrapper">
                                                        <input type="file" name="commercial_certificate"
                                                               id="commercial_certificate" class="customefile1"
                                                               accept="image/*">
                                                        <div class="uploadImgContainer customebrowse1">
                                                            <img id="customepreview1"
                                                                 src="{{ asset('assets/images/svg/upload.svg') }}">
                                                            <span>{{ __('messages.Upload_Tax_Certificate') }}</span>
                                                        </div>
                                                        <p class="commercial_certificate text-danger"></p>
                                                        @error('commercial_certificate')
                                                        <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-md-12 col-lg-6 form-group col-detail-view uploadImagesBarInner">
                                                    <label>{{ __('messages.Tax_Certificate') }}</label>
                                                    <div class="col-md-12 uploadImgWrapper">
                                                        <input type="file" name="tax_certificate"
                                                               id="tax_certificate" class="customefile2"
                                                               accept="image/*">
                                                        <div class="uploadImgContainer customebrowse2">
                                                            <img id="customepreview2"
                                                                 src="{{ asset('assets/images/svg/upload.svg') }}">
                                                            <span>{{ __('messages.Upload_Commercial_Certificate') }}</span>
                                                            <p class="tax_certificate text-danger"></p>
                                                            @error('tax_certificate')
                                                            <span class="text-danger">
                                                                    {{ $message }}
                                                                </span>
                                                            @enderror
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
                    <div class="modal-footer">
                        <div class="btn-container ">
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">{{ __('messages.Cancel') }}</button>
                        </div>
                        <button type="submit" id="merchant_submit" class="btn btn-primary form-submit">
                            {{ __('messages.submit') }}
                            <div class="lds-ring" id="loader"><div></div><div></div><div></div><div></div></div>
                        </button>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </div>
    <div class="modal fade" id="workWithRepresent" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form method="POST" id="representative_form">
            @csrf
            <div class="modal-dialog modal-xl modal-dialog-wwu">
                <div class="modal-content">
                    <div class="modal-body modal-body-wwu">
                        <div class="row features-row order-swipe-1">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="Mainheading-model">
                                        <div class="main-heading-mod">{{ __('messages.Work_Representative') }}</div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="wwu-card">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="model-heading">{{ __('messages.Representative') }}
                                                        {{ __('messages.Detail') }}</div>
                                                </div>
                                                <div class="col-md-12 col-lg-6 form-group">
                                                    <label> {{ __('messages.Name') }}</label>
                                                    <input type="text" name="name" class="form-control"
                                                        id="name" placeholder="{{ __('messages.Name') }}"
                                                        value="{{ old('name') }}">
                                                    <p class="name text-danger"></p>

                                                </div>
												<div class="col-md-12 col-lg-6 form-group">
                                                    <label> {{ __('messages.Mobile_Number') }}</label>
                                                    <input type="number" name="mobile_no" id="mobile_no"
                                                        class="form-control"
                                                        placeholder="{{ __('messages.Mobile_Number') }}"
                                                        value="{{ old('mobile_no') }}">
                                                    @error('mobile_no')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <p class="mobile_no text-danger"></p>
                                                </div>
												<div class="col-md-12 col-lg-6 form-group">
                                                    <label> {{ __('messages.Email') }}</label>
                                                    <input type="email" name="email" id="email"
                                                        class="form-control"
                                                        placeholder="{{ __('messages.Email') }}"
                                                        value="{{ old('email') }}">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <p class="email-error-msg text-danger"></p>
                                                </div>

                                                <div class="col-md-12 col-lg-6 form-group">
                                                    <label> {{ __('messages.id_Number') }}</label>
                                                    <input type="text" name="id_number" id="id_number"
                                                        class="form-control"
                                                        placeholder="{{ __('messages.id_Number') }}"
                                                        value="{{ old('id_number') }}">
                                                    @error('id_number')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <p class="id_number text-danger"></p>
                                                </div>
												<div class="col-md-12 col-lg-6 form-group">
                                                    <label> {{ __('messages.City') }}</label>
                                                    <select name="city" id="city" class="form-select">
                                                        <option selected disabled>{{ __('messages.city_validation') }}</option>
                                                        @if(app()->getLocale() == 'ar')
                                                            @foreach($getCities as $cities)
                                                                <option value="{{$cities->id}}">{{ $cities->name_arb}}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach($getCities as $cities)
                                                                <option value="{{$cities->id}}">{{ $cities->name_eng}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <p class="city text-danger"></p>
                                                    @error('city')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                                <div class="col-md-12 col-lg-6 form-group">
                                                    <label> {{ __('messages.Neighborhood') }}</label>
                                                    <input type="text" name="neighborhood" id="neighborhood"
                                                        class="form-control"
                                                        placeholder="{{ __('messages.Neighborhood') }}"
                                                        value="{{ old('neighborhood') }}">
                                                    <p class="neighborhood text-danger"></p>
                                                    @error('neighborhood')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                                <div class="col-md-12 col-lg-6 form-group">
                                                    <label> {{ __('messages.Neighborhood1') }}</label>
                                                    <input type="text" name="neighborhood_1" id="neighborhood_1"
                                                        class="form-control"
                                                        placeholder="{{ __('messages.Neighborhood2') }}"
                                                        value="{{ old('neighborhood_1') }}">
                                                    @error('neighborhood_1')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <p class="neighborhood_1 text-danger"></p>
                                                </div>
                                                <div class="col-md-12 col-lg-6 form-group">
                                                    <label> {{ __('messages.other_Doc') }}</label>
                                                    <input type="file" name="other_doc" id="other_doc"
                                                        class="form-control"
                                                        placeholder="{{ __('messages.other_Doc') }}">
                                                    @error('other_doc')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <p class="other_doc text-danger"></p>
                                                </div>
                                                <div class="row">
                                                    <div
                                                        class="col-md-12 col-lg-6 form-group col-detail-view uploadImagesBarInner">
                                                        <label> {{ __('messages.Image') }}</label>
                                                        <div class="col-md-12 uploadImgWrapper">
                                                            <input type="file" name="img" class="customefile3" id="representative_img"
                                                                accept="image/*">
                                                            <div class="uploadImgContainer customebrowse3">
                                                                <img id="customepreview3"
                                                                    src="{{ asset('assets/images/svg/upload.svg') }}">
                                                                {{-- <span>{{ __('messages.Upload_Tax_Certificate')}}</span> --}}
                                                            </div>
                                                            @error('img')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                            <p class="img text-danger"></p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-12 col-lg-6 form-group col-detail-view uploadImagesBarInner">
                                                        <label>{{ __('messages.ID_Image') }}</label>
                                                        <div class="col-md-12 uploadImgWrapper">
                                                            <input type="file" name="id_upload" id="id_upload"
                                                                class="customefile4" accept="image/*">
                                                            <div class="uploadImgContainer customebrowse4">
                                                                <img id="customepreview4"
                                                                    src="{{ asset('assets/images/svg/upload.svg') }}">
                                                                {{-- <span>{{ __('messages.Upload_Commercial_Certificate')}}</span> --}}
                                                            </div>
                                                            @error('id_upload')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                {{-- <div class="col-md-12 col-lg-6 form-group">
														<label> {{ __('messages.Business_Type')}}</label>
														<select class="form-select" aria-label="Default select example">
															<option selected>{{ __('messages.Select_Business_Type') }}</option>
															<option value="1">One</option>
															<option value="2">Two</option>
															<option value="3">Three</option>
														</select>
													</div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-container ">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ __('messages.Cancel') }}</button>
                        </div>
                        <button type="submit" id="representative_submit" class="btn btn-primary">
                            {{ __('messages.submit') }}
                            <div class="lds-ring" id="loader2"><div></div><div></div><div></div><div></div></div>
                        </button>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </div>


    <script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap-select.js') }}"></script>
    <!-- Load the plugin bundle. -->
    <link rel="stylesheet" href="{{ asset('assets/css/filter_multi_select.css') }}" />
    <script src="{{ asset('assets/js/filter-multi-select-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollspy.js') }}"></script>
    <script src="{{ asset('assets/js/mains.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/custom.js') }}" type="text/javascript"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHKgO_ANzKuSjQCQxwEx2bYlbmxBu_F5U&callback=initAutocomplete&libraries=places&v=weekly"
        defer></script>
    <script src="{{ asset('assets/js/landing-page.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/mapInput.js') }}"></script>
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // Use the plugin once the DOM has been loaded.
        $(function() {
            // Apply the plugin
            var categories = $('#categories').filterMultiSelect();
            // var categories = $('#categories').selectpicker();
            // var categories = $('#categories').select2();
        });

        $(function() {
            // $('.selectpicker').selectpicker();
        });
        var translations = {
            allSelect: @json(__('messages.Select_Product_Category')),
            // Add other translations here
        };
    </script>
    <script>
        // img prev 1

        $(document).on("click", ".customebrowse1", function() {
            var file = $(this).parents().find(".customefile1");
            file.trigger("click");
        });

        $('input.customefile1[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#customefile1").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("customepreview1").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });
        // img prev 2

        $(document).on("click", ".customebrowse2", function() {
            var file = $(this).parents().find(".customefile2");
            file.trigger("click");
        });

        $('input.customefile2[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#customefile2").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("customepreview2").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });
        // img prev 3

        $(document).on("click", ".customebrowse3", function() {
            var file = $(this).parents().find(".customefile3");
            file.trigger("click");
        });

        $('input.customefile3[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#customefile3").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("customepreview3").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });
        // img prev 4

        $(document).on("click", ".customebrowse4", function() {
            var file = $(this).parents().find(".customefile4");
            file.trigger("click");
        });

        $('input.customefile4[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#customefile4").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("customepreview4").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });
    </script>
    <script>
        // Accessing a PHP variable in JavaScript
        var dataFromBlade ={
            'business_name_validation' :@json(__('messages.business_name_validation')),
            'business_type_validation' :@json(__('messages.business_type_validation')),
            'poroduct_category_validation' :@json(__('messages.poroduct_category_validation')),
            'contact_number_validation' :@json(__('messages.contact_number_validation')),
            'contact_number_validation_valid' :@json(__('messages.contact_number_validation_valid')),
            'contact_number_validation_minlength' :@json(__('messages.contact_number_validation_minlength')),
            'address_validation' :@json(__('messages.address_validation')),
            'email_communication_validation' :@json(__('messages.email_communication_validation')),
            'password_validation' :@json(__('messages.password_validation')),
            'manager_name_validation' :@json(__('messages.manager_name_validation')),
            'mob_of_manger_validation' :@json(__('messages.mob_of_manger_validation')),
            'license_no_validation' :@json(__('messages.license_no_validation')),
            'communication_reg_no_validation' :@json(__('messages.communication_reg_no_validation')),
            'tax_no_validation' :@json(__('messages.tax_no_validation')),
            'representative_offer_validation' :@json(__('messages.representative_offer_validation')),
            'certificates_validation' :@json(__('messages.certificates_validation')),
            'wrong_reffaral_code' :@json(__('messages.wrong_reffaral_code')),
            'form_submission_msg_success' :@json(__('messages.form_submission_msg_success')),
            'form_submission_title_success' :@json(__('messages.form_submission_title_success')),
            'form_submission_msg_error' :@json(__('messages.form_submission_msg_error')),
            'form_submission_title_error' :@json(__('messages.form_submission_title_error')),
            'name_validation' :@json(__('messages.name_validation')),
            'id_number_validation' :@json(__('messages.id_number_validation')),
            'city_validation' :@json(__('messages.city_validation')),
            'neighborhood_validation' :@json(__('messages.neighborhood_validation')),
            'neighborhood_second_validation' :@json(__('messages.neighborhood_second_validation')),
            'valid_email_validation' :@json(__('messages.valid_email_validation')),
            'exits_email_validation' :@json(__('messages.exits_email_validation')),
        }
        // Using the data in JavaScript
        // console.log(dataFromBlade);
    </script>
</body>

</html>
