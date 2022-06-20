<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<form action="{{ route('login') }}" method="POST">
    @csrf
    <body>
        <div>
            <input type="text" name="name" id="username">
            <input type="password" name="password" id="password">
            <button type="submit">Login</button>
        </div>
    </body>
</form>
</html>