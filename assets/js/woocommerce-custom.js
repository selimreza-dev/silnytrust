// single product page gallery

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

// single product page quantity button
document.addEventListener("click", function (e) {
  if (
    e.target.classList.contains("plus-btn") ||
    e.target.classList.contains("minus-btn")
  ) {
    const button = e.target;
    const quantityContainer = button.parentElement;
    const input = quantityContainer.querySelector("input.qty");
    let val = parseFloat(input.value) || 0;
    const step = parseFloat(input.getAttribute("step")) || 1;
    const min = parseFloat(input.getAttribute("min")) || 0;
    const max = parseFloat(input.getAttribute("max")) || Infinity;

    if (button.classList.contains("plus-btn")) {
      if (val < max) input.value = val + step;
    } else {
      if (val > min) input.value = val - step;
    }

    // Trigger change event for compatibility
    input.dispatchEvent(new Event("change", { bubbles: true }));
  }
});

// cart page
// custom quantity

document.addEventListener("DOMContentLoaded", function () {
  document.body.addEventListener("click", function (e) {
    if (!e.target.classList.contains("qty-btn")) return;

    const wrap = e.target.closest(".qty-wrap");
    if (!wrap) return;

    const input = wrap.querySelector("input.qty");
    if (!input) return;

    let value = parseInt(input.value, 10) || 0;
    const min = parseInt(input.min, 10) || 0;
    const max = input.max ? parseInt(input.max, 10) : Infinity;

    if (e.target.classList.contains("plus") && value < max) {
      input.value = value + 1;
    }

    if (e.target.classList.contains("minus") && value > min) {
      input.value = value - 1;
    }

    // WooCommerce will read this when Update Cart is clicked
    input.dispatchEvent(new Event("change", { bubbles: true }));
  });
});

// Product Ajax Search

document.addEventListener("DOMContentLoaded", function () {
  const input = document.getElementById("wc-ajax-search-input");
  const resultsBox = document.getElementById("wc-ajax-search-results");

  let timer = null;

  input.addEventListener("keyup", function () {
    const keyword = this.value.trim();

    clearTimeout(timer);

    timer = setTimeout(() => {
      if (keyword.length < 2) {
        resultsBox.style.display = "none";
        resultsBox.innerHTML = "";
        return;
      }

      const formData = new FormData();
      formData.append("action", "wc_ajax_product_search");
      formData.append("keyword", keyword);

      fetch(wc_ajax_search.ajax_url, {
        method: "POST",
        body: formData,
      })
        .then((response) => response.text())
        .then((data) => {
          resultsBox.innerHTML = data;
          resultsBox.style.display = "block";
        })
        .catch((error) => {
          console.error("Search error:", error);
        });
    }, 300);
  });
});
