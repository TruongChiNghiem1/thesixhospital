<!DOCTYPE html>
<html lang="zxx">
    <head>
        <title>The Six Hospital</title>
        @include('admin.partials.head')
    </head>
    <body class="crm_body_bg">
        @include('admin.partials.sidebar')

        <section class="main_content dashboard_part">
            @include('admin.partials.header')

            @yield('content')
        </section>
        @include('admin.partials.script')
        @yield('footer')
    </body>
</html>