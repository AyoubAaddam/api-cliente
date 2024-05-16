<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'figtree', sans-serif;
            background-color: #f3f4f6;
        }
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        h1 {
            font-size: 3rem;
            color: #ff5722;
            margin-bottom: 2rem;
        }
        .btn {
            padding: 1rem 2rem;
            font-size: 1rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-primary {
            background-color: #2196f3;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0d47a1;
        }
        .btn-secondary {
            background-color: #ff5722;
            color: white;
            margin-top: 1rem;
        }
        .btn-secondary:hover {
            background-color: #e64a19;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>API AYOUB</h1>
        <a href="{{ route('login.index') }}" class="btn btn-primary">Iniciar sesión</a>
        <a href="{{ route('register.index') }}" class="btn btn-secondary">Registrarse</a>
    </div>
</body>
</html>
