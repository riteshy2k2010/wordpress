//header css
    
$(function() {
    var header = $(".top-headerboxscroll");
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll >= 2) {
            header.removeClass('top-headerboxscroll').addClass("darkHeader");
        } else {
            header.removeClass("darkHeader").addClass('top-headerboxscroll');
        }
    });
});


//header-offcanvas-menu-js
(function($) {
    $.fn.simplerSidebar = function(options) {
        var cfg = $.extend(true, $.fn.simplerSidebar.settings, options);
        return this.each(function() {
            var align, sbw, ssbInit, ssbStyle, maskInit, maskStyle, maskActive,
                maskInactive,
                attr = cfg.attr,
                $sidebar = $(this),
                $opener = $(cfg.opener),
                $links = cfg.sidebar.closingLinks,
                sbMaxW = cfg.sidebar.width,
                gap = cfg.sidebar.gap,
                winMaxW = sbMaxW + gap,
                w = $(window).width(),
                animationStart = {},
                animationEnd = {},
 
                animateOpen = function() {
                    $sidebar
                      .css(animationEnd)
                      .attr('data-' + attr, 'active');
                    $mask.css('display', 'block');
                    setTimeout(function() {
                        $mask.css(maskActive);
                    }, 0);
                },
                animateClose = function() {
                    $sidebar
                      .css(animationStart)
                      .attr('data-' + attr, 'disabled');
                    $mask.css(maskInactive);
                },
                closeSidebar = function() {
                    var isWhat = $sidebar.attr('data-' + attr);
                    if (isWhat === 'active') {
                        animateClose();
                    }
                },
 
                $mask = $('<div>').attr('data-' + attr, 'mask');
 
            //Checking sidebar align

            if (cfg.sidebar.align === undefined || cfg.sidebar.align === 'right') {
                align = 'right';
            } else if (cfg.sidebar.align === 'left') {
                align = 'left';
            }
 
            //Sidebar style

            if (w < winMaxW) {
                sbw = w - gap;
            } else {
                sbw = sbMaxW;
            }

            ssbInit = {
                position: 'fixed',
                top: cfg.top,
                bottom: 0,
                width: sbw
            };

            ssbInit[align] = -sbw;
            animationStart.transform = 'translateX(0)';
            var translateValue = align === 'left' ? sbw : -sbw;
            animationEnd.transform = 'translateX(' + translateValue + 'px)';
 
            cfg.sidebar.css.transition = 'transform ' + cfg.animation.duration +
              ' ' + cfg.animation.easing;
            ssbStyle = $.extend(true, ssbInit, cfg.sidebar.css);
 
            $sidebar.css(ssbStyle)
                .attr('data-' + attr, 'disabled');
            $sidebar.css(animationStart);
 
            //Mask style

            maskInit = {
                position: 'fixed',
                top: cfg.top,
                right: 0,
                bottom: 0,
                left: 0,
                zIndex: cfg.sidebar.css.zIndex - 1,
                display: 'none',
                opacity: 0,
                transition: 'opacity ' + cfg.animation.duration + ' ' +
                    cfg.animation.easing
            };
 
            maskStyle = $.extend(true, maskInit, cfg.mask.css);
            maskActive = {
                display: 'block',
                opacity: cfg.mask.opacity
            };
            maskInactive = {
                opacity: 0
            };
 
            //Appending Mask if mask.display is true

            if (true === cfg.mask.display) {
                $mask.appendTo('body').css(maskStyle);
            }
 
            //Opening and closing the Sidebar when $opener is clicked

            $opener.click(function() {
                var isWhat = $sidebar.attr('data-' + attr);
 
                if (isWhat === 'disabled') {
                    animateOpen();
                } else if (isWhat === 'active') {
                    animateClose();
                }
            });
 
            //Closing Sidebar when the mask is clicked

            $mask.click(closeSidebar);
 
            //Closing Sidebar when a link inside of it is clicked

            $sidebar.on('click', $links, closeSidebar);
 
            // Fully hide mask when transition ends

            $mask.on('transitionend', function() {
                if ($mask.css('opacity') === "0") {
                    $mask.css('display', 'none');
                }
            });
 
            //Adjusting width;

            $(window).resize(function() {
                var rsbw, update,
                    isWhat = $sidebar.attr('data-' + attr),
                    nw = $(window).width();
 
                if (nw < winMaxW) {
                    rsbw = nw - gap;
                } else {
                    rsbw = sbMaxW;
                }
 
                update = {
                    width: rsbw
                };
 
                if (isWhat === 'disabled') {
                    update[align] = -rsbw;
                    $sidebar.css(update);
                } else if (isWhat === 'active') {
                    $sidebar.css(update);
                }
            });
 
        });
    };
 
$.fn.simplerSidebar.settings = {
    attr: 'simplersidebar',
    top: 0,
    animation: {
        duration: '0.6s',
        easing: 'ease-in-out'
    },
    sidebar: {
        width: 300,
        gap: 64,
        closingLinks: 'a',
        css: {
            zIndex: 999999999
        }
    },
    mask: {
        display: true,
        opacity: 0.5,
        css: {
            backgroundColor: 'black',
            filter: 'Alpha(opacity=50)'
        }
    }
};
})(jQuery);


