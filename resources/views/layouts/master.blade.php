<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('components.head')

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">
    @include('components.header')
    @include('components.sidebar')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    @include('components.footer')
    @include('components.script')
</body>

</html>
