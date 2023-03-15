@extends('admin.layouts.master')
{{-- @section('title', $title) --}}
@section('content')
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon-users text-primary"></i>
                </span>
                <h3 class="card-label">Chart Data</h3>

            </div>

        </div>
        <form action="{{ route('admin.addChart') }}" method="POST">
            @csrf
            <div id="cardbody" class="card-body">
                @include('admin.partials._messages')

                <div class="form-group row ">
                    <label class="col-3">Customers</label>
                    <div class="col-6">
                        <select class="form-control " searchable="Search here.." name="customer" id="customer_id">
                            <option>Select Customer</option>

                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">
                                    {{ $customer->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                      
                </div>

                <br>
                <div class="form-group row ">
                    <label class="col-3">Accounts</label>
                    <div class="col-6">
                        <select class="form-control " searchable="Search here.." name="account_id" id="account_id">
                            <option value="">Select Accounts</option>
                        </select>
                    </div>
                    
                </div>

            </div>

            <div class="container" id="addmore">

                <h2 align="center">Fill Chart Data</h2>



                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif

                <table class="table table-bordered" id="dynamicTable">
                    <tr>

                        <th>Date</th>
                        <th>Value</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><input type="date" name="addmore[0][date]" class="form-control" /></td>
                        <td><input type="text" name="addmore[0][value]" placeholder="Enter your Value"
                                class="form-control" />

                        </td>

                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                        </td>
                    </tr>
                </table>

                <button type="submit" class="btn btn-success">Save</button>

            </div>
        </form>

        <!-- Modal-->

    </div>
    <!--end::Card-->
@endsection
@section('stylesheets')
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
   <link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" type="text/css" />




    <!--end::Page Vendors Styles-->
@endsection


@section('scripts')
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>




    <!--end::Page Vendors-->


    <script>
        $("body").on("change", "#customer_id", function() {
     $("#cardbody").find('.fa-refresh').remove();
      $('<i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>').appendTo("#cardbody");
            var id = $(this).val();
                if (id == "") {
            alert("Select Customer");
            $("#cardbody").find('.fa-refresh').remove();
            $("#customer_id").empty();
            return;
        }
            var CSRF_TOKEN = '{{ csrf_token() }}';
            $.post("{{ route('admin.getChartAccounts') }}", {
                _token: CSRF_TOKEN,
                id: id
            }).done(function(response) {
                $('#account_id').html(response);
                $('#cardbody').find('.fa-refresh').remove();
            });
        });
    </script>

    <script>
        $("body").on("change", "#account_id", function() {

            var id = $(this).val();
            console.log(id);
            $('#account_id').val(id);
            $("#addmore").click(function() {
                $("#addmore").show();
            });

        });
    </script>

    <script type="text/javascript">
        var i = 0;

        $("#add").click(function() {

            ++i;

            $("#dynamicTable").append('<tr><td><input type="date" name="addmore[' + i +
                '][date]"  class="form-control" /></td><td><input type="text" name="addmore[' + i +
                '][value]" placeholder="Enter your Value" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
                );
        });

        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
    <script>
        $(document).on('click', 'th input:checkbox', function() {

            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function() {
                    this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
                });
        });
        var accounts = $('#accounts').DataTable({
            "order": [
                [1, 'asc']
            ],
            "processing": true,
            "serverSide": true,
            "searchDelay": 500,
            "responsive": true,
            "ajax": {
                "url": "{{ route('admin.getAccounts') }}",
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
                    "data": "name"
                },
                {
                    "data": "account_no"
                },
                {
                    "data": "created_at"
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
            $.post("{{ route('admin.getAccount') }}", {
                _token: CSRF_TOKEN,
                id: id
            }).done(function(response) {
                $('.modal-body').html(response);
                $('#accountModel').modal('show');

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
                        "Your client has been deleted.",
                        "success"
                    );
                    var APP_URL = {!! json_encode(url('/')) !!}
                    window.location.href = APP_URL + "/admin/account/delete/" + id;
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
                        "Your clients has been deleted.",
                        "success"
                    );
                    $("#account_form").submit();
                }
            });
        }
    </script>
@endsection
