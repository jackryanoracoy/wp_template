/**
 * File custom.js.
 */

// IE support for "main"
document.createElement('main');

// Object-Fit
$(function () { objectFitImages() });

// Immersive
var lastScroll = 0;
  $(window).scroll(function(){
  setTimeout(function() {
    var scroll = $(window).scrollTop();
    if (scroll > lastScroll + 10) {
      $(".header-section").removeClass("show");
    }
    else if (scroll < lastScroll - 10) {
      $(".header-section").addClass("show");
    }
    if (scroll >= 100) {
      $(".header-section").addClass("active");
    } 
    else {
      $(".header-section").removeClass("active");
    }
    lastScroll = scroll;
  }, 120);
});

//Remove class "show" (Time interval)
// var $removeShow = $(".header-section");
// setInterval(function() {
//   $removeShow.removeClass("show");
// }, 5000);

// Toggle class on click
$('.menu-btn').click(function() {
  $('.menu-btn').stop().toggleClass('active');
  $('.nav-section, .main-section, .aside-section, .footer-section').stop().toggleClass('toggled');
  $('.header-section').stop().toggleClass('menu-opened');
});

// Smooth scroll
$('a[href^="#"]').on('click', function(event) {
  var target = $(this.getAttribute('href'));
  if( target.length ) {
    event.preventDefault();
    $('html, body').stop().animate( {
      scrollTop: target.offset().top
    }, 200);
  }
});

// Cookie consent 
setTimeout(function () {
  $(".cookie-consent").fadeIn(200);
}, 4000);
$(".close-cookie-consent, .accept-cookie-consent").click(function() {
  $(".cookie-consent").fadeOut(200);
});

// Detect if user is using TAB to navigate
function handleFirstTab(e) {
  if (e.keyCode === 9) {
    document.body.classList.add('tab-used');
    window.removeEventListener('keydown', handleFirstTab);
  }
}
window.addEventListener('keydown', handleFirstTab);

// Accordion (main-navigation)
$('.main-nav .menu-item-has-children > a').click(function(e) {
  e.preventDefault();

  var $this = $(this);

  if ($this.next().hasClass('show')) {
    $this.next().removeClass('show');
    $this.next().slideUp(200);
  } else {
    $this.parent().parent().find('li .sub-menu').removeClass('show');
    $this.parent().parent().find('li .sub-menu').slideUp(200);
    $this.next().toggleClass('show');
    $this.next().slideToggle(200);
  }
});
