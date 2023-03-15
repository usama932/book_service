@extends('admin.layouts.master')
@section('title', $title)
@section('content')
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon-users text-primary"></i>
                </span>
                <h3 class="card-label"> Service Order</h3>
                <div class="d-flex align-items-center ">
                    <a class="btn btn-danger font-weight-bolder" onclick="del_selected()" href="javascript:void(0)"> <i
                            class="la la-trash-o"></i>Delete All</a>
                </div>
            </div>
            <div class="card-toolbar">

              
            </div>
        </div>
        <div class="card-body">
            @include('admin.partials._messages')
            <div class="table-responsive">
                <form action="{{ route('admin.delete-selected-service-orders') }}" method="post" id="service_order_form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="service_orders"
                        style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th>
                                    <label class="checkbox checkbox-outline checkbox-success"><input
                                            type="checkbox"><span></span></label>

                                </th>
                                <th>Order # </th>
                                <th>Service #</th>
                              
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </form>
                <!--end: Datatable-->
            </div>
        </div>
        <!-- Modal-->
        <div class="modal fade" id="orderModel" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel"> Service Order Detail</h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Card-->
@endsection
@section('stylesheets')
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
@endsection
@section('scripts')
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors-->
    <script>
        $(document).on('click', 'th input:checkbox', function() {

            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function() {
                    this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
                });
        });
        var clients = $('#service_orders').DataTable({
            "order": [
                [1, 'asc']
            ],
            "processing": true,
            "serverSide": true,
            "searchDelay": 500,
            "responsive": true,
            "ajax": {
                "url": "{{ route('admin.getserviceorders') }}",
                "dataType": "json",
                "type": "POST",
                "data": {
                    "_token": "<?php echo csrf_token(); ?>"
                }
            },
            "columns": [{
                    "data": "id",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "order_id"
                },
                {
                    "data": "service_id",
                    "searchable": false,
                    "orderable": false
                },
                {
                      "data": "created_at",
                     "searchable": false,
                    "orderable": false
                },
                {
                    "data": "action",
                    "searchable": false,
                    "orderable": false
                }
            ]
        });

        function viewInfo(id) {

            var CSRF_TOKEN = '{{ csrf_token() }}';
            $.post("{{ route('admin.getserviceorder') }}", {
                _token: CSRF_TOKEN,
                id: id
            }).done(function(response) {
                $('.modal-body').html(response);
                $('#orderModel').modal('show');

            });
        }

        function del(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                if (result.value) {
                    Swal.fire(
                        "Deleted!",
                        "Your Service Order has been deleted.",
                        "success"
                    );
                    var APP_URL = {!! json_encode(url('/')) !!}
                    window.location.href = APP_URL + "/admin/service-order/delete/" + id;
                }
            });
        }

        function del_selected() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                if (result.value) {
                    Swal.fire(
                        "Deleted!",
                        "Your Service  Order has been deleted.",
                        "success"
                    );
                    $("#service_order_form").submit();
                }
            });
        }
    </script>
@endsection
