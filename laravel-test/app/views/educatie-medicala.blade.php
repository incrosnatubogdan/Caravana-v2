@extends('layouts.layout')
@section('title', 'Educație medicala')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-ro')
    @section('link', 'health_education')
    <div class="main container">
        <div class="header-img ed"></div>
        <h3 class="team-title blue-c uppercase absolute-title unit-title">Educație pentru sănătate</h3>
        <a class="request-ed" target="_blank"
            href="https://docs.google.com/forms/d/e/1FAIpQLSe54UTZrHsfKqxaV7DJ5p1_W9QxzrZjdlQFwOyxy3IxU8MxnQ/viewform">Solicită
            Curs</a>
        <div class="mobile-unit education">
            <p class="blue-c">Anual, 700.000 de oameni își pierd viața în Europa și Statele Unite ale Americii
                datorită morții cardiace subite urmată de resuscitare cardio-pulmonară eșuată. Este deja științific
                demonstrat faptul că dacă s-ar crește rata de acordare a primului ajutor până la sosirea
                ambulanței, ar crește și supraviețuirea în spital cu cel puțin 200.000 de vieți.
                Recomandarea ghidurilor internaționale este ca începând cu vârsta de 12 ani, copiii să primească
                anual câte 2 ore de prim ajutor.
                <br>
                Aici intervenim noi!
                Dorim să schimbăm acest ciclu nefast prin educarea copiilor, pe cei pe care noi îi considerăm
                viitorul nostru, să se implice, să evalueze corect un eveniment medical și să instituie măsurile
                adecvate de prim ajutor. Instructorii noștri sunt pregătiți după cursurile Consiliului European de
                Resuscitare și doresc să facă diferența între a asista pasiv și implicarea activă în salvarea unei
                vieți!
            </p>
        </div>

        <div class="mobile-unit education">
            <p class="blue-c">Vă invităm să solicitați un curs de prim-ajutor pentru școala dumneavoastră!
                <br>
                Pe viitor, ne propunem să abordăm prin cursurile noastre teme precum igiena și nutriția sau chiar
                educația sexuală, dezvoltând pe această cale o mentalitate și un stil de viață axate pe prevenție.
            </p>
            <p><a target="_blank" class="blue-c underline"
                    href="https://www.erc.edu/sites/5714e77d5e615861f00f7d18/assets/57dbb5c54c84860898c388b4/Kids_save_lives_-_Resuscitation_2015-07.pdf"><sup>1</sup>“Kids
                    Save Lives” Statement endorsed by the World Health Organization in 2015</a></p>
        </div>
    </div>
</div>
@stop