@extends('layouts.layout-en')
@section('title', 'Home')
@section('content')
<div class="page-holder">
    @extends('layouts.nav-en')
    @section('link', 'index')
    <div class="main container home-container">
        <section class="video-section">
            <div id="home-hill" class="hill"></div>
            <div id="home-video" class="video" onclick="revealVideo('video','youtube')">
                <img class="video-holder" src="../assets/img/home/video-holder.jpg">
                <img class="play" src="../assets/img/home/play-button.svg">
            </div>
            <div id="video" class="lightbox" onclick="hideVideo('video','youtube')">
                <div class="lightbox-container">
                    <div class="lightbox-content">
                        <button onclick="hideVideo('video','youtube')" class="lightbox-close">
                            Close | ✕
                        </button>
                        <div class="video-container">
                            <iframe id="youtube" width="960" height="540"
                                src="https://www.youtube.com/embed/H_QeKKx5ENk?start=26" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="uppercase">CARAVANA CU MEDICI COMES TO YOU!</h2>
            <p class="uppercase">PRESS <span onclick="revealVideo('video','youtube')"
                    class="underline uppercase">play</span> to know us better</p>
            <div class="donate">
                <img class="donate-btn-fix" src="../assets/img/home/plus.svg">
            </div>
        </section>
        <section class="team-section home-section">
            <h3 class="blue-c uppercase us-title-l">What we do</h3>
            <div class="grid">
                <div class="element">
                    <a href="mobile-unit">
                        <img src="../assets/img/icon/caravane.svg">
                        <p class="uppercase blue-c">Mobile Unit</p>
                    </a>
                </div>
                <div class="element">
                    <a href="medical-education">
                        <img src="../assets/img/icon/educatie-medicala-in-scoli.svg">
                        <p class="uppercase blue-c">Health education</p>
                    </a>
                </div>
                <div class="element">
                    <a href="team">
                        <img src="../assets/img/icon/echipa.svg">
                        <p class="uppercase blue-c">Team</p>
                    </a>
                </div>
                <div class="element">
                    <a href="reports">
                        <img src="../assets/img/icon/rapoarte.svg">
                        <p class="uppercase blue-c">reports</p>
                    </a>
                </div>
            </div>
        </section>
        <section class="news-section">
            <h3 class="blue-c uppercase us-title-l">Recent activity</h3>
            <div class="overflow-row" id="main-media">
                @foreach($acasaJSON as $key => $name)
                <div class="element {{ $name['class'] }}">
                    <a href="{{ $name['link'] }} ">
                        <img class="cover" src="{{ $name['image'] }} ">
                        <p class="blue-c">{{ $name['title'] }}
                            @if(strlen($name['location']) > 1)
                            - {{ $name['location'] }}
                            @endif
                        </p>
                        <img class="icon" src="{{ $name['icon'] }}">
                        <span class="blue-c">{{ $name['date'] }}</span>
                        <p class="media-testimonial">{{ $name['testimonial'] }}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </section>
        <section class="team-section">
            <h3 class="blue-c uppercase us-title-l">Statistics</h3>
            <div class="grid numbers">
                <div class="element no-shadow">
                    <img src="../assets/img/icon/pacienti-consultati.svg">
                    <p class="uppercase blue-c counter" data-count="8136">0</p>
                    <p class="uppercase blue-c">Patients</p>
                </div>
                <div class="element no-shadow">
                    <img src="../assets/img/icon/voluntari.svg">
                    <p class="uppercase blue-c counter" data-count="936">0</p>
                    <p class="uppercase blue-c">Volunteers</p>
                </div>
                <div class="element no-shadow">
                    <img src="../assets/img/icon/caravane.svg">
                    <p class="uppercase blue-c counter" data-count="76">0</p>
                    <p class="uppercase blue-c">Caravans</p>
                </div>
                <div class="element no-shadow">
                    <img src="../assets/img/icon/km-parcursi.svg">
                    <p class="uppercase blue-c counter" data-count="35281">0</p>
                    <p class="uppercase blue-c">Kilometers traveled</p>
                </div>
            </div>
            <h3 class="blue-c uppercase us-title-l">testimonials</h3>
            <div class="testimonials">
                <div class="testimonial">
                    <img src="../assets/img/icon/quote.svg">
                    <p class="block-with-text">
                        This is probably the most beautiful project in the Health sector that I’m
                        aware of. It brings out the best in doctors, students, corporate employees,
                        mayors and pretty much everybody else. each and every one of them returns
                        home with something gained. The best part is that this is the kind of
                        project which, if it were to become a national program, it would generate a
                        change in the system. It would diminish one of Romania’s biggest problems,
                        which is unfortunately too seldom talked about: living in a Romanian
                        village as opposed to living in the city shortens one’s life expectancy.
                        Congratulations, Caravan with Doctors, I’m truly honored to know you!
                    </p>
                    <p class="author hidden">Vlad Mixich - Journalist</p>
                    <button class="show-testimonial blue-bg">citeste tot!</button>
                </div>
                <div class="testimonial">
                    <img src="../assets/img/icon/quote.svg">
                    <p class="block-with-text">
                        E probabil cel mai frumos proiect din Sănătate pe care care-l cunosc: unul
                        care scoate ce-i mai bun și din medici, și din studenți, și din
                        corporatiști, și din primari și din toată lumea... Fiecare pleacă acasă cu
                        ceva câștigat. Dar cel mai tare e că e genul de proiect care, dacă ar fi
                        scalat la nivel național, ar produce o schimbare de sistem. Ar diminua una
                        din problemele mari ale României dar despre care vorbim foarte foarte
                        puțin:- dacă locuiești la sat în România, speranța ta de viață e automat
                        mai mică decât a unuia care stă la oraș. Felicitări Caravana cu Medici.
                        Sunt onorat că vă cunosc.
                    </p>
                    <p class="author hidden">Vlad Mixich - Jurnalist</p>
                    <button class="show-testimonial blue-bg">citeste tot!</button>
                </div>
                <div class="testimonial">
                    <img src="../assets/img/icon/quote.svg">
                    <p class="block-with-text">
                        Ciofeni is a unique village.
                        Agriculture is still practiced here as means of earning a living, old age
                        is seen as a common feature and people regard illnesses as something
                        normal. They are not seeking relief or any kind of treatment because “it is
                        normal to feel pain after you worked your entire life”. The main concern of
                        the villagers is not the television, nor the pills, but ensuring themselves
                        a meal each day. One more thing I seldom experienced in the urban areas is
                        the fact that poverty hasn’t embittered the people and hasn’t indoctrinated
                        them. I consulted some wonderful persons; they were clean, wise and, above
                        all, wise. After spending a day in the caravan I feel I gained more than
                        anyone there.
                    </p>
                    <p class="author hidden">Ionut Murgulet MD - Caravana cu Medici
                        volunteer</p>
                    <button class="show-testimonial blue-bg">citeste tot!</button>
                </div>
                <div class="testimonial">
                    <img src="../assets/img/icon/quote.svg">
                    <p class="block-with-text">
                        The day spent in the caravan was one of the few occasions I truly felt I
                        was taken seriously as a future doctor; while working alongside doctors,
                        not under their command. This was very important to me as I realized for
                        good the responsibility I will be bearing towards my patients and I asked
                        myself if I was really doing my best in order to fulfill their
                        expectations. I see the Caravan as a magical project, a display of
                        humanity, encompassing the utopic ideas we – the medical students – had in
                        high school when we were thinking of going to med school. Thank you!
                    </p>
                    <p class="author hidden">Loredana Molea – student, Caravana cu
                        Medici Iasi</p>
                    <button class="show-testimonial blue-bg">citeste tot!</button>
                </div>
                <div class="testimonial">
                    <img src="../assets/img/icon/quote.svg">
                    <p class="block-with-text">
                        In a country like Romania, where if you don’t have the right connections,
                        if you don’t know someone who knows someone, if you get sick you are very
                        likely to be on your own. The doctors from the caravan not only give free
                        consults and write prescriptions, but also they create a network which
                        helps the patients reach the hospital easier when they need to. The
                        volunteers give their personal contact details to the patients in order to
                        be able to give them further support when they arrive into town. This is
                        indeed a truly successful story, but the difficulties encountered by the
                        caravan are also real, multiple and typical for the Romanian system.
                    </p>
                    <p class="author hidden">Paula Rusu - Journalist</p>
                    <button class="show-testimonial blue-bg">citeste tot!</button>
                </div>
                <div class="testimonial">
                    <img src="../assets/img/icon/quote.svg">
                    <p class="block-with-text">
                        Stefanut is 2 years old and has been coughing for 4 days. His mother can’t
                        say for sure if any fever spiked, because she doesn’t afford a thermometer.
                        Luckily, she found some ibuprofen, the only remedy she had to give to her
                        son. She knows a doctor’s advice would have helped, but there no one was in
                        the village to examine him. After I consulted him, I discovered a kind and
                        well behaved child, curious about my stethoscope. After receiving a bottle
                        of juice and some snacks he smiled with satisfaction. He has acute
                        bronchiolitis which can be readily treatable at home, had he had the proper
                        medication.After recommending the prescription, I discovered that I wrote
                        it in vain, as the mother could not afford to buy all the pills. With the
                        help of the local priest and my team we were able to buy the family all the
                        materials and medicine needed.
                    </p>
                    <p class="author hidden">Andreia Nita MD - Caravana cu Medici
                        member</p>
                    <button class="show-testimonial blue-bg">citeste tot!</button>
                </div>
                <div class="testimonial">
                    <img src="../assets/img/icon/quote.svg">
                    <p class="block-with-text">
                        I was deeply impressed by how rapidly the volunteers formed a team, within
                        minutes of meeting each other. I will not fail to mention the reaction of
                        the community in which they go. The people here were engaged in supporting
                        and welcoming them as best they could – hosting, cooking and helping in any
                        way possible. If I were to conclude, I would say that the determination I
                        see in this NGO I would like to encounter more in Romania. It is an
                        experience that fills you with hope, hope that these kind of things are
                        possible.
                    </p>
                    <p class="author hidden">Liliana Nicolae - EuropaFM Journalist</p>
                    <button class="show-testimonial blue-bg">citeste tot!</button>
                </div>
            </div>
        </section>
        <section class="partner-section">
            <h3 class="blue-c uppercase us-title-l">Partners</h3>
            <div class="row">
                @foreach($mainPartners as $key => $partner)
                <div class="partner">
                    <a href="{{ $partner['link'] }}">
                        <img alt=" {{ $partner['title'] }}" src="../{{ $partner['logo'] }}">
                    </a>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
<div id="popup" class="popup-overlay">
    <div class="popup">
        <img class="quote" src="../assets/img/icon/quote.svg">
        <div class="close home">
            <span class="horizontal"></span>
            <span class="vertical"></span>
        </div>
        <p class="testimonial-popup" id="full-testimonial"></p>
        <b id="author" class="italic center"></b>
    </div>
</div>
@stop