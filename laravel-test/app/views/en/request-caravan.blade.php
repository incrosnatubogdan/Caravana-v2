@extends('layouts.layout-en')
@section('title', 'Request Caravan')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-en')
    @section('link', 'solicita-caravana')
        <div class="main container">
            <h3 class="blue-c uppercase us-title-l">Request caravan</h3>
            <a class="request-ed" target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSel3npH9EtsALq9cJIm3_zLS886aMTSwYv5P4t3WuSL1O333g/viewform">
                Request caravan</a>
            <div class="shadow-block left caravan-request">
                <p class="blue-c">One could argue that we are currently the only NGO capable of offering our
                    beneficiaries a real one-day-hospital-admission right in their village. Romania need hundreds of
                    initiatives similar to this one and we would be glad if other associations would join us in this
                    effort. The main aspects that differentiate us from other projects are:</p>
            </div>
            <div class="shadow-block left caravan-request">
                <b class="blue-c">The main things that differentiate us from the rest of the projects are:</b>
                <br>
                <ul class="blue-c">
                    <li>A stable core of volunteers, efficiently organized around departments;</li>
                    <li>National coverage (we opened two branches in Iasi and Cluj-Napoca);</li>
                    <li>Long-term sustainability powered by the solid relationship with our sponsors: Synevo Laboratories (lab testing), Vodafone Romania Foundation (financial support), Avon (financial support and equipment), Bayer Romania (financial support);</li>
                    <li> The experience gathered during more than 25 editions of the caravan, with more than 3000 direct beneficiaries.</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="popup" class="popup-overlay">
        <div class="popup">
            <div class="close">
                <span class="horizontal"></span>
                <span class="vertical"></span>
            </div>
            <p id="full-testimonial"></p>
        </div>
    </div>
@stop