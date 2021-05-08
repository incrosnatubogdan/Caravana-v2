@extends('layouts.layout-en')
@section('title', 'Donate')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-en')
    @section('link', 'doneaza')
    <div class="main container donation-holder">
        <h3 class="team-title blue-c uppercase show-title">Support us</h3>

        <div style="width: 90%;margin: 30px auto;display: block;" class="shadow-block">
            <p class="blue-c">We know that it is difficult to split your monthly budget between bills, shopping and
                recreation, so donations to us, the NGOs are probably not very high on your list of priorities. But
                hey, it often doesn't cost anything to help (see 2% taxes or 20% companies) or it costs very
                little. For us, every gesture is more than welcomed!
                <br><br>We believe that if more people contribute,
                little by little, we will help the caravan reach to more of the people who need basic medical
                services. If you believe in our mission, take a look down below.</p>
        </div>
        <div style="width: 90%;margin: 30px auto;display: block;" class="shadow-block">
            <h3>Donate ON-LINE</h3>
            <div class="shadow-block">
                <h3>Donate on Galantom</h3>
                <p class="blue-c justify">If your birthday is coming up, here's an idea! Instead of receiving physical
                    present, choose a more spiritual one. Convince your friends to donate the money they would
                    otherwise invest in a gift through Galantom.<br><br>
                    By donating your birthday you will raise your <b>awareness</b> for our cause,
                    your friends will feel <b>fulfilled</b> because they gave you a present and
                    made a good deed at the same time, and the Caravan will receive <b>funds</b> for the next editions.
                    Everybody wins! <br><br>
                    Moreover, instead of birthday can be any <b>personal challenge</b>, from running half
                    marathons to quiting smoking or giving up driving to work in favour of walking.</p>
                <a target="_blank" href="https://caravanacumedici.galantom.ro/">
                    <button class="orange-bg uppercase">Galantom</button>
                </a>
            </div>
            <div class="shadow-block">
                <h3>Donate through PayPall</h3>
                <p class="blue-c">With PayPal, you can make a direct donation to us or you can set the donations to take
                    place on a recurrent basis. This means that every month a small amount of money will be
                    automatically redirected to us. It can be any amount and you can interrupt the payments whenever you
                    think we are no longer on the same page.</p>
                <h3>Coming soon</h3>
                <div class="donate_form hidden">
                    <div class="row tab_buttons">
                        <div class="col-xs-12 tabs">
                            <a href="#monthly" class="btn_styles monthly active">
                                Donate monthly
                            </a>
                            <a href="#once" class="btn_styles once">
                                Donate
                            </a>
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
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="charset" value="utf-8">
                        <div class="row buttons">
                            <div class="col-xs-12 tabs">
                                <a href="" class="btn_styles sum-10 donat-box">
                                    $10
                                </a>
                                <a href="" class="btn_styles sum-20 donat-box">
                                    $20
                                </a>
                                <a href="" class="btn_styles sum-30 donat-box active">
                                    $30
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="body">
                                    <div class="input">
                                        <input type="number" name="amount" value="30">
                                        <div class="addition">USD</div>
                                    </div>
                                    <div class="info"><img src="../assets/img/paypal/paypal_logo.png">Carvana cu Medici
                                    </div>
                                    <div class="donate_buttons">
                                        <input type="submit" value="Donate" alt="Donate" class="btn_styles">
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
                        <input type="hidden" name="currency_code" value="USD">
                        <!-- Make sure you get the buyer's address during checkout. -->
                        <input type="hidden" name="no_shipping" value="2">
                        <input type="hidden" name="charset" value="utf-8">
                        <div class="row buttons">
                            <div class="col-xs-12 tabs">
                                <a href="" class="btn_styles sum-10 donat-box">
                                    $10
                                </a>
                                <a href="" class="btn_styles sum-20 donat-box">
                                    $20
                                </a>
                                <a href="" class="btn_styles sum-30 donat-box active">
                                    $30
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="body">
                                    <div class="input">
                                        <input type="number" name="a3" value="30">
                                        <div class="addition">USD / Month</div>
                                    </div>
                                    <div class="info"><img src="../assets/img/paypal/paypal_logo.png">Carvana cu Medici
                                    </div>
                                    <div class="donate_buttons">
                                        <!-- Display the Automatic Billing button. -->
                                        <input type="submit" value="Donate monthly" alt="Donate monthly"
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
        <div style="width: 90%;margin: 30px auto;display: block;" class="shadow-block">
            <h3>Redirect your TAXES</h3>
            <div class="shadow-block">
                <h3>Individuals</h3>
                <p class="blue-c">All you have to do is download the form off the website and write down your
                    personalinformation. <br><br>
                    By the <b>31st of July 2019</b>, you can file it with the ANAF representatives in your area in
                    person, or on-line, or we can file it for you if you contact us at <a
                        href="mailto:caravanacumedici@gmail.com?Subject=Donate%202%"
                        target="_top">caravanacumedici@gmail.com</a>, and
                    tell us when and where you want to meet with us.<br><br>
                    If you don’t work yourself, you can still tell
                    your friends and family about us, and about what they could do to help.</p>
                <a target="_blank" href="https://redirectioneaza.ro/caravanacumedici/doilasuta">
                    <button class="orange-bg uppercase">Form 230</button>
                </a>
            </div>
            <div class="shadow-block">
                <h3>Companies</h3>
                <p class="blue-c">If you own a company, you can sponsor us with an amount equivalent to a maximum
                    of 20% of the estimated annual income tax return until the <b>31st of December 2019</b> . The
                    sponsorship will
                    be then deducted from the 2018 income tax redirect.<br><br> Write to us at <a
                        href="mailto:caravanacumedici@gmail.com?Subject=Doneaza%2020%"
                        target="_top">caravanacumedici@gmail.com</a>, and
                    we’ll run through the steps.</p>
                <a target="_blank"
                    href="https://docs.google.com/forms/d/e/1FAIpQLSdf4nxPhGaz7p7UO5Ufa6nad9tmsER_QrIyamEDHTXoJxuY3A/viewform"></a>
                <button class="orange-bg uppercase">Donate 20%</button>
                </a>
            </div>
        </div>

        <h1 style="padding-bottom: 20px;" class="uppercase center">Thank You!</h1>
    </div>
</div>
@stop