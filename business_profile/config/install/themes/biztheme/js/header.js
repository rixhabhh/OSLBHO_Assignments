
(function($){


//     $(document).ready(function() {
//         let selectHeader = select('#navbar')
//         if (selectHeader) {
//         let headerOffset = selectHeader.offsetTop
//         let nextElement = selectHeader.nextElementSibling
//         const headerFixed = () => {
//         if ((headerOffset - window.scrollY) <= 0) {
//         selectHeader.classList.add('fixed-top')
//         nextElement.classList.add('scrolled-offset')
//         } else {
//         selectHeader.classList.remove('fixed-top')
//         nextElement.classList.remove('scrolled-offset')
//     }
//   }
//   window.addEventListener('load', headerFixed)
//   onscroll(document, headerFixed)

//         }
//       }

// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}



}(jQuery));
