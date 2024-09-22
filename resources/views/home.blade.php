<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Url Shortener | Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="/css/home.css">
</head>

<body>
    <div class="container">
        <div class="content">
            <div style="display: flex; flex-direction:column;">
                <nav class="navbar">
                    <div class="nav">
                        <div class="nav-content">
                            <a href="/" style="font-size: 20px; color: black;">Url Shortener</a>
                            <a href="https://github.com/RaqDeku/url-shortener-php-laravel" target="_blank" rel="noopener noreferrer">
                                <button class="button">
                                    Github
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="white"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="ml-2">
                                        <path d="M7 7h10v10"></path>
                                        <path d="M7 17 17 7"></path>
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                </nav>
                <div style="justify-content:center;" class="main">
                    <form action="/" method="POST" class="form">
                        @csrf
                        <div class="form-content">
                            <div class="form-group">
                                <label for="longUrl">Your Long Url</label>
                                <input type="text" name="longUrl">
                            </div>
                            <div class="form-group">
                                <label for="shortUrl">Shorten Url</label>
                                <input type="text" name="shortUrl" value="{{ $shortUrl }}" readonly>
                            </div>
                            <div>
                                <button type="submit" class="button" style="width: 100%; margin-top: 2rem;">Shorten</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>