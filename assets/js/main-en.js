var JSON = {
    menu: [
        {name: 'Home', link: 'index.html', sub: null, class: "", target: "_self", id:""},
        {name: 'About us', link: '', sub: null, class: "", target: "_self", id:"dropdown-2"},
        {name: 'What we do', link: '', sub: null, class: "", target: "_self", id:"dropdown"},
        {name: 'Get involved', link: 'get-involved.html', sub: null, class: "", target: "_self", id:""},
        {name: 'Partners', link: 'partners.html', sub: null, class: "", target: "_self", id:""},    
        {name: 'Media', link: 'media.html', sub: null, class: "", target: "_self", id:""},
        {name: 'Contact', link: 'contact.html', sub: null, class: "", target: "_self", id:""},
        {name: 'Request Caravan', link: 'request-caravan.html', sub: null, class: "special", target: "_self", id:""},
        {name: 'Support us', link: 'donate.html', sub: null, class: "special donate-btn", target: "_self", id:""},
        {name: '', link: 'https://www.facebook.com/CaravanaCuMedici/', class: "social facebook", sub: null, target: "_blank", id:""},
        {name: '', link: 'https://www.instagram.com/caravanacumedici/', class: "social instagram", sub: null, target: "_blank", id:""}
    ]
}

function htmlForTextWithEmbeddedNewlines(text) {
    var htmls = [];
    var lines = text.split(/\n/);
    var tmpDiv = jQuery(document.createElement('div'));
    for (var i = 0 ; i < lines.length ; i++) {
        htmls.push(tmpDiv.text(lines[i]).html());
    }
    return htmls.join("<br>");
}

$(function () {     
    var menu=$('.navigation-ul');
    function parsesubMenu(ul, menu) {
        for (var i=0;i<menu.length;i++) {
            var li=$(ul).append('<li id="'+ menu[i].id +'" class="'+ menu[i].class +'"><a class="'+ menu[i].class +'" href="../'+menu[i].link + '" target="' + menu[i].target +'">'+menu[i].name+'</a></li>');
        }
    }
    
    function parseMenu(ul, menu) {
        for (var i=0;i<menu.length;i++) {
            var li=$(ul).append('<li id="'+ menu[i].id +'" class="'+ menu[i].class +'"><a class="'+ menu[i].class +'" href="'+menu[i].link+'" target="' + menu[i].target +'">'+menu[i].name+'</a></li>');
        }
    }

    if ($(".main.container").hasClass("caravan")) {
        parsesubMenu(menu, JSON.menu);
        $("#dropdown").append('<div class="dropdown-content"><a href="../mobile_unit.html">Mobile Unit</a><a href="../health_education.html">Health education</a><a href="../reports.html">Annual reports</a></div>')
        $("#dropdown-2").append('<div class="dropdown-content"><a href="../about-us.html">About Us</a><a href="../team.html">Team</a></div>')
    } else {
        parseMenu(menu, JSON.menu);
        $("#dropdown").append('<div class="dropdown-content"><a href="mobile_unit.html">Mobile Unit</a><a href="health_education.html">Health education</a><a href="reports.html">Annual reports</a></div>')
        $("#dropdown-2").append('<div class="dropdown-content"><a href="about-us.html">About Us</a><a href="team.html">Team</a></div>')
    }
});

function revealVideo(div,video_id) {
    var video = document.getElementById(video_id).src;
    document.getElementById(video_id).src = video+'&autoplay=1'; // adding autoplay to the URL
    document.getElementById(div).style.display = 'block';
}

function hideVideo(div,video_id) {
    var video = document.getElementById(video_id).src;
    var cleaned = video.replace('&autoplay=1',''); // removing autoplay form url
    document.getElementById(video_id).src = cleaned;
    document.getElementById(div).style.display = 'none';
}

var sourceSwap = function () {
    var $this = $(this);
    var newSource = $this.data('alt-src');
    $this.data('alt-src', $this.attr('src'));
    $this.attr('src', newSource);
}

function getCookie(c_name) {
    var c_value = " " + document.cookie;
    var c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1) {
        c_value = null;
    }
    else {
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1) {
            c_end = c_value.length;
        }
        c_value = unescape(c_value.substring(c_start,c_end));
    }
    return c_value;
}

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

$(document).ready(function () {
    var fullWidth = $("body").width();

    // var hasCookie = getCookie("hascookie");
    // if (hasCookie != "true") {
    //     $("body").append('<div class="cookieBubble"><div class="cb-wrapper"><div class="cb-row"><div class="cb-message"><img src="../assets/img/cookie.svg"><span>We use cookies to personalize your experience. By continuing to visit this website you agree to our use of cookies. <a href="privacy.html">Learn More</a></span><a href="javascript:void(0)" class="gotit-btn">GOT IT!</a></div></div></div></div>');
    // }

    jQuery(document).on("click",".gotit-btn", function (e) {
        jQuery(".cookieBubble").remove();
        setCookie("hascookie",true,"30")
    });
    
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

    var $btns = $('.sorter').click(function() {
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

    $("input[type=number]").text("30");

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
        $("input[type=number]").text("30");
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
        if (fullWidth > 768 ) {
            $("#popup").addClass("us-popup team-popup");
        }
    });

    $(document).on("click", '.us-sorter img', function (e) {
        var sortClass = $(this).attr("data-attr");
        if (fullWidth < 768 ){
            $('html, body').animate({
                scrollTop: $("#"+ sortClass).offset().top
            }, 1000);
        } else {
            $("#popup").show("slow");
            $("#popup").addClass("us-popup");
            var fullText = $("#"+ sortClass).html();
            $('.page-holder').addClass('blur');
            $("#full-statement").html(fullText);
            $('#us-img').attr("src","../assets/img/about-us/"+ sortClass+ ".svg");
        }
    });

    $(document).on("click", '.obj-sort', function (e) {
        var caravanImage = jQuery(this).find("img.box").attr('data-src');
        $("#popup").show("slow");
        $('.page-holder').addClass('blur'); 
        $(".popup .caravan").attr('src', caravanImage);
    });

});