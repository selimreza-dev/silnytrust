// owl carousel
jQuery(document).ready(function () {
  let owl = jQuery("#owl-slider").owlCarousel({
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    items: 1,
    loop: true,
  });
  // Next button
  jQuery(".owl-next-btn").click(function () {
    owl.trigger("next.owl.carousel");
  });

  // Prev button
  jQuery(".owl-prev-btn").click(function () {
    owl.trigger("prev.owl.carousel");
  });

  // category slide
  let categorySlider = jQuery("#category-slider").owlCarousel({
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    // items: 10,
    loop: true,
    nav: false,
    responsiveClass: true,
    responsive: {
      0: {
        items: 3,
      },
      600: {
        items: 4,
      },
      1000: {
        items: 6,
      },
    },
  });

  // category Next button
  jQuery(".cat-next-button ").click(function () {
    categorySlider.trigger("next.owl.carousel");
  });

  // category Prev button
  jQuery(".cat-prev-button").click(function () {
    categorySlider.trigger("prev.owl.carousel");
  });
});
