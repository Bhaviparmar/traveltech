jQuery(function ($) {

    $(document).on('mousemove', 'body', function (e) {
        $(this).removeClass('using-keyboard-navigation');
    });
    $(document).on('keydown', 'body', function (e) {
        if (e.which == 9) {
            $(this).addClass('using-keyboard-navigation');
        }
    });

    //main slider
    $('#slick-main-slides').not('.slick-initialized').slick({
        arrows: false,
    });

    //header
    $(window).scroll(function () {

        if (window.matchMedia('(min-width: 992px)').matches) {
            if ($(window).scrollTop() > 1) {
                $('#masthead').addClass('scrolling');
                $('.top-header').slideUp();
            } else {
                $('#masthead').removeClass('scrolling');
                $('.top-header').slideDown();
            }
        }

    })

    //menu toggle
    $('.navbar-toggler').on('click', function () {
        $(this).toggleClass('collapse-in');
        $('#primary__menu-wrapper').stop().slideToggle();
    })

    var children_btn = "<button class='children-toggler'><i class='fas fa-chevron-down'></i></button>";
    $('#primary-menu .menu-item-has-children .sub-menu').before(children_btn);
    $('#primary-menu .menu-item-has-children .children-toggler').on('click', function () {
        $(this).siblings('.sub-menu').stop().slideToggle();
        $(this).toggleClass('open');
    })

    //replace button value
    $('.widget #wp-travel-enquiry-submit').val('Submit Enquiry');

    // iso filter
    var $grid = $('.filter-grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
    })

    // filter functions
    var filterFns = {
        // show if number is greater than 50
        numberGreaterThan50: function () {
            var number = $(this).find('.number').text();
            return parseInt(number, 10) > 50;
        },
        // show if name ends with -ium
        ium: function () {
            var name = $(this).find('.name').text();
            return name.match(/ium$/);
        }
    };
    // bind filter button click
    $('#filters').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        // use filterFn if matches value
        filterValue = filterFns[filterValue] || filterValue;
        $grid.isotope({ filter: filterValue });
        $(this).addClass('is-checked');
        $(this).siblings().removeClass('is-checked');
    });

    // trip slides
    $('.destination-slides').not('.slick-initialized').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: false,
        dots: true,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    })

    // testimonial slides
    $('.testimonial-slides-wrapper').not('.slick-initialized').slick({
        arrows: false,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    })


    /**
     * Accessibility code for trapping focus.
     *
     * @link https://uxdesign.cc/how-to-trap-focus-inside-modal-to-make-it-ada-compliant-6a50f9a70700
     */
    // add all the elements inside modal which you want to make focusable
    var focusableElements = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
    var modal = document.querySelector('#primary-menu-container'); // select the modal by it's id
    var closeBtn = document.querySelector('button.navbar-toggler'); // select the modal by it's id

    var firstFocusableElement = modal.querySelectorAll(focusableElements)[0]; // get first element to be focused inside modal

    var focusableContent = modal.querySelectorAll(focusableElements);
    var lastFocusableElement = focusableContent[focusableContent.length - 1]; // get last element to be focused inside modal

    $(document).on('keydown', 'body', function (e) {

        var windowWidth = window.innerWidth;

        /**
         * Bail if desktop nav starts.
         */
        if ( windowWidth > 990) {
            return;
        }

        var isTabPressed = e.key === 'Tab' || e.which == 9;

        if (!isTabPressed) {
            return;
        }

        if (e.shiftKey) {
            // if shift key pressed for shift + tab combination
            if (document.activeElement === firstFocusableElement) {
                lastFocusableElement.focus(); // add focus for the last focusable element
                e.preventDefault();
            }
        } else {
            // if tab key is pressed
            if (document.activeElement === lastFocusableElement) {
                // if focused has reached to last focusable element then focus first focusable element after pressing tab
                // firstFocusableElement.focus(); // add focus for the first focusable element
                closeBtn.focus(); // add focus for the first focusable element
                e.preventDefault();
            }
        }
    });
    // firstFocusableElement.focus();
    closeBtn.focus();


})