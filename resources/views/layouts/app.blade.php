<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Add background image */
            background-image: url('{{ asset("assets/admin/images/1903d1c348c4c541e4f525c2f85a132918a2c266.png") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border: 1px solid transparent;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.8);
            /* White background with transparency */
            position: relative;
        }

        .login-container:before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            border-radius: 10px;
            background: linear-gradient(45deg, #8A2BE2, #FF69B4);
            z-index: -1;
        }

        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .form-group {
            position: relative;
        }

        .form-control {
            padding-left: 40px;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .remember-forgot .form-check {
            margin-right: 20px;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h3 class="text-center">Login</h3>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>