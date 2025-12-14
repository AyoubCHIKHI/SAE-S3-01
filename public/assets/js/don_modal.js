const fenetreDon = document.getElementById("fenetreDon");
const contenuModal = document.getElementById("contenuModal");
const fermerModal = document.getElementById("fermerModal");
const montants = document.querySelectorAll(".don-montant");
const autreMontant = document.getElementById("autreMontant");
const btnOuvrir = document.getElementById("ouvrir-don");

window.ouvrirDon = function () {
fenetreDon.classList.remove("hidden");
setTimeout(() => {
    fenetreDon.classList.remove("opacity-0");
    contenuModal.classList.remove("scale-95");
}, 10);
};

function fermerDon() {
fenetreDon.classList.add("opacity-0");
contenuModal.classList.add("scale-95");
setTimeout(() => fenetreDon.classList.add("hidden"), 300);
}

btnOuvrir.addEventListener("click", ouvrirDon);
fermerModal.addEventListener("click", fermerDon);
fenetreDon.addEventListener("click", (e) => {
if (e.target === fenetreDon) fermerDon();
});

montants.forEach((montant) => {
montant.addEventListener("click", () => {
    montants.forEach((m) =>
    m.classList.remove("bg-blue-300", "border-2", "border-blue-800")
    );
    montant.classList.add("bg-blue-300", "border-2", "border-blue-800");
    autreMontant.value = "";
});
});

autreMontant.addEventListener("input", () => {
montants.forEach((m) =>
    m.classList.remove("bg-blue-300", "border-2", "border-blue-800")
);
});