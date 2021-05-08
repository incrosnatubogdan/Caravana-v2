@extends('layouts.layout-en')
@section('title', 'Team')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-en')
    @section('link', 'echipa')
    <div class="main container">
        <h3 class="team-title blue-c uppercase">The Team</h3>
        <div class="team-sort">
            <p class="blue-c uppercase sorter" id="bucuresti"> Bucuresti </p>
            <p class="blue-c uppercase sorter" id="iasi"> Iasi </p>
            <p class="blue-c uppercase sorter" id="cluj"> Cluj-napoca </p>
            <p class="blue-c uppercase sorter" id="all"> Entire team </p>
        </div>
        <div id="team-member">
            @foreach($echipaJSON as $key => $name)
                <div class="team-member {{ $name['team'] }}">
                    <a href="{{ $name['facebook'] }}" class="social">
                        <img class="" src="../assets/img/social/facebook-blue.svg">
                    </a>
                    <img class="profile" src="../assets/img/echipa/{{ $name['image'] }}">
                    <h3 class="blue-c uppercase name">{{ $name['name'] }}</h3>
                    <p class="orange-c uppercase title">{{ $name['department'] }}</p>
                    <span class="hidden description">{{ $name['testimonial_en'] }}
                    </span>
                    <span class="hidden profession">Ocupatie: {{ $name['job_en'] }}</span>
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
                <img src="../assets/img/social/facebook-blue.svg">
            </a>
            <img class="profile" src="../assets/img/echipa/diana-paduraru.jpg">
            <h3 class="blue-c uppercase name"></h3>
            <p class="orange-c uppercase title"></p>
            <p class="blue-c profession"></p>
            <p class="blue-c full-text"></p>
        </div>
    </div>
</div>
@stop