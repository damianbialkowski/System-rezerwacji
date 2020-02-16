<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

    <h2>Witaj, {{ ($user && $user['firstname']) ? $user['firstname'] : $user['username'] }}!</h2>
    <p>Pomyślnie zapisałeś/aś się do newslettera!</p>
    <p>Będziesz otrzymywać teraz informacje o najnowszych artykułach. Pamiętaj, że w każdej chwili możesz zrezygnować z otrzymywania powiadomień poprzez rezygnację.</p>
    <hr>
    
</body>
</html>