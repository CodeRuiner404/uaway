jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader                  = $('#loader');
    var loader_container        = $('#preloader');
    var scroll                  = $(window).scrollTop();  
    var scrollup                = $('.backtotop');
    var primary_menu_toggle     = $('#masthead .menu-toggle');
    var top_menu_toggle         = $('#top-navigation .menu-toggle');
    var dropdown_toggle         = $('button.dropdown-toggle');
    var primary_nav_menu        = $('#masthead .main-navigation');
    var top_nav_menu            = $('#top-navigation .main-navigation');
    var featured_slider         = $('#featured-slider');
    var related_slider          = $('.related-slider');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");
    
/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    if ( $(window).width() > 1024 ) {
        $('.align-logo-center .site-branding').insertAfter('#site-navigation ul.nav-menu > li:nth-child(3)');
    }

    $(window).resize(function() {
        if ( $(window).width() < 1024 )
            $('.align-logo-center .site-branding').insertBefore('#masthead .menu-toggle');
        else
            $('.align-logo-center .site-branding').insertAfter('#site-navigation ul.nav-menu > li:nth-child(3)');            
    });

    primary_menu_toggle.click(function(){
        primary_nav_menu.slideToggle();
        $(this).toggleClass('active');
        $('.menu-overlay').toggleClass('active');
        $('#masthead .main-navigation').toggleClass('menu-open');
    });

    top_menu_toggle.click(function(){
        top_nav_menu.slideToggle();
        $(this).toggleClass('active');
        $('.menu-overlay').toggleClass('active');
        $('#top-navigation .main-navigation').toggleClass('menu-open');
        $('#top-navigation').css({ 'z-index' : '30000' });

        if( $('#masthead .menu-toggle').hasClass('active') ) {
            primary_nav_menu.slideUp();
            $('#masthead .main-navigation').removeClass('menu-open');
            $('#masthead .menu-toggle').removeClass('active');
            $('.menu-overlay').toggleClass('active');
        }
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
       $('#primary-menu > li:last-child button.active').unbind('keydown');
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 210) {
            $('#masthead').addClass('nav-shrink');
        } 
        else {
            $('#masthead').removeClass('nav-shrink');
        }
    });

    $('.main-navigation ul li.search-menu a').click(function(event) {
        event.preventDefault();
        $(this).toggleClass('search-active');
        $('.main-navigation #search').fadeToggle();
        $('.main-navigation .search-field').focus();
    });

    $(document).click(function (e) {
        var container = $("#masthead, #top-navigation");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            primary_nav_menu.slideUp();
            $(this).removeClass('active');
            $('.menu-overlay').removeClass('active');
            $('#masthead .main-navigation').removeClass('menu-open');
            $('.menu-toggle').removeClass('active');
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.main-navigation #search').fadeOut();

            top_nav_menu.slideUp();
            $(this).removeClass('active');
            $('.menu-overlay').removeClass('active');
            $('#top-navigation .main-navigation').removeClass('menu-open');
        }
    });

/*------------------------------------------------
            Keyboard Navigation
------------------------------------------------*/

    if( $(window).width() < 1024 ) {
        $('#masthead .nav-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('button.menu-toggle').focus();
            }
        });
    }
    else {
        $('#masthead .nav-menu li').last().unbind('keydown');
    }
    $(window).resize(function() {
        if( $(window).width() < 1024 ) {
            $('#masthead .nav-menu').find("li").last().bind( 'keydown', function(e) {
                if( e.which === 9 ) {
                    e.preventDefault();
                    $('#masthead').find('button.menu-toggle').focus();
                }
            });
        }
        else {
            $('#masthead .nav-menu li').last().unbind('keydown');
        }
    });
    if( $(window).width() < 1024 ) {
        $('#top-navigation .nav-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#top-navigation').find('button.menu-toggle').focus();
            }
        });
    }
    else {
        $('#top-navigation .nav-menu li').last().unbind('keydown');
    }
    $(window).resize(function() {
        if( $(window).width() < 1024 ) {
            $('#top-navigation .nav-menu').find("li").last().bind( 'keydown', function(e) {
                if( e.which === 9 ) {
                    e.preventDefault();
                    $('#top-navigation').find('button.menu-toggle').focus();
                }
            });
        }
        else {
            $('#top-navigation .nav-menu li').last().unbind('keydown');
        }
    });

    $('.menu-toggle').on('keydown', function (e) {
        tabKey = e.keyCode === 9;
        shiftKey = e.shiftKey;

        if( $('.menu-toggle').hasClass('active') ) {
            if ( shiftKey && tabKey ) {
                e.preventDefault();
                primary_nav_menu.slideUp();
                $('.menu-toggle').removeClass('active');
            };
        }
    });

/*------------------------------------------------
            Sliders
------------------------------------------------*/

related_slider.slick({
     responsive: [
    {
        breakpoint: 1200,
        settings: {
            slidesToShow: 2
        }
    },
    {
        breakpoint: 900,
        settings: {
            slidesToShow: 1,
            arrows: true
        }
    }
    ]
});

featured_slider.slick();

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});