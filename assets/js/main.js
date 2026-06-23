const langButton = document.querySelector("#lang-button");
const langMenu = document.querySelector("#lang-menu");

if (langButton && langMenu) {
  langButton.addEventListener("click", () => {
    langMenu.classList.toggle("hidden");
  });

  document.addEventListener("click", (event) => {
    if (
      !langButton.contains(event.target) &&
      !langMenu.contains(event.target)
    ) {
      langMenu.classList.add("hidden");
    }
  });
}

const carousel = document.querySelector("#lawyers-carousel");

if (carousel) {
  let isDown = false;
  let startX;
  let scrollLeft;

  carousel.addEventListener("mousedown", (e) => {
    isDown = true;
    carousel.classList.add("cursor-grabbing");
    startX = e.pageX - carousel.offsetLeft;
    scrollLeft = carousel.scrollLeft;
  });

  carousel.addEventListener("mouseleave", () => {
    isDown = false;
    carousel.classList.remove("cursor-grabbing");
  });

  carousel.addEventListener("mouseup", () => {
    isDown = false;
    carousel.classList.remove("cursor-grabbing");
  });

  carousel.addEventListener("mousemove", (e) => {
    if (!isDown) return;
    e.preventDefault();

    const x = e.pageX - carousel.offsetLeft;
    const walk = (x - startX) * 1.5;

    carousel.scrollLeft = scrollLeft - walk;
  });
}

const mobileButton = document.querySelector("#mobile-button");
const mobileMenu = document.querySelector("#mobile-menu");

const items = document.querySelectorAll(".mobile-item");

if (mobileButton && mobileMenu) {
  mobileButton.addEventListener("click", () => {
    mobileMenu.classList.toggle("hidden");

    if (!mobileMenu.classList.contains("hidden")) {
      items.forEach((item, index) => {
        setTimeout(() => {
          item.classList.add("show");
        }, index * 100);
      });
    } else {
      items.forEach((item) => {
        item.classList.remove("show");
      });
    }
  });

  mobileMenu.addEventListener("click", () => {
    mobileMenu.classList.add("hidden");

    items.forEach((item) => {
      item.classList.remove("show");
    });
  });
}
