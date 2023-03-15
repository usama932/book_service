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
                <a href="" class="text-muted">Manage Accounts</a>
              </li>
              <li class="breadcrumb-item text-muted">
                <a href="" class="text-muted">Add Accounts</a>
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
              <h3 class="card-label">Accounts Add Form
                <i class="mr-2"></i>
                <small class="">try to scroll the page</small></h3>

            </div>
            <div class="card-toolbar">

              <a href="{{ route('accounts.index') }}" class="btn btn-light-primary
              font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>

              <div class="btn-group">
                <a href="{{ route('accounts.store') }}"  onclick="event.preventDefault(); document.getElementById('account_add_form').submit();" id="kt_btn" class="btn btn-primary font-weight-bolder">
                  <i class="ki ki-check icon-sm"></i>Save</a>



              </div>
            </div>
          </div>
          <div class="card-body">
          @include('admin.partials._messages')
          <!--begin::Form-->
            {{ Form::open([ 'route' => 'accounts.store','class'=>'form' ,"id"=>"account_add_form", 'enctype'=>'multipart/form-data']) }}
              @csrf
              <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                  <div class="my-5">
                    <h3 class="text-dark font-weight-bold mb-10">Account Info: </h3>
                    <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                      <label class="col-3">Name</label>
                      <div class="col-9">
                        {{ Form::text('name', null, ['class' => 'form-control form-control-solid','id'=>'name','placeholder'=>'Enter Name','required'=>'true']) }}
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                      </div>
                    </div>
                    <div class="form-group row {{ $errors->has('Account#') ? 'has-error' : '' }}">
                      <label class="col-3">Account#</label>
                      <div class="col-9">
                        {{ Form::text('account_no', null, ['class' => 'form-control form-control-solid','id'=>'account_no','placeholder'=>'Enter Account#','required'=>'true']) }}
                        <span class="text-danger">{{ $errors->first('account_no') }}</span>
                      </div>
                    </div>

                      <div class="form-group row ">
                          <label class="col-3">Customer</label>
                          <div class="col-9">
                          {{--{{ Form::select('categories[]',$categories, null, ['class' => 'no-padding select-category ','multiple'=>'multiple']) }}--}}
                            <select class="form-control" name="customer" id="customer" required>
                              <option value="">Select Customers</option>
                                @foreach($accounts as $customer)
                                  <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
                             </select>

                          </div>
                      </div>

{{--                    <div class="form-group row">--}}
{{--                      <label class="col-3 col-form-label">Active</label>--}}
{{--                      <div class="col-3">--}}
{{--                         <span class="switch switch-outline switch-icon switch-success">--}}
{{--                          <label><input type="checkbox" checked="checked" name="active" value="1">--}}
{{--                            <span></span>--}}
{{--                          </label>--}}
{{--                        </span>--}}
{{--                      </div>--}}
{{--                    </div>--}}

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
