@extends('layouts.layout')
@section('title', 'Partneri')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-ro')
    @section('link', 'partners')
    <div class="main container">
        <section class="news-section">
            <h3 class="blue-c uppercase us-title-l">parteneri</h3>
            <p style="margin:5%;" class="blue-c center">Caravanele nu ar fi posibile fără sprijinul necontenit
                acordat de partenerii noștri cărora le mulțumim pentru că ne ajută să ne îndeplinim lună de lună
                misiunea. Împreună luptăm pentru o Românie mai sănătoasă! </p>
            <h4 class="blue-c center">Sponsori principali </h4>
            <div class="overflow-row no-scroll-wrap">
                @foreach($mainPartners as $key => $partner)
                <div class="element partners">
                    <a target="_blank" href="{{ $partner['link'] }}">
                        <img class="cover" alt="{{ $partner['title'] }}" src="{{ $partner['logo'] }}">
                        <p class="uppercase blue-c">{{ $partner['title'] }}</p>
                        @if(strlen($partner['facebook']) > 0)
                        <a target="_blank" href="{{ $partner['facebook'] }}">
                            <img class="icon" src="assets/img/icon/like.svg">
                        </a>
                        @endif
                    </a>
                </div>
                @endforeach
            </div>
            <h4 class="blue-c center">Sponsori locali</h4>
            <div class="overflow-row no-scroll-wrap">
                <div class="overflow-row no-scroll-wrap">
                    @foreach($localPartners as $key => $partner)
                    <div class="element partners small">
                        <a target="_blank" href="{{ $partner['link'] }}">
                            <img class="cover" alt="{{ $partner['title'] }}" src="{{ $partner['logo'] }}">
                            <p class="uppercase blue-c">{{ $partner['title'] }}</p>
                            @if(strlen($partner['facebook']) > 0)
                            <a target="_blank" href="{{ $partner['facebook'] }}">
                                <img class="icon" src="assets/img/icon/like.svg">
                            </a>
                            @endif
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <h4 style="margin-top:20px;" class="blue-c center">ONG-uri partenere</h4>
            <div class="overflow-row no-scroll-wrap">
                <div class="overflow-row no-scroll-wrap">
                    @foreach($organisationPartners as $key => $partner)
                    <div class="element partners small">
                        <a target="_blank" href="{{ $partner['link'] }}">
                            <img class="cover" alt="{{ $partner['title'] }}" src="{{ $partner['logo'] }}">
                            <p class="uppercase blue-c">{{ $partner['title'] }}</p>
                            @if(strlen($partner['facebook']) > 0)
                            <a target="_blank" href="{{ $partner['facebook'] }}">
                                <img class="icon" src="assets/img/icon/like.svg">
                            </a>
                            @endif
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
@stop