<?php

if(session()->has("username")){
    redirect()->to('/homepage')->send();
}
session()->forget('isAdmin');
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
    <form action = "/login" method="post">

        @csrf
        <h1><center><a href="/admin-login">Lync News</a></center></h1>


       <!--  <h1><center>Lync News</center></h1> -->
        <h2>Log In</h2>
        <label for="">Username</label>
        <input type="text" name="username" id="username" required>
        <span>@error('username') {{$message}} @enderror</span>

        <label for="">Password</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Login</button>

        <h5><a href="/register">New User? Register</a><br><br>
        <a href="/admin-login">Admin Login</a></h5>
    </form>
</body>
</html>