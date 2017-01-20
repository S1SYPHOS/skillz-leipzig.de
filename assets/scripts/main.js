jQuery(window).load(function() {

// isotope init
var $isoContainer = jQuery('#isotope-list');
$isoContainer.isotope({
  itemSelector : '.grid-item',
  layoutMode : 'fitRows'
});

// filter settings
var $optionSets = jQuery('#filters'),
$optionLinks = $optionSets.find('a');

$optionLinks.click(function() {
  var $this = jQuery(this);
  if ( $this.hasClass('selected') ) {
    return false;
  }

  var $optionSet = $this.parents('#filters');
  $optionSets.find('.selected').removeClass('selected');
  $this.addClass('selected');

  var selector = jQuery(this).attr('data-filter');
  $isoContainer.isotope({ filter: selector });

  return false;
  });
});

jQuery(function ($) {

  $(function() {
    $('#portrait').smoothState({ prefetch: true });
  });

  // smooth scroll
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 750);
        return false;
      }
    }
  });

  // $('.menu-kuenstler a').addClass('disabled');
  // $('.menu-archiv a').addClass('disabled');
  //
  //
  // $('.menu-kuenstler a').attr('href', 'javascript:void(0)');
  // $('.menu-archiv a').attr('href', 'javascript:void(0)');
});
