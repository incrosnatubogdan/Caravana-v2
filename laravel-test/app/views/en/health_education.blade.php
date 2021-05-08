@extends('layouts.layout-en')
@section('title', 'Health Education')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-en')
    @section('link', 'educatie-medicala')
    <div class="main container">
        <div class="header-img ed"></div>
        <h3 class="team-title blue-c uppercase absolute-title unit-title">Health education</h3>
        <a class="request-ed" target="_blank"
            href="https://docs.google.com/forms/d/e/1FAIpQLSe54UTZrHsfKqxaV7DJ5p1_W9QxzrZjdlQFwOyxy3IxU8MxnQ/viewform">Registration
            form for courses</a>
        <div class="mobile-unit education">
            <p class="blue-c">Every year, 700.000 people die in Europe and in the USA from sudden cardiac death
                followed by successful cardiopulmonary resuscitation (CPR). It is already scientifically proven
                that if the rate of bystander CPR will increase 200,000 more lives could be saved. The
                international guidelines recommend 2 hours per year of training, starting at the age of 12<sup>1</sup>.
                <br>
                That is where we come in! Our goal is to obtain in children the skills necessary to save lives. Our
                trainers are following the European Resuscitation Council protocols and aim to make a difference
                between a passive attitude towards an emergency situation and active involvement in saving a life.
            </p>
        </div>

        <div class="mobile-unit education">
            <p class="blue-c">In the future, we plan to tackle through our clases several topics including hygiene,
                nutrition or even sexual education and thus developing a mentality and a lifestyle in the young
                generation based on prevention..
            </p>
            <p><a target="_blank" class="blue-c underline"
                    href="https://www.erc.edu/sites/5714e77d5e615861f00f7d18/assets/57dbb5c54c84860898c388b4/Kids_save_lives_-_Resuscitation_2015-07.pdf"><sup>1</sup>“Kids
                    Save Lives” Statement endorsed by the World Health Organization in 2015</a></p>
        </div>
    </div>
</div>
@stop