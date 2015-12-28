(function($) {
    "use strict";
    // $(document).ready(function() {
    //
    //   $("#owl-demo").owlCarousel({
    //
    //       navigation : false, // Show next and prev buttons
    //       slideSpeed : 1000,
    //       paginationSpeed : 400,
    //       singleItem:true,
    //       autoPlay: 8000,
    //       stopOnHover: true,
    //       pagination: true
    //
    //   });
    //
    // });
    // $(document).ready(function() {
    //
    //   $("#owl-demo2").owlCarousel({
    //
    //       navigation : false, // Show next and prev buttons
    //       slideSpeed : 1000,
    //       paginationSpeed : 400,
    //       singleItem:true,
    //       autoPlay: 8000,
    //       stopOnHover: true,
    //       pagination: true
    //
    //   });
    //
    // });
    // $('a.popup-btn').on('click', function(e) {
    //     e.preventDefault();
    //     var url = $(this).attr('href');
    //     $(".modal-body").html('<iframe width="100%" height="100%" frameborder="0" scrolling="no" allowtransparency="true" src="'+url+'"></iframe>');
    // });
    $('#pop-upload').on('show.bs.modal', function() {
        $(this).find('.modal-dialog').css({
            width: '100%', //choose your width
            height: '150vh',
            'padding': '0',
            'margin': '0',
            'position': 'absolute',
            'bottom': '0'
        });
        $(this).find('.modal-content').css({
            height: '100%',
            'border-radius': '0',
            'padding': '0'
        });
        $(this).find('.modal-body').css({
            width: 'auto',
            height: '100%',
            'padding': '0'
        });
    })
    $('#pop-ranking').on('shown.bs.modal', function() {
        $('a.popup-btn2').focus()
    })
    $('#pop-share').on('shown.bs.modal', function() {
        $('a.popup-btn3').focus()
    })
    $('#pop-report').on('shown.bs.modal', function() {
        $('a.popup-btn4').focus()
    })
    $(document).ready(function() {
        // if($("#marquee1").length > 0){
        //     $("#marquee1").marquee();
        // }
    });
})(jQuery);
