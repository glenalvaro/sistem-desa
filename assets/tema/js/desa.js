
$.widget.bridge('uibutton', $.ui.button);
 function showDetail(element) {
        if (screen.width < 1024) {
            $(element).find('#detail-responsive').toggleClass("hidden");
            var img = $(element).children()[0];
            img = $(img).children()[0];
            $(img).toggleClass('blur');
        } else {
            var img = $(element).children()[0];
            var desc = img.next().find('p');
            console.log(desc)
        }
    }
    $('.navbar-backdrop').click(function(e) {
        e.preventDefault();
        $('.navbar-menu').children('nav').addClass('deactivate');
        $('.navbar-menu').children('nav').removeClass('active');
        setTimeout(() => {
            $('.navbar-menu').toggleClass('hidden');
        }, 900);
    });

    $('.navbar-burger').click(function(e) {
        e.preventDefault();
        $('.navbar-menu').toggleClass('hidden');
        $('.navbar-menu').children('nav').removeClass('deactivate');
        $('.navbar-menu').children('nav').addClass('active');
    });

    $('.navbar-close').click(function(e) {
        e.preventDefault();
        $('.navbar-menu').children('nav').addClass('deactivate');
        $('.navbar-menu').children('nav').removeClass('active');
        setTimeout(() => {
            $('.navbar-menu').toggleClass('hidden');
        }, 900);
    });
    class Dropdown {
        constructor(container) {
            this.isOpen = false;
            this.activeIndex = undefined;

            this.container = container;

            // if(container.classList.contains('dropdown')){
            //     this.button = container.querySelector("a").nextElementSibling;
            // }else if(container.classList.contains('dropdown-responsive')){
            //     this.button = container.querySelector("a");
            // }
            this.button = container.querySelector("a");
            this.menu = container.querySelector("ul");
            this.items = container.querySelectorAll("li");
        }

        initEvents() {
            this.button.addEventListener("click", this.toggle.bind(this));
            document.addEventListener("click", this.onClickOutside.bind(this));
            document.addEventListener("keydown", this.onKeyEvent.bind(this));
        }

        toggle() {
            this.isOpen = !this.isOpen;
            this.button.parentNode.setAttribute("arias-expanded", this.isOpen);
            this.menu.setAttribute("aria-hidden", !this.isOpen);
            this.container.dataset.open = this.isOpen;
        }

        onClickOutside(e) {
            if (!this.isOpen) return;

            let targetElement = e.target;

            do {
                if (targetElement == this.container) return;

                targetElement = targetElement.parentNode;
            } while (targetElement);

            this.toggle();
        }

        onKeyEvent(e) {
            if (!this.isOpen) return;

            if (e.key === "Tab") {
                this.toggle();
            }

            if (e.key === "Escape") {
                this.toggle();
                this.button.focus();
            }

            if (e.key === "ArrowDown") {
                this.activeIndex =
                    this.activeIndex < this.items.length - 1 ? this.activeIndex + 1 : 0;
                this.items[this.activeIndex].focus();
            }

            if (e.key === "ArrowUp") {
                this.activeIndex =
                    this.activeIndex > 0 ? this.activeIndex - 1 : this.items.length - 1;
                this.items[this.activeIndex].focus();
            }
        }
    }

    const dropdowns = document.querySelectorAll(".dropdown");
    dropdowns.forEach((dropdown) => new Dropdown(dropdown).initEvents());
    const dropdowns_responvie = document.querySelectorAll(".dropdown-responsive");
    dropdowns_responvie.forEach((dropdown) => new Dropdown(dropdown).initEvents());



        let showAgendaModal = (elem) => {
            var id = $(elem).attr('data-id');
            var modal = $(`#modal-agenda-${id}`);

            $(modal).removeClass('hidden').addClass('flex');

            $(modal).find('button').on('click',function(){
                $(modal).removeClass('flex').addClass('hidden');
            })
        }

        var btnClose = $('#modal').find('button');

        $(btnClose).click(function(e) {
            e.preventDefault();
            $("#modal").fadeOut(500, function() {
                $('#modal').removeClass('flex').addClass('hidden');
            });
        });

        if (sessionStorage.getItem('washere') == null || parseInt(sessionStorage.getItem('washere')) % 9 == 0) {
            $('#modal').removeClass('hidden').addClass('flex');
        }

        const slider = $('.carousel-item');
        $(slider).eq(0).addClass('active');

        var total = $('.carousel-item').length;
        var current = 0;
        $('#moveRight').on('click', function() {
            var next = current;
            current = current + 1;
            setSlide(next, current);
        });
        $('#moveLeft').on('click', function() {
            var prev = current;
            current = current - 1;
            setSlide(prev, current);
        });

        function setSlide(prev, next) {
            var slide = current;
            if (next > total - 1) {
                slide = 0;
                current = 0;
            }
            if (next < 0) {
                slide = total - 1;
                current = total - 1;
            }
            $('.carousel-item').eq(prev).removeClass('active');
            $('.carousel-item').eq(slide).addClass('active');
            setTimeout(function() {

            }, 800);
        }

        $('[data-fancybox="gallery-a"]').fancybox({
            protect: true,
            // Clicked on the slide
            clickSlide: 'close',

            // Clicked on the background (backdrop) element
            clickOutside: 'close',
            mobile: {
                fitToView: true,
                iframe: {
                    scrolling: 'no',
                    preload: false
                },
                maxWidth: "90%", // or whatever you need,
            }
        });


   let elem = $('#footer').prev().prev().children().last();
        let footer = $('#footer');

        if ($(elem).height() < 100) {
            var bottom = $(window).height() - $(elem).position().top;
            $(footer).css({
                // "position": "absolute",
                "top": bottom
            });
        } else {
            var bottom = $(window).height() - $(elem).position().top;
            $(footer).css({
                // "position": "absolute",
                "top": bottom
            });
        }

                    elem = $('#footer').prev().children().last();
            var bottom = $(document).height();
            $(footer).css({
                // "position": "absolute",
                "top": bottom
            });
