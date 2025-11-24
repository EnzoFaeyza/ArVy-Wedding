<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArVy Wedding</title>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&family=Cinzel:wght@400..900&family=Fanwood+Text:ital@0;1&family=Lora:ital,wght@0,400..700;1,400..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href='https://cdn.boxicons.com/3.0.4/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/icon" href="{{ asset('img/logokelas.png') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


</head>

<body>
    <img class="up-letter" id="up" src="{{ asset('img/up.png') }}" data-src-hp="{{ asset('img/up-hp.png') }}"
        data-src-pc="{{ asset('img/up.png') }}" alt="">
    <p class="scroll-text">Scroll<i class='bx  bx-caret-big-down'></i> </p>
    <img class="down-letter" id="down" src="{{ asset('img/down.png') }}" data-src-hp="{{ asset('img/down-hp.png') }}"
        data-src-pc="{{ asset('img/down.png') }}" alt="">

    <nav id="nav" class="nav">
        <img src="{{ asset('img/logokelas.png') }}" alt="">
        <i class='bx  bxs-x-circle close'></i>
        <ul>
            <li><a href="#Photo"><i class='bx  bx-flower-alt'></i> Photo</a></li>
            <li><a href="#Registration"><i class='bx  bx-envelope'></i> Registration</a></li>
            <li><a href="#Story"><i class='bx  bx-history'></i> Our Story</a></li>
            <li><a href="#Schedule"><i class='bx  bx-calendar-week'></i> Schedule</a></li>
            <li><a href="#Location"><i class='bx  bx-location-alt'></i> Location</a></li>
            <li><a href="#Contact"><i class='bx  bx-phone'></i> Contact Me</a></li>
        </ul>
    </nav>

    <section class="blank">

    </section>
    <i class='bx  bx-menu  menu'></i>
    <section class="main-1">
        <div>
            <p>Scroll</p>
            <p class="arrow">></p>
        </div>
        <img src="{{ asset('img/letter.png') }}" alt="">
    </section>

    <section class="main-2" id="Photo">
        <div class="container-title-2">
            <img src="{{ asset('img/hand (1).png') }}" alt="">
            <div class="title-2">
                <p style="font-family: 'Fanwood Text'; font-size:30px;">The Wedding Of</p>
                <p style="font-family: 'BurguesRegular';font-size:100px;">Arva & Selvy</p>
            </div>
            <img src="{{ asset('img/hand (2).png') }}" alt="">
        </div>
        <div class="container-image" data-aos="fade-left" data-aos-duration="3000" data-aos-delay="500">
            <img class="img1" src="{{ asset('img/image (6).png') }}" alt="">
            <img class="img2" src="{{ asset('img/image (5).png') }}" alt="">
            <img class="img3" src="{{ asset('img/image (4).png') }}" alt="">
            <img class="img4" src="{{ asset('img/image (3).png') }}" alt="">
            <img class="img5" src="{{ asset('img/image (2).png') }}" alt="">
            <img class="img6" src="{{ asset('img/image (1).png') }}" alt="">
        </div>
    </section>

    <section class="main-3" id="Registration">
        <div class="welcome-text">
            <img src="{{ asset('img/welcome.png') }}" alt="" data-aos="fade-down" data-aos-duration="1500"
                data-aos-easing="linear" data-aos-delay="1000">
            <div>
                <p data-aos="fade-up" data-aos-duration="1500" data-aos-easing="linear" data-aos-delay="1500">We are
                    delighted to welcome you to our wedding day, a moment we are grateful to share with the people
                    who mean the most to us. </p><br>
                <p data-aos="fade-up" data-aos-duration="1500" data-aos-easing="linear" data-aos-delay="1500">Your
                    presence adds warmth, joy, and meaning to this celebration, and we truly appreciate you being
                    here to witness the beginning of our new journey together.</p><br>
                <p data-aos="fade-up" data-aos-duration="1500" data-aos-easing="linear" data-aos-delay="1500">Please
                    kindly fill in the data form provided beside for our guest registry. We truly appreciate it.
                </p>
            </div>
        </div>
        <div class="form-name">
            <img src="{{ asset('img/frameacc.png') }}" alt="">
            <form action="">
                <p>Name</p>
                <input type="text" name="" id="">
                <p>Email</p>
                <input type="email" name="" id="">
                <p>Message for the Bride</p>
                <textarea name="" id=""></textarea>
                <div><input type="submit" value="Send"> </div>
            </form>

        </div>
    </section>
    <section class="main-4" id="Story">
        <h1>Our Story</h1>
        <div>
            <p data-aos="fade-right" data-aos-duration="1500" data-aos-easing="linear" data-aos-delay="1500">Our story
                began at SMK Telkom Purwokerto, where we met as classmates and slowly grew close through simple
                daily moments.
                What started as friendship naturally blossomed into something deeper.</p>
            <img src="{{ asset("img/school.png") }}" alt="" data-aos="fade-up" data-aos-delay="1500">
            <img src="{{ asset("img/car.png") }}" alt="" data-aos="fade-up" data-aos-delay="1500">
            <p data-aos="fade-left" data-aos-duration="1500" data-aos-easing="linear" data-aos-delay="1500">
                And even after graduation, our connection never faded.
                Now, the journey that began in school brings us to this beautiful chapter of a lifetime together.</p>

        </div>
    </section>

    <section class="main-5" id="Schedule">
        <img class="img-bg-5" src="{{ asset("img/Group 7 (2).png") }}" alt="">  
        <div class="main5-layer1">
            <div class="main5-layer2">
                <h1>A <span style="font-family:fontspring">genda</span></h1>
                <div class="container-agenda">
                    <div data-aos="fade-up-right" data-aos-duration="1500" data-aos-delay="1500">
                        <img src="{{ asset("img/siraman.png") }}" alt="">
                        <h3>Siraman</h3>
                        <p>A meaningful purification ritual
                            symbolizing blessings, gratitude, and
                            the transition into marriage.</p>
                    </div>
                    <div data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1500">
                        <img src="{{ asset("img/ijab_qobul.png") }}" alt="">
                        <h3>Ijab Qobul</h3>
                        <p>The sacred moment where vows are
                            spoken, commitments are sealed, and
                            two lives are united.</p>
                    </div>
                    <div data-aos="fade-up-left" data-aos-duration="1500" data-aos-delay="1500">
                        <img src="{{ asset("img/panggih_manten.png") }}" alt="">
                        <h3>Panggih Manten</h3>
                        <p>Honoring the meeting of the bride and groom, symbolizing harmony and the
                            union of two families.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="main-6" id="Location" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1500"
        data-aos-easing="linear">
        <p data-aos="fade-up" data-aos-duration="1500" data-aos-delay="1500" data-aos-easing="linear">Our wedding will
            be held at:</p><br>
        <a href="https://maps.app.goo.gl/eUfKYi426GjqNyVz5" target="_blank" data-aos="fade-up" data-aos-duration="1500"
            data-aos-delay="1000" data-aos-easing="linear">SMK Telkom Purwokerto Hall</a><br>
        <p data-aos="fade-up" data-aos-duration="3000" data-aos-delay="1500" data-aos-easing="linear">Jl. DI Panjaitan
            No.128, Karangreja, South Purwokerto</p>
    </section>
    <section class="main-7" id="Contact">
        <h1 style="font-family: var(--primary-font);">C<span style="font-family:'fontspring'">ontact</span></h1>
        <div class="container-contact">
            <img src="{{ asset("img/pita.png") }}" alt="" data-aos="fade-right" data-aos-duration="1500"
                data-aos-easing="linear" data-aos-delay="1500">
            <div class="contact">
                <p data-aos="fade-up" data-aos-duration="1500" data-aos-easing="linear" data-aos-delay="1500">For any
                    on-site needs or event coordination,<br> please reach out to our wedding coordinator.</p>
                <div data-aos="fade-up" data-aos-duration="1500" data-aos-easing="linear" data-aos-delay="1500">
                    <a href="https://wa.me/6282322494286" target="_blank">Contact(+62 823-2249-4286) </a>
                    <a href="https://wa.me/6281227522589" target="_blank">Contact(+62 812-2752-2589)</a>
                </div>
            </div>
            <img src="{{ asset("img/pita.png") }}" alt="" data-aos="fade-left" data-aos-duration="1500"
                data-aos-easing="linear" data-aos-delay="1500">
        </div>
    </section>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>