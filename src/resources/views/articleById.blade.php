<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <div class="container">
            @foreach ($tags as $tag)
                <h3> {{ $tag->name }} </h3>
            @endforeach

            <div class="article-container">
                <h2> {{ $article->name }} </h2>
                <p> {{ $article->contents }} </p>
                <p>author {{ $article->author }} </p>
                <p>created at {{ $article->creation_time }} </p>
            </div>
        </div>
    </div>

    <link href="{{ URL::asset('css/article.css') }}" rel="stylesheet" type="text/css">
</body>

</html>
