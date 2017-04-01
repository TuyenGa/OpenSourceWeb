<!doctype html>
<html lang="en">
@include('partials.header')
<body>
@include('partials.nav')
<div class="container">
    @yield('content')
</div>
<script src="/js/app.js"></script>
</body>
</html>