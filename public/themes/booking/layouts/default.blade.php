<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    {!! meta_init() !!}
    <meta name="keywords" content="@get('keywords')">
    <meta name="description" content="@get('description')">
    <meta name="author" content="@get('author')">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {!! seo_manager()->render() !!}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    @styles()
</head>
<body class="@if(request()->path() == '/') home @endif">


@partial('header')

<main class="main">
    @content()
</main>

@partial('footer')


@scripts()
</body>
</html>
