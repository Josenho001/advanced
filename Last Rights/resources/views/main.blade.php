<!doctype html>
<html lang="en">
@include('partials._head')

<body>
@include('partials._nav')

{!! Html::style('css/styles.css') !!}

@yield('content')

@include('partials._footer')

@include('partials._javascripts') 

</body>
</html>       