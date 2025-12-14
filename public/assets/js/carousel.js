const slides = document.getElementById("slides");
const totalSlides = document.querySelectorAll("#slides .slide").length;
let currentIndex = 0;

document.getElementById("next-mission").addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateCarousel();
});

document.getElementById("prev-mission").addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    updateCarousel();
});

function updateCarousel() {
    slides.style.transform = `translateX(-${currentIndex * 100}%)`;
}