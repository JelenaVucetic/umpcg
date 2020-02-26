<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:image" content="http://umpcg.qqriq.me/img/UMPCG_logo.svg" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://umpcg.qqriq.me/" />

    <link rel="shortcut icon" type="image/x-icon" href="/img/logo_ico.ico" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awsome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/acordian.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jcarousel.responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/posts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/singlePost.css') }}" rel="stylesheet">
    <link href="{{ asset('css/about.css') }}" rel="stylesheet">
    <link href="{{ asset('css/becomeMember.css') }}" rel="stylesheet">
    <link href="{{ asset('css/eBooks.css') }}" rel="stylesheet">
    <link href="{{ asset('css/members.css') }}" rel="stylesheet">
    <link href="{{ asset('css/activities.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Roboto'; background-color:white !important;">
    <div id="app">
        <img src="/img/Drop down strelica.svg" alt="" onclick="topFunction()" id="myBtn" title="Go to top">
        @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
        @yield('members')
        @yield('carousel')
        @yield('breadcrumbs')
        @include('inc.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jcarousel.responsive.js') }}"></script>
    <script src="{{ asset('js/jquery.jcarousel.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }
</script>
<script>
    $('textarea').keyup(updateCount);
    $('textarea').keydown(updateCount);

    function updateCount() {
        var cs = $(this).val().length;
        $('#characters').text(cs);
    }
</script>
<script>
    $('#title').keyup(updateCount);
    $('#title').keydown(updateCount);

    function updateCount() {
        var cs = $(this).val().length;
        $('#char').text(cs);
    }
</script>
<script>
    $(function() {
        $(".random").html($(".random").children().sort(function() { return 0.5 - Math.random() }));
        });
</script>
<script>
    window.onscroll = function() {myFunction()};

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
    }
</script>
<script>
    var input = document.getElementById( 'file-upload' );
    var infoArea = document.getElementById( 'file-upload-filename' );

    input.addEventListener( 'change', showFileName );

    function showFileName( event ) {
    
    // the change event gives us the input it occurred in 
    var input = event.srcElement;
    
    // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
    var fileName = input.files[0].name;
    
    // use fileName however fits your app best, i.e. add it into a div
    infoArea.textContent = fileName;
    }
</script>
</body>
</html>
