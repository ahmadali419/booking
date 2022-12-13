<!-- BEGIN: Vendor JS-->
<script src="{{ URL::to('admin/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->
<script src="{{ URL::to('admin/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ URL::to('admin/app-assets/vendors/js/extensions/moment.min.js') }}"></script>
<script src="{{ URL::to('admin/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::to('admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ URL::to('admin/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ URL::to('admin/app-assets/vendors/js/tables/datatable/dataTables.checkboxes.min.js') }}"></script>
<script src="{{ URL::to('admin/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::to('admin/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
<!-- BEGIN: Page Vendor JS-->
<script src="{{ URL::to('admin/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ URL::to('admin/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ URL::to('admin/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ URL::to('admin/app-assets/js/core/app.js') }}"></script>
<script src="{{ URL::to('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ URL::to('admin/app-assets/js/scripts/forms/form-select2.js') }}"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

@if (session('success'))
    <script>
         toastr.success('success', "{{ session('success') }}");
    </script>
@elseif(session('error'))
    <script>
         toastr.warning('danger', "{{ session('error') }}");
    </script>
@endif
<script>
    $('#DataTables_Table_CPS').dataTable();
</script>
<script>
    @foreach ($errors->all() as $error)
        toastr.error("{{$error}}")
    @endforeach
</script>

@yield('js')
