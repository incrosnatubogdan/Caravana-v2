@extends('layouts.layout-en')
@section('title', 'Contact')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-en')
    @section('link', 'contact')
    <div class="main container">
        <h3 class="team-title blue-c uppercase mobile-show">Contact</h3>
        <div class="shadow-block">
            <div class="contact-box">
                <img src="../assets/img/icon/contact.svg">
                <p class="blue-c">Mihai Ranete, President</p>
                <p class="blue-c">caravanacumedici@gmail.com</p>
            </div>
            <div class="contact-box">
                <img src="../assets/img/icon/contact.svg">
                <p class="blue-c">Alina Jîjie, Vice Coordinator Iași</p>
                <p class="blue-c">iasi@caravanacumedici.ro</p>
            </div>
            <div class="contact-box">
                <img src="../assets/img/icon/contact.svg">
                <p class="blue-c">Răzvan Tirpe, Coordinator Cluj-Napoca</p>
                <p class="blue-c">cluj@caravanacumedici.ro</p>
            </div>
        </div>
        <div class="shadow-block">
            <div class="contact-box">
                <p class="blue-c">Do you want to come with medical equipment and consult 150-250 people, adults and
                    children, in your village?</p>
                <a class="request-ed" target="_blank"
                    href="https://docs.google.com/forms/d/e/1FAIpQLSel3npH9EtsALq9cJIm3_zLS886aMTSwYv5P4t3WuSL1O333g/viewform">Request
                    Caravan</a>
            </div>
            <div class="contact-box">
                <p class="blue-c">If you are a resident, specialist or primary physician we welcome you to our
                    future editions.</p>
                <a class="request-ed" target="_blank"
                    href="https://docs.google.com/forms/d/e/1FAIpQLSfyv7n7wQAEr8oppYGtIxjNwT_sY3ieLd_2V_67VzPuB1LRNQ/viewform">
                    Join the team</a>
            </div>
            <div class="contact-box">
                <p class="blue-c">In the future, we plan to tackle through our clases several topics including hygiene,
                    nutrition or even sexual education and thus developing a mentality and a lifestyle in the young
                    generation based on prevention..
                </p>
                <a class="request-ed" target="_blank"
                    href="https://docs.google.com/forms/d/e/1FAIpQLSe54UTZrHsfKqxaV7DJ5p1_W9QxzrZjdlQFwOyxy3IxU8MxnQ/closedform">
                    Registration form for courses</a>
            </div>
        </div>
    </div>
</div>
@stop