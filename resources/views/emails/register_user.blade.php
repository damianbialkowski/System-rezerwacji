<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

    <div style="width: 100%;">
        <a href="{{ url('/') }}">
            <img src="{{ asset('img/logo.png') }}" alt="logo">
        </a>
        <span>EasyLayUp.pl</span>
    </div>
    <br>
    <h2>Witaj, {{ ($user && $user['firstname']) ? $user['firstname'] : $user['username'] }}!</h2>
    <p>Twoje konto zostało pomyślnie utworzone!</p>
    <p>Dziękujemy za zaufanie i liczymy, że się nie zawiedziesz!</p>
    <p>Nie czekaj i przeglądaj Nasze najnowsze artykuły!</p>
    <hr>
    <p>Pozdrawiamy,</p>
    <p>Zespół EasyLayUp.pl</p>

    
</body>
</html>