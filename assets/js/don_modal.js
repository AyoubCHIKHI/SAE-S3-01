

const btnOuvrirDon = document.getElementById('ouvrir-don');
const fondAssombri = document.getElementById('fond-assombri');
const modales = document.querySelectorAll('.modale');
const btnFermer = document.getElementById('fermer-tout');

function ouverture() {
    fondAssombri.classList.remove('hidden');
    fondAssombri.classList.remove('opacity-0');
    fondAssombri.classList.add('opacity-100');
    btnFermer.classList.remove('hidden');

    modales.forEach(modale => {
        modale.classList.remove('hidden');
        setTimeout(() => modale.classList.add('afficher'), 10);
    });
}

function fermeture() {
    fondAssombri.classList.add('hidden');
    fondAssombri.classList.remove('opacity-100');
    fondAssombri.classList.add('opacity-0');
    modales.forEach(modale => modale.classList.remove('afficher'));
    btnFermer.classList.add('hidden');

    setTimeout(() => {
        fondAssombri.classList.add('hidden');
        modales.forEach(modale => modale.classList.add('hidden'));
    }, 300);
}

btnOuvrirDon.addEventListener('click', ouverture);
btnFermer.addEventListener('click', fermeture);