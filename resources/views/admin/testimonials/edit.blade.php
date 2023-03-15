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
                <a href="" class="text-muted">Manage Testimonial</a>
              </li>
              <li class="breadcrumb-item text-muted">
                Edit Testimonial
              </li>
              <li class="breadcrumb-item text-muted">
               {{ $testimonial->title }}
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
              <h3 class="card-label">Testimonial Edit Form
                <i class="mr-2"></i>
                <small class="">try to scroll the page</small></h3>

            </div>
            <div class="card-toolbar">

              <a href="{{ route('testimonials.index') }}" class="btn btn-light-primary
              font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>

              <div class="btn-group">
                <a href=""  onclick="event.preventDefault(); document.getElementById('testimonial_update_form').submit();" id="kt_btn" class="btn btn-primary font-weight-bolder">
                  <i class="ki ki-check icon-sm"></i>update</a>



              </div>
            </div>
          </div>
          <div class="card-body">
          @include('admin.partials._messages')
          <!--begin::Form-->
            {{ Form::model($testimonial, [ 'method' => 'PATCH','route' => ['testimonials.update', $testimonial->id],'class'=>'form' ,"id"=>"testimonial_update_form", 'enctype'=>'multipart/form-data'])}}
              @csrf
              <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                  <div class="my-5">
                    <h3 class="text-dark font-weight-bold mb-10">Testimonials Info: </h3>
                 <div class="form-group row {{ $errors->has('title') ? 'has-error' : '' }}">
                      <label class="col-3">Name</label>
                      <div class="col-9">
                        {{ Form::text('name', null, ['class' => 'form-control form-control-solid ','id'=>'title','placeholder'=>'Enter title','required'=>'true']) }}
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                      </div>
                    </div>
                    <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                      <label class="col-3">Email</label>
                      <div class="col-9">
                        {{ Form::email('email', null, ['class' => 'form-control form-control-solid','id'=>'email','placeholder'=>'Enter designation','required'=>'true']) }}
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                      </div>
                    </div>
                    <div class="form-group row {{ $errors->has('designation') ? 'has-error' : '' }}">
                      <label class="col-3">Designation</label>
                      <div class="col-9">
                        {{ Form::text('designation', null, ['class' => 'form-control form-control-solid','id'=>'designation','placeholder'=>'Enter designation','required'=>'true']) }}
                        <span class="text-danger">{{ $errors->first('designation') }}</span>
                      </div>
                    </div>
                    <div class="form-group row {{ $errors->has('reviews') ? 'has-error' : '' }}">
                      <label class="col-3">Reviews</label>
                      <div class="col-9">
                        {{ Form::textarea('reviews', null, ['class' => 'form-control form-control-solid','id'=>'reviews','placeholder'=>'Enter reviews','required'=>'true']) }}
                        <span class="text-danger">{{ $errors->first('reviews') }}</span>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-xl-2"></div>
              </div>
          {{Form::close()}}
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
