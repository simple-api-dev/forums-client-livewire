<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire - Forum</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
          integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous"/>

    @livewireStyles

</head>

<body class="flex flex-wrap justify-center">
<div class="flex w-full justify-between px-4 bg-purple-900 text-white">
    <a class="mx-3 py-4" href="/">Home</a>

    @guest
        <div class="py-4">
            @if(Session::has('author_id'))
                Token:<span class="pr-5">{{Session::get('token')}}</span>
                Login User:<span class="pl-1 font-extrabold">{{Session::get('author_id')}}</span>
                <a class="mx-3" href="/logout">Logout</a>
            @else
                <a class="mx-3" href="/login">Login</a>
                <a class="mx-3" href="/register">Register</a>
            @endif
        </div>
    @endguest
</div>
<div class="my-10 w-full flex justify-center">
    {{$slot}}
</div>

@livewireScripts
</body>

</html>

