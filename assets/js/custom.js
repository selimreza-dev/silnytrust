/**
 * Header Search for style toggle
 **/
const searchBtn = document.getElementById("header-search-btn");
const searchForm = document.getElementById("header-search-area");

// Toggle on button click
searchBtn.addEventListener("click", (e) => {
  e.stopPropagation();
  searchForm.classList.toggle("active");
});

// Prevent click inside search area
searchForm.addEventListener("click", (e) => {
  e.stopPropagation();
});

// Hide when clicking outside
document.addEventListener("click", () => {
  if (searchForm.classList.contains("active")) {
    searchForm.classList.remove("active");
  }
});

// Mobile Menu Button style

// humberger btn
const openBtn = document.querySelector(".open-btn");
const closeBtn = document.querySelector(".close-btn");
openBtn.addEventListener("click", () => {
  openBtn.classList.add("hidden");
  closeBtn.classList.remove("hidden");
});
closeBtn.addEventListener("click", () => {
  openBtn.classList.remove("hidden");
  closeBtn.classList.add("hidden");
});

// toggle option
const mobileMenuBtn = document.getElementById("mobile-menu-open-close");
const mobileMenu = document.getElementById("primary-menu");
mobileMenuBtn.addEventListener("click", () => {
  mobileMenu.classList.toggle("open");
});

// Scroll to top button function
// get the clickable butotn
const scrollTopBtn = document.getElementById("scroll-top-btn");

//after 20% scroll to work
window.onscroll = function () {
  scrollToTopFunction();
};
function scrollToTopFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    scrollTopBtn.style.display = "block";
  } else {
    scrollTopBtn.style.display = "none";
  }
}
scrollTopBtn.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

// ==================================
// Custom Mini Cart
// =================================

document.addEventListener("click", function (e) {
  // open mini cart
  if (e.target.closest(".mini-cart-icon")) {
    const cartBox = document.querySelector(".mini-cart");
    if (cartBox) {
      cartBox.classList.add("open");
    }
  }

  if (e.target.closest("#cart-close-btn")) {
    const cartBox = document.querySelector(".mini-cart");
    if (cartBox) {
      cartBox.classList.remove("open");
    }
  }
});
