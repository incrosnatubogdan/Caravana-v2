@extends('layouts.layout-en')
@section('title', 'Partners')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-en')
    @section('link', 'parteneri')
    <div class="main container">
        <section class="news-section">
            <h3 class="blue-c uppercase us-title-l">Partners</h3>
            <h4 class="blue-c center">Main sponsors</h4>
            <div class="overflow-row no-scroll-wrap">
                @foreach($mainPartners as $key => $partner)
                <div class="element partners">
                    <a target="_blank" href="{{ $partner['link'] }}">
                        <img class="cover" alt="{{ $partner['title'] }}" src="../{{ $partner['logo'] }}">
                        <p class="uppercase blue-c">{{ $partner['title'] }}</p>
                        @if(strlen($partner['facebook']) > 0)
                        <a target="_blank" href="{{ $partner['facebook'] }}">
                            <img class="icon" src="../assets/img/icon/like.svg">
                        </a>
                        @endif
                    </a>
                </div>
                @endforeach
            </div>
            <h4 class="blue-c center">Local sponsors</h4>
            <div class="overflow-row no-scroll-wrap">
                @foreach($localPartners as $key => $partner)
                <div class="element partners small">
                    <a target="_blank" href="{{ $partner['link'] }}">
                        <img class="cover" alt="{{ $partner['title'] }}" src="../{{ $partner['logo'] }}">
                        <p class="uppercase blue-c">{{ $partner['title'] }}</p>
                        @if(strlen($partner['facebook']) > 0)
                        <a target="_blank" href="{{ $partner['facebook'] }}">
                            <img class="icon" src="../assets/img/icon/like.svg">
                        </a>
                        @endif
                    </a>
                </div>
                @endforeach
            </div>
            <h4 style="margin-top:20px;" class="blue-c center">Partner NGOs</h4>
            <div class="overflow-row no-scroll-wrap">
                @foreach($organisationPartners as $key => $partner)
                <div class="element partners small">
                    <a target="_blank" href="{{ $partner['link'] }}">
                        <img class="cover" alt="{{ $partner['title'] }}" src="../{{ $partner['logo'] }}">
                        <p class="uppercase blue-c">{{ $partner['title'] }}</p>
                        @if(strlen($partner['facebook']) > 0)
                        <a target="_blank" href="{{ $partner['facebook'] }}">
                            <img class="icon" src="../assets/img/icon/like.svg">
                        </a>
                        @endif
                    </a>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@stop