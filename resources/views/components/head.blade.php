<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    {{-- <link rel="shortcut icon" href="{{ !empty(Setting('favicon')) ? asset(Setting('favicon')) : '' }}"
    type="image/x-icon"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('admin/app-assets/vendors/css/vendors.min.css') }}" >

    <link rel="stylesheet" type="text/css" href="{{ URL::to('admin/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('admin/app-assets/vendors/css/extensions/toastr.min.css') }}" >
    <!-- END: Vendor CSS-->

    <link rel="stylesheet" type="text/css"  href="{{ URL::to('admin/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('admin/app-assets/css/bootstrap.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::to('admin/app-assets/css/bootstrap-extended.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::to('admin/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('admin/app-assets/css/components.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::to('admin/app-assets/vendors/css/extensions/sweetalert2.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::to('admin/app-assets/css/plugins/extensions/ext-component-toastr.css') }}" >
   <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('admin/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ URL::to('admin/app-assets/css/pages/ui-feather.css') }}">
    <!-- END: Page CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- BEGIN: Custom CSS-->
     <link rel="stylesheet" type="text/css"  href="{{ URL::to('admin/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
    <style>
        .error{
            color:red!important;
        }
    </style>
    @yield('css')
</head>