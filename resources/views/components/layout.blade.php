<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PlaceCom</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

</head>
<body class=" w-full">

    {{-- to display flash messages if available --}}
    @if (session('message'))

        <div class="flash">
            {{ session('message') }}
        </div>
        
    @endif
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Primary layout for all view rendered -->

    {{ $slot }}
</body>
</html>