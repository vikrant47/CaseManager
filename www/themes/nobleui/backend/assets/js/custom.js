/**breadcrumb fix**/
$(document).ready(function () {
    $('.page-breadcrumb ul').addClass('breadcrumb').find('>li').addClass('breadcrumb-item');
    $('.control-tabs .nav-tabs a').click(function () {
        const $parent = $(this).parent();
        $parent.siblings().removeClass('active');
        $parent.addClass('active');
    });
});

$(document).ready(function () {
    const bodyScroller = new PerfectScrollbar('.main-wrapper');
    var $list = $('.list-scrollable >table');
    if ($list.length) {
        $list.wrap('<div class="table-wrapper"></div>');
        const scrollbarExample = new PerfectScrollbar('.table-wrapper', {
            wheelSpeed: 2,
            wheelPropagation: true,
            minScrollbarLength: 20
        });
    }
});