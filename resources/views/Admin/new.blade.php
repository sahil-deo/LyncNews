<?php

if (session()->has("username")) {
    redirect()->to('/homepage')->send();
}
if (!session()->has("isAdmin")) {
    redirect()->to('/register')->send();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    
</head>
<body>

<div class="navbar">
        <a href="/admin" id='title'>Admin</a>
        <div class="options">
        <a href="/admin/new">New</a>
        <a href="/admin/all">All</a>
        <a href="/admin/logout">Logout</a>
        </div>
    </div>
    <div class="newArticle">
        <div class="title">New Article</div>
        <div class="body">
        <form action="" method="post">
            @csrf
            <label for="">Title</label>
            <input type="text" name="title">
            <label for="">Author</label>
            <input type="text" name="author">
            <label for="">Blurb</label>
            <textarea name="blurb" rows="4" cols="50"></textarea>
            <label for="">Content</label>
            <textarea name="content" rows="8" cols="50"></textarea>

            <h3>Choose Genre</h3>
            <div id="genre">
            <input type="radio" name="genre" value="tech" id="tech">
            <label for="tech">Tech</label><br>
            <input type="radio" name="genre" value="finance" id="finance">
            <label for="finance">Finance</label><br>
            <input type="radio" name="genre" value="politics" id="politics">
            <label for="politics">Politics</label><br>
            </div>
            
            <button type="submit">Submit</button>
        </form>
        </div>
    </div>


</body>
</html>