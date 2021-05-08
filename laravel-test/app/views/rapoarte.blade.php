@extends('layouts.layout')
@section('title', 'Rapoarte anuale')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-ro')
    @section('link', 'reports')
    <div class="main container">
        <section class="news-section">
            <h3 class="team-title blue-c uppercase mobile-show">Rapoarte anuale</h3>
            <div class="d-flex">
                <div class="reports">
                    <a target="_blank" href="assets/img/about-us/raport2019.pdf">
                        <div class="element">
                            <img class="cover" src="assets/img/about-us/raport2019.jpg">
                            <p class="uppercase blue-c">
                                În 2019 am reușit să ajungem în 25 de sate din 12 județe, stabilind un record
                                al edițiilor.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="reports">
                    <a href="assets/img/about-us/raport2018.pdf">
                        <div class="element">
                            <img class="cover" src="assets/img/about-us/reports.jpg">
                            <p class="uppercase blue-c">
                                În 2018 am reușit să ajungem în 21 de sate din 12 județe, stabilind un record
                                al edițiilor.
                            </p>
                        </div>
                    </a>
                </div>
            </div>

        </section>
    </div>
</div>
@stop