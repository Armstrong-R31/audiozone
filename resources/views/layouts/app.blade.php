<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music app</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header>
        @include('components.header')
    </header>

    <main>
        <div style="flex-direction: row;">
            @include('components.navbar')
            @include('components.library')
            @yield('content')
        </div>

        @include('components.media-player')
    </main>

    @vite('resources/js/app.js')
    <script src="https://kit.fontawesome.com/88027e7db3.js" crossorigin="anonymous"></script>
</body>
</html>