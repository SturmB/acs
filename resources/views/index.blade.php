<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content={{ csrf_token() }}>
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href={{ asset('css/app.css') }}>
</head>
<body>

<div id="app" class="container">
    <div class="row">
        <div class="col-md-12">
            <header>
                <a href={{ route('index') }}>
                    <img src="{{ asset('images/logo/acs-logo-2017-01.svg') }}" alt="American Cabin Supply">
                </a>
            </header>
        </div>
    </div>
</div>

<script type="text/javascript" src={{ asset('js/app.js') }}></script>

</body>
</html>