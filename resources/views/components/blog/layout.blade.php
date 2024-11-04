<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'WEBMAG | Technical Blogs' }}</title>

    <meta name="title" content="{{ $title ?? 'WEBMAG | Technical Blogs' }}">
    <meta name="description" content="{{ $description ?? 'The best place to learn programming by reading blogs' }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:title" content="{{ $title ?? 'WEBMAG | Technical Blogs' }}">
    <meta property="og:description" content="{{ $description ?? 'The best place to learn programming by reading blogs' }}">
    <meta property="og:image" content="{{ $meta_image ?? $configs->logo }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="{{ $meta_image ?? $configs->logo }}">
    <meta property="twitter:url" content="{{ URL::current() }}">
    <meta property="twitter:title" content="{{ $title ?? 'WEBMAG | Technical Blogs' }}">
    <meta property="twitter:description" content="{{ $description ?? 'The best place to learn programming by reading blogs' }}">
    <meta property="twitter:image" content="{{ $meta_image ?? $configs->logo }}">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700|Nunito:300,600" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

    <link type="text/css" rel="stylesheet" href="{{ url('blog/') }}/css/bootstrap.min.css"/>

    <link rel="stylesheet" href="{{ url('blog/') }}/css/font-awesome.min.css">

    <link type="text/css" rel="stylesheet" href="{{ url('blog/') }}/css/style.css"/>

    <style>
        @foreach($categories as $category)
            .{{ $category->slug }} a:after {
                background-color: #{{ $category->color }};
            }
            .category-widget ul li > a.{{ $category->slug }}:hover, .category-widget ul li > a.{{ $category->slug }}:focus {
                color: #{{ $category->color }};
            }
        @endforeach
    </style>

</head>
<body>

    <x-blog.navbar :categories="$categories" :configs="$configs" />

    <div>
        {{ $slot }}
    </div>

    <x-blog.footer :categories="$categories" :configs="$configs" />

    <!-- Bottom Top JavaScript Section -->
    {{ $btJavascript ?? '' }}

    <script src="{{ url('blog/') }}/js/jquery.min.js"></script>
    <script src="{{ url('blog/') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('blog/') }}/js/main.js"></script>

    <!-- Bottom Bottom JavaScript Section -->
    {{ $bbJavascript ?? '' }}

</body>
</html>