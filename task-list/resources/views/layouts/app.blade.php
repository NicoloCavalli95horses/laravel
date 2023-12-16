{{-- base common html template --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>task list</title>
    <link rel="stylesheet" href="{{asset('css/base.css')}}">
    @yield('style')

    <style>
        .session-msg {
            position: fixed;
            bottom: 22px;
            left: 50%;
            transform: translate(-50%, 0);
            border: 1px solid green;
            border-radius: 12px;
            text-align: center;
            padding: 8px 12px;
            background-color: rgb(0, 220, 0);
            color: white;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <h1 class="l-12">@yield('title')</h1>
    <div>@yield('content')</div>

    @if (session()->has('success'))
      <div class="session-msg">
        <p>{{ session('success') }}</p>
      </div>
    @endif
</body>
</html>