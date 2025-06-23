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
