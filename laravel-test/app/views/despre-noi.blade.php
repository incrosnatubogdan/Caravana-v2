@extends('layouts.layout')
@section('title', 'Despre noi')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-ro')
    @section('link', 'about-us')
        <div class="main container">
            <h3 class="team-title blue-c uppercase mobile-show">Cine Suntem</h3>
            <div class="us-sorter">
                <p class="blue-c">Asociația Caravana cu Medici este fondată în 2014 de 5 medici rezidenți care au
                    remarcat absența serviciilor medicale de bază în mediul rural, lipsa totală de educație medicală și
                    mentalitatea total nepreventivă a românilor și au decis să găsească ei înșiși soluții pentru aceste
                    probleme.</p>
                <div class="holder-sorter">
                    <img data-attr="problem" class="box" data-alt-src="assets/img/icon/hover/problema-abordata.svg" src="assets/img/icon/problema-abordata.svg">
                    <p class="blue-c uppercase">Problema abordată</p>
                </div>
                <div class="holder-sorter">
                    <img data-attr="mission" class="box" data-alt-src="assets/img/icon/hover/obiective.svg" src="assets/img/icon/obiective.svg">
                    <p class="blue-c uppercase">Misiune</p>
                </div>
                <div class="holder-sorter">
                    <img data-attr="vision" class="box" data-alt-src="assets/img/icon/hover/viziune.svg" src="assets/img/icon/viziune.svg">
                    <p class="blue-c uppercase">Viziune</p>
                </div>
            </div>
            <div id="problem" class="shadow-block center about-us">
                <h3 class="blue-c uppercase">Problema Abordată</h3>
                <p class="blue-c">
                    Medicina românească este centrată pe spital, majoritatea cheltuielilor în sistemul de sănătate
                    fiind în mediu spitalicesc, deși repartiția populației nu prezintă diferențe semnificative: 55,17%
                    urban și 44,93% rural.
                </p>
                <p class="blue-c">
                    Nevoile populației din zonele rurale sunt mult mai grave și mai mari comparativ cu zona urbană unde
                    se concentrează în prezent serviciile specializate.
                </p>
                <p class="blue-c">
                    Experiența de 3 ani în mediul rural și numărul mare de beneficiari direcți ne-au ajutat să
                    înțelegem prăpastia majoră care se află intre medicina secolului al XXI-lea practicată în centrele
                    universitare, clinicile mari și mare parte din populația României.
                </p>
                <p class="blue-c">
                    De multe ori este în zadar direcționarea unor fonduri către programe de screening dacă beneficiarul
                    găsește cu greu posibilitatea de a plăti sau accesa un mijloc de transport către cel mai apropiat
                    centru medical. Un exemplu concret este cel al screening-ului pentru cancerul de col uterin. Deși
                    programul a debutat în urmă cu mai bine de 5 ani, România continuă să aibă cea mai mare prevalență
                    a cancerului de col uterin din Europa.
                </p>
                <p class="blue-c">
                    Abordarea pe care o propunem este depistarea populației la risc și deplasarea noastră către ea
                    pentru promovarea și acordarea de servicii de prevenție medicală primară.
                </p>
            </div>
            <div id="mission" class="shadow-block center about-us">
                <h3 class="blue-c uppercase">MISIUNEA</h3>
                <p class="blue-c">
                    De 18 ori pe an, timp de un weekend reunim o echipă multi-disciplinară (20-30 de medici
                    specialiști, rezidenți, studenți), în colaborare cu autoritățile locale. Evaluăm gratuit starea de
                    sănătate a populației (între 150-200 de pacienți) din zona respectivă prin: consult clinic, analize
                    bioumorale, electrocardiogramă, examene ecografice, consultații de specialitate: medicină internă,
                    cardiologie, neurologie, oftalmologie, dermatologie, ginecologie, radiologie și imagistică
                    medicală, pediatrie etc.
                </p>
                <p class="blue-c">
                    Caravana cu Medici își propune acordarea de îngrijiri medicale de bază, popularizarea testelor de
                    screening și informarea persoanelor din mediul rural pentru a obține o populație mai responsabilă
                    și mai dedicată propriei sănătăți și a celor din jur.
                </p>
                <p class="blue-c">
                    Complementar caravanelor, sustinem cursuri de educatie medicala in scoli prin care sculptam
                    mentalitatea tinerilor si formam o noua generatie cu principii solide bazate pe preventie.
                </p>
            </div>
            <div id="vision" class="shadow-block center about-us">
                <h3 class="blue-c uppercase">Viziunea</h3>

                <p class="blue-c">
                    Accesibilitate
                </p>
                <p class="blue-c">Banii publici sunt cheltuiți ineficient și toate progresele medicinei secolului al
                    XXI-lea sunt inaccesibile unei mari populații (peste 40%). De aceea, o soluție la îmbunătățirea
                    accesului la servicii medicale de baza sunt aceste unități mobile - centrate pe patologiile cele
                    mai frecvente (ex. patologia cardio-vasculară, cancerul de col uterin, hepatitele virale), pentru
                    că pot oferi cu un randament mult mai mare servicii de prevenție medicală primară.
                </p>

                <p class="blue-c">Eficienta</p>
                <p class="blue-c">Caravanele pot funcționa complementar medicilor de familie, astfel încât să se creeze
                    un filtru eficient în drumul pacienților către centrele mari (actualmente centrele de urgență și
                    clinicile mari ajung să fie colmatate de probleme minore precum răcelile ce pot fi
                    rezolvate/prevenite local).Caravana cu Medici luptă pentru echilibrarea balanței între accesul la
                    servicii medicale de bază șieducație pentru sănătate între mediul rural și cel urban.
                </p>
                <p class="blue-c">Retea Nationala</p>
                <p class="blue-c">
                    Ne dorim sa realizăm o rețea națională prin intermediul căreia medicii, asistenții medicali,
                    asistenții sanitari, autoritățile locale să acorde periodic îngrijiri medicale și cursuri de
                    educație pentru sănătate în locurile mai puțin favorizate din punct de vedere economic și social.
                </p>
            </div>
        </div>
    </div>
    <div id="popup" class="popup-overlay">
        <div class="popup">
            <div class="close">
                <span class="horizontal"></span>
                <span class="vertical"></span>
            </div>
            <img id="us-img">
            <div id="full-statement"></div>
        </div>
    </div>
@stop