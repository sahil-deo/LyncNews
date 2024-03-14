<?php

if(session()->has("username")){
    redirect()->to('/homepage')->send();
}
if(session()->has("isAdmin")){
    redirect()->to('/admin')->send();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    
</head>
<body>
    <form action="" method="post">

        @csrf
        <h1><center>Lync News</center></h1>
        <h2>Admin Log In</h2>
        <label for="">Username</label>
        <input type="text" name="username" id="username" required>
        <span>@error('username') {{$message}} @enderror</span>

        <label for="">Password</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Login</button>

        <h5><a href="/login">Back to Login</a></h5>



    </form>
</body>
</html>