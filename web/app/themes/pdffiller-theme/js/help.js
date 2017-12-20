(function ($) {
    "use strict";
    
    //reset fixed footer to standard if heigth of footer is more than heigth of page
    var theme = {};
        theme.$body = $('body');

    theme.MenuByColumns = function () {
        var $items = $('.desktop-menu .li-level-1.in-column .ul-level-1');

        $items.each(function(){
            var $item = $(this),
                $wW = $(window).outerWidth() - 20;

            if ( $item.outerWidth( true ) < ( $wW ) ) {
                if ( ( $item.outerWidth( true ) + $item.offset().left ) > $wW ) {
                    var $delta = $wW - $item.outerWidth() - $item.offset().left;
                    $delta = -1*($item.outerWidth()/2 - $delta -20);

                    $item.css({ 'transform' : 'translateX(' + $delta + 'px)' });
                }
                if ( $item.offset().left < 0) {
                    var $delta = -$item.offset().left;
                    $delta = -1*($item.outerWidth()/2 - $delta);
                    $item.css({ 'transform' : 'translateX(' + $delta + 'px)' });
                }
            } else {

            }
        });
    };

    theme.stickyHeader = function () {
        var header = $('#masthead > div[class*="header"]'),
            headerHeight = header.outerHeight(true),
            topHeader = header.find('.top-header').outerHeight(true),
            page = $('#main'),
            adminBar = ($('body').hasClass('admin-bar'))?$('#wpadminbar').outerHeight(true):0;
        new ResizeSensor(header, function() {
            if ($(window).outerWidth() < 768) {
                header.css({'position':''});
                page.css({'padding-top':''});
                return;
            } else {
                header.css({'position':'fixed'});
            }
            var headerHeight = header.outerHeight(true),
            topHeader = header.find('.top-header').outerHeight(true),
            adminBar = ($('body').hasClass('admin-bar'))?$('#wpadminbar').outerHeight(true):0;
            //console.log('2: headerHeight:'+headerHeight+' topHeader:'+topHeader+' adminBar:'+adminBar+' $(window).scrollTop():'+$(window).scrollTop());
            if($(window).scrollTop() <= topHeader) {
                header.css({'top':(adminBar-$(window).scrollTop())+'px'});
            } else if ($(window).scrollTop() > topHeader - adminBar) {
                header.css({'top':(adminBar - topHeader)+'px'});
            }
            page.css({'padding-top':headerHeight+'px'});
        });

        $(window).scroll(function (){
            topHeader = header.find('.top-header').outerHeight(true);
            //console.log('3: headerHeight:'+headerHeight+' topHeader:'+topHeader+' adminBar:'+adminBar+' $(window).scrollTop():'+$(window).scrollTop());
            if ($(window).outerWidth() < 768) return;
            if ($(window).scrollTop() <= topHeader) {
                header.css({'top':(adminBar-$(window).scrollTop())+'px'});
            } else if ($(window).scrollTop() > topHeader - adminBar) {
                header.css({'top':(adminBar - topHeader)+'px'});
            }
        });

        header.css({'width':'100%','z-index':'500'});

        if ($(window).outerWidth() < 768) return;

        header.css({'position':'fixed'});

        if ($(window).scrollTop() > 0) {
            header.css({'top':(adminBar-topHeader)+'px'});
        }
        page.css({'padding-top':headerHeight+'px'});
        //console.log('1: headerHeight:'+headerHeight+' topHeader:'+topHeader+' adminBar:'+adminBar+' $(window).scrollTop():'+$(window).scrollTop());
    };


    theme.stickyHeader = function () {

        var oBlock = document.getElementById("header-animated");
        var num_margin =  parseInt(oBlock.offsetHeight);
        $('.header-is-sticky .wrapper.main').css('padding-top',num_margin);


        var $head = $( '.header-is-sticky #header-animated' );
        $( '.header-is-sticky .header-animated' ).each( function(i) {
            var $el = $( this ),
                animClassDown = $el.data( 'animateDown' ),
                animClassUp = $el.data( 'animateUp' );

            $el.waypoint( function( direction ) {
                if( direction === 'down' && animClassDown ) {
                    $head.attr('class', 'header-action ' + animClassDown);
                }
                else if( direction === 'up' && animClassUp ){
                    $head.attr('class', 'header-action ' + animClassUp);
                }
            }, { offset: '-50%' } );
        } );
    };






    theme.initWooEvents = function () {

        var $supports_html5_storage;

        // wc_cart_fragments_params is required to continue, ensure the object exists
        if (typeof wc_cart_fragments_params === 'undefined') {
            return false;
        }

        /** Cart Handling */
        try {
            $supports_html5_storage = ( 'sessionStorage' in window && window.sessionStorage !== null );

            window.sessionStorage.setItem('wc', 'test');
            window.sessionStorage.removeItem('wc');
        } catch (err) {
            $supports_html5_storage = false;
        }

        this.$body.on('wc_fragments_refreshed', function () {
            var wc_fragments = $.parseJSON(sessionStorage.getItem(wc_cart_fragments_params.fragment_name)),
                cart_hash = sessionStorage.getItem('wc_cart_hash'),
                cookie_hash = $.cookie('woocommerce_cart_hash');

            if (cart_hash === null || cart_hash === undefined || cart_hash === '') {
                cart_hash = '';
            }

            if (cookie_hash === null || cookie_hash === undefined || cookie_hash === '') {
                cookie_hash = '';
            }

            if (wc_fragments && wc_fragments['div.widget_shopping_cart_content']) {
                var $total = $(wc_fragments['div.widget_shopping_cart_content']).find(".total").find(".amount").html();
            }
        });

        this.$body.on("wc_fragments_loaded", function () {
            
        });
        $('body').on('added_to_cart', function (event, fragments, cart_hash) {
            var $fragmentsContent = $(fragments["div.widget_shopping_cart_content"]),
                $cartCounter = $('.header-buttons .cart-count-number'),
                count = 0,
                allGood = true,
                $items = $fragmentsContent.find("li");

            $items.each(function () {
                var $qty = $(this).find(".quantity").clone(),
                    $txt = null,
                    res = null;

                $qty.find('span').remove();
                $txt = $qty.text();

                try {
                    res = Number($txt.replace(/x/, "").trim());
                    if (res) {
                        count += res;
                    }
                }
                catch (e) {
                    allGood = false;
                }
            });

            if (allGood) {
                $cartCounter.text(count);
            }
        });
    };

    theme.onReady = function () {
        var $body = $('body');

        //reset radio input in selector after page loading
        $('[id^="select-top-header-option"]').prop('checked', false);
        $('[id^="select-top-header-option"]:first').prop('checked', true);

        //change content, based on value in selector
        $('.select-top-header-input').change(function () {
            var but = $(this);
            $(but.attr('data-target')).addClass('active');
            $('.offices-tab').not(but.attr('data-target')).removeClass('active');
        });

        //opening submenu in main menu by click on mobile devices
        $('.mobile-menu li.menu-item-has-children > a').bind('click', function(e) {
            if ($(this).parent().hasClass('hover') && !($(this).attr('href') == '#'))return;
            e.preventDefault();
            $(this).parent().toggleClass('hover');
        });

        //opening submenu in widget by click
        $('aside.widget_nav_menu li.menu-item-has-children > a').bind('click', function(e) {
            if ($(this).parent().hasClass('animated') && !($(this).attr('href') == '#'))return;
            e.preventDefault();
            $(this).parent().toggleClass('animated');

        });

        //close all submenu in widget by timing
        $('aside.widget_nav_menu').on('mouseleave',function(){
            setTimeout(function() {
                $('aside.widget_nav_menu .animated').removeClass('animated');
            }, 1000);
        })

        //sticky header
        if ($body.hasClass('header-is-sticky')) theme.stickyHeader();


        //set menu type by columns
        theme.MenuByColumns();

        theme.initWooEvents();

    };

    theme.onLoad = function () {

    };

    theme.onResize = function () {
        if($('#mobile-top-header-btn').is(':visible')) {
            $('body').addClass('mobile-menu-is-active');
        } else {
            $('body').removeClass('mobile-menu-is-active');
        }
    };

    $(document).ready(function () {
        theme.onReady();
    });

    $(window).load(function () {
        theme.onLoad();
    });

    $(window).resize(function () {
        theme.onResize();
    });

    var addthis_config = {"data_track_addressbar":true};

}(jQuery));

