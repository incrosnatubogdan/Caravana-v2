@extends('layouts.layout')
@section('title', 'Acasa')
@section('content')
    <div class="page-holder">
        @extends('layouts.nav-ro')
        @section('link', 'index')
        <div class="main container home-container">
            <section class="video-section">
                <div id="home-hill" class="hill"></div>
                <div id="home-video" class="video" onclick="revealVideo('video','youtube')">
                    <img class="video-holder" src="assets/img/home/video-holder.jpg">
                    <img class="play" src="assets/img/home/play-button.svg">
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
                <h2 class="uppercase">CARAVANA CU MEDICI VINE LA TINE!</h2>
                <p class="uppercase">APASĂ <span onclick="revealVideo('video','youtube')"
                        class="underline uppercase">play</span> să ne cunoști mai bine</p>
                <div class="donate">
                    <a href="doneaza">
                        <img class="donate-btn-fix" src="assets/img/home/plus.svg">
                    </a>
                </div>
            </section>
            <section class="team-section home-section">
                <h3 class="blue-c uppercase us-title-l">Ce facem</h3>
                <div class="grid">
                    <div class="element">
                        <a href="unitatea-mobila">
                            <img src="assets/img/icon/caravane.svg">
                            <p class="uppercase blue-c">Unitate mobilă</p>
                        </a>
                    </div>
                    <div class="element">
                        <a href="educatie-medicala">
                            <img src="assets/img/icon/educatie-medicala-in-scoli.svg">
                            <p class="uppercase blue-c">Educație pentru sănătate</p>
                        </a>
                    </div>
                    <div class="element">
                        <a href="echipa">
                            <img src="assets/img/icon/echipa.svg">
                            <p class="uppercase blue-c">Echipa</p>
                        </a>
                    </div>
                    <div class="element">
                        <a href="rapoarte">
                            <img src="assets/img/icon/rapoarte.svg">
                            <p class="uppercase blue-c">rapoarte</p>
                        </a>
                    </div>
                </div>
            </section>
            <section class="news-section">
                <h3 class="blue-c uppercase us-title-l">descoperă unde am mai ajuns</h3>
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
                <h3 class="blue-c uppercase us-title-l">Caravana în numere</h3>
                <div class="grid numbers">
                    <div class="element no-shadow">
                        <img src="assets/img/icon/pacienti-consultati.svg">
                        <p class="uppercase blue-c counter" data-count="8136">0</p>
                        <p class="uppercase blue-c">Pacienți Consultați</p>
                    </div>
                    <div class="element no-shadow">
                        <img src="assets/img/icon/voluntari.svg">
                        <p class="uppercase blue-c counter" data-count="936">0</p>
                        <p class="uppercase blue-c">Voluntari</p>
                    </div>
                    <div class="element no-shadow">
                        <img src="assets/img/icon/caravane.svg">
                        <p class="uppercase blue-c counter" data-count="76">0</p>
                        <p class="uppercase blue-c">Caravane</p>
                    </div>
                    <div class="element no-shadow">
                        <img src="assets/img/icon/km-parcursi.svg">
                        <p class="uppercase blue-c counter" data-count="35281">0</p>
                        <p class="uppercase blue-c">KM ParCURșI</p>
                    </div>
                </div>
                <h3 class="blue-c uppercase us-title-l">testimoniale</h3>
                <div class="wrapper_holder">
                        <img class="testimonial_navigation stop" src="assets/img/home/stop.svg">
                </div>
                <div class="testimonials">
                    <div class="testimonial">
                        <img src="assets/img/icon/quote.svg">
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
                        <img src="assets/img/icon/quote.svg">
                        <p class="block-with-text">
                            Ciofeni este un sat aparte. Aici încă se practică agricultura ca mijloc de
                            supraviețuire, aici bătrânețea este firească și oamenii tratează boala ca o
                            normalitate. Nu caută tratament sau alinare pentru că este firesc să te
                            doară după ce ai muncit viață întreagă. Principala lor grijă este dacă au
                            ce pune pe masă măcar o data pe zi. Nu medicamentele. Nu televizorul. Și
                            mai este ceva ce am găsit rar în mediul urban: faptul că sărăcia nu i-a
                            înrăit și nu i-a îndoctrinat. Eu am consultat niște oameni minunați,
                            curați, cu palmele muncite, respectuoși și plini de înțelepciune. Am fost
                            mai câștigat ca oricine de acolo.
                        </p>
                        <p class="author hidden">Dr. Ionuț Mugulet – Medic rezident
                            Medicină de Urgență, voluntar Caravana cu Medici</p>
                        <button class="show-testimonial blue-bg">citeste tot!</button>
                    </div>
                    <div class="testimonial">
                        <img src="assets/img/icon/quote.svg">
                        <p class="block-with-text">
                            Sâmbăta în caravană a fost una dintre puținele ori când m-am simțit „luată
                            în serios” ca viitor doctor, lucrând alături de medici, și nu în subordinea
                            lor. Mi s-a părut foarte important deoarece am conștientizat mult mai bine
                            responsabilitatea pe care o voi purta în fața pacienților și mi-am pus
                            întrebarea dacă fac tot ce-mi stă în putință acum, ca să nu îi dezamăgesc
                            pe viitor. Caravana mi se pare un proiect magic, un exemplu de umanitate,
                            înglobând ideile „utopice” despre ce înseamnă a fi medic, pe care le-am
                            avut și eu și mulți alți colegi de-ai mei atunci când ne gândeam să dăm la
                            medicină. Vă mulțumesc!
                        </p>
                        <p class="author hidden">Loredana Molea – student UMF Iași,
                            voluntar Caravana cu Medici Iași </p>
                        <button class="show-testimonial blue-bg">citeste tot!</button>
                    </div>
                    <div class="testimonial">
                        <img src="assets/img/icon/quote.svg">
                        <p class="block-with-text">
                            Într-o Românie în care dacă nu ai relații, pe cineva care să cunoască pe
                            altcineva, atunci când ești bolnav de multe ori ești al nimănui. Medicii nu
                            doar că îi consultă, le scriu rețete, dar le crează și rețeaua necesară ca
                            sa ajungă la spitalele din oraș atunci când situația o impune. Le lasă
                            numere de telefon, contacte personale ca să-i poată sprijini atunci când
                            ajung la oraș. Caravana e o poveste de succes, dar greutățile cu care se
                            confruntă sunt și ele adevărate, multe, tipic românești.
                        </p>
                        <p class="author hidden">Vlad Mixich - Jurnalist</p>
                        <button class="show-testimonial blue-bg">citeste tot!</button>
                    </div>
                    <div class="testimonial">
                        <img src="assets/img/icon/quote.svg">
                        <p class="block-with-text">
                            Ștefănuț are 2 anișori și tușește tare de vreo 4-5 zile și parcă a făcut și
                            febră… dar mama lui nu știe sigur, căci nu are termometru; noroc că avea
                            prin casă un sirop de ibuprofen, că parcă l-a ajutat un pic. Este de altfel
                            singurul medicament pe care îl are. Știe că ar fi trebuit să meargă la
                            medic, dar unde? Îl consult și descopăr un copil blând, cuminte, intrigat
                            de stetoscop. Se bucură când primește o eugenie și un suc și le studiază
                            atent… nu știe cum se deschid, căci el mănâncă zilnic la cantină socială.
                            Are bronșiolită acută – îi măsor saturația în oxigen – mă bucur, e ok, nu
                            trebuie să fie internat, reușim să rezolvăm acasă cu tratament. Scriu
                            rețetă și i-o dau mamei…. degeaba… îmi spune cu o sinceritate dureroasă că
                            nu are bani să cumpere medicația. Cu ajutorul preotului din sat reușim să
                            cumpărăm medicamentele necesare.
                        </p>
                        <p class="author hidden">Andreia Niță - Medic rezident Pediatrie</p>
                        <button class="show-testimonial blue-bg">citeste tot!</button>
                    </div>
                    <div class="testimonial">
                        <img src="assets/img/icon/quote.svg">
                        <p class="block-with-text">
                            M-a impresionat seriozitatea tuturor voluntarilor, implicarea lor, faptul
                            că formează o echipă, chiar dacă unii se întâlnesc pentru prima oară.
                            Mi-a plăcut felul în care toată comunitatea în care ajunge Caravana se
                            implică într-un fel sau altul în toată povestea - asigurând cazarea,
                            gătind pentru voluntari, ajutându-i cu tot ce pot. Dacă ar fi să trag o
                            concluzie, aş spune - simplu - că ceea ce este şi ceea ce face Caravana
                            cu medici se încadrează fără probleme în categoria lucrurilor pe care
                            mi-ar plăcea să le întâlnesc mai des în România. E o experienţă
                            care îţi dă speranţe pentru că vezi că... se poate.
                        </p>
                        <p class="author hidden">Liliana Nicolae - Jurnalist EuropaFM</p>
                        <button class="show-testimonial blue-bg">citeste tot!</button>
                    </div>
                </div>
            </section>
            <section class="partner-section">
                <h3 class="blue-c uppercase us-title-l">Parteneri</h3>
                <div class="row">
                @foreach($mainPartners as $key => $partner)
                    <div class="partner">
                        <a href="{{ $partner['link'] }}">
                            <img alt=" {{ $partner['title'] }}" src="{{ $partner['logo'] }}">
                        </a>
                    </div>
                @endforeach
                </div>
            </section>
        </div>
    </div>
    <div id="popup" class="popup-overlay">
        <div class="popup">
            <img class="quote" src="assets/img/icon/quote.svg">
            <div class="close home">
                <span class="horizontal"></span>
                <span class="vertical"></span>
            </div>
            <p class="testimonial-popup" id="full-testimonial"></p>
            <b id="author" class="italic center"></b>
        </div>
    </div>
@stop