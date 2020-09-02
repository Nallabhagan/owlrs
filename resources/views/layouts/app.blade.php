<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        @section('head-tag')
        @show
        
        <link rel="icon" type="image/png" href="{{ url('assets/img/favicon-32x32.png') }}" sizes="32x32" />
        <link rel="icon" type="image/png" href="{{ url('assets/img/favicon-16x16.png') }}" sizes="16x16" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/fontisto@v3.0.4/css/fontisto/fontisto-brands.min.css" rel="stylesheet">
        <!-- Core CSS -->
        <link rel="stylesheet" href="{{ url('assets/css/bulma.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/app.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/core.css') }}">
        <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

        <!-- Concatenated js plugins and jQuery -->
        <script src="{{ url('assets/js/app.js') }}"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>
    </head>
    <body>

        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        <div class="app-overlay"></div>

        @include('_includes.navbar')
        @yield('content')
        
        
        <!-- Core js -->
        <script src="{{ url('assets/data/tipuedrop_content.js') }}"></script>
        <script src="{{ url('assets/js/global.js') }}"></script>
        <script src="{{ url('assets/js/main.js') }}"></script>
        <script src="{{ url('assets/js/ajaxForm.js') }}"></script>
        <!-- Page and UI related js -->
        <script src="{{ url('assets/js/feed.js') }}"></script>
        <script src="{{ url('assets/js/stories.js') }}"></script>
        <script src="{{ url('assets/js/chat.js') }}"></script>
        <script src="{{ url('assets/js/inbox.js') }}"></script>
        <script src="{{ url('assets/js/profile.js') }}"></script>
        <script src="{{ url('assets/js/friends.js') }}"></script>
        <script src="{{ url('assets/js/events.js') }}"></script>
        <script src="{{ url('assets/js/explorer.js') }}"></script>
        <script src="{{ url('assets/js/news.js') }}"></script>
        <script src="{{ url('assets/js/questions.js') }}"></script>
        <script src="{{ url('assets/js/videos.js') }}"></script>
        <script src="{{ url('assets/js/shop.js') }}"></script>
        <script src="{{ url('assets/js/settings.js') }}"></script>
        
        <!-- Components js -->
        <script src="{{ url('assets/js/widgets.js') }}"></script>
        <script src="{{ url('assets/js/autocompletes.js') }}"></script>
        <script src="{{ url('assets/js/modal-uploader.js') }}"></script>
        <script src="{{ url('assets/js/popovers-users.js') }}"></script>
        <script src="{{ url('assets/js/popovers-pages.js') }}"></script>
        <script src="{{ url('assets/js/go-live.js') }}"></script>
        <script src="{{ url('assets/js/lightbox.js') }}"></script>
        <script src="{{ url('assets/js/touch.js') }}"></script>
        <script src="{{ url('assets/js/tour.js') }}"></script>   
        @section('scripts') 
        @show
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-176159065-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-176159065-1');
        </script>

    </body>
</html>
