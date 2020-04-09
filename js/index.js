$(document).ready(function(){
    $('.parallax').parallax();

    $('.carousel').carousel({
      padding: 200,
      indicators: true,
      fullWidth: true
  });
  autoplay();
 

});


function autoplay() {
  $('.carousel').carousel('next');
  setTimeout(autoplay, 4500);
}

var a = 0;
$(window).scroll(function() {

  var oTop = $('#counter-stats').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.countnumber').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },
        {
          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
          }
        });
    });
    a = 1;
  }
});