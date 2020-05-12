
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}
// Slideshow
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var thumbs = document.getElementsByClassName("thumbs");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < thumbs.length; i++) {
    thumbs[i].className = thumbs[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  thumbs[slideIndex-1].className += " active";
}
