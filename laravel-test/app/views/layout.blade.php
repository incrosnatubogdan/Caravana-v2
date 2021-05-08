<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="minimal-ui,width=device-width,height=device-height,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    
    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('assets/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('assets/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('assets/img/favicon/favicon-16x16.png')}}">
    <link rel="shortcut icon" href="{{URL::asset('/favicon.ico')}}">

    <link rel="manifest" href="{{URL::asset('assets/img/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{URL::asset('assets/img/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    
    <meta name="msapplication-config" content="{{URL::asset('assets/img/favicon/browserconfig.xml')}}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>@yield('title')</title>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "Acasa",
                "item": "http://caravanacumedici.ro"
            }, {
                "@type": "ListItem",
                "position": 2,
                "name": "Doneaza",
                "item": "http://caravanacumedici.ro/doneaza"
            }, {
                "@type": "ListItem",
                "position": 3,
                "name": "Media",
                "item": "http://caravanacumedici.ro/media"
            }, {
                "@type": "ListItem",
                "position": 4,
                "name": "Contact",
                "item": "http://caravanacumedici.ro/contact"
            }]
        }
    </script>

    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <script src="{{asset('assets/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{asset('assets/js/main.min.js')}}"></script>

    
</head>
<html>

<body>
    @yield('content')
</body>
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
            <img class="burger-img" src="assets/img/burger.png">
            <span class="vertical"></span>
        </label>
        <nav id="navigation">
            <ul class="navigation-ul">
                <a class="logo" href="index">
                    <img src="assets/img/logo.png">
                </a>
                <p class="follow-us uppercase">Follow us</p>
            </ul>
        </nav>
    </nav>
</footer>

</html>