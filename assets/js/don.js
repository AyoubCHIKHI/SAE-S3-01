const boutonOuvrirDon = document.getElementById('ouvrir-don');
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