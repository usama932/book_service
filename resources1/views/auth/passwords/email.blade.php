@extends('layouts.auth')
@section('content')
	<?php
	$setting = \App\Models\Setting::pluck('value','name')->toArray();
	$auth_logo = isset($setting['auth_logo']) ? 'uploads/'.$setting['auth_logo'] : 'assets/media/logos/logo-light.png';
	$auth_page_heading = isset($setting['auth_page_heading']) ? $setting['auth_page_heading'] : 'wwww.webexert.com';
	$auth_image = isset($setting['auth_image']) ? 'uploads/'.$setting['auth_image'] : 'assets/media/svg/illustrations/login-visual-1.svg';
	$copy_right = isset($setting['copy_right']) ? $setting['copy_right'] : 'wwww.webexert.com';
	?>
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
		<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
			<!--begin::Aside-->
			<div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
				<!--begin::Aside Top-->
				<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
					<!--begin::Aside header-->
					<a href="#" class="text-center mb-10">
						<img src="{{ asset($auth_logo) }}" class="max-h-70px" alt="" />
					</a>
					<!--end::Aside header-->
					<!--begin::Aside title-->
					<h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;"><?php echo stripcslashes($auth_page_heading )?></h3>
					<!--end::Aside title-->
				</div>
				<!--end::Aside Top-->
				<!--begin::Aside Bottom-->
				<div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center"
				     style="background-image: url({{ asset('assets/media/svg/illustrations/login-visual-1.svg') }})"></div>
				<!--end::Aside Bottom-->
			</div>
			<!--begin::Aside-->
			<!--begin::Content-->
			<div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
				<!--begin::Content body-->
				<div class="d-flex flex-column-fluid flex-center">
					<!--begin::Signin-->
					
					<!--end::Signin-->
					<!--begin::Signup-->
				{{--<div class="login-form login-signup">
					<!--begin::Form-->
					<form class="form" novalidate="novalidate" id="kt_login_signup_form">
						<!--begin::Title-->
						<div class="pb-13 pt-lg-0 pt-5">
							<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Sign Up</h3>
							<p class="text-muted font-weight-bold font-size-h4">Enter your details to create your account</p>
						</div>
						<!--end::Title-->
						<!--begin::Form group-->
						<div class="form-group">
							<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="text" placeholder="Fullname" name="fullname" autocomplete="off" />
						</div>
						<!--end::Form group-->
						<!--begin::Form group-->
						<div class="form-group">
							<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" />
						</div>
						<!--end::Form group-->
						<!--begin::Form group-->
						<div class="form-group">
							<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="password" placeholder="Password" name="password" autocomplete="off" />
						</div>
						<!--end::Form group-->
						<!--begin::Form group-->
						<div class="form-group">
							<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="password" placeholder="Confirm password" name="cpassword" autocomplete="off" />
						</div>
						<!--end::Form group-->
						<!--begin::Form group-->
						<div class="form-group">
							<label class="checkbox mb-0">
								<input type="checkbox" name="agree" />
								<span></span>
								<div class="ml-2">I Agree the
									<a href="#">terms and conditions</a>.</div>
							</label>
						</div>
						<!--end::Form group-->
						<!--begin::Form group-->
						<div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
							<button type="button" id="kt_login_signup_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
							<button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
						</div>
						<!--end::Form group-->
					</form>
					<!--end::Form-->
				</div>--}}
				<!--end::Signup-->
					<!--begin::Forgot-->
				<div class="login-formt">
					<!--begin::Form-->
					@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
					@endif
					<form class="form" novalidate="novalidate" method="POST" action="{{ route('password.email') }}">
					@csrf
						<!--begin::Title-->
						<div class="pb-13 pt-lg-0 pt-5">
							<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Forgotten Password ?</h3>
							<p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
						</div>
						<!--end::Title-->
						<!--begin::Form group-->
						<div class="form-group">
							<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" autocomplete="off" />
							@error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
						</div>
						<!--end::Form group-->
						<!--begin::Form group-->
						<div class="form-group d-flex flex-wrap pb-lg-0">
							<button type="submit" id="kt_login_forgot_submit" class="btn btn-primary
							font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Send Password Reset Link</button>
							
						</div>
						<!--end::Form group-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Forgot-->
				</div>
				<!--end::Content body-->
				<!--begin::Content footer-->
				<div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
					<div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
						<span class="mr-1">{{ date('Y') }}©</span>
						<a href="https://newswatchtv.com" target="_blank" class="text-dark-75 text-hover-primary">{{ $copy_right }}</a>
					</div>
					<a href="https://newswatchtv.com/reviews/" target="_blank" class="text-primary font-weight-bolder font-size-lg">Reviews</a>
					<a href="https://newswatchtv.com/about-us/" target="_blank" class="text-primary ml-5 font-weight-bolder font-size-lg">About</a>
					<a href="https://newswatchtv.com/contact-us/" target="_blank" class="text-primary ml-5 font-weight-bolder font-size-lg">Contact</a>
				</div>
				<!--end::Content footer-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Login-->
	</div>
@endsection