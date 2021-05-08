<?php
    $caravanNo = Request::segment(2);
    $imagecount = count(glob("../public/assets/img/caravane/".$caravanNo."/*.jpg"));
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('assets/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('assets/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('assets/img/favicon/favicon-16x16.png')}}">
    <link rel="shortcut icon" href="{{URL::asset('/favicon.ico')}}">

    <link rel="manifest" href="{{URL::asset('assets/img/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{URL::asset('assets/img/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">

    <meta name="msapplication-config" content="{{URL::asset('assets/img/favicon/browserconfig.xml')}}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>Caravana {{$caravanNo}} - @yield('title')</title>

    <link href="{{URL::asset('/assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/assets/css/gallery.css')}}" rel="stylesheet">

    <script src="{{URL::asset('/assets/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{URL::asset('/assets/js/main.min.js')}}"></script>
    <script src="{{URL::asset('/assets/js/media.min.js')}}"></script>
</head>


<body>
    <div class="page-holder">
        <nav class="menu">
            <a href="../en/caravane/{{$caravanNo}}" class="lang">EN</a>
            <a class="logo" href="../index">
                <img src="../assets/img/logo.png">
            </a>
            <input id="burger" type="checkbox" />
            <label id="burger-menu" for="burger">
                <span class="horizontal"></span>
                <img class="burger-img" src="../assets/img/burger.png">
                <span class="vertical"></span>
            </label>
            <nav id="navigation">
                <ul class="navigation-ul">
                </ul>
            </nav>
        </nav>
        <div class="main container caravan">
            <h3 class="team-title blue-c uppercase show-title">Caravana nr. {{$caravanNo}} - @yield('title')</h3>
            <a class="facebook gallery" href="@yield('facebookLink')">
                <img src="../assets/img/social/facebook-blue.svg">
            </a>
            <p class="blue-c">
                @yield('quote')
                <br><br>
                <b>@yield('quotePerson')</b>
            </p>
            <section id="gallery">
                <div class="container">
                    <div id="image-gallery">
                        <div class="row">
                            @for($i=1;$i<$imagecount;$i++) <div class="image">
                                <div class="img-wrapper">
                                    <a href="../assets/img/caravane/{{$caravanNo}}/{{$i}}.jpg">
                                        <img src="../assets/img/caravane/{{$caravanNo}}/{{$i}}.jpg"
                                            class="img-responsive">
                                    </a>
                                    <div class="img-overlay"></div>
                                </div>
                        </div>
                        @endfor
                    </div>
                </div>
        </div>
        </section>
        <footer>
            <img>
            <p class="quote">
                „Doar o viață trăită pentru alții este o viață care merită trăită" <br>
                - Albert Einstein
            </p>
            <p class="copyright">Crafted with ❤️ by Tac-Tic Studio &copy; 2019</p>
            <nav class="menu">
                <input id="burger" type="checkbox" />
                <label id="burger-menu" for="burger">
                    <span class="horizontal"></span>
                    <img class="burger-img" src="../assets/img/burger.png">
                    <span class="vertical"></span>
                </label>
                <nav id="navigation">
                    <ul class="navigation-ul">
                        <a class="logo" href="../index">
                            <img src="../assets/img/logo.png">
                        </a>
                        <p class="follow-us uppercase">Follow us</p>
                    </ul>
                </nav>
            </nav>
        </footer>
    </div>
    </div>
    <div id="popup" class="popup-overlay">
        <div class="popup">
            <div class="close">
                <span class="horizontal"></span>
                <span class="vertical"></span>
            </div>
            <p id="full-testimonial"></p>
        </div>
    </div>
</body>