// JAVASCRIPT FOR SLIDE REVIEWS
var swiper = new Swiper(".slider-content", {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

// JAVASCRIPT FOR  DROPDOWN MENU
document.addEventListener('DOMContentLoaded', function() {
  var dropbtn = document.querySelector('.dropbtn');
  var dropdownContent = document.querySelector('.dropdown-content');

  dropbtn.addEventListener('mouseover', function() {
      dropdownContent.style.display = 'block';
  });

  document.addEventListener('click', function(event) {
      if (!dropbtn.contains(event.target) && !dropdownContent.contains(event.target)) {
          dropdownContent.style.display = 'none';
      }
  });
});



