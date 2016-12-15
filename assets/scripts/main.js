jQuery(function ($) {


// isotope init
var $container = $('#isotope-list'); //The ID for the list with all the blog posts
$container.isotope({ //Isotope options, 'item' matches the class in the PHP
itemSelector : '.item',
layoutMode : 'fitRows'
});

//Add the class selected to the item that is clicked, and remove from the others
var $optionSets = $('#filters'),
$optionLinks = $optionSets.find('a');

$optionLinks.click(function(){
var $this = $(this);
// don't proceed if already selected
if ( $this.hasClass('selected') ) {
return false;
}
var $optionSet = $this.parents('#filters');
$optionSets.find('.selected').removeClass('selected');
$this.addClass('selected');

//When an item is clicked, sort the items.
var selector = $(this).attr('data-filter');
$container.isotope({ filter: selector });

return false;
});



// smooth scroll
$('a[href*="#"]:not([href="#"])').click(function() {
  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
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



});
