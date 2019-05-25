var JSON = {
    menu: [{
            name: 'Acasă',
            link: 'index.html',
            sub: null,
            class: "",
            target: "_self",
            id: ""
        },
        {
            name: 'Despre Noi',
            link: '',
            sub: null,
            class: "",
            target: "_self",
            id: "dropdown-2"
        },
        {
            name: 'Ce facem',
            link: '',
            sub: null,
            class: "",
            target: "_self",
            id: "dropdown"
        },
        {
            name: 'Implică-te',
            link: 'implica.html',
            sub: null,
            class: "",
            target: "_self",
            id: ""
        },
        {
            name: 'Parteneri',
            link: 'parteneri.html',
            sub: null,
            class: "",
            target: "_self",
            id: ""
        },
        {
            name: 'Media',
            link: 'media.html',
            sub: null,
            class: "",
            target: "_self",
            id: ""
        },
        {
            name: 'Contact',
            link: 'contact.html',
            sub: null,
            class: "",
            target: "_self",
            id: ""
        },
        {
            name: 'Solicită Caravana',
            link: 'solicita-caravana.html',
            sub: null,
            class: "special",
            target: "_self",
            id: ""
        },
        {
            name: 'Susține-ne',
            link: 'doneaza.html',
            sub: null,
            class: "special donate-btn",
            target: "_self",
            id: ""
        },
        {
            name: '',
            link: 'https://www.facebook.com/CaravanaCuMedici/',
            class: "social facebook",
            target: "_blank",
            sub: null,
            id: ""
        },
        {
            name: '',
            link: 'https://www.instagram.com/caravanacumedici/',
            class: "social instagram",
            target: "_blank",
            sub: null,
            id: ""
        }
    ]
}

jQuery.fn.scrollCenter = function (elem, speed) {
    var active = jQuery(this).find(elem);
    var activeWidth = active.width() / 2;
    var pos = active.position().left + activeWidth;
    var elpos = jQuery(this).scrollLeft();
    var elW = jQuery(this).width();
    pos = pos + elpos - elW / 2;

    jQuery(this).animate({
        scrollLeft: pos
    }, speed == undefined ? 1000 : speed);
    return this;
};

jQuery.fn.scrollCenterORI = function (elem, speed) {
    jQuery(this).animate({
        scrollLeft: jQuery(this).scrollLeft() - jQuery(this).offset().left + jQuery(elem).offset().left
    }, speed == undefined ? 1000 : speed);
    return this;
};

function htmlForTextWithEmbeddedNewlines(text) {
    var htmls = [];
    var lines = text.split(/\n/);
    var tmpDiv = jQuery(document.createElement('div'));
    for (var i = 0; i < lines.length; i++) {
        htmls.push(tmpDiv.text(lines[i]).html());
    }
    return htmls.join("<br>");
}

var leftPos = 0;

function testimonialLeft() {
    var leftPos = $('.testimonials').scrollLeft();
    $(".testimonials").animate({
        scrollLeft: leftPos + 280
    }, 800);
    setTimeout(function (event) {
        var currentPos = $('.testimonials').scrollLeft();
        if (leftPos == currentPos && leftPos != 0) {
            leftPos = 0
            $(".testimonials").animate({
                scrollLeft: leftPos
            }, 800);
        }
    }, 800);

}

$(function () {
    var menu = $('.navigation-ul');

    function parsesubMenu(ul, menu) {
        for (var i = 0; i < menu.length; i++) {
            var li = $(ul).append('<li id="' + menu[i].id + '" class="' + menu[i].class + '"><a class="' + menu[i].class + '" href="../' + menu[i].link + '" target="' + menu[i].target + '">' + menu[i].name + '</a></li>');
        }
    }

    function parseMenu(ul, menu) {
        for (var i = 0; i < menu.length; i++) {
            var li = $(ul).append('<li id="' + menu[i].id + '" class="' + menu[i].class + '"><a class="' + menu[i].class + '" href="' + menu[i].link + '" target="' + menu[i].target + '">' + menu[i].name + '</a></li>');
        }
    }

    if ($(".main.container").hasClass("caravan")) {
        parsesubMenu(menu, JSON.menu);
        $("#dropdown").append('<div class="dropdown-content"><a href="../unitatea-mobila.html">Unitatea Mobila</a><a href="../educatie-medicala.html">Educatie pentru sanatate</a><a href="../rapoarte.html">Rapoarte anuale</a></div>')
        $("#dropdown-2").append('<div class="dropdown-content"><a href="../despre-noi.html">Cine Suntem</a><a href="../echipa.html">Echipa</a></div>')
    } else {
        parseMenu(menu, JSON.menu);
        $("#dropdown").append('<div class="dropdown-content"><a href="unitatea-mobila.html">Unitatea Mobila</a><a href="educatie-medicala.html">Educatie pentru sanatate</a><a href="rapoarte.html">Rapoarte anuale</a></div>')
        $("#dropdown-2").append('<div class="dropdown-content"><a href="despre-noi.html">Cine Suntem</a><a href="echipa.html">Echipa</a></div>')
    }
});

