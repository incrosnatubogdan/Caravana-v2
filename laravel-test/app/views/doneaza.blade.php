@extends('layouts.layout')
@section('title', 'Doneaza')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-ro')
    @section('link', 'donate')
    <div class="main container donation-holder">
        <h3 class="team-title blue-c uppercase show-title">Susține-ne</h3>
        <div style="width: 90%;margin: 30px auto;display: block;" class="shadow-block">
            <p class="blue-c">Știm că e dificil să îți imparți bugetul lunar între facturi, cumpărături și
                recreere, așa că donațiile către noi, ONG-urile probabil nu sunt prea sus în lista de priorități.
                Dar hei, de multe ori nici nu te costă vreun leu să ajuți (vezi redirecționare impozit) sau te
                costă foarte puțin. Pentru noi, fiecare gest este binevenit!
                <br><br>Avem credința că punând fiecare câte
                puțin, mână de la mână vom ajuta caravana să ajungă la cât mai multe persoane defavorizate care au
                nevoie de serciviile ei. Așa că dacă și tu crezi în misiunea noastră de a face medicină la sate,
                aruncă un ochi mai jos.</p>
        </div>
        <div style="width: 90%;margin: 30px auto;display: block;" class="shadow-block">
            <h3>Donează ON-LINE</h3>
            <div class="shadow-block donation_block">
                <h3>Donează prin MobilPay</h3>
                <p class="blue-c">Prin MobilPay poți realiza donație directă către noi. Donatiile ne ajuta sa
                    ajungem la cat mai multi oameni din tara
                    si astfel si tu poti sa faci bine pentru Romania. </p>
                <div class="pay_holder">
                    <button class="paypal mobilpay">
                        <a href="https://mpy.ro/12gdzfev">
                            <img src="assets/img/paypal/icon/specul.svg">
                            <p>25 lei</p>
                        </a>
                        <span class="class_1 hidden">20 de teste Babeș-Papanicolau
                            <img class="close_info" src="assets/img/paypal/close.svg">
                        </span>
                        <img data-href="class_1" class="info" src="assets/img/paypal/help.svg">
                    </button>
                    <button class="paypal mobilpay">
                        <a href="https://mpy.ro/12gdzgev">
                            <img src="assets/img/paypal/icon/stetoscop.svg">
                            <p>50 lei</p>
                        </a>
                        <span class="class_2 hidden">Dotarea unei săli de consultații cu consumabile
                            <img class="close_info" src="assets/img/paypal/close.svg">
                        </span>
                        <img data-href="class_2" class="info" src="assets/img/paypal/help.svg">
                    </button>
                    <button class="paypal mobilpay">
                        <a href="https://mpy.ro/12gdzhev">
                            <img src="assets/img/paypal/icon/hands.svg">
                            <p>100 lei</p>
                        </a>
                        <span class="class_3 hidden">Participarea unui voluntar în caravana
                            <img class="close_info" src="assets/img/paypal/close.svg">
                        </span>
                        <img data-href="class_3" class="info" src="assets/img/paypal/help.svg">
                    </button>
                    <button class="paypal mobilpay">
                        <a href="https://mpy.ro/12gdziev">
                            <img src="assets/img/paypal/icon/first_aid_kit.svg">
                            <p>250 lei</p>
                        </a>
                        <span class="class_4 hidden">Un curs de Educație pentru sănătate
                            <img class="close_info" src="assets/img/paypal/close.svg">
                        </span>
                        <img data-href="class_4" class="info" src="assets/img/paypal/help.svg">
                    </button>
                    <button class="paypal mobilpay">
                        <a href="https://mpy.ro/12gdzjer">
                            <img src="assets/img/paypal/icon/book.svg">
                            <p>Alta suma</p>
                        </a>
                        <span class="class_5 hidden">Fiecare contribuție contează
                            <img class="close_info" src="assets/img/paypal/close.svg">
                        </span>
                        <img data-href="class_5" class="info" src="assets/img/paypal/help.svg">
                    </button>

                </div>
            </div>
            <!-- <div class="shadow-block fita_laurentiu"> de inlocuit cand punem paypal -->
            <div class="shadow-block">
                <h3>Donează prin Galantom</h3>
                <p class="blue-c justify">Dacă se apropie ziua ta uite o idee! În locul unui cadou material optează
                    pentru
                    unul spiritual și convinge-ți prietenii să doneze banii de cadou pe platforma Galantom.<br><br>
                    Donându-ți ziua de naștere vei ridica gradul de <b>conștientizare</b> față de cauza noastră,
                    prietenii
                    se vor simți <b>impliniți</b> pentru că ți-au făcut un cadou și o faptă bună în același timp,
                    iar
                    Caravana va primi <b>fonduri</b> pentru următoarele ediții. Toată lumea câștigă! <br><br>
                    Mai mult decât atât, în loc de ziua de naștere poate fi orice <b>provocare personală</b>, de la
                    cross-uri la lăsatul de
                    fumat sau renunțatul la mersul cu mașina la serviciu în favoarea transportului în comun.</p>
                <a target="_blank" href="https://caravanacumedici.galantom.ro/">
                    <button class="orange-bg uppercase">Galantom</button>
                </a>
            </div>
            <div class="shadow-block">
                <h3>Donează prin PayPal</h3>
                <p class="blue-c">Prin PayPal poți realiza donație directă către noi sau poți seta ca donațiile să
                    se realizeze recurent. Asta înseamnă că în fiecare lună, o mică sumă va fi redirecționată
                    automat către noi. Poate fi oricât și poți întrerupe plățile oricând consideri că nu mai suntem
                    pe aceeași lungime de undă. </p>
                <h3>În curând</h3>
                <div class="donate_form hidden">
                    <div class="row tab_buttons">
                        <div class="col-xs-12 tabs">
                            <a href="#monthly" class="btn_styles monthly active">Donează lunar</a>
                            <a href="#once" class="btn_styles once">Donează o dată</a>
                        </div>
                    </div>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="once" target="_blank"
                        style="display: none;">
                        <!-- Identify your business so that you can collect the payments. -->
                        <input type="hidden" name="business" value="diana.paduraru@caravanacumedici.ro">
                        <!-- Specify a Donate button. -->
                        <input type="hidden" name="cmd" value="_donations">
                        <!-- Specify details about the contribution -->
                        <!-- <input type="hidden" name="item_name" value="Friends of the Park">
                                                    <input type="hidden" name="item_number" value="Fall Cleanup Campaign"> -->
                        <input type="hidden" name="currency_code" value="EUR">
                        <input type="hidden" name="charset" value="utf-8">
                        <div class="row buttons">
                            <div class="col-xs-12 tabs">
                                <a href="" class="btn_styles sum-10 donat-box">
                                    €10
                                </a>
                                <a href="" class="btn_styles sum-20 donat-box">
                                    €20
                                </a>
                                <a href="" class="btn_styles sum-30 donat-box active">
                                    €30
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="body">
                                    <div class="input">
                                        <input type="number" name="amount" value="30">
                                        <div class="addition">EURO</div>
                                    </div>
                                    <div class="info"><img src="assets/img/paypal/paypal_logo.png">Carvana cu Medici
                                    </div>
                                    <div class="donate_buttons">
                                        <input type="submit" value=" Donează" alt="Doneaza" class="btn_styles">
                                        <img alt="" width="1" height="1"
                                            src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" id="monthly">
                        <!-- Identify your business so that you can bill for payments. -->
                        <input type="hidden" name="business" value="diana.paduraru@caravanacumedici.ro">
                        <!-- Specify an Automatic Billing button. -->
                        <input type="hidden" name="cmd" value="_xclick-subscriptions">
                        <!-- Specify details about the automatic billing plan. -->
                        <input type="hidden" name="lc" value="US">
                        <input type="hidden" name="no_note" value="1">
                        <input type="hidden" name="no_shipping" value="1">
                        <input type="hidden" name="src" value="1">
                        <input type="hidden" name="p3" value="1">
                        <input type="hidden" name="t3" value="M">
                        <input type="hidden" name="currency_code" value="EUR">
                        <!-- Make sure you get the buyer's address during checkout. -->
                        <input type="hidden" name="no_shipping" value="2">
                        <input type="hidden" name="charset" value="utf-8">
                        <div class="row buttons">
                            <div class="col-xs-12 tabs">
                                <a href="" class="btn_styles sum-10 donat-box">
                                    €10
                                </a>
                                <a href="" class="btn_styles sum-20 donat-box">
                                    €20
                                </a>
                                <a href="" class="btn_styles sum-30 donat-box active">
                                    €30
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="body">
                                    <div class="input">
                                        <input type="number" name="a3" value="30">
                                        <div class="addition">EURO / Luna</div>
                                    </div>
                                    <div class="info"><img src="assets/img/paypal/paypal_logo.png">Carvana cu Medici
                                    </div>
                                    <div class="donate_buttons">
                                        <!-- Display the Automatic Billing button. -->
                                        <input type="submit" value="Donează lunar" alt="Doneaza Lunar"
                                            class="btn_styles">
                                        <img alt="" width="1" height="1"
                                            src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div style="width: 90%;margin: 0 auto 30px;display: block;" class="shadow-block">
            <h3 style="padding: 10px 0;">Redirecționează IMPOZIT</h3>
            <div class="shadow-block">
                <h3>Persoane fizice</h3>
                <p class="blue-c">Fie că deții o companie, ești persoana fizică sau PFA, în fiecare an poți alege să
                    redirecționezi 2% din impozitul datorat statului către o entitate non-profit. Nu trebuie decât
                    să
                    descarci formularul de pe site și să îl completezi cu datele tale. <br><br>
                    Odată completat, îl poți depune
                    până pe <b>31 iulie 2019</b> la sediul ANAF din județul tău (personal sau prin scrisoare
                    recomandată cu
                    confirmare de primire), on-line sau îl putem depune noi pentru tine dacă ne contactezi și ne
                    spui
                    unde și când să venim să preluăm formularul. <br><br>
                    Chiar dacă nu lucrezi, le poți povesti prietenilor,
                    rudelor sau cunoscuților despre noi și despre cum ne pot ajuta.</p>
                <a target="_blank" href="https://redirectioneaza.ro/caravanacumedici/doilasuta">
                    <button class="orange-bg uppercase">Formular 230</button>
                </a>
            </div>
            <div class="shadow-block">
                <h3>Companii</h3>
                <p class="blue-c">Dacă deții o companie, poți direcționa către noi sub formă de sponsorizare o sumă
                    echivalentă cu cel mult 20% din impozitul pe profit estimat pentru anul curent până pe <b>31
                        decembrie 2019</b>, iar suma respectivă va fi ulterior dedusă din impozitul pe profit
                    aferent anului 2019.<br><br>
                    Scrie-ne pe <a href="mailto:caravanacumedici@gmail.com?Subject=Doneaza%2020%"
                        target="_top">caravanacumedici@gmail.com</a> și vom urma împreună pașii necesari.</p>
                <a target="_blank"
                    href="https://docs.google.com/forms/d/e/1FAIpQLSdf4nxPhGaz7p7UO5Ufa6nad9tmsER_QrIyamEDHTXoJxuY3A/viewform">
                    <button class="orange-bg uppercase">20% companii</button>
                </a>
            </div>
        </div>
        <h1 style="padding-bottom: 20px;" class="uppercase center">Mulțumim!</h1>
    </div>
</div>
@stop