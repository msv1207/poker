<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @routes
    <script src="{{ asset(mix('js/app.js')) }}" defer></script>

    <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>

    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
{{--    <script src="{{ asset(mix('js/manifest.js')) }}" defer></script>--}}
{{--    <script src="{{ asset(mix('js/vendor.js')) }}" defer></script>--}}
    @inertiaHead
</head>

<body>
@inertia
</body>

</html>
