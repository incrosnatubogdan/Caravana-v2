@extends('layouts.layout')
@section('title', 'Echipa')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-ro')
    @section('link', 'team')
    <div class="main container">
        <h3 class="team-title blue-c uppercase">Echipa</h3>
        <div class="team-sort">
            <p class="blue-c uppercase sorter" id="bucuresti"> București </p>
            <p class="blue-c uppercase sorter" id="iasi"> Iași </p>
            <p class="blue-c uppercase sorter" id="cluj"> Cluj-napoca </p>
            <p class="blue-c uppercase sorter" id="all"> Toată Echipa </p>
        </div>
        <div id="team-member">
            @foreach($echipaJSON as $key => $name)
            <div class="team-member {{ $name['team'] }}">
                <a href="{{ $name['facebook'] }}" class="social">
                    <img class="" src="assets/img/social/facebook-blue.svg">
                </a>
                <img class="profile" src="assets/img/echipa/{{ $name['image'] }}">
                <h3 class="blue-c uppercase name">{{ $name['name'] }}</h3>
                <p class="orange-c uppercase title">{{ $name['department'] }}</p>
                <span class="hidden description">{{ $name['testimonial'] }}
                </span>
                <span class="hidden profession">Ocupatie: {{ $name['job'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div id="popup" class="popup-overlay">
    <div class="popup">
        <div class="close">
            <span class="horizontal"></span>
            <span class="vertical"></span>
        </div>
        <div class="team-member">
            <a class="social" href="">
                <img src="assets/img/social/facebook-blue.svg">
            </a>
            <img class="profile" src="assets/img/echipa/diana-paduraru.jpg">
            <h3 class="blue-c uppercase name"></h3>
            <p class="orange-c uppercase title"></p>
            <p class="blue-c profession"></p>
            <p class="blue-c full-text"></p>
        </div>
    </div>
</div>
@stop