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
                                <a href="" class="text-muted">Manage Charts</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                Edit Client
                            </li>
                            <li class="breadcrumb-item text-muted">
                                {{ $user->name }}
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
                            <h3 class="card-label">Chart Edit Form
                                <i class="mr-2"></i>
                                <small class="">try to scroll the page</small></h3>

                        </div>
                        <div class="card-toolbar">

                            <a href="" class="btn btn-light-primary
              font-weight-bolder mr-2">
                                <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>

                            <div class="btn-group">
                                <a href=""  onclick="event.preventDefault(); document.getElementById('chart_update_form').submit();" id="kt_btn" class="btn btn-primary font-weight-bolder">
                                    <i class="ki ki-check icon-sm"></i>update</a>



                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('admin.partials._messages')
                        <!--begin::Form-->
                        {{ Form::model($user, [ 'method' => 'PATCH','route' => ['charts.update', $user->id],'class'=>'form' ,"id"=>"chart_update_form", 'enctype'=>'multipart/form-data'])}}
                        @csrf
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="my-5">
                                    <h3 class="text-dark font-weight-bold mb-10">Test Info: </h3>
{{--                                    <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">--}}
{{--                                        <label class="col-3">Name</label>--}}
{{--                                        <div class="col-9">--}}
{{--                                            {{ Form::text('name', null, ['class' => 'form-control form-control-solid','id'=>'name','placeholder'=>'Enter Name','required'=>'true']) }}--}}
{{--                                            <span class="text-danger">{{ $errors->first('name') }}</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    {{--                          <div class="form-group row {{ $errors->has('image') ? 'has-error' : '' }}">--}}
                                    {{--                              <label class="col-3">Image</label>--}}
                                    {{--                              <div class="col-9">--}}
                                    {{--                                  {{ Form::file('image', null, ['class' => 'form-control form-control-solid','id'=>'email','placeholder'=>'Enter Image','required'=>'true']) }}--}}
                                    {{--                                  <span class="text-danger">{{ $errors->first('image') }}</span>--}}
                                    {{--                                  <img src="{{asset("uploads/test/$user->image")}}" width="200" alt="">--}}
                                    {{--                              </div>--}}
                                    {{--                          </div>--}}

                                </div>

                            </div>
                            <div class="col-xl-2"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <button type="button" class="btn btn-sm btn-icon btn-circle btn-success float-right add-question" title="Add Question"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div >



                                <div class="form-group  row mt-3">
                                    <div class="col-4 form-group">
                                        <label for="">Date</label>
                                        <input type="date" name="date[]" value="{{$user->date}}" class="form-control  " required>
                                    </div>


                                            <div class="col-4 form-group">
                                                        <label for="">Value</label>
                                                <input type="text" name="value[]" value="{{$user->value}}" class="form-control form-control-solid " required>

                                                <button type="button" class="btn btn-sm btn-icon btn-circle btn-success float-right add-option" title="Add Option"><i class="fa fa-plus"></i></button>

                                                    </div>



                                                </div>

                                              <div class="row form-group mt-3">
                                                <div class="col-6">
                                                    <input type="date"  name="date" value="" class="form-control  form-control-solid " required>
                                                    <input type="hidden"  name="value[]" value="" class="form-control  form-control-solid " required>
                                                </div>
{{--                                                <div class="col-4">--}}
{{--                                                    <select name="true_false[]" id="" class="form-control true-false form-control-solid " required>--}}
{{--                                                        <option value="0" @if() selected @endif>false</option>--}}
{{--                                                        <option value="1" @if() selected @endif>true</option>--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
                                                <div class="col-2">
                                                    <a href="" class="btn btn-sm btn-icon btn-circle btn-danger float-right remove-option" title="Remove Option"><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>

                                    </div>
                                    <div class="col-3 form-group">

                                        {{--                          <input type="file" name="question_image[]" class="form-control form-control-solid " required>--}}
                                    </div>
                                    <div class="col-1">
                                        <a href="" class="btn btn-sm btn-icon btn-circle btn-danger float-right remove-question" title="Remove Question "><i class="fa fa-times"></i></a>
                                    </div>

                                </div>

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
@section("scripts")
    <script !src="">
        $("body").on("click",".add-option",function () {
            $(this).parent().parent().parent().append("<div class=\"row form-group mt-3\">\n" +
                "                        <div class=\"col-6\">\n" +
                "                            <input type=\"date\" class=\"form-control option form-control-solid \" required>\n" +
                "                            <input type=\"hidden\" value=\"0\" class=\"form-control option_id form-control-solid \" required>\n" +
                "                        </div>\n" +
                "                        <div class=\"col-4\">\n" +
                "                           <input type=\"text\" class=\"form-control option form-control-solid \" required>\n" +
                "                            <input type=\"hidden\" value=\"0\" class=\"form-control option_id form-control-solid \" required>\n" +
                "                        </div>\n" +
                "                        <div class=\"col-2\">\n" +
                "                            <button type=\"button\" class=\"btn btn-sm btn-icon btn-circle btn-danger float-right remove-option\" title=\"Remove Option\"><i class=\"fa fa-times\"></i></button>\n" +
                "                        </div>\n" +
                "                    </div>\n" +
                "                </div>");
            naming();
        });
        $("body").on("click",".add-question",function () {
            $(".questions").append("<div class=\"form-group question row mt-3\">\n" +
                "                      <div class=\"col-4 form-group\">\n" +
                "                          <label for=\"\">Question</label>\n" +
                "                          <input type=\"text\" name=\"question[]\"  class=\"form-control form-control-solid \" required>\n" +
                "                          <input type=\"hidden\" value=\"0\" name=\"question_id[]\"  class=\"form-control form-control-solid \" required>\n" +
                "                      </div>\n" +
                "                      <div class=\"col-4 form-group\">\n" +
                "                          <div class=\"row\">\n" +
                "                              <div class=\"col-12\">\n" +
                "                                  <label for=\"\">Options</label>\n" +
                "                                  <button type=\"button\" class=\"btn btn-sm btn-icon btn-circle btn-success float-right add-option\" title=\"Add Option\"><i class=\"fa fa-plus\"></i></button>\n" +
                "\n" +
                "                              </div>\n" +
                "                          </div>\n" +
                "\n" +
                "                          <div class=\"row form-group mt-3\">\n" +
                "                              <div class=\"col-6\">\n" +
                "                                  <input type=\"text\" class=\"form-control option form-control-solid \" required>\n" +
                "                                  <input type=\"hidden\" value=\"0\" class=\"form-control option_id form-control-solid \" required>\n" +
                "                              </div>\n" +
                "                              <div class=\"col-6\">\n" +
                "                                  <select name=\"\" id=\"\" class=\"form-control true-false form-control-solid \" required>\n" +
                "                                      <option value=\"0\">false</option>\n" +
                "                                      <option value=\"1\">true</option>\n" +
                "                                  </select>\n" +
                "                              </div>\n" +
                "\n" +
                "                          </div>\n" +
                "                      </div>\n" +
                "                      <div class=\"col-4\">\n" +
                "                          <button type=\"button\" class=\"btn btn-sm btn-icon btn-circle btn-danger float-right remove-question\" title=\"Remove Question \"><i class=\"fa fa-times\"></i></button>\n" +
                "\n" +
                "                      </div>\n" +
                "                  </div>");
            naming();
        });
        $("body").on("click",".remove-option",function () {
            $(this).parent().parent().remove();
            naming();
        });
        $("body").on("click",".remove-question",function () {
            $(this).parent().parent().remove();
            naming();
        });
        $("body").on("click",".submit",function () {
            var found = false;
            $('input').each(function(){
                var vl = $(this).val();
                if(vl == ""){
                    found = true;
                }
            });
            if(found == true){
                Swal.fire(
                    "Deleted!",
                    "Plz Fill All Field Correctrly",
                    "error"
                );
            }else{
                // Swal.fire(
                //     "Deleted!",
                //     "Your Form has been submitted.",
                //     "success"
                // );
                $("#client_add_form").submit();
            }
        });
        function naming(){
            $(".question").each(function (index ) {
                var option_name = "option"+index+"[]";
                var option_id = "option_id"+index+"[]";
                var true_false = "true_false"+index+"[]";
                $(this).find(".option").attr("name",option_name);
                $(this).find(".option_id").attr("name",option_id);
                $(this).find(".true-false").attr("name",true_false);
            });
        }
    </script>
@endsection
