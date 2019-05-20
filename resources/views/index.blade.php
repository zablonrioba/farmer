

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Illuminum GreenHouse</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('css/fa/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Ionicons -->
    <link href="{{ asset('css/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/my.css') }}" rel="stylesheet">
    
</head>

<body>
    <div id="app">
    <products-component userid="{{auth()->user()->id}}" username="{{auth()->user()->name}}" role="{{auth()->user()->role}}"></products-component>
</div>
    <script src="{{ asset('js/app.js') }}"></script>

   
</body>

</html>































