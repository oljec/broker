<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>CPanel</title>

        <link href="/libs/bootstrap.min.css" rel="stylesheet">
        <link href="/css/reset.css" rel="stylesheet">
        <link href="/css/dashboard.css" rel="stylesheet">
        @yield('additional_resources')
    </head>

    <body>
        <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-3 sidebar">
                @include('layouts.CPanel.nav')
            </div>
            <div class="col-xs-6 col-sm-8 col-md-9 content">
                <div class="content__container">
                    @yield('content')
                </div>
            </div>
        </div>

        <script src="/libs/jquery-3.2.1.min.js"></script>
        <script src="/libs/bootstrap.min.js"></script>
    </body>

</html>