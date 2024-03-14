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
   

</body>
</html>