<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Blogging | Admin</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('admin.includes.styles')
        @yield('admin-styles')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.includes.navbar')

        <div class="content-wrapper" style="padding-top: 40px">
            @yield('admin-content')
        </div>

        @include('admin.includes.footer')
        @include('admin.includes.scripts')
        @yield('admin-scripts')
    </body>
</html>