function revealVideo(div, video_id) {
    var video = document.getElementById(video_id).src;
    document.getElementById(video_id).src = video + '&autoplay=1'; // adding autoplay to the URL
    document.getElementById(div).style.display = 'block';
}

function hideVideo(div, video_id) {
    var video = document.getElementById(video_id).src;
    var cleaned = video.replace('&autoplay=1', ''); // removing autoplay form url
    document.getElementById(video_id).src = cleaned;
    document.getElementById(div).style.display = 'none';
}

var sourceSwap = function () {
    var $this = $(this);
    var newSource = $this.data('alt-src');
    $this.data('alt-src', $this.attr('src'));
    $this.attr('src', newSource);
}

$(document).ready(function () {
    var fullWidth = $("body").width();

    jQuery(document).on("click", '.show-testimonial', function (e) {
        var fullTestimonial = jQuery(this).parent().find(".block-with-text").text();
        var fullName = jQuery(this).parent().find(".author.hidden").text();
        $("#popup").show("slow");
        $('.page-holder').addClass('blur');
        $("#full-testimonial").text(fullTestimonial);
        $("#author").text(fullName);
    });

    $('.counter').each(function () {
        var $this = $(this),
            countTo = $this.attr('data-count');
        $({
            countNum: $this.text()
        }).animate({
            countNum: countTo
        }, {
            duration: 5500,
            easing: 'linear',
            step: function () {
                $this.text(Math.floor(this.countNum));
            },
            complete: function () {
                $this.text(this.countNum);
            }
        });
    });

    $(function () {
        $('.holder-sorter img').hover(sourceSwap, sourceSwap);
    });

    jQuery(document).on("click", '.close, #popup', function (e) {
        $("#popup").hide("slow");
        $('.page-holder').removeClass('blur');
    });

    var $btns = $('.sorter').click(function () {
        if (this.id == 'all') {
            $('.team-member').fadeIn(450);
        } else {
            var $el = $('.' + this.id).fadeIn(450);
            $('.team-member').not($el).hide();
        }
        $btns.removeClass('active');
        $(this).addClass('active');
    });

    $(document).on("keyup", '#media-search', function (e) {
        var input = $('#media-search');
        var filter = input.val().toLowerCase();
        var nodes = $(".element")
        var text = $(".element a p.blue-c");

        for (i = 0; i < nodes.length; i++) {
            if (text[i].innerText.toLowerCase().includes(filter)) {
                nodes[i].style.display = "block";
            } else {
                nodes[i].style.display = "none";
            }
        }
    });
    var sliderTimer = 2500;
    var testimonialCarousel = setInterval(testimonialLeft, sliderTimer);
    var sliderElement = $(".testimonial_navigation");

    $(document).on("click", '.testimonial_navigation.start', function (e) {
        $(this).fadeOut('fast', function () {
            $(this).attr('src', "assets/img/home/stop.svg");
            $(this).fadeIn('fast');
        });
        $()
        testimonialCarousel = setInterval(testimonialLeft, sliderTimer);
        testimonialLeft()
        sliderElement.removeClass("start");
        sliderElement.addClass("stop");
        $(".testimonials").css("overflow-x", "hidden");
    });

    $(".testimonial").on({
        mouseenter: function () {
            clearInterval(testimonialCarousel);
            if (!sliderElement.hasClass("start")) {
                sliderElement.addClass("start");
                sliderElement.fadeOut('fast', function () {
                    sliderElement.attr('src', "assets/img/home/start.svg");
                    sliderElement.fadeIn('fast');
                });
                sliderElement.removeClass("stop");
                $(".testimonials").css("overflow-x", "scroll");
            }

        }
    });

    $(document).on("click", '.testimonial_navigation.stop', function (e) {
        $(this).fadeOut('fast', function () {
            $(this).attr('src', "assets/img/home/start.svg");
            $(this).fadeIn('fast');
        });
        clearInterval(testimonialCarousel);
        sliderElement.removeClass("stop");
        sliderElement.addClass("start");
        $(".testimonials").css("overflow-x", "scroll");
    });



    $(document).on("click", '.tabs .btn_styles', function (e) {
        if (!$(this).hasClass('active')) {
            let active, parent, tab;
            active = $(this);
            parent = $(this).closest('.tabs').first();
            parent.find('.btn_styles').each(function () {
                tab = $($(this).attr('href'));
                if ($(this).is(active)) {
                    $(this).addClass('active');
                    if (tab.length > 0) tab.show();
                } else {
                    $(this).removeClass('active');
                    if (tab.length > 0) tab.hide();
                }
            });
        }
        var value = $(this).text().replace(/[^\d.]/g, '');
        $("input[type=number]").val(value);
        return false;
    });

    $('.search').click(function () {
        $('.search').addClass('active');
        $('.line-1').css({
            'transform': 'rotate(45deg)',
            'top': '0px',
            'left': '0px'
        });
        $('.line-2').css({
            'height': '40px',
            'opacity': '1'
        });
    });
    $('.line-1, .line-2').click(function () {
        $('.search').removeClass('active').val('');
        $('.line-1').css({
            'transform': 'rotate(-45deg)',
            'top': '-20px',
            'left': '45px'
        });
        $('.line-2').css({
            'height': '0px',
            'opacity': '0'
        });
    });

    $(document).on("click", '.team-member', function (e) {
        var fullTestimonial = jQuery(this).find("span.description").text();
        var fullTitle = jQuery(this).find("p.title").text();
        var fullName = jQuery(this).find("h3.name").text();
        var profilePic = jQuery(this).find("img.profile").attr('src');
        var professionInfo = jQuery(this).find("span.profession").text();
        var facebookLink = jQuery(this).find("a.social").attr('href');
        console.log(facebookLink)
        $("#popup").show("slow");
        $('.page-holder').addClass('blur');

        $(".popup .full-text").html(htmlForTextWithEmbeddedNewlines(fullTestimonial))
        $(".popup .title").text(fullTitle);
        $(".popup .name").text(fullName);
        $(".popup .profession").text(professionInfo);
        $(".popup .profile").attr('src', profilePic);
        $(".popup a.social").attr('href', facebookLink);
        if (fullWidth > 768) {
            $("#popup").addClass("us-popup team-popup");
        }
    });

    $(document).on("click", '.us-sorter img', function (e) {
        var sortClass = $(this).attr("data-attr");
        if (fullWidth < 768) {
            $('html, body').animate({
                scrollTop: $("#" + sortClass).offset().top
            }, 1000);
        } else {
            $("#popup").show("slow");
            $("#popup").addClass("us-popup");
            var fullText = $("#" + sortClass).html();
            $('.page-holder').addClass('blur');
            $("#full-statement").html(fullText);
            $('#us-img').attr("src", "assets/img/about-us/" + sortClass + ".svg");
        }
    });

    $(document).on("click", '.obj-sort', function (e) {
        var caravanImage = jQuery(this).find("img.box").attr('data-src');
        $("#popup").show("slow");
        $('.page-holder').addClass('blur');
        $(".popup .caravan").attr('src', caravanImage);
    });

    $(document).on("click", 'img.info', function (e) {
        $("img.info").removeClass("hidden");
        $(this).addClass("hidden")
        $(".mobilpay span").addClass("hidden");
        var infoAttr = jQuery(this).attr('data-href');
        $("." + infoAttr).removeClass("hidden");
    });

    $("img.info").on({
        mouseenter: function () {
            $("img.info").removeClass("hidden");
            $(this).addClass("hidden")
            $(".mobilpay span").addClass("hidden");
            var infoAttr = jQuery(this).attr('data-href');
            $("." + infoAttr).removeClass("hidden");
        }
    });

    $(document).on("click", 'img.close_info', function (e) {
        $(".mobilpay span").addClass("hidden");
        $("img.info").removeClass("hidden");
    });

});