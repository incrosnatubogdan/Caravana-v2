@extends('layouts.layout')
@section('title', 'Media')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-ro')
    @section('link', 'media')
    <div class="main container">
        <section class="news-section">
            <h3 class="blue-c uppercase us-title-l">Media</h3>
            <div class="search-holder">
                <div>
                    <input type="text" id="media-search" class="search">
                    <div class="line-1"></div>
                    <div class="line-2"></div>
                </div>
            </div>
            <div class="overflow-row" id="caravans">
                @foreach($mediaJSON as $key => $name)
                <div class="element">
                    <a href="{{ $name['link'] }}">
                        <img class="cover" src="{{ $name['image'] }}">
                        <img class="icon" src="{{ $name['icon'] }}">
                        <p class="blue-c">{{ $name['title'] }} - {{ $name['location'] }}</p>
                        <span class="blue-c">{{ $name['date'] }}</span>
                        <p class="media-testimonial">{{ $name['testimonial'] }}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@stop