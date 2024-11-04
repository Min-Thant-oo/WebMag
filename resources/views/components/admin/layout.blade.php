<!DOCTYPE html>
<html>
<head>
    <title>{{ $title ?? 'WEBMAG | Dashboard' }}</title>

    <meta name="title" content="{{ $title ?? 'WEBMAG | Dashboard' }}">
    <meta name="description" content="{{ $description ?? 'The best place to learn programming by reading blogs' }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ url('dashboard/css/') }}/style.css" rel="stylesheet">
    <link href="{{ url('dashboard/css/') }}/custome.css?v={{ rand(1, 100) }}" rel="stylesheet">
    @yield('stylesheet')
</head>
<body class="app">
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <div>
        <x-admin.sidebar />
        <div class="page-container">
            <x-admin.navbar />

            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    {{ $slot }}
                </div>
            </main>

            <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
                <span>
                    Copyright &copy; {{ \Carbon\Carbon::now()->format('Y') }} All Rights Reserved. Created By <a
                        href="http://minthantoo.com/">Min Thant Oo</a>
                </span>
            </footer>
        </div>
    </div>

    <!-- Add Bootstrap JS before your other scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script type="text/javascript" src="{{ url('dashboard/js/') }}/vendor.js"></script>
    <script type="text/javascript" src="{{ url('dashboard/js/') }}/bundle.js"></script>
    <script src="{{ url('dashboard/js/') }}/custome.js"></script>

    {{-- CKEditor --}}
    <script src="/ckeditor/ckeditor.js"></script>
    <script src="/ckeditor/script.js"></script>

</body>
</html>