(function ($) {
    'use strict';
    $(function () {
        var body = $('body');
        var mainWrapper = $('.main-wrapper');
        var footer = $('footer');
        var sidebar = $('.sidebar');
        var navbar = $('.navbar').not('.top-navbar');


        // For Buy Now button.
        $("body").prepend('\
      <div class="buy-now-wrapper">\
        <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="btn btn-primary text-white font-weight-bold btn-icon-text">\
          <i data-feather="file-text"></i>\
        </a>\
        <a href="https://themeforest.net/item/nobleui-admin-dashboard-template/24606935" target="_blank" class="btn btn-danger text-white font-weight-bold btn-icon-text">\
        <i class="btn-icon-prepend" data-feather="shopping-cart"></i>\
        Buy Now\
      </a>\
      </div>\
    ');

        // Enable feather-icons with SVG markup
        feather.replace();

        // initializing bootstrap tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // initialize clipboard plugin
        if ($('.btn-clipboard').length) {
            var clipboard = new ClipboardJS('.btn-clipboard');

            // Enabling tooltip to all clipboard buttons
            $('.btn-clipboard').attr('data-toggle', 'tooltip').attr('title', 'Copy to clipboard');

            // initializing bootstrap tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // initially hide btn-clipboard and show after copy
            clipboard.on('success', function (e) {
                e.trigger.classList.value = 'btn btn-clipboard btn-currentPageUrl'
                $('.btn-currentPageUrl').tooltip('hide');
                e.trigger.dataset.originalTitle = 'Copied';
                $('.btn-currentPageUrl').tooltip('show');
                setTimeout(function () {
                    $('.btn-currentPageUrl').tooltip('hide');
                    e.trigger.dataset.originalTitle = 'Copy to clipboard';
                    e.trigger.classList.value = 'btn btn-clipboard'
                }, 1000);
                e.clearSelection();
            });
        }


        // Applying perfect-scrollbar
        if ($('.sidebar .sidebar-body').length) {
            const sidebarBodyScroll = new PerfectScrollbar('.sidebar-body');
        }
        if ($('.content-nav-wrapper').length) {
            const contentNavWrapper = new PerfectScrollbar('.content-nav-wrapper');
        }

        // Sidebar toggle to sidebar-folded
        $('.sidebar-toggler').on('click', function (e) {
            $(this).toggleClass('active');
            $(this).toggleClass('not-active');
            if (window.matchMedia('(min-width: 992px)').matches) {
                e.preventDefault();
                body.toggleClass('sidebar-folded');
            } else if (window.matchMedia('(max-width: 991px)').matches) {
                e.preventDefault();
                body.toggleClass('sidebar-open');
            }
        });


        // Settings sidebar toggle
        $('.settings-sidebar-toggler').on('click', function (e) {
            $('body').toggleClass('settings-open');
        });

        // Sidebar theme settings
        $("input:radio[name=sidebarThemeSettings]").click(function () {
            $('body').removeClass('sidebar-light sidebar-dark');
            $('body').addClass($(this).val());
        })


        // sidebar-folded on large devices
        function iconSidebar(e) {
            if (e.matches) {
                body.addClass('sidebar-folded');
            } else {
                body.removeClass('sidebar-folded');
            }
        }

        var desktopMedium = window.matchMedia('(min-width:992px) and (max-width: 1199px)');
        desktopMedium.addListener(iconSidebar);
        iconSidebar(desktopMedium);


        //Add active class to nav-link based on url dynamically
        function markActiveNav($navElement, url, searchText, force) {
            if (!$navElement.is('.nav-type-folder')) {
                if (url === "") {
                    //for root url
                    if ($navElement.attr('href').indexOf("index.html") !== -1) {
                        $navElement.parents('.nav-item').last().addClass('active');
                        if ($navElement.parents('.sub-menu').length) {
                            $navElement.closest('.collapse').addClass('show');
                            $navElement.addClass('active');
                        }
                    }
                } else {
                    //for other url
                    if (force ||
                        (url && url.toLowerCase().endsWith($navElement.attr('href').toLowerCase())) ||
                        (searchText && $navElement.text().toLowerCase().indexOf(searchText.toLowerCase()) > -1)) {
                        $(".sidebar .nav-item").removeClass('active')
                        $(".sidebar .nav-link").removeClass('active')
                        $navElement.parents('.nav-item').show();
                        if ($navElement.parents('.sub-menu').length) {
                            $navElement.parents('.collapse').siblings().attr('aria-expanded', 'true').show();
                            $navElement.parents('.collapse').addClass('show').show();
                            if (!searchText) {
                                $navElement.addClass('active').show();
                            } else {
                                const text = $navElement.find('.link-title').text().trim();
                                const matchIndex = text.toLowerCase().indexOf(searchText.toLowerCase());
                                $navElement.find('.link-title').html(text.substring(0, matchIndex) + '<span class="marktext">' + text.substring(matchIndex, searchText.length) + '</span>' + text.substring(matchIndex + searchText.length));
                            }
                        }
                        /*if ($navElement.parents('.submenu-item').length && !searchText) {
                            $navElement.addClass('active');
                        }*/
                    }
                }
            }
        }


        var currentPageUrl = location.href;
        $('.sidebar .nav li a,.horizontal-menu .nav li a').each(function () {
            markActiveNav($(this), currentPageUrl);
        }).click(function () {
            markActiveNav($(this), currentPageUrl, null, true);
        });


        $('#nav-search-box').keyup(
            function (e) {
                const searchText = e.target.value;
                if (searchText.trim().length === 0) {
                    $(".sidebar .nav-item").show().find('.link-title').text(function () {
                        return $(this).text();
                    });
                } else {
                    $(".sidebar .collapse").removeClass('show')
                    $(".sidebar .nav-item").removeClass('active').hide();
                    $(".sidebar .nav-link").removeClass('active').attr('aria-expanded', 'false');
                    $('.sidebar .nav li a').each(function () {
                        markActiveNav($(this), null, searchText);
                    });
                }
            }
        );


        //  open sidebar-folded when hover
        $(".sidebar .sidebar-body").hover(
            function () {
                if (body.hasClass('sidebar-folded')) {
                    body.addClass("open-sidebar-folded");
                }
            },
            function () {
                if (body.hasClass('sidebar-folded')) {
                    body.removeClass("open-sidebar-folded");
                }
            });

        // close sidebar when click outside on mobile/table
        $(document).on('click touchstart', function (e) {
            e.stopPropagation();

            // closing of sidebar menu when clicking outside of it
            if (!$(e.target).closest('.sidebar-toggler').length) {
                var sidebar = $(e.target).closest('.sidebar').length;
                var sidebarBody = $(e.target).closest('.sidebar-body').length;
                if (!sidebar && !sidebarBody) {
                    if ($('body').hasClass('sidebar-open')) {
                        $('body').removeClass('sidebar-open');
                    }
                }
            }
        });

        // initializing popover
        $('[data-toggle="popover"]').popover();

        //checkbox and radios
        $(".form-check label,.form-radio label").append('<i class="input-frame"></i>');


        //Horizontal menu in mobile
        $('[data-toggle="horizontal-menu-toggle"]').on("click", function () {
            $(".horizontal-menu .bottom-navbar").toggleClass("header-toggled");
        });
        // Horizontal menu navigation in mobile menu on click
        var navItemClicked = $('.horizontal-menu .page-navigation >.nav-item');
        navItemClicked.on("click", function (event) {
            if (window.matchMedia('(max-width: 991px)').matches) {
                if (!($(this).hasClass('show-submenu'))) {
                    navItemClicked.removeClass('show-submenu');
                }
                $(this).toggleClass('show-submenu');
            }
        })

        $(window).scroll(function () {
            if (window.matchMedia('(min-width: 992px)').matches) {
                var header = $('.horizontal-menu');
                if ($(window).scrollTop() >= 60) {
                    $(header).addClass('fixed-on-scroll');
                } else {
                    $(header).removeClass('fixed-on-scroll');
                }
            }
        });


    });
})(jQuery);
