<!DOCTYPE html>
<html class="no-js">
<head>
    @include('partial.style')
    @livewireStyles()
</head>
<body class="home-page">
<!-- Main Content-->
<main class="main-content">
    {{ isset($slot)? $slot : ''}}
    @yield('content')
</main>

@include('partial.scripts')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTYfF-dNzmHzNxFDDK-AvqiZ7DIXvN6ZU&callback=initMap&libraries=places" async defer></script>
@livewireScripts()
</body>
</html>
