@extends('layouts.layout-en')
@section('title', 'About Us')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-en')
    @section('link', 'despre-noi')
    <div class="main container">
        <h3 class="team-title blue-c uppercase mobile-show">About us</h3>
        <div class="us-sorter">
            <p class="blue-c">Caravana cu Medici (Medical Doctors’ Caravan) was founded in 2014 by 5 medical
                residents continuing a project they developed during Medical School, to which they added a dynamic
                team of people. After gaining its own legal status, they managed to contribute to implementing an
                efficient prevention program in rural areas.</p>
            <div class="holder-sorter">
                <img data-attr="problem" class="box" data-alt-src="../assets/img/icon/hover/problema-abordata.svg"
                    src="../assets/img/icon/problema-abordata.svg">
                <p class="blue-c uppercase">ISSUES ADDRESSED</p>
            </div>
            <div class="holder-sorter">
                <img data-attr="mission" class="box" data-alt-src="../assets/img/icon/hover/obiective.svg"
                    src="../assets/img/icon/obiective.svg">
                <p class="blue-c uppercase">mission</p>
            </div>
            <div class="holder-sorter">
                <img data-attr="vision" class="box" data-alt-src="../assets/img/icon/hover/viziune.svg"
                    src="../assets/img/icon/viziune.svg">
                <p class="blue-c uppercase">vision</p>
            </div>
        </div>
        <div id="problem" class="shadow-block center about-us">
            <h3 class="blue-c uppercase">ISSUES ADDRESSED</h3>
            <p class="blue-c">
                Romania’s medical system is mainly hospital-centered, with most of the funds allocated to health
                care belonging to the hospital environment. However, the distribution of population does not show
                significant differences: 55.17% of the population lives in the urban areas while 44.93% of the
                population lives in the countryside.
            </p>
            <p class="blue-c">
                <b>The needs of the rural population</b> are higher and much more serious compared to those of the
                people living in the urban areas and, unfortunately, urban areas are where specialized health
                services are currently concentrated.
            </p>
            <p class="blue-c">
                Even though there are national <b>screening programs</b> in place, their results are often less
                spectacular than we’d hope, since many patients cannot benefit from them because they encounter
                difficulties reaching the nearest medical center (lack of money, no means of transportation
                available etc.). A specific example is that of the screening for cervical cancer - even though the
                program started more than 5 years ago, Romania continues to have the highest prevalence of cervical
                cancer in Europe.
            </p>
            <p class="blue-c">
                We propose an approach that identifies the population at risk, and, more importantly, an approach
                that directly comes to its aid by traveling to underprivileged villages in order to promote and
                deliver primary medical prevention services.
            </p>
        </div>
        <div id="mission" class="shadow-block center about-us">
            <h3 class="blue-c uppercase">MISSION</h3>
            <p class="blue-c">
                <b>18 times a year</b>, during the weekend, we gather a <b>multidisciplinary team of doctors</b>
                (20-30 specialists, residents and medical students) in collaboration with the local authorities. We
                evaluate the health status of the population <b>free of charge</b>, so that between 150-200
                patients receive clinical consults, blood and urine tests, electrocardiograms, abdominal echography
                and echocardiography examinations and specialty consults: internal medicine, cardiology, neurology,
                ophthalmology, dermatology, gynecology, pediatrics etc.
            </p>
            <p class="blue-c">
                The main goal of Caravana cu Medici is to provide residents in rural areas with <b>basic medical
                    care</b>, to raise awareness regarding <b>screening tests</b> and to <b>educate</b> the rural
                population on taking care of their health. This way, we offer basic medical services and education
                to the rural population, encouraging them to become more responsible and dedicated to their own
                health.
            </p>
        </div>
        <div id="vision" class="shadow-block center about-us">
            <h3 class="blue-c uppercase">VISION</h3>
            <p class="blue-c"><b>Accessibility</b></p>
            <p class="blue-c">Many of the advances of 21st Century Medicine are basically inaccessible to over 40%
                of the population, because public money is spent inefficiently. Therefore, we see the mobile units
                as a solution for people living in rural areas,because they improve access to basic medical
                services. The mobile units are centered on the most common pathologies (e.g. cardiovascular
                pathology, pressing issues concerning female health - such as cervical cancer, and viral hepatitis
                cases identification), . This is one way to offer better and more efficient primary prevention
                services.
            </p>
            <p class="blue-c"><b>Efficiency</b></p>
            <p class="blue-c"> The main goal of the caravans is to complement the general practitioners’ work.
                Together we aim to create a system that would efficiently filter patients according to their
                symptoms, thus redirecting only a certain number of cases to the large centers (nowadays emergency
                centers and large clinics are overwhelmed by minor health problems, such as colds, that can be
                treated locally). Caravana cu Medici (Medical Doctors’ Caravan) strives to even out the
                discrepancies between rural and urban areas, by facilitating access to basic medical services and
                health education to people living in rural areas.
            </p>
            <p class="blue-c"><b>National Network</b></p>
            <p class="blue-c">
                Our vision is to create a national network where doctors, nurses, healthcare workers and local
                authorities would regularly provide health care and health education in economically and socially
                disadvantaged areas.
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