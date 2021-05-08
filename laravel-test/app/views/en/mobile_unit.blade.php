@extends('layouts.layout-en')
@section('title', 'Mobile Unit')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-en')
    @section('link', 'unitatea-mobila')
        <div class="main container">
            <div class="header-img obj"></div>
            <h3 class="team-title blue-c uppercase absolute-title unit-title">Mobile Unit</h3>
            <div class="obj-sort-parent">
                <div class="obj-sort">
                    <img data-src="../assets/img/about-us/copii-en.jpg" class="box" src="../assets/img/icon/pacienti-consultati.svg">
                    <p class="blue-c uppercase">Children's Caravan</p>
                </div>
                <div class="obj-sort">
                    <img data-src="../assets/img/about-us/gineco-en.jpg" class="box" src="../assets/img/icon/problema-abordata.svg">
                    <p class="blue-c uppercase">Women's Health Caravan</p>
                </div>
                <div class="obj-sort">
                    <img data-src="../assets/img/about-us/etape-en.jpg" class="box" src="../assets/img/icon/voluntari.svg">
                    <p class="blue-c uppercase">Internal medicine caravan</p>
                </div>
            </div>
            <div class="road"></div>
            <div class="shadow-block center road-margin">
                <p class="blue-c">The target group is the rural population at high risk of poverty, difficult access to
                    basic health care: children from disadvantaged families, the elderly, uninsured people. Another
                    target group of the project are the pupils, who can benefit from the medical education courses, and
                    their parents.
                </p>
            </div>

            <div class="shadow-block center road-margin">
                <p class="blue-c">We evaluate the health status of the population through: clinical consults, blood and
                    urine tests, electrocardiogram, abdominal echography and echocardiography examinations, specialty
                    consults: internal medicine, cardiology, neurology, ophthalmology, dermatology, gynecology, medical
                    imaging, pediatrics, etc.
                </p>
            </div>
            <div class="shadow-block center road-margin">
                <p class="blue-c">For each event, we closely collaborate with the general practitioner who attends the
                    village (where there is one) and with the local authorities (mayor, social workers, health
                    assistant), the last two being key people in continuing our prevention activity in the
                    village/local community long after the 2 day caravan ends.
                </p>
            </div>
            <div class="shadow-block center road-margin">
                <p class="blue-c">We provide the medical equipment that is often lacking in the practice of the general
                    practitioner (GP) of these areas, and we examine about 150-250 people, both adults and children,
                    each edition.
                </p>
            </div>
            <div class="shadow-block center road-margin">
                <p class="blue-c">We organize caravans in collaboration with local authorities, by assembling a
                    multidisciplinary team (specialists and medical residents, as well as medical students).
                </p>
            </div>
            <div class="shadow-block center road-margin">
                <p class="blue-c">We set up communication networks between participating physicians and public
                    authorities in order to supervise the subsequent evolution of the people consulted.
                </p>
            </div>
            <div class="shadow-block center road-margin">
                <p class="blue-c">
                    We develop databases for reporting and conducting clinical trials.
                </p>
            </div>
            <div class="shadow-block center road-margin">
                <p class="blue-c">We provide presentations and share health-educational materials.
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