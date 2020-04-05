<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <link rel="shortcut icon" href="/img/favicon.png" /> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="/admin/css/core.css">
    <link rel="stylesheet" href="/admin/css/app.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@coreui/icons@1.0.1/css/all.min.css">

</head>

<body class="c-app">

    <div id="app">

        @include('admin.layouts.sidebar')

        <div class="c-wrapper c-fixed-components">
            @include('admin.layouts.header')

            <div class="c-body">
                <main class="c-main">
                    <div class="container-fluid">
                        <div class="fade-in">
                            @yield('content')
                        </div>
                    </div>
                </main>

                <footer class="c-footer">
                    {{-- <div><a href="https://coreui.io">ubuntu-mm</a> © 2020 Makerspace.</div> --}}
                    <div class="mfs-auto">Powered by&nbsp;<a href="https://ubuntu-mm.net/">Ubuntu MM</a></div>
                </footer>
            </div>
        </div>

    </div>
</body>


<!-- Scripts -->
<script src="/admin/js/app.js"></script>
<script src="/admin/js/core.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

<script>
    $('#alert').delay(5000).fadeOut('slow');

    @if($error = session()->get('success'))
        Swal.fire({
            position: 'top-end',
            type: 'success',
            text: "{{ $message ?? 'success' }}",
            showConfirmButton: false,
            width: 250,
            timer: 2000
        })
    @endif

    @if($error = session()->get('error'))
            Swal.fire({
                position: 'top-end',
                type: 'error',
                text: "{{ $error->first() }}",
                showConfirmButton: false,
                width: 250,
                timer: 2000
            })
    @endif

</script>

@yield('script')



</html>