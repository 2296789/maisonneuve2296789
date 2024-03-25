<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('lang.text_article') </title>
    <style>
        body{
            font-family: sans-serif;
        }
        img{
            border: solid;
            padding: 10px;
            border-radius: 5px;
            width: 80px;
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body>
    <h1>{{ $article['titre'] }}</h1>
    <ul >
        <li><strong>@lang('lang.text_create_date') : </strong>{{ $article['created_at'] }}</li>
        <li><strong>@lang('lang.text_edit_date') : </strong>{{ $article['updated_at'] }}</li>
        <li><strong>@lang('lang.text_author') : </strong>{{ $article['author'] }}</li>
        <li><strong>@lang('lang.text_category') : </strong>{{ $article['category'] }}</li>
    </ul>
    <hr>
    <h3>@lang('lang.text_content') : </h3>
    <p>{{ $article['contenu'] }}</p>
    <img src="data:image/png;base64,{{ base64_encode($qrCode)}}" alt="QR Code">
</body>
</html>