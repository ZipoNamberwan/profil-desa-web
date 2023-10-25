'use strict'

const Src = {
   Init: function() {
      this.HeaderFixedScroll();
      this.onScrollClick();
   },
   HeaderFixedScroll: function() {
      const header = $(".header-top");
      $(window).scroll(function() {
         const onScroll = $(window).scrollTop();
         // console.log(onScroll)
         if(onScroll >= 300) {
            header.addClass('is-sticky');
         } else {
            header.removeClass('is-sticky');
         }
      });
   },
   onScrollClick: function() {
      $('.scroll-gis-section').click(function () {
         var target = $(this.hash);
         target = target.length ? target : $('[name=' + this.hash.substr(1) + ']');
         if (target.length) {
             $('html,body').animate({
                 scrollTop: target.offset().top - 225
             }, 500);
             return false;
         }
     });
   }
}


$(function() {
   const buttonTopRank = $('#top_rank_toggle');
   const drawerElement = $('.rz-drawer-outer');
   const closeDrawerElement = drawerElement.find('.rz-drawer__head > .btn-close-drawer');

   buttonTopRank.on('click', function(evt) {
      evt.preventDefault();
      drawerElement.addClass('is-shown');
   });

   closeDrawerElement.on('click', function(evt) {
      evt.preventDefault();
      drawerElement.removeClass('is-shown');
   });
});
