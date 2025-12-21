// Mobile Menu Function
const mobileMenuBtn = document.getElementById("mobile-menu-btn");
const mobileMenu = document.getElementById("primary-menu");

mobileMenuBtn.addEventListener("click", () => {
  mobileMenu.classList.toggle("hidden");
});

// Single product page product gallery

// const galleryThumb = document.querySelector(".gallery-thumbs");

// galleryThumb.addEventListener("click", (e) => {
//   const clickItem = e.target;

//   if (clickItem.classList.contains("gallery-image")) {
//     const currentActive = galleryThumb.querySelector(".activeBorderColor");

//     if (currentActive) {
//       currentActive.classList.remove("activeBorderColor");
//     }

//     clickItem.classList.add("activeBorderColor");
//   }
// });

// document.addEventListener("DOMContentLoaded", function () {
//   const gallery = document.querySelector(".single-product-custom-gallery");
//   if (!gallery) return;

//   const mainImage = document.querySelector(".gallery-main img");
//   const galleryImage = document.querySelectorAll(".gallery-item img");

//   if (!mainImage || !galleryImage.length) return;

//   galleryImage.forEach((singleImage) => {
//     singleImage.addEventListener("click", () => {
//       mainImage.src = singleImage.dataset.full;
//     });
//   });
// });

document.addEventListener("DOMContentLoaded", function () {
  const gallery = document.querySelector(".single-product-custom-gallery");
  if (!gallery) return;

  const mainImage = gallery.querySelector(".gallery-main img");
  const galleryImages = gallery.querySelectorAll(".gallery-item img");
  const nextBtn = gallery.querySelector(".gallery-next");
  const prevBtn = gallery.querySelector(".gallery-prev");

  if (!mainImage || !galleryImages.length) return;

  let currentIndex = 0;

  function setActive(index) {
    if (index < 0) index = galleryImages.length - 1;
    if (index >= galleryImages.length) index = 0;

    currentIndex = index;

    // main image update
    mainImage.src = galleryImages[currentIndex].dataset.full;

    // active class update
    galleryImages.forEach((img) => img.classList.remove("activeBorderColor"));

    galleryImages[currentIndex].classList.add("activeBorderColor");
  }

  // init
  setActive(0);

  // thumbnail click
  galleryImages.forEach((img, index) => {
    img.addEventListener("click", () => {
      setActive(index);
    });
  });

  // next / prev
  if (nextBtn) {
    nextBtn.addEventListener("click", () => {
      setActive(currentIndex + 1);
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener("click", () => {
      setActive(currentIndex - 1);
    });
  }
});

