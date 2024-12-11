//slideshow style interval
var autoSwap = setInterval( swap,7000);

//pause slideshow and reinstantiate on mouseout
$('.carousel, .slider').hover(
  function () {
    clearInterval(autoSwap);
}, 
  function () {
   autoSwap = setInterval( swap,7000);
});

//global variables
var items = [];
var startItem = 1;
var position = 0;
var itemCount = $('.carousel>li').length;
var leftpos = itemCount;
var resetCount = itemCount;

//unused: gather text inside items class
$('.carousel>li').each(function(index) {
    items[index] = $(this).text();
});

//swap images function
function swap(action) {
  var direction = action;
  
  //moving carousel backwards
  if(direction == 'counter-clockwise') {
    var leftitem = $('.left-pos').attr('id') - 1;
    if(leftitem == 0) {
      leftitem = itemCount;
    }
    
    $('.right-pos').removeClass('right-pos').addClass('back-pos');
    $('.main-pos').removeClass('main-pos').addClass('right-pos');
    $('.left-pos').removeClass('left-pos').addClass('main-pos');
    $('#'+leftitem+'').removeClass('back-pos').addClass('left-pos');
    
    startItem--;
    if(startItem < 1) {
      startItem = itemCount;
    }
  }
  
  //moving carousel forward
  if(direction == 'clockwise' || direction == '' || direction == null ) {
    function pos(positionvalue) {
      if(positionvalue != 'leftposition') {
        //increment image list id
        position++;
        
        //if final result is greater than image count, reset position.
        if((startItem+position) > resetCount) {
          position = 1-startItem;
        }
      }
    
      //setting the left positioned item
      if(positionvalue == 'leftposition') {
        //left positioned image should always be one left than main positioned image.
        position = startItem - 1;
      
        //reset last image in list to left position if first image is in main position
        if(position < 1) {
          position = itemCount;
        }
      }
   
      return position;
    }  
  
   $('#'+ startItem +'').removeClass('main-pos').addClass('left-pos');
   $('#'+ (startItem+pos()) +'').removeClass('right-pos').addClass('main-pos');
   $('#'+ (startItem+pos()) +'').removeClass('back-pos').addClass('right-pos');
   $('#'+ pos('leftposition') +'').removeClass('left-pos').addClass('back-pos');

    startItem++;
    position=0;
    if(startItem > itemCount) {
      startItem = 1;
    }
  }
}

//next button click function
$('#next').click(function() {
  swap('clockwise');
});

//prev button click function
$('#prev').click(function() {
  swap('counter-clockwise');
});

//if any visible items are clicked
$('.items').click(function() {
  if($(this).attr('class') == 'items left-pos') {
     swap('counter-clockwise'); 
  }
  else {
    swap('clockwise'); 
  }
});

$(function(){


      //smots scroll
      var html_body = $('html, body');
      $('.collapse a').on('click', function () {
          if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
              if (target.length) {
                  html_body.animate({
                      scrollTop: target.offset().top - 0
                  }, 1500);
                  return false;
              }
          }
      });
   
     //back to top 
     
  //   var back2top = $(".back-to");
  // var html_body = $('html, body');
  // back2top.click(function(){
  //     html_body.animate({scrollTop:0},1500);
  // });
  
  $(window).scroll(function(){
  var scrolling = $(this).scrollTop();
 
  if(scrolling > 50){
    $(".mobilpadding").addClass("fixedquick");   
}
else{
    $(".mobilpadding").removeClass("fixedquick");
} 

// if(scrolling > 2000){
//   $(".fixtProduct").addClass("productfix");   
// }
// else{
//   $(".fixtProduct").removeClass("productfix");
// } 
// if(scrolling > 2450){
//   $(".fixtProduct").removeClass("productfix");   
// }
  });  

  $('.loginSilderIteam').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    arrows:false,
    speed:500,
    autoplaySpeed: 3000,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          centerPadding: '0',
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          centerPadding: '0',
        }
      }
    ],
  });

});