const boutonOuvrirDon = document.getElementById('ouvrir-don');

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

const fondAssombri = document.getElementById('fond-assombri');
const modales = document.querySelectorAll('.modale');
const boutonFermer = document.getElementById('fermer-tout');

// 👉 OUVERTURE du don (inline dans addEventListener)
boutonOuvrirDon.addEventListener("click", () => {
    fondAssombri.classList.remove('cache');
    fondAssombri.classList.add('afficher');
    boutonFermer.classList.remove('cache');

    modales.forEach(modale => {
        modale.classList.remove('cache');
        setTimeout(() => modale.classList.add('afficher'), 10);
    });
});

boutonFermer.addEventListener('click', ()=>{
    fondAssombri.classList.remove('afficher');
    modales.forEach(modale => modale.classList.remove('afficher'));
    boutonFermer.classList.add('cache');

    setTimeout(() => {
        fondAssombri.classList.add('cache');
        modales.forEach(modale => modale.classList.add('cache'));
    }, 300);
});