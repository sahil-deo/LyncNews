<?php 

use App\Models\News

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    @include('inc/navbar')

    @php
        $article = News::where('id', $id)->first(); 
    @endphp

    <div class="article-head">
        <div class="article-title">{{$article->name}}</div>
        <div class="author">by {{$article->author}}</div>
        <div class="author">at {{$article->created_at}}</div>
    </div>

    <div class="article-body">
        {!! $article->content !!}
    </div>
    <center>
        <form action="/homepage" method="post">
            @csrf
            <button type="submit">Back</button> 
        </form>
    </center>
</body>
</html>