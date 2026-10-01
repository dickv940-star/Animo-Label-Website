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

  /* Banner text detection */
  async function hideTextWhenBannerAlreadyContainsText(slide) {
    if (!slide || slide.dataset.textChecked) {
      return;
    }

    slide.dataset.textChecked = "1";

    const copy = slide.querySelector(".premium-hero-copy");

    if (!copy) {
      return;
    }

    copy.classList.add("banner-text-checking");

    const source = slide.dataset.bannerImage || "";
    let containsText = false;

    try {
      if (/\.svg(?:[?#]|$)/i.test(source)) {
        const response = await fetch(source, {
          cache: "no-store"
        });

        const svg = await response.text();

        containsText =
          /<(?:text|tspan|title|desc)\b/i.test(svg) &&
          (svg.match(/<(?:text|tspan)\b/gi) || [])
            .length > 0;
      } else if (window.Tesseract) {
        const result = await Tesseract.recognize(
          source,
          "eng",
          {
            logger: () => {}
          }
        );

        const text = (result?.data?.text || "")
          .replace(/\s+/g, " ")
          .trim();

        const confidence =
          Number(result?.data?.confidence || 0);

        const words = text
          .split(" ")
          .filter(Boolean);

        containsText =
          confidence >= 52 &&
          words.length >= 2 &&
          text.length >= 8;
      }
    } catch (error) {
      containsText = false;
    }

    copy.classList.remove("banner-text-checking");

    copy.classList.toggle(
      "banner-text-auto-hidden",
      containsText
    );
  }

  slides.forEach((slide) => {
    hideTextWhenBannerAlreadyContainsText(slide);
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
