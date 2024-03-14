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
<body>
    @include('inc/navbar')
    <div class="main">
        
        @php

$user = Users::where('username', session()->get('username'))->first();

    $news = News::all()->where('genre', $user->genre)->sortBy('created_at')->reverse();

foreach ($news as $new) {

        @endphp
            

            <div class="article-head">
                <div class="article-title">{{$new->name}}</div>
                <div class="author">by {{$new->author}}</div>
                <div class="author">at {{$new->created_at}}</div>
            </div>  
            <div class="article-body">
            {!! $new['blurb'] !!}
            <br>
            <a href="article/{{ $new['id'] }}">Read More...</a>
            </div>

        @php
}   

        @endphp

    </div>




    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>