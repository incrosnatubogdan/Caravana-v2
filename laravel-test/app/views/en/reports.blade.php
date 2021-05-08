@extends('layouts.layout-en')
@section('title', 'Reports')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-en')
    @section('link', 'rapoarte')
    <div class="main container">
        <section class="news-section">
            <h3 class="team-title blue-c uppercase mobile-show">Annual reports</h3>
            <div class="d-flex">
                <div class="reports">
                    <a target="_blank" href="../assets/img/about-us/report2019.pdf">
                        <div class="element">
                            <img class="cover" src="../assets/img/about-us/report2019.jpg">
                            <p class="uppercase blue-c">
                                In 2019 we managed to reach 25 villages in 12 counties, setting a
                                record number
                                of editions.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="reports">
                    <a href="../assets/img/about-us/report2018.pdf">
                        <div class="element">
                            <img class="cover" src="../assets/img/about-us/reports.jpg">
                            <p class="uppercase blue-c">
                                In 2018 we managed to reach 21 villages in 12 counties, setting a
                                record number
                                of editions.
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
@stop