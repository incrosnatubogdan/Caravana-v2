<nav class="menu">
    <a href="en/@yield('link')" class="lang">EN</a>
    <a class="logo" href="index">
        <img src="{{asset('assets/img/logo.png')}}">
    </a>
    <input id="burger" type="checkbox" />
    <label id="burger-menu" for="burger">
        <span class="horizontal"></span>
        <img class="burger-img" src="{{asset('assets/img/burger.png')}}">
        <span class="vertical"></span>
    </label>
    <nav id="navigation">
        <ul class="navigation-ul">
        </ul>
    </nav>
</nav>