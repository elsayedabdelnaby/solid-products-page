<!doctype html>
@if (LaravelLocalization::getCurrentLocale() == 'ar')
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" direction="rtl" dir="rtl" style="direction: rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endif

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

    <!-- Style Sheets -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('js/notify.min.js') }}"></script>
    @stack('head-style')
    @stack('head-scripts')
    <style>
        .error {
            color: #f00;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-light bg-light">
            @if (App::getLocale() == 'en')
                <a class="navbar-brand" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">
                    {{ __('main.arabic') }}
                </a>
            @else
                <a class="navbar-brand" href="{{ LaravelLocalization::getLocalizedURL('en') }}">
                    {{ __('main.english') }}
                </a>
            @endif
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('footer-scripts')
</body>

</html>
