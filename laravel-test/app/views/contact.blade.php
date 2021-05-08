@extends('layouts.layout')
@section('title', 'Contact')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-ro')
    @section('link', 'contact')
    <div class="main container">
        <h3 class="team-title blue-c uppercase mobile-show">Contact</h3>
        <div class="shadow-block">
            <div class="contact-box">
                <img src="assets/img/icon/contact.svg">
                <p class="blue-c">Mihai Ranete, Președinte</p>
                <p class="blue-c">caravanacumedici@gmail.com</p>
            </div>
            <div class="contact-box">
                <img src="assets/img/icon/contact.svg">
                <p class="blue-c">Alina Jîjie, COORDONATOR ADJUNCT IASI</p>
                <p class="blue-c">iasi@caravanacumedici.ro</p>
            </div>
            <div class="contact-box">
                <img src="assets/img/icon/contact.svg">
                <p class="blue-c">Răzvan Tirpe, COORDONATOR CLUJ-NAPOCA</p>
                <p class="blue-c">cluj@caravanacumedici.ro</p>
            </div>
        </div>
        <div class="shadow-block">
            <div class="contact-box">
                <p class="blue-c">Vrei să venim cu echipamente medicale și să consultăm 150 - 250 persoane, adulți
                    și copii, în satul tău?</p>
                <a class="request-ed" target="_blank"
                    href="https://docs.google.com/forms/d/e/1FAIpQLSel3npH9EtsALq9cJIm3_zLS886aMTSwYv5P4t3WuSL1O333g/viewform">Solicită
                    Caravana</a>
            </div>
            <div class="contact-box">
                <p class="blue-c">Dacă ești student la medicină, medic rezident, specialist sau primar
                    te așteptăm alături ne noi la următoarele ediții.</p>
                <a class="request-ed" target="_blank"
                    href="https://docs.google.com/forms/d/e/1FAIpQLSfyv7n7wQAEr8oppYGtIxjNwT_sY3ieLd_2V_67VzPuB1LRNQ/viewform">
                    Alătură-te echipei!</a>
            </div>
            <div class="contact-box">
                <p class="blue-c">Vă invităm să solicitați un curs de prim-ajutor pentru școala dumneavoastră!</p>
                <a class="request-ed" target="_blank"
                    href="https://docs.google.com/forms/d/e/1FAIpQLSe54UTZrHsfKqxaV7DJ5p1_W9QxzrZjdlQFwOyxy3IxU8MxnQ/closedform">
                    Solicită Curs!</a>
            </div>
        </div>
    </div>
</div>
@stop