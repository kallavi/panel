// Scroll olayını dinlemek scroll
window.addEventListener('scroll', function () {
  console.log("headerfixed");
  var header = document.querySelector('header');
  console.log("test")

  // Yüksekliği kontrol ederek 'fixed' sınıfı eklenir
  if (window.pageYOffset > 135) {
    header.classList.add('fixed');
  } else {
    header.classList.remove('fixed');
  }
});

function checkScreenSize() {
  if (window.innerWidth <= 992) {
    console.log("ww");
    $('.dropdown').off('show.bs.dropdown').on('show.bs.dropdown', function () {
      $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

    // Add slideUp animation to Bootstrap dropdown when collapsing.
    $('.dropdown').off('hide.bs.dropdown').on('hide.bs.dropdown', function () {
      $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });
  }
}

$(document).ready(function () {
  checkScreenSize();

  // Add an event listener for the window resize event
  $(window).on('resize', function () {
    checkScreenSize();
  });
});
window.addEventListener('load', function () {
  if ($('.preloader').length) {
    $('.preloader').fadeOut('slow');
  }
});



$('#review-image').change(function (e) {
  let fileName = (e.target.files.length > 0) ? e.target.files[0].name : 'choose_file_not';
  $('#review-image-label').text(fileName);
})
// mobil hamburger menu bbutonu tıklandıgındaki işlevler icin
var navbarToggler = document.querySelector('.navbar-toggler');
var navbarTogglerParent = document.querySelector('header');
var body = document.querySelector('body');

navbarToggler.addEventListener('click', function () {
  if (navbarToggler.classList.contains('active')) {
    navbarToggler.classList.remove('active');
    navbarTogglerParent.classList.remove('active');
    body.style.overflow = 'auto'; // Overflow'u yeniden etkinleştir
  } else {
    navbarToggler.classList.add('active');
    navbarTogglerParent.classList.add('active');
    body.style.overflow = 'hidden'; // Overflow'u devre dışı bırak
  }
});

var $titleText = $(".subBannerContainer").find("h1").text();
var $titleBackText = $(".subBannerContainer").find(".backTitle").text();

$(".subBannerContainer").find(".backTitle").text($titleText)
console.log($titleText)
console.log($titleBackText)

//footer dropdown text change
$('footer .languageButton.dropdown').off('show.bs.dropdown').on('show.bs.dropdown', function () {
  $(this).addClass("active")
  $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
});
$('footer .languageButton.dropdown').off('hide.bs.dropdown').on('hide.bs.dropdown', function () {
  $(this).removeClass("active")
  $(this).find('.dropdown-menu').first().stop(true, true).fadeOut();
});

$("footer .dropdown .dropdown-item.selected").css('display', 'none');
$("footer .dropdown .dropdown-item").click(function () {

  var $this = $(this),
    $thisText = $this.text();

  $this.closest(".dropdown").find(".dropdown-toggle").text($thisText);
  $("footer .dropdown .dropdown-item").removeClass("selected").css('display', 'block');
  $this.addClass("selected").css('display', 'none');
})

var swiper = new Swiper(".carouselSlider", {
  slidesPerView: 1,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});


// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})();

// Sayfa yüklendiğinde ve pencere boyutu değiştiğinde kontrol edin
// Modal gösterildiğinde
$('.modal').on('shown.bs.modal', function () {
  // Sayfa kaydırmasını engelle
  document.documentElement.style.overflow = 'hidden';
});

// Modal kapatıldığında
$('.modal').on('hidden.bs.modal', function () {
  // Sayfa kaydırmasını etkinleştir
  document.documentElement.style.overflow = 'auto';
});


//MaviBlog Slider
var swiper = new Swiper(".maviBlogSlider", {
  centeredSlides: true,
  slidesPerView: 2,
  spaceBetween: 30,
  loop: true,
  navigation: {
    nextEl: ".proje-button-next",
    prevEl: ".proje-button-prev",
  },
  breakpoints: {
    640: {
      centeredSlides: true,
      slidesPerView: 2,
      spaceBetween: 30,
    },
    768: {
      centeredSlides: true,
      slidesPerView: 3,
      spaceBetween: 30,
    },

    1024: {
      slidesPerView: 5,
      spaceBetween: 30,
      freeMode: true,
    }
  },
});