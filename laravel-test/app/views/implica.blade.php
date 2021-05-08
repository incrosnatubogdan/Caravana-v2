@extends('layouts.layout')
@section('title', 'Implica-te')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-ro')
    @section('link', 'get-involved')
    <div class="main container">
        <section class="news-section">
            <h3 class="team-title blue-c uppercase mobile-show">Voluntariat medical</h3>
            <p class="padding-m blue-c center">Dacă ești student la medicină, medic rezident, specialist sau primar
                te așteptăm alături ne noi la următoarele ediții. Mai jos găsești lista specialităților pe care le
                poate cuprinde o caravană. </p>
            <a class="request-ed" target="_blank"
                href="https://docs.google.com/forms/d/e/1FAIpQLSfyv7n7wQAEr8oppYGtIxjNwT_sY3ieLd_2V_67VzPuB1LRNQ/viewform">
                Alătură-te echipei!</a>
            <div class="overflow-row involve infinite involved">
                <div class="element">
                    <img class="cover" src="assets/img/voluntari/cardio.jpg">
                    <p class="uppercase blue-c">Cardiologie</p>
                </div>
                <div class="element">
                    <img class="cover" src="assets/img/voluntari/dermato.jpg">
                    <p class="uppercase blue-c">Dermatologie</p>
                </div>
                <div class="element">
                    <img class="cover" src="assets/img/voluntari/eco.jpg">
                    <p class="uppercase blue-c">Radiologie</p>
                </div>
                <div class="element">
                    <img class="cover" src="assets/img/voluntari/ginecologie.jpg">
                    <p class="uppercase blue-c">Ginecologie</p>
                </div>
                <div class="element">
                    <img class="cover" src="assets/img/voluntari/medicina-interna.jpg">
                    <p class="uppercase blue-c">Medicină internă</p>
                </div>
            </div>
            <div class="overflow-row involve reverse infinite involved">
                <div class="element">
                    <img class="cover" src="assets/img/voluntari/oftalmo.jpg">
                    <p class="uppercase blue-c">Oftalmologie</p>
                </div>
                <div class="element">
                    <img class="cover" src="assets/img/voluntari/pedi.jpg">
                    <p class="uppercase blue-c">Pediatrie</p>
                </div>
                <div class="element">
                    <img class="cover" src="assets/img/voluntari/reumato.jpg">
                    <p class="uppercase blue-c">Reumatologie</p>
                </div>
                <div class="element">
                    <img class="cover" src="assets/img/voluntari/stoma.jpg">
                    <p class="uppercase blue-c">Medicină dentară</p>
                </div>
                <div class="element">
                    <img class="cover" src="assets/img/voluntari/neuro.jpg">
                    <p class="uppercase blue-c">Neurologie</p>
                </div>
            </div>
        </section>
    </div>
</div>
@stop