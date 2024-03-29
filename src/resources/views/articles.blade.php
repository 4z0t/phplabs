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
        <form method="GET">
            <label> Filter by Name </label>
            <input type="text" name="article-name" value="{{ request()->get("article-name") ?: ""}}">
        </form>
        <form method="GET">
            <label> Filter by Tag </label>
            <input type="text" name="tag-name" value="{{ request()->get("tag-name") ?: ""}}">
        </form>
    </div>
    <div>
        <div class="container">
            @foreach ($articles as $article)
                <div class="article-container">
                    <h2> {{ $article->name }} </h2>
                    <p> {{ $article->code }} </p>
                    <p> {{ $article->contents }} </p>
                    <p>author {{ $article->author }} </p>
                    <p>created at {{ $article->creation_time }} </p>
                </div>
            @endforeach
        </div>
        {{ $articles->links() }}
    </div>

    <link href="{{ URL::asset('css/article.css') }}" rel="stylesheet" type="text/css">
</body>

</html>
