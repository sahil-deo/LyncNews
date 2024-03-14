<?php

use App\Models\News;

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
   
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th class="author">Author</th>
            <th class="genre">Genre</th>
            <th>Action</th>
        </tr>

        @php

        $articles = News::all();

        foreach($articles as $article){
        
            @endphp

            <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->name}}</td>
                <td class="author">{{ucfirst($article->author)}}</td>
                <td class="genre">{{ucfirst($article->genre)}}</td>
                <td><form action="/admin/delete/{{$article->id}}" method="post"> @csrf
                    <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>

            @php
        
        }
        @endphp
    </table>


</body>
</html>