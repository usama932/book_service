
@extends('layouts.frontend')

@section('content')

    <div class="section-top" style="background-image:url(' {{asset("uploads")}}/{{$setting->value ?? ""}}');">
        <div class="section-top-content d-flex flex-column align-items-center justify-content-center">
            <div class="container">
                <div class="row">
                    {{-- <div class="col-md-12 text-center">
                        <h5 class="mb-3">You're 60 seconds away</h5>
                        <h2 class="mb-3">From Booking Service!</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" class="mb-3" viewBox="0 0 100 100" data-icon-name="general_spray_bottle"><path d="M49.42,87.45c-2.94,0-6.33-.12-9-.21-1.6-.06-2.86-.1-3.52-.1a9.09,9.09,0,0,1-8.37-6c-.07-.2-6.8-20.52,4.74-39.7a2.92,2.92,0,0,1,1.16-.91h9.7a1,1,0,0,1,.45.1c.18.09,4.46,2.25,4.46,6.38a16,16,0,0,1-.51,3.55c-.49,2.2-.69,3.41.57,4.67,2.47,2.48,9.44,9.12,9.51,9.19l.1.12a18.69,18.69,0,0,1,3.42,8.54c.6,6-1.52,9.66-1.73,10a8.9,8.9,0,0,1-5.27,4A32,32,0,0,1,49.42,87.45ZM35,42.57a46.26,46.26,0,0,0-6.4,24.89,48.46,48.46,0,0,0,1.88,13,7.11,7.11,0,0,0,6.46,4.62c.69,0,2,0,3.59.1,4.51.16,12.06.42,14.2-.08a7,7,0,0,0,4-3l0,0a15.05,15.05,0,0,0,1.44-8.75,16.86,16.86,0,0,0-3-7.46c-.71-.67-7.13-6.79-9.49-9.17-2.1-2.11-1.59-4.36-1.11-6.54A14.21,14.21,0,0,0,47,47c0-2.46-2.44-4.06-3.15-4.47Z"></path><path d="M28,64.37a1,1,0,0,1,0-2l27.74-.3a1,1,0,0,1,0,2L28,64.37Z"></path><path d="M44.88,38.29H41.75a1,1,0,0,1,0-2h2.11A13.6,13.6,0,0,1,47.55,27c2.9-2.88,7.26-4.11,13-3.65.39-.47.84-1.36.84-3.39a2.54,2.54,0,0,0-1-2.1H32.82c-3.1,0-3.93,1.91-4.92,5-.2.62-.4,1.25-.63,1.85,6.25,2.94,7.39,9,7.6,11.48h3.86a1,1,0,1,1,0,2H33.9a1,1,0,0,1-1-1c0-.33.18-8.1-7.34-11A1,1,0,0,1,25,24.84a14.89,14.89,0,0,0,.94-2.5c.86-2.72,2-6.45,6.84-6.45H60.59A1,1,0,0,1,61,16a4.54,4.54,0,0,1,2.32,4c0,3.06-.89,4.33-1.77,5.17a1,1,0,0,1-.79.28c-5.31-.5-9.29.51-11.82,3-3.49,3.45-3.1,8.68-3.1,8.73a1,1,0,0,1-1,1.09Z"></path><path d="M47.52,79.71a1,1,0,0,1-.69-.27c-.12-.11-2.94-2.8-5.32-8.87C39.35,65,37.14,55.5,38.9,41.38a1,1,0,0,1,2,.25C37.64,67.74,48.1,77.87,48.21,78a1,1,0,0,1-.69,1.74Z"></path><path d="M57.61,24.7a1,1,0,0,1-1-1v-6.8a1,1,0,0,1,2,0v6.8A1,1,0,0,1,57.61,24.7Z"></path><path d="M60.63,42.79A10.87,10.87,0,0,1,50.1,35.26l-3.23-1a1,1,0,0,1,.58-1.93l3.74,1.12a1,1,0,0,1,.69.73,9,9,0,0,0,5.71,6.11c-4.74-5.41-5.42-13.06-5.45-13.43a1,1,0,1,1,2-.16c0,.09.86,9.59,7.08,14.24a1,1,0,0,1-.6,1.81Z"></path><path d="M34.12,42.51a1,1,0,0,1-1-1L33,37.17a1,1,0,1,1,2-.05l.12,4.36a1,1,0,0,1-1,1Z"></path><path d="M44.74,42.51a1,1,0,0,1-1-1l-.12-4.65a1,1,0,1,1,2-.05l.12,4.65a1,1,0,0,1-1,1Z"></path><path d="M65.51,17.93A1,1,0,0,1,65,16l6.32-3.37a1,1,0,0,1,.95,1.78L66,17.81A1,1,0,0,1,65.51,17.93Z"></path><path d="M65.81,21.9a1,1,0,0,1,0-2l8.27-.07a1,1,0,1,1,0,2l-8.27.07Z"></path><path d="M72,29.08a1,1,0,0,1-.43-.1l-6.69-3.16A1,1,0,1,1,65.74,24l6.69,3.16A1,1,0,0,1,72,29.08Z"></path><path d="M54.24,82.15a1,1,0,0,1-.51-1.87c1.15-.68,3-5,1.6-9a1,1,0,0,1,1.9-.68c1.69,4.7-.33,10.19-2.47,11.46A1,1,0,0,1,54.24,82.15Z"></path><path d="M54.36,68.72a1,1,0,0,1-.75-.33c-.2-.22-.41-.44-.64-.64a1,1,0,0,1,1.36-1.49c.27.25.53.51.77.78a1,1,0,0,1-.75,1.68Z"></path></svg> --}}
                    </div>
                </div>
            </div>
            <div class="container-fluid container-lg">
                <div class="row row-cols-1 row-cols-md-5 mt-5">
                    {{-- <div class="col section-top-blocks">
                        <i aria-hidden="true" class="far fa-calendar-alt"></i>
                        <h6>Choose your date and time 7 days a week</h6>
                    </div>
                    <div class="col section-top-blocks">
                        <i aria-hidden="true" class="fas fa-clock"></i>
                        <h6>BOOK IN ONE MINUTE</h6>
                    </div>
                    <div class="col section-top-blocks">
                        <i aria-hidden="true" class="fab fa-cc-visa"></i>
                        <h6>PAY SECURELY ONLINE</h6>
                    </div>
                    <div class="col section-top-blocks">
                        <i aria-hidden="true" class="fas fa-clipboard-check"></i>
                        <h6>NO CONTRACTS. CANCEL ANYTIME</h6>
                    </div>
                    <div class="col section-top-blocks">
                        <i aria-hidden="true" class="far fa-comments"></i>
                        <h6>YOU ARE 60 SECOND AWAY FROM XTREMLY CLEAN HOME!</h6>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="section-content section-space">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h3 class="text-uppercase mb-3">Complete your booking</h3>
                    <h6 class="text-uppercase">Provide us with few details about you & your home!</h6>
                </div>
            </div>

            <div class="row">
              
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
             
                <div class="col-md-12 col-lg-8">
                    <div class="booking-panel shadow-border">

                        <form role="form"  action="{{route('check_orders.store')}}"  method="post" 
                            class="require-validation booking-form"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="pk_test_H0n8RftpV3rgITLNU4HpFqMs"
                            id="payment-form">
                            @csrf

                     
                            <fieldset>
                                <h5 class="booking-form-heading">STEP 1: WHO YOU ARE</h5>
                                <p>This information will be used to contact you about your service.</p>

                                <div class="row mt-4">
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" name="first_name" placeholder="First Name***" type="text" required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control"  name="last_name" placeholder="Last Name*" type="text" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" name="email" placeholder="Email***" type="email" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" name="home_phone_number" placeholder="Home Phone***" type="text" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" name="cell_phone" placeholder="Cell Phone***" type="text" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" name="address" placeholder="Address***" type="text" required>
                                    </div>
                                        

                                    <div class="col-md-12 mb-6">
                                        <input class="form-control " name="how_did_hear" id="how_did_hear" placeholder="how did hear" type="text" required>
                                    </div>
                                
                                </div>

                            </fieldset>


                            <fieldset>
                                <h5 class="booking-form-heading">STEP 2: SELECT SERVICE</h5>
                                <p>Add  Service</p>
                                <div class="row mt-4"> 
                                     @foreach($services as $service)
                                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3">
                                            <div class="custom-checkbox-group">
                                                <div id="services">
                                                    <input class="form-check-input" type="checkbox"   id="extra_service_{{$service->id.'1'}}" value="{{$service->id}}" name="services[]"  data-price="{{ $service->price }}" data-service="{{$service->title}}">
                                                    <label for="extra_service_{{$service->id.'1'}}">
                                                    
                                                        <span class="custom-checkbox-group-icon">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                        <span class="custom-checkbox-group-heading"> {{$service->title}} +${{$service->price}}</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div> 
                            </fieldset>

                            <fieldset>
                                <h5 class="booking-form-heading">STEP 3: SELECT EXTRAS SERVICE</h5>
                                <p>Add Extra Service</p>
                                <div class="row mt-4"> 
                                     @foreach($extra_services as $service)
                                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3">
                                            <div class="custom-checkbox-group">
                                                <div id="services">
                                                    <input class="form-check-input" type="checkbox"   id="extra_service_{{$service->id}}" value="{{$service->id}}" name="extraservices[]"  data-price="{{ $service->price }}" data-service="{{$service->title}}">
                                                    <label for="extra_service_{{$service->id}}">
                                                    
                                                        <span class="custom-checkbox-group-icon">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                        <span class="custom-checkbox-group-heading"> {{$service->title}} +${{$service->price}}</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div> 
                            </fieldset>

                        
                            <fieldset>
                                <h5 class="booking-form-heading">STEP 4: SELECT PAYMENT</h5>
                                <p>Enter your card information below. You will be charged after service has been rendered.</p>

                                <div class="row mt-4">
                                    <div class="col-md-12 mb-4">
                                        <div class="card_field_wrapper mb-3">
                                            
                                        </div>
                                        <img alt="" src="{{asset('frontend/images/cards_img.png')}}"/>
                                    </div>
                                     <div class="row mt-4">
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control "  placeholder="Name on Card***" type="text" value="master" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control card-number"  placeholder="Card Number" type="text"  value="4242424242424242" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input class="form-control card-cvc"  placeholder="CVC***"  value="121" type="text" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input
                                        class='form-control card-expiry-month' placeholder='MM' size='2' value="12"
                                        type='text' required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input
                                        class='form-control card-expiry-year' placeholder='YYYY' size='4' value="2029"
                                        type='text' required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <input class="form-control" id="totalbill" name="totalbill"  placeholder="0.00" type="text" readonly>
                                    </div>

                                </div>
                                    <div class="col-md-12">
                                        <p>I authorizeBooking Service to charge my credit card above for agreed upon purchases. I understand that my information will be saved to file for further transactions on my account.</p>
                                    </div>
                                </div> 
                            </fieldset>

                            <fieldset>
                                <p>By clicking the Book Now button you are agreeing to our Terms of Service and Privacy Policy.</p>
                                <p>Don't worry, you won't be billed until the day of service and you will receive an email receipt instantly. We no longer accept cash or checks.</p>
                                
                                <button type="submit" class="btn btn-primary w-100 rounded-0 text-uppercase mt-4">Book Now <span></span></button>
                            </fieldset>

                        </form>
                        
                    </div>
                </div>

                <div class="col-lg-4 d-none d-lg-block">
                    <div class="sidebar-widgets shadow-border mb-4">
                        <div class="sidebar-widget-item">
                            <svg role="img" class="clock" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 281.965 281.965" enable-background="new 0 0 281.965 281.965" xml:space="preserve">
                                <path fill="currentColor" d="M140.982,20c32.315,0,62.697,12.584,85.548,35.435s35.435,53.232,35.435,85.547    s-12.584,62.697-35.435,85.548s-53.232,35.435-85.548,35.435s-62.697-12.584-85.547-35.435S20,173.298,20,140.982    s12.584-62.697,35.435-85.547S108.667,20,140.982,20 M140.982,0C63.12,0,0,63.12,0,140.982s63.12,140.982,140.982,140.982    s140.982-63.12,140.982-140.982S218.845,0,140.982,0L140.982,0z"/>
                                <circle fill="currentColor" cx="140.982" cy="140.982" r="107.851"/>
                                <path fill="#FFFFFF" d="M147.302,148.474c0,5.308-4.303,9.61-9.61,9.61l0,0c-5.309,0-9.611-4.303-9.611-9.61v-90    c0-5.308,4.303-9.61,9.611-9.61l0,0c5.308,0,9.61,4.303,9.61,9.61V148.474z"/>
                                <path fill="#FFFFFF" d="M234.901,149.063c0,4.97-4.028,9-9,9h-88.8c-4.971,0-9-4.03-9-9l0,0c0-4.971,4.029-9.001,9-9.001h88.8    C230.873,140.063,234.901,144.093,234.901,149.063L234.901,149.063z"/>
                            </svg>
                            <h6>SAVES YOU TIME</h6>
                            <p>Launch27 helps you live smarter, giving you time to focus on what's most important.</p>
                        </div>

                        <div class="sidebar-widget-item">
                            <svg role="img" class="clock" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 281.965 281.965" enable-background="new 0 0 281.965 281.965" xml:space="preserve">
                                <path fill="currentColor" d="M106.294,16.166c31.386,26.142,56.808,36.925,92.296,38.977V160.67c0,23.112-7.41,42.974-23.321,62.505    c-14.214,17.447-34.934,34.862-68.974,57.918c-34.035-23.051-54.759-40.468-68.974-57.918C21.41,203.645,14,183.783,14,160.67    V55.142C49.494,53.092,74.913,42.308,106.294,16.166 M106.295,0c-1.629,0-3.252,0.542-4.506,1.626    C66.867,31.811,42.07,40.623,6.003,41.452C2.689,41.528,0,44.206,0,47.52c0,17.317,0,68.971,0,113.15    c0,55.008,36.809,90.604,101.306,133.945c1.374,0.926,3.182,1.389,4.989,1.389s3.615-0.463,4.989-1.389    c64.494-43.342,101.306-78.938,101.306-133.945c0-44.18,0-95.833,0-113.15c0-3.313-2.687-5.991-6-6.067    c-36.064-0.829-60.861-9.642-95.789-39.823C109.547,0.545,107.918,0,106.295,0L106.295,0z"/>
                                <path fill="currentColor" d="M106.295,258.628c-1.343,0-2.597-0.347-3.533-0.977c-48.016-32.267-75.813-58.997-75.813-100.148V72.64    c0-2.25,1.855-4.124,4.136-4.175c28.736-0.661,46.924-8.221,72.076-29.961c0.842-0.728,1.955-1.128,3.134-1.128    c1.179,0,2.291,0.401,3.134,1.13c25.157,21.738,43.345,29.298,72.078,29.959c2.279,0.052,4.134,1.925,4.134,4.175v84.863    c0,41.149-27.798,67.881-75.813,100.147C108.892,258.281,107.638,258.628,106.295,258.628z"/>
                                <path fill="currentColor" d="M106.295,37.75c1.088,0,2.114,0.369,2.889,1.039c25.233,21.804,43.48,29.387,72.314,30.05    c2.078,0.047,3.768,1.752,3.768,3.8v84.863c0,40.982-27.737,67.64-75.647,99.837c-0.875,0.589-2.055,0.913-3.323,0.913    c-1.269,0-2.449-0.324-3.324-0.913c-47.91-32.195-75.647-58.853-75.647-99.837V72.64c0-2.048,1.691-3.753,3.77-3.8    c28.837-0.664,47.084-8.247,72.313-30.053C104.18,38.119,105.206,37.75,106.295,37.75 M106.295,37    c-1.222,0-2.439,0.407-3.379,1.219C76.724,60.858,58.126,67.468,31.076,68.09c-2.485,0.057-4.502,2.065-4.502,4.55    c0,12.988,0,51.728,0,84.863c0,41.256,27.606,67.953,75.979,100.459c1.031,0.694,2.387,1.041,3.742,1.041s2.711-0.347,3.742-1.041    c48.37-32.506,75.979-59.203,75.979-100.459c0-33.135,0-71.875,0-84.863c0-2.485-2.015-4.494-4.5-4.55    c-27.048-0.622-45.646-7.231-71.842-29.868C108.734,37.409,107.512,37,106.295,37L106.295,37z"/>
                                <path fill="#FFFFFF" d="M76.581,136.418c-2.355-2.314-6.173-2.279-8.484,0.076l-7.459,7.6c-2.314,2.355-2.279,6.17,0.076,8.484   l30.683,30.117c0.308,0.302,0.642,0.557,0.993,0.779c2.332,1.576,5.543,1.342,7.605-0.718l53.593-53.59   c2.332-2.335,2.332-6.152,0-8.484l-7.529-7.529c-2.332-2.332-6.152-2.335-8.484,0l-41.953,41.95L76.581,136.418z"/>
                            </svg>
                            <h6>SAFETY FIRST</h6>
                            <p>We rigorously vet all of our Cleaners, who undergo identity checks as well as in-person interviews.</p>
                        </div>

                        <div class="sidebar-widget-item">
                            <svg role="img" fill="currentColor" class="thumb-up" x="0px" y="0px" width="28px" height="25px" viewBox="0 0 286.198 266.346" enable-background="new 0 0 286.198 266.346" xml:space="preserve">
                                <path fill="currentColor" d="M263.422,109.2h-80.222c0,0-2.638-20.684,4.75-39.679c6.944-17.858,3.42-60.479-23.774-68.549   c-4.027-1.195-8.327-1.343-12.35-0.134c-3.139,0.943-6.541,2.794-8.305,6.42c0,0,7.123,37.674,4.433,42.212   c-2.017,3.401-39.326,59.268-53.154,79.96c-3.325,4.977-5.099,10.825-5.099,16.812v6.436v2.533v36.936v3.377v36.092v1.688v26.486   c0,3.09,2.505,5.596,5.596,5.596H236.76c8.771,0,15.88-7.484,15.88-16.716v-0.338c0-6.617-3.662-12.318-8.96-15.028h3.345   c10.328,0,18.7-9.12,18.7-20.372v-0.411c0-7.11-3.346-13.366-8.412-17.011c10.758-0.319,19.388-9.682,19.388-21.193v-0.429   c0-8.185-4.365-15.282-10.754-18.818c11.391-1.256,20.251-10.907,20.251-22.633v-0.46C286.198,119.397,276.001,109.2,263.422,109.2   z"/>
                                <path fill="currentColor" d="M78.311,266.346H5.693c-3.144,0-5.693-2.932-5.693-6.548V139.24c0-3.616,2.549-6.548,5.693-6.548h72.618   c3.144,0,5.693,2.932,5.693,6.548v120.558C84.004,263.414,81.455,266.346,78.311,266.346z"/>
                            </svg>
                            <h6>ONLY THE BEST QUALITY</h6>
                            <p>Our skilled professionals go above and beyond on every job. Cleaners are rated and reviewed after each task.</p>
                        </div>

                        <div class="sidebar-widget-item">
                            <svg role="img" fill="currentColor" class="cleaning-bottle" x="0px" y="0px" width="23px" height="39px" viewBox="0 0 165.503 284.223" enable-background="new 0 0 165.503 284.223" xml:space="preserve">
                                <path fill="currentColor" d="M76.111,75.691c0.735-0.222,1.536-0.017,2.075,0.53l14.741,14.937c0.887,0.896,2.283,1.057,3.348,0.386    c1.062-0.669,1.504-2,1.052-3.169L85.933,58.882c-0.291-0.752-0.887-1.301-1.582-1.57C76.2,61.787,67.899,68.699,63.965,79.143    c0.324,0.029,0.657,0.007,0.981-0.09L76.111,75.691z"/>
                                <path fill="currentColor" d="M103.13,37.515V27.368c0-1.36-1.102-2.456-2.457-2.456c-0.014,0-0.029,0-0.043,0l-11.783,0.215v19.094    c4.92-1.934,9.146-3.076,11.695-3.669C101.992,40.215,103.13,39.004,103.13,37.515z"/>
                                <path fill="currentColor" d="M26.111,88.235h23.167c1.389,0,2.576-1.018,2.759-2.395c2.902-22.024,19.424-33.872,32.908-39.968V25.198    l-55.103,1.008c-1.624,0.029-3.206,0.566-4.509,1.531L5.376,42.502c-1.26,0.933-2.009,2.419-2.009,3.987v3.367    c0,1.426,0.984,2.649,2.334,3.108c11.55,3.931,21.13,20.83,18.63,32.798C24.077,86.982,24.863,88.235,26.111,88.235z"/>
                                <polygon fill="currentColor" points="165.503,34.575 165.503,29.575 165.503,24.57 129.996,29.575   "/>
                                <polygon fill="currentColor" points="150.222,11.079 142.693,0 123.541,21.118   "/>
                                <polygon fill="currentColor" points="142.693,62.09 146.458,56.55 150.222,51.011 123.541,40.972   "/>
                                <path fill="currentColor" d="M100.227,161.938l-44.368-24.211c-1.35-0.735-2.195-2.161-2.195-3.699v-32.292    c0-1.526-0.698-2.874-1.775-3.792c-0.873-0.742-1.99-1.208-3.225-1.208H27.607c-1.438,0-2.786,0.461-3.915,1.243    c-1.254,0.867-2.238,2.126-2.743,3.638C2.119,158.011-7.053,217.995,6.377,275.708c0.681,2.925,3.088,5.164,6.064,5.566    c29.05,3.926,63.528,3.931,92.593,0.015c3.08-0.415,5.596-2.715,6.281-5.749c6.499-28.753,4.15-78.719-5.037-106.6    C105.281,165.911,103.027,163.467,100.227,161.938z M95.696,263.887c-23.018,3.54-51.492,3.54-74.512,0    c-7.705-30.161-6.741-61.235-0.637-91.641H78.75l13.017,7.104C99.882,199.841,101.875,242.729,95.696,263.887z"/>
                            </svg>
                            <h6>EASY TO GET HELP</h6>
                            <p>Select your ZIP code, number of bedrooms and bathrooms, date and relax while we take care of your home.</p>
                        </div>

                        <div class="sidebar-widget-item">
                            <svg role="img" fill="currentColor" class="bubble" x="0px" y="0px" width="33px" height="29px" viewBox="0 0 309.063 268" enable-background="new 0 0 309.063 268" xml:space="preserve">
                                <path fill="currentColor" d="M25.102,0h198c0,0,22.5,0,22.5,22.5s0,134.5,0,134.5s1.747,22.25-24.25,22.25c-22.25,0-82.25,0-82.25,0   l-66,49.75l-16-50h-31c0,0-26,3-26-24s0-128,0-128S-3.004,0,25.102,0z"/>
                                <path fill="currentColor" d="M255.102,49h27c0,0,26.961-2.908,26.961,21v134c0,0,0,18.98-26.98,18.98s-26.98,0-26.98,0l-21,45.02l-64-45   h-47.289l18.289-34h96c0,0,18,1.333,18-20C255.102,155,255.102,49,255.102,49z"/>
                            </svg>
                            <h6>SEAMLESS COMMUNICATION</h6>
                            <p>Online communication makes it easy for you to stay in touch with your Cleaners.</p>
                        </div>

                        <div class="sidebar-widget-item">
                            <svg role="img" fill="currentColor" class="visa" x="0px" y="0px" width="31px" height="21px" viewBox="0 0 378 235" enable-background="new 0 0 378 235" xml:space="preserve">
                                <rect x="3.5" y="3.5" fill="#FFFFFF" width="371" height="228"/>
                                <path fill="currentColor" d="M371,7v221H7V7H371 M378,0H0v235h378V0L378,0z"/>
                                <path fill="currentColor" d="M296,155.778l-4.939-76.398h-22.722l-43.798,76.398h17.289l8.562-15.971h23.875v15.971H296z     M256.648,129.599l15.478-27.826l1.481,27.826H256.648z"/>
                                <path fill="currentColor" d="M234.922,97.178l7.587-12.926c0,0-14.051-6.872-26.133-6.872c0,0-13.118-3.358-26.376,9.899    c-13.257,13.257-5.713,25.749-1.161,30.3S203.17,127,203.17,127s6.182,2.772,6.182,8.111s-5.62,8.992-14.05,8.992    s-21.355-7.868-21.355-7.868l-5.62,14.893c0,0,11.803,6.463,26.414,6.463c22.76,0,29.801-9.834,29.801-9.834    s7.872-8.261,5.323-20.757c-2.529-12.401-23.446-21.674-23.446-21.674s-5.637-4.636,0.686-10.958    C215.814,85.657,234.922,97.178,234.922,97.178z"/>
                                <polygon fill="currentColor" points="180.689,79.38 159.896,79.38 134.888,155.778 157.789,155.778  "/>
                                <path fill="currentColor" d="M153.995,79.38h-17.703l-31.19,51.236V79.38H69.416v2.624c0,0,14.893,0.563,14.893,10.959    s1.686,62.815,1.686,62.815h20.231L153.995,79.38z"/>
                                <rect x="18" y="17" fill="currentColor" width="341" height="50"/>
                                <rect x="18" y="167" fill="currentColor" width="341" height="50"/>
                            </svg>
                            <h6>CASH FREE PAYMENT</h6>
                            <p>Pay securely online only when the booking is complete.</p>
                        </div>

                    </div>

                    <div class="booking-summary shadow-border selector" data-margin-top="20">
                        <h4>Total Bill</h4>
                        {{-- <fieldset class="booking-summary-list">
                            <ul>
                                <li>
                                    <i class="fas fa-sync-alt"></i>
                                    <span class="summary-list-scheduling">Service: <span id="service"></span></span>
                                </li>
                                <li>
                                    <i class="fas fa-sync-alt"></i>
                                    <span class="summary-list-scheduling" >Extra Service: <span id="extra_service"></span></span>
                                </li>
                            </ul>
                        </fieldset> --}}
                        <fieldset class="booking-summary-total">
                           
                            <div class="form-group d-flex justify-content-between align-items-center">
                                <div class="booking-summary-total-text">
                                    Total
                                </div>
                                <div class="booking-summary-total-price">
                                    <span>$</span> <span class="booking-summary-total-price-value"  id="result"></span>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
@endsection
@push('custom-scripts')
     <script>
        $(document).ready(function() {
            function validate() {
                var sum = 0; 
                sum += +$('#result').val();
                
              
                
                //loop through checked checkbox
                $('#checker input:checked').each(function() {
                sum += +$(this).data('price') //get dataprice add in sum
                })
                $('#services input:checked').each(function() {
                sum += +$(this).data('price') //get dataprice add in sum
                })
                
                var bill = sum === 0 ? '' : sum ;
                
                    document.querySelector('input[name="totalbill"]').value = '$'+bill ?? ''; 
                    $('#result').html(bill);
                    var bedroom = $('#room_id option:selected').data('title') || 'Not Selected';
                     $('#bedroom').html(bedroom);
                    $('#checker input:checked').each(function() {
                    const service  = $(this).data('title') || 'Not Selected';
                    $('#extra_service').html(service);
                    })
                    var date = $("#dates").val() || 'Choose Serivce Date';
                    $('#select_date').html(date);
                 
            }
            validate();
        
            $('#bathroom_id, #discount_id,input, #room_id, #checker input').on('change', function() {
                validate();
            });
        
        });
    </script>
   
    
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        
    <script type="text/javascript">
    
        $(function() {
            
            var $form = $(".require-validation");
            
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                                'input[type=text]', 'input[type=file]',
                                'textarea'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
                $errorMessage.addClass('hide');
            
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
                });
            
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
                }
            
            });
            
            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                        
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
            
        });
        $(document).ready(function() {
            $("#submitdiscount").on("click", function(e) {
                e.preventDefault();
                var coupen = $("#discount").val();
                var totalbill = $("#result").val();
                
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/discount/submit",
                    type: "POST",
                    data: {
                        coupen: coupen,
                        totalbill: totalbill,
                      
                    },
                    success: function(data) {                   
                        
                         document.querySelector('input[name="totalbill"]').value = data.totalbill ?? ''; 
                         $('#result').html(data.totalbill);
                            if(data.result == 'Valid Coupen' )
                            {
                                $('#invalid').hide();
                                $('#valid').show();
                                $('#valid').html(data.result);
                                } else {
                                    $('#valid').hide();
                                    $('#invalid').show();
                                    $('#invalid').html(data.result);
                                };
                            }
                });
            });
        });
    </script>
@endpush