/**breadcrumb fix**/
$(document).ready(function () {
    $(document).on('engine.form.open', function () {
        setTimeout(function () {
            $('.page-breadcrumb ul').addClass('breadcrumb').find('>li').addClass('breadcrumb-item');
            $('.control-tabs .nav-tabs a').click(function () {
                const $parent = $(this).parent();
                $parent.siblings().removeClass('active');
                $parent.addClass('active');
            });
            $('[data-trigger]').triggerOn();
        }, 500);
    }).trigger('engine.form.open');
    $(document).on('engine.list.open', function () {
        setTimeout(function () {
            $('[data-control="rowlink"] .rowlink td').off('click');
            $('.page-breadcrumb').hide();
            $('[data-trigger]').triggerOn();
        }, 500);
    }).trigger('engine.list.open');
    $(document).on('engine.ui.navigate', function () {
        $('.main-wrapper').scrollTop(0).data('perfectScroller').update()
    });
});

$(document).ready(function () {
    $('.main-wrapper').data('perfectScroller', new PerfectScrollbar('.main-wrapper'));
    $(document).on('show.oc.popup', function (event, target, $modal) {
        var $content = $modal.find('.modal-body');
        if ($modal.find('.recordfinder-list').length > 0) {
            $content = $modal.find('.recordfinder-list');
        }
        const scrollbarExample = new PerfectScrollbar($content.get(0), {
            wheelSpeed: 2,
            wheelPropagation: true,
            minScrollbarLength: 20
        });
    });
    $(document).on('engine.list.init', function (e, list) {
        if (!list.scroller) {
            const $table = list.$el.find('.list-scrollable >table');
            if ($table.length) {
                $table.wrap('<div class="table-wrapper"></div>');
                list.scroller = new PerfectScrollbar('.table-wrapper', {
                    wheelSpeed: 2,
                    wheelPropagation: true,
                    minScrollbarLength: 20
                });
            }
        }
    });
/*    $(document).on('click',
        '.nav-type-link,.rowlink td, .engine-form-wrapper .form-buttons a,.breadcrumb-item a',
        function () {
            let $link = $(this);
            if ($(this).is('td')) {
                if ($(this).hasClass('nolink')) {
                    $link = [];
                } else {
                    $link = $(this).parent().find('a').filter(function () {
                        return !$(this).closest('td').hasClass('nolink') && !$(this).hasClass('nolink')
                    }).first();
                }
            }
            if ($link.length) {
                const href = $link.prop('href');
                if (href !== '#' && href !== 'javascript:void(0)') {

                    if (window.location.href !== href) {
                        const navigated = Engine.instance.ui.navigate(href);
                        navigated.catch(function () {
                            // window.location.href = href;
                        })
                    }
                    return false;
                }
            }
        });*/
});