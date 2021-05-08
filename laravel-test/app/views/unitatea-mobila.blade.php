@extends('layouts.layout')
@section('title', 'Unitatea Mobila')
@section('content')
    <div class="page-holder">
        @extends('layouts.nav-ro')
        @section('link', 'mobile_unit')
        <div class="main container">
            <div class="header-img obj"></div>
            <h3 class="team-title blue-c uppercase absolute-title unit-title">Unitatea Mobilă</h3>
            <div class="obj-sort-parent">
                <div class="obj-sort">
                    <img data-src="assets/img/about-us/copii-ro.jpg" class="box" src="assets/img/icon/pacienti-consultati.svg">
                    <p class="blue-c uppercase">Caravana copiilor</p>
                </div>
                <div class="obj-sort">
                    <img data-src="assets/img/about-us/gineco-ro.jpg" class="box" src="assets/img/icon/problema-abordata.svg">
                    <p class="blue-c uppercase">Sănătatea femeii</p>
                </div>
                <div class="obj-sort">
                    <img data-src="assets/img/about-us/etape-ro.jpg" class="box" src="assets/img/icon/voluntari.svg">
                    <p class="blue-c uppercase">Caravana cardio</p>
                </div>
            </div>
            <div class="road"></div>
            <div class="shadow-block center road-margin">
                <p class="blue-c">Populația țintă este cea din mediul rural cu risc crescut de sărăcie, acces dificil
                    la serviciile medicale de bază: copiii din familiile defavorizate, vârstnicii, populația
                    neasigurată. Un alt grup țintă al proiectului sunt școlarii, pentru cursurile de educație medicală
                    și implicit prin ei, părinții acestora.
                </p>
            </div>

            <div class="shadow-block center road-margin">
                <p class="blue-c">Evaluăm starea de sănătate a populației din zona respectivă prin: consult clinic,
                    analize bioumorale, electrocardiogramă, examen ecografic, consulturi de specialitate: medicină
                    internă, cardiologie, neurologie, oftalmologie, dermatologie, ginecologie, imagistică medicală,
                    pediatrie etc.
                </p>
            </div>
            <div class="shadow-block center road-margin">
                <p class="blue-c">Colaborăm strâns cu medicul de familie din sat (unde acesta există), respectiv
                    autoritățile locale (primar, asistent social, asistent sanitar), ultimii doi reprezentând oameni
                    cheie, continuatori ai activității noastre de prevenție în satul/comunitatea respectivă.
                </p>
            </div>
            <div class="shadow-block center road-margin">
                <p class="blue-c">Venim cu echipamente medicale care frecvent lipsesc din cabinetele medicilor de
                    familie din aceste zone și consultăm 150 - 250 persoane, adulți și copii, la fiecare ediție.
                </p>
            </div>
            <div class="shadow-block center road-margin">
                <p class="blue-c">Organizăm caravane la care participă o echipă multi-disciplinară (medici specialiști
                    și rezidenți), în colaborare cu autoritățile locale.
                </p>
            </div>
            <div class="shadow-block center road-margin">
                <p class="blue-c">Stabilim rețele de comunicare între medicii participanți și autoritățile publice, în
                    scopul supravegherii evoluției ulterioare a persoanelor consultate.
                </p>
            </div>
            <div class="shadow-block center road-margin">
                <p class="blue-c">
                    Întocmim baze de date, în vederea raportării și efectuării de studii clinice.
                </p>
            </div>
            <div class="shadow-block center road-margin">
                <p class="blue-c">Realizăm prezentări și împărțim materiale cu scop educativ.
                </p>
            </div>
        </div>
    </div>
    <div id="popup" class="popup-overlay">
        <div style="background:none" class="popup">
            <img class="caravan">
        </div>
    </div>
@stop