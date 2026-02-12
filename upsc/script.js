// Toggle Animation by Class
$(window).scroll(function () {
  if ($(document).scrollTop() > 200) {
    $("nav").addClass("sticky-top");
    $("nav").removeClass("nav_color");
  } else {
    $("nav").removeClass("sticky-top");
    $("nav").addClass("nav_color");
  }
});

// hide text to know more

function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}
