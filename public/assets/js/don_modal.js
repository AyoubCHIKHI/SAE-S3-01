const fenetreDon = document.getElementById("fenetreDon");
const contenuModal = document.getElementById("contenuModal");
const fermerModal = document.getElementById("fermerModal");
const montants = document.querySelectorAll(".don-montant");
const autreMontant = document.getElementById("autreMontant");
const btnsOuvrir = document.querySelectorAll(".ouvrir-don-trigger");

function ouvrirDon() {
    fenetreDon.classList.remove("hidden");
    setTimeout(() => {
        fenetreDon.classList.remove("opacity-0");
        contenuModal.classList.remove("scale-95");
    }, 10);
}

function fermerDon() {
    fenetreDon.classList.add("opacity-0");
    contenuModal.classList.add("scale-95");
    setTimeout(() => fenetreDon.classList.add("hidden"), 300);
}

btnsOuvrir.forEach(btn => {
    btn.addEventListener("click", ouvrirDon);
});
fermerModal.addEventListener("click", fermerDon);
fenetreDon.addEventListener("click", (e) => {
if (e.target === fenetreDon) fermerDon();
});


const montantInput = document.getElementById("montantInput");

montants.forEach((montant) => {
    montant.addEventListener("click", () => {
        montants.forEach((m) =>
            m.classList.remove("bg-blue-300", "border-2", "border-blue-800")
        );
        montant.classList.add("bg-blue-300", "border-2", "border-blue-800");
        autreMontant.value = "";
        montantInput.value = montant.dataset.amount;
    });
});

autreMontant.addEventListener("input", () => {
    montants.forEach((m) =>
        m.classList.remove("bg-blue-300", "border-2", "border-blue-800")
    );
    montantInput.value = autreMontant.value;
});