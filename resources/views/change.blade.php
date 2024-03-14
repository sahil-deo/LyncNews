<?php

use App\Models\News;
use App\Models\Users;

if (!session()->has("username")) {
    redirect()->to('/register')->send();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lync News</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<style>
    form{
    display: flex;
    flex-direction: column;
    width: 350px;
    margin: 40px;
    background-color: rgba(184, 219, 250, 0.338);
    backdrop-filter: blur(5px);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 1px 1px 6px rgba(0, 0, 0, 0.379);
    
}
button{
    background-color: rgb(129, 166, 198);
    color: white;
    font-weight: bold;
}
</style>
<body>
    @include('inc/navbar')

    <form action="" method="post">
        @csrf
    <h3>Choose New Genre</h3>
        <div id="genre">
        <input type="radio" name="genre" value="tech" id="tech">
        <label for="tech">Tech</label><br>
        <input type="radio" name="genre" value="finance" id="finance">
        <label for="finance">Finance</label><br>
        <input type="radio" name="genre" value="politics" id="politics">
        <label for="politics">Politics</label><br>
        </div>
        <span>@error('genre') {{$message}} @enderror</span>
<br>
<center>
        <button type="submit" style="width: fit-content; background-color: ">Change</button>
        </center>
    </form>

</body>
</html>