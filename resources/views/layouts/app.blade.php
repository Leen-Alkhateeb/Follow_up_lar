<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f5f5f5; }
        nav { background: #333; padding: 12px 30px; }
        nav a { color: #fff; margin-right: 20px; text-decoration: none; }
        .container { width: 90%; margin: 20px auto; background: #fff; padding: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: center; }
        th { background: #eee; }
        .success { color: green; }
        .errors { color: red; }
        input { padding: 6px; width: 300px; }
    </style>
</head>
<body>
    <nav><a href="{{ route('users.index') }}">Users</a></nav>
    <div class="container">
        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
        @yield('content')
    </div>
</body>
</html>