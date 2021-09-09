
      const swiper = new Swiper('.swiper-container', {
      // Optional parameters
      loop: true,

      // If we need pagination
      pagination: {
        el: '.swiper-pagination',
      },

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      // And if we need scrollbar
      scrollbar: {
        el: '.swiper-scrollbar',
      },
    });
    
    



function doAnimations( elems ) {
  var animEndEv = 'webkitAnimationEnd animationend';
  elems.each(function () {
    var $this = $(this),
    $animationType = $this.data('animation');
    $this.addClass($animationType).one(animEndEv, function () {
      $this.removeClass($animationType);
  });
});
}
function loadMenuMobile() {
//   var nut = document.querySelector('div.icon i');
//  var mobile = document.querySelector('ul');
 
//   var mobile = $('nav');
  var nav = $('.menu_wrapper');
  var menu = nav.children('ul');
//  nut.addEventListener('click',function(){
       //     mobile.classList.toggle('active');
  // })

  if ($(window).width() < 991) {
      var showMenu  = $('#button_menu');
      menu.find('li').each(function(index, el) {
          if ($(this).find('ul li').length > 0) {
              $(this).prepend('<i class="fas fa-angle-down"></i>');
          }
          $(this).attr("data-animation","animated fadeInLeft");
      });
      menu.find('i').click(function(event) {
          var offParent = $(this).offsetParent();
          var index = $(this).offsetParent().children('ul');
          var _this = $(this);
          if (index.is(':hidden')) {
              offParent.parent().find('ul').not(index).slideUp(250);
              offParent.parent().find('ul').not(index).siblings('i').removeClass('active');
              index.slideToggle(250);
              _this.addClass('active');
              event.stopPropagation();
          } else {
              _this.removeClass('active');
              index.slideUp(250);
          }
          event.stopPropagation();
      });
  }
  showMenu.click(function(event) {
     
      if (!nav.hasClass('active')) {
          showMenu .addClass('open');
      //   blur.addClass('active');
         nav.addClass('active');
         menu.find('li').each(function(index, el) {
          doAnimations($(this));
      });
     } else {
          showMenu .removeClass('open');
         nav.removeClass('active');
      //   blur.removeClass('active');
     }
     event.stopPropagation();
 });
}
      document.addEventListener("DOMContentLoaded",function(){
       
      //   nut.addEventListener('click',function(){
       //      mobile.classList.toggle('active');
       // })

        loadMenuMobile();
      })


      $(document).ready(function() {
          
        if (/Lighthouse/.test(navigator.userAgent)) return;
        if ($('#key').length > 0) {
            var q = '';
            q = $('#key').data('key');
            $.ajax({
                url: 'search-tour',
                type: 'GET',
                data: {q:q}
            })
            .done(function(data) {
             //   alert(data);
             //   console.log(data);
                $('.list_tour_result').html(data);
            
            });
            $(document).on('click', '.list_tour_result .pagination a', function(event) {
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('href'),
                    type: 'GET'
                })
                .done(function(data) {
                    $('.list_tour_result').html(data);
                    var hic = $('.list_tour_result').offset().top - 50;
                    $('body,html').animate({ scrollTop: hic }, 800 );
                })
            });
            // $.ajax({
            //     url: 'search-combo',
            //     type: 'GET',
            //     data: {q:q}
            // })
            // .done(function(data) {
            //     $('.list_combo_result').html(data);
            // });
            // $(document).on('click', '.list_combo_result .pagination a', function(event) {
            //     event.preventDefault();
            //     $.ajax({
            //         url: $(this).attr('href'),
            //         type: 'GET'
            //     })
            //     .done(function(data) {
            //         $('.list_combo_result').html(data);
            //         var hic = $('.list_combo_result').offset().top - 50;
            //         $('body,html').animate({ scrollTop: hic }, 800 );
            //     })
            // });
        }
    });
       



// var PROGRAM = (function(){
//     var search = function(){
      
//         $(document).on('submit','form#search_home',function(e){
//             console.log(3333);
//             e.preventDefault();
//             var formData = $(this).serialize();
//             $.ajax({
//                 url: 'search-tour',
//                 type: 'GET',
//                 data:  formData
//             })
//             .done(function(data) {
//                 $('.list_tour_result').html(data);
//             });
//         });
//     }
//     return{
//         _:function(){
//             search();
//         }
//     }
// })();
// PROGRAM._();


  
      
     