jQuery(document).ready(function() {
    jQuery('#sidebar').simplerSidebar({
        opener: '#toggle-sidebar, #toggle-sidebar1',
            sidebar: {
                align: 'left',
                width: 350,
                closingLinks: '.close-sidebar'
            },
            mask: {
                opacity: 0.75
            }
        });

    jQuery('#toggle-sidebar').click(function(){
        jQuery('#sidebar').addClass('sidebar-wrapperd-box');
    });
})



//HOME PAGE BANNER SLIDER

$('.herobanner').slick({
    dots: false,
    arrows: true,
    autoplay: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1
});


//HOME PAGE BRAND SLIDER
$('.brandslider').slick({
      arrows: true,
      autoplay: false,
      dots: false,
      adaptiveHeight: false,
      slidesToShow: 12,
      slidesToScroll: 12,
      vertical: true,
      verticalSwiping: true,
      infinite: true,
      responsive: [
        {
          breakpoint: 1270,
          settings: {
            slidesToShow: 10,
            slidesToScroll: 10,
          }
        },
        {
          breakpoint: 1199,
          settings: {
            slidesToShow: 8,
            slidesToScroll: 8,
          }
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 5,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 1,
            vertical: false
          }
        },
        {
          breakpoint: 601,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            vertical: false
          }
        },
        {
          breakpoint: 451,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            vertical: false
          }
        },
        {
          breakpoint: 351,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            vertical: false
          }
        }
      ]
});



//--Sidebar menu js
var windowWidth = $(window).width();
if(windowWidth < 992){
   $('.menu-item-has-children .sub-menu').hide();

    $('li').click(function(event) {
        event.stopPropagation();
        $('> ul', this).toggle();

    });

    $('.menu-item-has-children .sub-menu').hide();

    $('li.search-header').click(function(event) {
        event.stopPropagation();
        $('.dropdown-menu.dropdown-menu-right', this).toggle();

    });

    $('li.menu-item-has-children').each(function () {
        $(this).children('a').after('<img src="img/arrow-icon.png" />');
    });

    $('.subchildlist').each(function () {
        $(this).children('a').after('<img src="img/arrow-icon.png" />');
    });

    $('.menu-item-has-children img, .menu-item-has-children a').on("click", function () {
        var img = $(this);
        if ($(this).next('img').length) {
            var img = $(this).next('img');
        }

        if (img.hasClass('open')) {
            img.removeClass('open');
            
            img.attr('src', 'img/arrow-icon.png');
            
        } else {
            img.addClass('open');
            img.attr('src', 'img/arrow-iconr.png');
        }
       img.siblings('.menu-item-has-children .sub-menu').toggle();
    });
}




//header-menu-modalbox
$("#searchbtnbox1").click(function () {
    $("#searchpopupbox").addClass("active");
    $("body").addClass("scrollout");
    $(".modal-menubox").animate({
            scrollTop: 0
        }, 600);
});

$("#close").click(function () {
    $("#searchpopupbox").removeClass("active");
    $("body").removeClass("scrollout");
});




