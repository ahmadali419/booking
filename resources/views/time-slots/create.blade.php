@extends('layouts.master')
@section('title', 'Time Slots')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endsection
@section('content')
    <section class="invoice-list-wrapper">
        <h3 class="mb-3">Time Slot</h3>
        <div class="card">
            <div class="container mt-3 pb-3">
              <form action="{{ route('time-slot.store') }}" method="post" id="addForm">
                <div class="row">
                    @csrf
                    @foreach (weekDays() as $day)
                    <div class="col-6 pb-3">
                        <div class="form-group">
                            <input type="hidden" name="day[]" value="{{ $day }}" id="day">
                             <label for=""><b>{{ $day }}</b></label>
                             <div class="form-group" style="float: right">
                                <label for="">
                                    <input type="checkbox" name="status[{{ $day }}]" {{ !empty($timeSlot) && $timeSlot[$loop->index]['status'] == '1' ? 'checked' :""    }} value="{{ !empty($timeSlot) ? $timeSlot[$loop->index]['status'] :"0"    }}" class="is-closed">Closed
                                </label>
                              </div>
                          </div>
                        <div class="form-group mb-2">
                          <label for="">Limit</label>
                          <input type="number" name="limit[{{ $day }}]" value="{{ !empty($timeSlot) ? $timeSlot[$loop->index]['limit'] :"0"    }}" class="form-control" placeholder="Enter limit" required>
                        </div>
                        @php  $slotsTime = !empty($timeSlot) && $timeSlot[$loop->index]['time'] ? json_decode($timeSlot[$loop->index]['time']) : ''; 
                        
                        @endphp  
                            
                            <div class="form-group">
                                <label for="anytime-{{ $loop->index }}">
                                    <input type="checkbox" name="time[{{ $day }}][]" {{ !empty($slotsTime) && in_array('Anytime (07:30 - 18:00)',$slotsTime) ? 'checked' : '' }}   value="Anytime (07:30 - 18:00)" id="anytime-{{ $loop->index }}">
                                  Anytime (07:30 - 18:00)
                              </label>
                              <label for="morning-{{ $loop->index }}">
                                <input type="checkbox" name="time[{{ $day }}][]" {{ !empty($slotsTime) && in_array('Morning (07:30 - 13:00)',$slotsTime) ? 'checked' : '' }}  value="Morning (07:30 - 13:00)" id="morning-{{ $loop->index }}">
                                Morning (07:30 - 13:00)
                            </label>
                            <label for="afternoon-{{ $loop->index }}">
                                <input type="checkbox" name="time[{{ $day }}][]" {{ !empty($slotsTime) && in_array('Afternoon (13:00 - 18:00)',$slotsTime) ? 'checked' : '' }}  value="Afternoon (13:00 - 18:00)" id="afternoon-{{ $loop->index }}">
                                Afternoon (13:00 - 18:00)
                            </label>
                            </div>
                          
                           
                          

                    </div>
                    @endforeach

                </div>
                <div class="form-group">
                    <button class="btn btn-info" style="float:right">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </section>

  
    <!--/ Edit User Modal -->

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>

        $(document).on('change','.is-closed',function(){
            $(this).val(0);
             if($(this).is(":checked")){
                $(this).val(1);
             }
        });
        // Dropify
        $('.dropify').dropify({
            messages: {
                'default': 'upload file',
                // 'replace': 'Click to upload file to replace',
            }
        });
        $(document).on('click', '#btn_add_new', function() {
            var drEvent = $('.getrecomendationimg').dropify({
                defaultFile: ''
            });
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.clearElement();
            drEvent.settings.defaultFile = '';
            drEvent.destroy();
            drEvent.init();
            $('.text-title').text('Add Item');
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
                    'day[]': {
                        required: true
                    },
                    'limit[]': {
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
                    url: "{{ route('item.store') }}", // your php file name
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
            $imgpath = $(this).attr('data-thumbnail');
            $oldImage = $(this).attr('data-image');

            $('.text-title').text('Edit Item');
            $('.getrecomendationimg').attr('required', false);
            // Dropify Edit image code

            var imagenUrl = $imgpath;
            var drEvent = $('.getrecomendationimg').dropify({
                defaultFile: imagenUrl
            });
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.clearElement();
            drEvent.settings.defaultFile = imagenUrl;
            drEvent.destroy();
            drEvent.init();

            $('.text-title').text('Edit Item');
            // Dropify Edit image code

            $('#id').val($(this).data('id'));
            $('#service_id').val($(this).data('service'));
            $('#item_name').val($(this).data('name'));
            $('.old-image').val($oldImage);  
        

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
                        url: "{{ route('item.delete') }}", // your php file name
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
