<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MechaHelp | Panel') }}</title>
    <link rel="shortcut icon" type="image/png" href="../images/favicon.png">
    <link rel="shortcut icon" sizes="192x192" href="../images/favicon.png">
    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="error-page">
                        <div class="error-inner text-center">
                            <div class="dz-error" data-text="403">403</div>
                            <h4 class="error-head"><i class="fa fa-times-circle text-danger"></i> Forbidden Error!</h4>
                            <p class="error-head">You do not have permission to view this resource.</p>
                            <div>
                                <a href="index.html" class="btn btn-secondary">BACK TO HOMEPAGE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>

    <script src="{{ asset('js/styleSwitcher.js') }}j"></script>
</body>

</html>
