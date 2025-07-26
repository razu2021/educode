  $(document).ready(function(){
    $(".banner1_index_slider").owlCarousel({
        items:1,
        autoplay:true,
        loop:true,
        smartSpeed:500,
        lazyLoad:true,
        dots:true,
        nav:false,
        margin:0,
        //navText: ["<span class='new_prev'>  <  </span>", "<span class='new_next'> > </span>"],
    });
  });
  $(document).ready(function(){
    $(".top_course_slider").owlCarousel({
        items:4,
        autoplay:true,
        loop:true,
        smartSpeed:500,
        lazyLoad:true,
        dots:false,
        nav:true,
        margin:10,
        navText: ["<span class='new_prev'>  <  </span>", "<span class='new_next'> > </span>"],
      responsive: {
      0: {
        items: 1,
        margin:30,
      },
      768: {
        items: 2
      },
      992: {
        items: 3
      },
      1199: {
        items: 4
      }
    }
    });
  });


  /**========  testimonial slider start here ======== */
$(document).ready(function(){
  $('.testimonial-carousel').owlCarousel({
    loop: true,
    center: true, // ✅ center item
    margin: 20,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    smartSpeed: 600,
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 2
      },
      992: {
        items: 3
      }
    }
  });
});


  /**========  testimonial slider start here ======== */
$(document).ready(function(){
  $('.category_menu_sliders').owlCarousel({
    loop: false,
    margin: 20,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    smartSpeed: 600,
    dots:false,
    nav:false,
    autoWidth:true,
    responsive: {
      0: {
        items: 3,
        autoWidth:true,
      },
      768: {
        items: 4,
        autoWidth:true,
      },
      992: {
        items: 3,
        autoWidth:true,
      },
      1200: {
        items: 6,
        autoWidth:true,
      }
    }
  });
});
// topics slider items 
$(document).ready(function(){
  $('.topics_slider_1').owlCarousel({
    loop: false,
    margin: 20,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    smartSpeed: 600,
    dots:true,
    nav:false,
    responsive: {
      0: {
        items: 2,
      },
      768: {
        items: 3,
      },
      992: {
        items: 3,
      },
      1200: {
        items: 4,

      }
    }
  });
});
