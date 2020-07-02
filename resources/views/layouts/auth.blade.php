<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="page-header-fixed">

    @include('partials.analytics')

    <div ></div>

    <div >
        @yield('content')
    </div>

    <div
         >
        <i ></i>
    </div>

    @include('partials.javascripts')

</body>
</html>