<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hire me!</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="bg-orange-200 p-5">
        <h1 class="text-2xl md:text-4xl">@yield('title')</h1>
    </header>

    <div class="bg-white my-5 w-full flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0">
        <main class=" md:w-2/3 lg:w-3/4 px-5 py-5">
            @include('common.flash-message')
            @yield('content')
        </main>
        <aside class="bg-blue-100 md:w-1/3 lg:w-1/4 px-5 py-5">
            @include('common.menu')
        </aside>
    </div>
</body>
</html>
