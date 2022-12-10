<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire - Forum</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    @livewireStyles
</head>

<body class="cBody">
    <div id="id01" class="flex w-full justify-between bg-white p-3">
        <div><a class="font-extrabold hover:text-slate-500" href="/"><i class="fa fa-cubes p-2"></i>myReddit</a></div>
        <div><input class="border-2 rounded-2xl  p-2 w-80 hover:border-blue-200" type="text" placeholder="Search Forum"></div>
        @guest
            @if (Session::has('author_id'))
                <div>
                    Token:<span>{{ Session::get('token') }}</span>
                    Login User:<span>{{ Session::get('author_id') }}</span>
                    <button class="cButton"><a href="/logout">Logout</a></button>
                </div>
            @else
                <div>
                    <a href="/login"><button class="cButton">Login</button></a>
                    <a href="/register"><button class="cButton">Register</button></a>
                </div>
            @endif
        @endguest
    </div>

    <div>
        {{ $slot }}
    </div>
    @livewireScripts
</body>

</html>
