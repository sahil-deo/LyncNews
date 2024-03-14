<?php

if (session()->has("username")) {
    redirect()->to('/homepage')->send();
}
session()->forget('isAdmin');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    

</head>
<body>
    <form action="" method="post">

        @csrf
        <h1><center>Lync News</center></h1>
        <h2>Register</h2>
        <label for="">Username</label>
        <input type="text" name="username" id="username" required>
        <span>@error('username') {{$message}} @enderror</span>

        <label for="">Password</label>
        <input type="password" name="password" id="password" required >
        <span>@error('password') {{$message}} @enderror</span>

        <label for="">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
        <span>@error('password_confirmation') {{$message}} @enderror </span>   

        <h3>Choose Genre</h3>
        <div id="genre">
        <input type="radio" name="genre" value="tech" id="tech">
        <label for="tech">Tech</label><br>
        <input type="radio" name="genre" value="finance" id="finance">
        <label for="finance">Finance</label><br>
        <input type="radio" name="genre" value="politics" id="politics">
        <label for="politics">Politics</label><br>
        </div>
        <span>@error('genre') {{$message}} @enderror</span>

        <button type="submit">Register</button>

        <h5><a href="/login">Registered? Log In</a><br><br>
        <a href="/admin-login">Admin Login</a></h5>


    </form>
</body>
</html>