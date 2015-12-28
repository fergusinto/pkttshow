(function($) {
 "use strict";

    $(document).ready(function(){
      $(".mh-nav-search").click(function(){
      $(".search-bar").slideToggle();
      });
    });

    $(document).ready(function(){
      $(".search-bar").click(function(){
      $(".sb-before").hide();
      });
    });


    $(document).ready(function(){
      $(".uw-l-btn-2").click(function(){
      $(".uw-l-comment").slideToggle();
      $(".uw-l-data p").slideToggle();
      });
    });

})(jQuery);
