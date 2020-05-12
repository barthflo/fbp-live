(function($){
    $(document).ready(function () {
//hamburger clicks
        $('.hamburger').on('click', function hamburger () {
            $('#sidebar').toggleClass('active');
            $('.header').toggleClass('active');
            $('#content').toggleClass('active');
            $('.hamburger').toggleClass('is-active');
            $('#content').toggleClass('show-mobile');
            $('#backTop').toggleClass('active');
            $('.nextbtn').toggleClass('active');
            $('.nextbtn').toggleClass('show-mobile');
            $('.backbtn').toggleClass('show-mobile');
            
        });
//thumbnail clicks     
        $('.thumbs').on('click', function thumbs(){
            $('#content').toggleClass('show-mobile');
            $('.nextbtn').toggleClass('show-mobile');
            $('.backbtn').toggleClass('show-mobile');
        });

        $('.thumbs').click (function backtop(){
            $(".slider").scrollTop(0);
        });
        $('.slider-nav').click (function prevnext(){
            $(".slider").scrollTop(0);
        });
//scroll down

        $('.scroll-down').click (function scroll() {
            var nextTitle = $(this).parent().find('h3.title');
            $(".slider").scrollTo(nextTitle ,800);
        }); 

        $('.slider').scroll(function() {
            if ($('.slider').scrollTop() > 300) {
              $('#backTop').addClass('show');
            } else {
              $('#backTop').removeClass('show');
            }
          });
          
          $('#backTop').on('click', function(e) {
            e.preventDefault();
            $('.slider').animate({scrollTop:0}, '300');
          });

 //keep fixed header in the flow   
          var contentPlacement=$('.header').position().top+$('.header').height();
          $('.sidebar-content').css('margin-top', contentPlacement);
        
    });

  
})(jQuery);

