(function($, Drupal) {

  $(document).ready(function() {
      
  /*************************** Configuration Panel ****************************************/    
  var movementsize = -160;
  $('.styleswitcher-contener .selector').click(function() {
    $('.styleswitcher').animate({
      left: '+=' + movementsize
      }, 500, function() {
        movementsize = movementsize * -1;
      }
    );
  });
  
  $('.styleswitcher').animate({ left: '+=' + movementsize }, 1500, function() { movementsize = movementsize * -1; }
  );
    
  $('input[type=radio][name=switch-color]').change(
    function(){
      if (this.value == 'white') {
          $('body').removeClass('black');
      }
      else if (this.value == 'black') {
          $('body').addClass('black');
      } 
    }
  );    
  $('input[type=radio][name=switch-layout]').change(
    function(){
      if (this.value == 'full') {
          $('body').removeClass('l-boxed');
      }
      else if (this.value == 'boxed') {
          $('body').addClass('l-boxed');
      } 
    }
  ); 
      
      
    /*************************** Carousel ****************************************/
    $('#recent-work').not('.wide-region').everslider({
      mode : 'carousel',
      moveSlides : 1,
      slideEasing : 'easeInOutCubic',
      slideDuration : 700,
      navigation : true,
      keyboard : true,
      nextNav : '<span class="next-arrow">Next</span>',
      prevNav : '<span class="prev-arrow">Next</span>',
      tickerAutoStart : true,
      tickerHover : true,
      tickerTimeout : 3500,

      itemWidth : 270,
      itemMargin : 20,
      afterSlide: function(){ 
              $('.over_pic').each(function(){
                $(this).css('height',  $( $( $(this).parent().find("img")['0'] )['0']).outerHeight() + 'px' );
              });
            },
      slidesReady: function(){ 
          setTimeout(function(){
            $('.home-text h1 span').addClass('show');
                  $('.over_pic').each(function(){
                    $(this).css('height',  $( $( $(this).parent().find("img")['0'] )['0']).outerHeight() + 'px' );
                  });
              }, 2000);
            },
    });
    
    $('#portfolio-drag').everslider({
      mode : 'carousel',
      moveSlides : 1,
      slideEasing : 'easeInOutCubic',
      slideDuration : 700,
      navigation : false,
      keyboard : true,
      nextNav : '<span class="next-arrow">Next</span>',
      prevNav : '<span class="prev-arrow">Next</span>',
      tickerAutoStart : true,
      tickerHover : true,
      tickerTimeout : 3500,

      itemHeight : 450,
      itemWidth : 300,
      itemMargin : 20
    });
    
    $('.wide-region #recent-work').everslider({
      mode : 'carousel',
      moveSlides : 1,
      slideEasing : 'easeInOutCubic',
      slideDuration : 700,
      navigation : true,
      keyboard : true,
      nextNav : '<span class="next-arrow">Next</span>',
      prevNav : '<span class="prev-arrow">Next</span>',
      tickerAutoStart : true,
      tickerHover : true,
      tickerTimeout : 3500,

      itemHeight : 280,
      itemWidth : 220,
      itemMargin : 20
    });

    $('.view-blog .everslider').everslider({
      mode : 'carousel',
      moveSlides : 1,
      slideEasing : 'easeInOutCubic',
      slideDuration : 700,
      navigation : true,
      keyboard : true,
      nextNav : '<span class="next-arrow">Next</span>',
      prevNav : '<span class="prev-arrow">Next</span>',
      tickerAutoStart : true,
      tickerHover : true,
      tickerTimeout : 4500,
      itemWidth : 399,
      itemHeight : 320,
      itemMargin : 26
    });

    $('.view-clients .everslider').everslider({
      mode : 'carousel',
      moveSlides : 2,
      slideEasing : 'easeInOutCubic',
      slideDuration : 700,
      navigation : true,
      fadeEasing : 'easeInOutExpo',
      itemMargin : 30,
      nextNav : '<span class="next-arrow">Next</span>',
      prevNav : '<span class="prev-arrow">Next</span>',
      tickerAutoStart : true,
      tickerHover : true,
      tickerTimeout : 5000,
      itemWidth : 200,
      itemHeight : 80
    });
    
    
    $('#portfolio-horiz-scroll').everslider({
      mode : 'carousel',
      moveSlides : 2,
      slideEasing : 'easeInOutCubic',
      slideDuration : 700,
      navigation : true,
      fadeEasing : 'easeInOutExpo',
      itemMargin : 0,
      nextNav : '<span class="next-arrow">Next</span>',
      prevNav : '<span class="prev-arrow">Next</span>',
      tickerAutoStart : true,
      tickerHover : true,
      tickerTimeout : 5000,
      itemWidth : 300,
      itemHeight : 80
    });
    
    
    /*************************** Animation ****************************************/    
    $('.animated-content').appear(function() {
      $(this).addClass('animated');
    },{accX: 50, accY: 100});
    
    
    /*************************** Lists ****************************************/
    var classList;
    var sectionclass;
    $(".list-icon li").each(function(index) {
      classList = $(this).parent().attr('class').split(/\s+/);
      iconclass = classList[1].replace('list-', '');

      $(this).prepend('<i class="fa ' + iconclass + '"></i>');
    });
    
    
    
    /*************************** Flippers ****************************************/
    setInterval(function() {
        $('.box .flip-container').addClass('hover');
    }, 4000);
    
    setInterval(function() {
        $('.box .flip-container').removeClass('hover');
    }, 8000);
    

    
    
    $('.square-left').hover(function() {
      $('.square-left .square-img').css('right', $('.square-left').width()-$('.square-left .square-img').outerWidth()); 
      $('.square-left .square-txt').css('left', $('.square-left').width()-$('.square-left .square-txt').outerWidth());
      
      
       
      $('.square-left .arrow ').css('right', $('.square-left .square-txt').outerWidth());
      $('.square-left .arrow ').css('border-left-width', '0');
      $('.square-left .arrow ').css('border-right-width', '20px');
      
        
    }, function() { 
      $('.square-left .square-img').css('right', '0');
      $('.square-left .square-txt').css('left', '0');
      
      $('.square-left .arrow ').css('right', '-20px');
      $('.square-left .arrow ').css('border-right-width', '0');
      $('.square-left .arrow ').css('border-left-width', '20px');
    });
    
    
    
    
    $('.square-right').hover(function() {
      $('.square-right .square-img').css('left', $('.square-right').width()-$('.square-right .square-img').outerWidth()); 
      $('.square-right .square-txt').css('right', $('.square-right').width()-$('.square-right .square-txt').outerWidth());   
    
      $('.square-right .arrow ').css('right', -20 );
      $('.square-right .arrow ').css('left', 'auto'); 
      $('.square-right .arrow ').css('border-right-width', '0');
      $('.square-right .arrow ').css('border-left-width', '20px');
      
    }, function() {
      $('.square-right .square-img').css('left', '0');
      $('.square-right .square-txt').css('right', '0');
       
      $('.square-right .arrow ').css('right', $('.square-right .square-txt').outerWidth() );
      $('.square-right .arrow ').css('border-left-width', '0');
      $('.square-right .arrow ').css('border-right-width', '20px');
    });
    
    
    
    $('.square-bottom').hover(function() {
      $('.square-bottom .square-img').css('top', $('.square-bottom .square-txt').outerHeight()); 
      $('.square-bottom .square-txt').css('bottom', $('.square-bottom').height()-$('.square-bottom .square-txt').outerHeight());  
       
      $('.square-bottom .arrow ').css('top', $('.square-bottom .square-txt').outerHeight() );
      
      $('.square-bottom .arrow ').css('border-bottom-width', '0');
      $('.square-bottom .arrow ').css('border-top-width', '20px');
      
    }, function() {
      $('.square-bottom .square-img').css('top', '0');
      $('.square-bottom .square-txt').css('bottom', '0');
      $('.square-bottom .arrow ').css('top', -20 );
      
      $('.square-bottom .arrow ').css('border-top-width', '0');
      $('.square-bottom .arrow ').css('border-bottom-width', '20px');
    });
    
    
    $(window).resize(function() {
      
      /////////////////// centered tabs ///////////////////////////////////////
      var section_containers = $('.section-container.auto.center');
      $.each(section_containers, function(key, section_container) {
        section_container = $(section_container);
        // convert section_container to jquery object
        section_containerWidth = section_container.width(), titles = section_container.find('p.title'), titleWidth = titles.first().width(), titleLen = titles.length, titleWidth = titles.first().width();

        $.each(titles, function(key2, value2) {
          $(value2).animate({
            'left' : ((section_containerWidth / 2) - ((titleWidth * titleLen ) / 2) + key2 * titleWidth),
          }, 100, 'swing');
        });
      });

    });

  });
})(jQuery, Drupal);
