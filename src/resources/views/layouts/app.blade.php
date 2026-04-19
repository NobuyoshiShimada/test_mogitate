<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mogitate</title>
    <link rel="stylesheet" href="{{ asset( 'css/sanitaize.css' )}}">
    <link rel="stylesheet" href="{{ asset( 'css/common.css' )}}">
    @yield('css')
</head>

<body>
    <div class="app">
        <header class="header">
            <h1 class="header__heading">mogitate</h1>
        </header>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>

</html>
