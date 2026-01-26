<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
    <title>@yield('title')</title>
</head>
<body>
<div id="db-wrapper">

    @include('layouts.sidebar')

    <div class="main-wrapper">
        @include('layouts.topbar')
       

        <main id="page-content" class="p-4">
            @yield('content')
        </main>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>