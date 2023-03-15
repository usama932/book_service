@extends('admin.layouts.master')
@section('title',$title)
@section('content')
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Subheader-->
		<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader" kt-hidden-height="54" style="">
			<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
				<!--begin::Info-->
				<div class="d-flex align-items-center flex-wrap mr-1">
					<!--begin::Page Heading-->
					<div class="d-flex align-items-baseline flex-wrap mr-5">
						<!--begin::Page Title-->
						<h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard</h5>
						<!--end::Page Title-->
						<!--begin::Breadcrumb-->
						<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
							<li class="breadcrumb-item text-muted">
								<a href="" class="text-muted">CMS Setting</a>
							</li>
						</ul>
						<!--end::Breadcrumb-->
					</div>
					<!--end::Page Heading-->
				</div>
				<!--end::Info-->
				
			</div>
		</div>
		<!--end::Subheader-->
		<!--begin::Entry-->
		<div class="d-flex flex-column-fluid">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Card-->
				<div class="card card-custom card-sticky" id="kt_page_sticky_card">
					<div class="card-header" style="">
						<div class="card-title">
							<h3 class="card-label">Website CMS Form
								<i class="mr-2"></i>
								<small class="">try to scroll the page</small></h3>
							
						</div>
						<div class="card-toolbar">
							
							<a href="{{ route('admin.dashboard') }}" class="btn btn-light-primary font-weight-bolder mr-2">
								<i class="ki ki-long-arrow-back icon-sm"></i>Back</a>
							
							<div class="btn-group">
								<a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('setting_form').submit();" id="kt_btn" class="btn btn-primary font-weight-bolder">
									<i class="ki ki-check icon-sm"></i>Save</a>
							
								
								
							</div>
						</div>
					</div>
					<div class="card-body">
					@include('admin.partials._messages')
						<!--begin::Form-->
						<form class="form" id="setting_form" method="POST" action="{{ route('setting.store') }}" enctype='multipart/form-data'>
							@csrf
							<div class="row">
								<div class="col-xl-2"></div>
								<div class="col-xl-8">
									<div class="my-5">
										<h3 class="text-dark font-weight-bold mb-10">Change Setting:</h3>
										@foreach($all_columns as $column)
											
											@if($column['type']=="text")
													<div class="form-group row">
														<label class="col-3">{{$column['label']}}</label>
														<div class="col-9">
															<input class="{{$column['class']}}" type="text" name="{{$column['name']}}" placeholder="{{$column['place_holder']}}" value="{{ isset($settings[$column['name']]) ? $settings[$column['name']] : ''}}" >
														</div>
													</div>
												@endif
										
												@if($column['type']=="hidden")
													<input type="hidden" name="{{$column['name']}}" value="{{ isset
	                        ($settings[$column['name']]) ? $settings[$column['name']]: ''}}">
												@endif
												
												@if($column['type']=="file")
													<div class="form-group row">
														<label class="col-3">{{$column['label']}}</label>
                              <?php
                              if(isset($settings[$column['name']])){
                                  $settings[$column['name']] = $settings[$column['name']];
                              }else {
                                  $settings[$column['name']]='abc.png';
                              }
                              ?>
														<div class="col-9">
															<div class="custom-file">
															<input type="file" name="{{$column['name']}}" class="{{$column['class']}}" id="{{$column['id']}}">
																<label class="custom-file-label" for="customFile">Choose file</label>
															@if(File::exists('uploads/'.$settings[$column['name']]))
																<img src="{{asset('uploads/'.$settings[$column['name']])}}" style="{{$column['style']}}" alt="{{$column['name']}} is not found" />
															@else
																<img src="{{asset('uploads/img.png')}}" style="{{$column['style']}}" alt="{{$column['name']}} is not found"/>
															@endif
															
															</div>
														</div>
													</div>
												@endif
												@if($column['type']=="textarea")
													<div class="form-group row">
														<label class="col-3">{{$column['label']}}</label>
														<div class="col-9">
														<textarea name="{{$column['name']}}" class="{{$column['class']}}"
														          rows="{{isset($column['rows'] )? $column['rows'] :'2'}}"
														          placeholder="{{$column['place_holder']}}"
														          id="{{$column['id']}}">{{ isset($settings[$column['name']]) ? $settings[$column['name']] : ''}}
														</textarea>
														</div>
													</div>
												@endif
												@if($column['type']=="checkbox")
													<div class="form-group row">
														<label class="col-3 col-form-label">{{$column['label']}}</label>
														<div class="col-9">
															 <span class="switch switch-outline switch-icon switch-success">
																<input name="{{$column['name']}}"
																       class="{{$column['class']}}"
														           type="checkbox"
														           id="{{$column['id']}}"
																       value="{{$column['value']}}"
																><span></span>
																 </label>
                              </span>
																
														</div>
													</div>
												@endif
											
										@endforeach
									</div>
									<div class="separator separator-dashed my-10"></div>
								
								</div>
								<div class="col-xl-2"></div>
							</div>
						</form>
						<!--end::Form-->
					</div>
				</div>
				<!--end::Card-->
				
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
@endsection

