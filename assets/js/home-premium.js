/* =========================================================
   ANIMO LABEL — HOMEPAGE INTERACTIONS
   ---------------------------------------------------------
   Banner slider, mobile menu, dan pencarian header.
========================================================= */

document.addEventListener("DOMContentLoaded", () => {
  const slides = [
    ...document.querySelectorAll(".premium-slide")
  ];

  const dots = document.querySelector(".premium-dots");
  const previousButton = document.querySelector(".premium-prev");
  const nextButton = document.querySelector(".premium-next");
  const navigation = document.querySelector(".premium-nav");
  const mobileMenu = document.querySelector(".mobile-menu-btn");

  let currentSlide = 0;
  let slideTimer;

  /* Mobile navigation */
  if (mobileMenu && navigation) {
    mobileMenu.addEventListener("click", () => {
      navigation.classList.toggle("open");
    });

    navigation
      .querySelectorAll("a")
      .forEach((link) => {
        link.addEventListener("click", () => {
          navigation.classList.remove("open");
        });
      });
  }

  /* Header product search */
  document
    .querySelectorAll(".premium-search")
    .forEach((form) => {
      const input = form.querySelector("input");
      const clearButton =
        form.querySelector(".header-search-clear");

      if (!input) {
        return;
      }

      function syncSearchState() {
        form.classList.toggle(
          "has-value",
          Boolean(input.value.trim())
        );
      }

      input.addEventListener("input", syncSearchState);

      clearButton?.addEventListener("click", () => {
        input.value = "";
        syncSearchState();
        input.focus();
      });

      syncSearchState();
    });

  /* Banner tampil langsung — tanpa OCR/Tesseract atau request tambahan. */
  slides.forEach((slide) => {
    slide.classList.remove("banner-text-checking", "banner-text-auto-hidden");
  });

  /* Preload semua banner agar perpindahan slide tidak menunggu network. */
  slides.forEach((slide) => {
    const source = slide.dataset.bannerImage || "";
    if (!source) return;
    const image = new Image();
    image.decoding = "async";
    image.src = source;
  });

  if (slides.length < 2) {
    return;
  }

  /* Banner dots */
  slides.forEach((slide, index) => {
    const dot = document.createElement("button");

    dot.className =
      "premium-dot" + (index === 0 ? " active" : "");

    dot.type = "button";

    dot.setAttribute(
      "aria-label",
      `Banner ${index + 1}`
    );

    dot.addEventListener("click", () => {
      goToSlide(index);
    });

    dots?.appendChild(dot);
  });

  function renderSlides() {
    slides.forEach((slide, index) => {
      slide.classList.toggle(
        "active",
        index === currentSlide
      );
    });

    if (dots) {
      [...dots.children].forEach((dot, index) => {
        dot.classList.toggle(
          "active",
          index === currentSlide
        );
      });
    }

    hideTextWhenBannerAlreadyContainsText(
      slides[currentSlide]
    );
  }

  function goToSlide(index) {
    currentSlide =
      (index + slides.length) % slides.length;

    renderSlides();
    restartAutoplay();
  }

  function restartAutoplay() {
    clearInterval(slideTimer);

    slideTimer = setInterval(() => {
      goToSlide(currentSlide + 1);
    }, 6000);
  }

  previousButton?.addEventListener("click", () => {
    goToSlide(currentSlide - 1);
  });

  nextButton?.addEventListener("click", () => {
    goToSlide(currentSlide + 1);
  });

  const hero = document.querySelector(".premium-hero");

  hero?.addEventListener("mouseenter", () => {
    clearInterval(slideTimer);
  });

  hero?.addEventListener("mouseleave", restartAutoplay);

  restartAutoplay();
});
