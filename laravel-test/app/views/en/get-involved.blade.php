@extends('layouts.layout-en')
@section('title', 'Get Involved')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-en')
    @section('link', 'implica')
    <div class="main container">
        <section class="news-section">
            <h3 class="team-title blue-c uppercase mobile-show">MEDICAL VOLUNTEERING</h3>
            <p class="padding-m blue-c center">If you are a resident, specialist or primary physician we welcome
                you to our future editions. Here’s a list of the medical specialties that are needed during a
                regular caravan. </p>
            <a class="request-ed" target="_blank"
                href="https://docs.google.com/forms/d/e/1FAIpQLSfyv7n7wQAEr8oppYGtIxjNwT_sY3ieLd_2V_67VzPuB1LRNQ/viewform">
                Join the team!</a>
            <div class="overflow-row involve infinite involved">
                <div class="element">
                    <img class="cover" src="../assets/img/voluntari/cardio.jpg">
                    <p class="uppercase blue-c">Cardiology</p>
                </div>
                <div class="element">
                    <img class="cover" src="../assets/img/voluntari/dermato.jpg">
                    <p class="uppercase blue-c">Dermatology</p>
                </div>
                <div class="element">
                    <img class="cover" src="../assets/img/voluntari/eco.jpg">
                    <p class="uppercase blue-c">RADIOLOGY</p>
                </div>
                <div class="element">
                    <img class="cover" src="../assets/img/voluntari/ginecologie.jpg">
                    <p class="uppercase blue-c">Gynecology</p>
                </div>
                <div class="element">
                    <img class="cover" src="../assets/img/voluntari/medicina-interna.jpg">
                    <p class="uppercase blue-c">iNTERNAL MEDICINe</p>
                </div>
            </div>
            <div class="overflow-row involve reverse infinite involved">
                <div class="element">
                    <img class="cover" src="../assets/img/voluntari/oftalmo.jpg">
                    <p class="uppercase blue-c">OPHTHALMOLOGY</p>
                </div>
                <div class="element">
                    <img class="cover" src="../assets/img/voluntari/pedi.jpg">
                    <p class="uppercase blue-c">PEDIATRICS</p>
                </div>
                <div class="element">
                    <img class="cover" src="../assets/img/voluntari/reumato.jpg">
                    <p class="uppercase blue-c">RHEUMATOLOGY</p>
                </div>
                <div class="element">
                    <img class="cover" src="../assets/img/voluntari/stoma.jpg">
                    <p class="uppercase blue-c">DENTISTRY</p>
                </div>
                <div class="element">
                    <img class="cover" src="../assets/img/voluntari/neuro.jpg">
                    <p class="uppercase blue-c">NEUROLOGY</p>
                </div>
            </div>
        </section>
    </div>
</div>
@stop