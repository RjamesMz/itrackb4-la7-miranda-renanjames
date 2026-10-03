<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="ps-3 py-3">
    <h1>My Medicine Stock</h1>
    <h2>Renan James Z. Miranda</h2>
    </div>

   @include('partials._nav')

     <div class="container">
         @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
