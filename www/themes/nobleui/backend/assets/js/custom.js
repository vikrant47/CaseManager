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
    $('.list-scrollable >table').wrap('<div class="table-wrapper"></div>');
    const scrollbarExample = new PerfectScrollbar('.table-wrapper');
});