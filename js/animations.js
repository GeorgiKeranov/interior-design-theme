(function($) {
  $('a').on('click', function(e) {
    let anchorLink = $(this).attr('href');
    
    if (anchorLink.indexOf('#') === -1) {
      return;
    }

    e.preventDefault();

    let $section = $(anchorLink);
    if ($section.length) {
      $('html, body').animate({
        scrollTop: $section.offset().top - 30
      }, 1000);
    }
  });

  const $window = $(window);
  let winH = $window.height();
  $window.on('resize', function() {
    winH = $(window).height();
  });

  //Check if element is visible
  $window.on('scroll load', function() {
    $('.section-fade').each(function() {
      const $element = $(this);
      
      if ($element.offset().top + 100 <= $(document).scrollTop() + winH) {
        setTimeout(() => $element.addClass('visible'), 1);
      } else {
        $element.removeClass('visible');
      }
    });
  });

  const bodyHome = $('body.home');
  if (bodyHome.length) {
    setTimeout(() => bodyHome.addClass('animated'), 300);
  }
}(jQuery));
