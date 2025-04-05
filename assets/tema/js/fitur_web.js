 // sessionStorage.removeItem("washere");
    var counter = sessionStorage.getItem('washere');
    if (counter == null) {
        // load spinner and announcement
        $('#loading').removeClass('hidden').addClass('flex');
        $.each($("#loading").nextAll("div:visible,nav:visible"), function(indexInArray, valueOfElement) {
            $(this).addClass('hidden tanda');
        });
        sessionStorage.setItem('washere', parseInt(1));
    } else {
        // don't load spinner and announcement
        sessionStorage.setItem('washere', parseInt(counter) + 1);
    }

    function removeLoader() {
        $("#loading").fadeOut(500, function() {
            // fadeOut complete. Remove the loading div
            $.each($("#loading").nextAll("div.tanda,nav.tanda"), function(indexInArray, valueOfElement) {
                $(this).removeClass('hidden tanda');
            });
            $("#loading").remove();
        });
    }

    $(window).on('load', function() {
        if (sessionStorage.getItem('washere') <= 1) {
            setTimeout(removeLoader, 1000);
        }

        var rafId = null;
        var delay = 200;
        var lTime = 0;

        function scroll() {
            var scrollTop = $(window).scrollTop();
            var height = $(window).height()
            var visibleTop = scrollTop + height;
            let reveals = document.querySelectorAll(
                ".reveal, .reveal-d, .reveal-u, .reveal-l, .reveal-r, .reveal-type, .reveal-grow-d, .reveal-grow-r, .reveal-up-left"
            )
            reveals.forEach(elem => {
                var $t = $(elem);
                if ($t.hasClass('animate')) {
                    return;
                }
                var top = $t.offset().top;
                if (top <= visibleTop) {
                    if (top + $t.height() < scrollTop) {
                        $t.removeClass('reveal_pending').addClass('animate');
                    } else {
                        $t.addClass('reveal_pending').removeClass('animate');
                        if (!rafId) requestAnimationFrame(reveal);
                    }
                }
            });
        }

        function reveal() {
            rafId = null;
            var now = performance.now();

            if (now - lTime > delay) {
                lTime = now;
                var $ts = $('.reveal_pending');
                $($ts.get(0)).removeClass('reveal_pending').addClass('animate');
            }
            if ($('.reveal_pending').length >= 1) rafId = requestAnimationFrame(reveal);
        }

        var elem = $('#social-header');
        var nav = $('nav')[0];

        $('#info').on('click', function(e) {
            $('#announcement').toggleClass('invisible opacity-0 scale-y-0');
        })

        $(window).scroll(function() {
            $(scroll);
            if ($(window).scrollTop() > 150) {
            } else {
            }
        });
    });


$('#thumbnail img').click(function(e) {
            e.preventDefault();
            var src = $(this).attr('src');

            $('#main-image').fadeOut('fast', function() {
                $('#main-image').attr('src', src);
                $('#main-image').fadeIn('fast');
            });
        });

        var swiper = new Swiper('.swiper-container.about', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 800,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });