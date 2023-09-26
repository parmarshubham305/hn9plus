<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    {{ Html::style("frontend/thirdparty/css/all.min.css") }}
    {{ Html::style("frontend/thirdparty/css/slick.css") }}
    {{ Html::style("frontend/css/style.css") }}
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
</head>