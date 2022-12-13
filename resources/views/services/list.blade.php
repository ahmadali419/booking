@extends('layouts.master')
@section('title', 'Services')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endsection
@section('content')
    <section class="invoice-list-wrapper">
        <h3 class="mb-3">Services List</h3>
        <div class="card">
            <div class="card-datatable ">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                   
                    <table class="invoice-list-table table dataTable no-footer dtr-column" id="DataTables_Table_CPS"
                        role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" style="width: 46px;" aria-sort="descending"
                                    aria-label="#: activate to sort column ascending">#</th>
                                <th class="cell-fit sorting_disabled" rowspan="1" colspan="1" style="width: 80px;"
                                    aria-label="Actions">name</th>
                               
                             
                              
                            </tr>
                        </thead>
                        <tbody>

                                @foreach (getServices() as $item)
                                    <tr>
                                     
                                        <td>{{ $loop->index +1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-md modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1 text-title">Add Code</h1>

                    </div>
                    <form id="addForm" class="row gy-1 pt-75" onsubmit="return false">

                        <div class="col-12 col-md-12">
                            <input type="hidden" name="id" id="id">
                            <label class="form-label" for="code">Postal Code</label>
                            <input type="text" id="code" name="code"
                                class="form-control @error('code') is-invalid @enderror" placeholder="Postal Code"
                                data-msg="Please enter Postal code" />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                  
                     
                        <div class="col-12 text-center mt-2 pt-50">
                            <button type="button" id="btn_save" class="btn btn-primary me-1">Save</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Discard
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Edit User Modal -->

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        // Dropify
        $('.dropify').dropify({
            messages: {
                'default': 'upload file',
                // 'replace': 'Click to upload file to replace',
            }
        });
        $(document).on('click', '#btn_add_new', function() {
            
            $('.text-title').text('Add Code');
            $('#addModal').modal({
                backdrop: 'static',
                keyboard: false
            }).on('hide.bs.modal', function() {
                $("#addForm").validate().resetForm();
            });
            var form = $("#addForm");
            form[0].reset();
        });

        jQuery(document).ready(function() {
            var validator = $("#addForm").validate({
                rules: {
                    code: {
                        required: true
                    },
                 
                },
                errorPlacement: function(error, element) {
                    var elem = $(element);
                    if (elem.hasClass("selectpicker")) {
                        element = elem.parent();
                        error.insertAfter(element);
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            var input = document.getElementById("addForm");
            input.addEventListener("keyup", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    document.getElementById("btn_save").click();
                }
            });
        })
        $(document).on('click', '#btn_save', function() {
            var id = $('#id').val();
            
            var validate = $("#addForm").valid();
            if (validate) {
                var form = $("#addForm")[0];
                var form_data = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "{{ route('postalcode.store') }}", // your php file name
                    data: form_data,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-bottom-right",
                                "preventDuplicates": true,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            };
                            toastr.success(data.message);
                            var form = $("#addForm");
                            form[0].reset();
                            $('#addModal').modal('hide');
                            setTimeout(() => {
                                location.reload();
                            }, 2000);
                        } else {
                            toastr.warning(data.message);
                            // Swal.fire("Sorry!", data.message, "error");
                        }
                    },
                    error: function(errorString) {
                        // Swal.fire("Sorry!", "Something went wrong please contact to admin", "error");
                    }
                });
            }
        });


        $(document).on('click', '.edit-category', function() {


            $('.text-title').text('Edit Code');
            // Dropify Edit image code

       
            $('#id').val($(this).data('id'));
            $('#code').val($(this).data('code'));


            $('#addModal').modal('show');
        })
        $(document).on('click', '.delete-permission', function() {
            var id = $(this).data('id');
            var form_data = new FormData();
            form_data.append('id', id);
            Swal.fire({
                title: "Are you sure?",
                text: "You wont be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('postalcode.delete') }}", // your php file name
                        data: form_data,
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            if (data.status == 'success') {
                                Swal.fire("Success!", data.message, "success");
                                setTimeout(() => {
                                    location.reload();
                                }, 2000);
                            } else {
                                Swal.fire("Sorry!", data.message, "error");
                            }
                        },
                        error: function(errorString) {
                            Swal.fire("Sorry!", "Something went wrong please contact to admin",
                                "error");
                        }
                    });
                }
            });
        });

        //for parent_child_id 

       
    </script>
@endsection
