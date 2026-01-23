document.addEventListener("DOMContentLoaded", function () {
    let index = 0;

    const carousel = document.querySelector(".hero-carousel");
    const slidesContainer = carousel.querySelector(".slides");
    const slideElements = carousel.querySelectorAll(".slide");
    const nextBtn = carousel.querySelector(".next");
    const prevBtn = carousel.querySelector(".prev");

    function showSlide(i) {
        if (i >= slideElements.length) index = 0;
        if (i < 0) index = slideElements.length - 1;

        slidesContainer.style.transform = `translateX(${-index * 100}%)`;
    }

    nextBtn.addEventListener("click", () => {
        index++;
        showSlide(index);
    });

    prevBtn.addEventListener("click", () => {
        index--;
        showSlide(index);
    });

    // Autoplay
    setInterval(() => {
        index++;
        showSlide(index);
    }, 4000);
});
