/* =========================================================
   ANIMO LABEL — SLIDER KATEGORI HOMEPAGE
   ---------------------------------------------------------
   Khusus tombol, progress bar, dan autoplay kategori.
========================================================= */

document.addEventListener("DOMContentLoaded", () => {
  const slider = document.getElementById("categorySlider");

  if (!slider) {
    return;
  }

  const previousButton = document.getElementById("categoryPrev");
  const nextButton = document.getElementById("categoryNext");
  const progressBar = document.getElementById("categoryProgress");

  let autoplayTimer;

  function getStep() {
    const card = slider.querySelector(".premium-category");

    if (!card) {
      return 300;
    }

    return card.getBoundingClientRect().width + 18;
  }

  function updateProgress() {
    const maxScroll = slider.scrollWidth - slider.clientWidth;

    if (!progressBar) {
      return;
    }

    const percentage =
      maxScroll > 0
        ? (slider.scrollLeft / maxScroll) * 100
        : 100;

    progressBar.style.width = percentage + "%";
  }

  function move(direction) {
    slider.scrollBy({
      left: getStep() * direction,
      behavior: "smooth"
    });
  }

  function startAutoplay() {
    clearInterval(autoplayTimer);

    autoplayTimer = setInterval(() => {
      const atEnd =
        slider.scrollLeft + slider.clientWidth >=
        slider.scrollWidth - 5;

      if (atEnd) {
        slider.scrollTo({
          left: 0,
          behavior: "smooth"
        });

        return;
      }

      move(1);
    }, 3500);
  }

  previousButton?.addEventListener("click", () => {
    move(-1);
  });

  nextButton?.addEventListener("click", () => {
    move(1);
  });

  slider.addEventListener("scroll", updateProgress, {
    passive: true
  });

  slider.addEventListener("mouseenter", () => {
    clearInterval(autoplayTimer);
  });

  slider.addEventListener("mouseleave", startAutoplay);

  slider.addEventListener(
    "touchstart",
    () => {
      clearInterval(autoplayTimer);
    },
    { passive: true }
  );

  slider.addEventListener(
    "touchend",
    startAutoplay,
    { passive: true }
  );

  updateProgress();
  startAutoplay();
});
