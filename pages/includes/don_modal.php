<div>
    <div id="fond-assombri" class="hidden fixed inset-0 w-full h-full bg-black bg-opacity-50 z-[999] opacity-0 transition-opacity duration-400 ease-in-out"></div>

    <button id="fermer-tout" class="hidden fixed top-4 right-5 z-[999] bg-transparent border-none text-4xl text-white cursor-pointer transition-transform duration-300 ease-in-out hover:scale-110">
        &times;
    </button>

    <div id="page-image" class="hidden modale">
        <div class="image">
            <img src="../assets/img/don/donImage1.png" alt="Image don">
        </div>
    </div>

    <div id="page-don" class="hidden modale">
        <div class="conteneur-don">
            <h2>1. MON DON</h2>

            <div class="type-don">
                <button class="bouton-don-unique actif">Je donne une fois</button>
                <label>
                    <input type="radio" name="frequence" checked>
                    Je donne tous les mois
                </label>
            </div>

            <div class="montants-don">
                <button class="bouton-montant">50 €</button>
                <button class="bouton-montant">100 €</button>
                <button class="bouton-montant">150 €</button>
                <button class="bouton-montant">200 €</button>
                <input type="text" placeholder="Montant libre" class="champ-libre">
            </div>

            <button class="bouton-etape-suivante">PASSER À L'ÉTAPE SUIVANTE</button>
        </div>
    </div>
    <script src="../assets/js/don_modal.js" defer></script>
</div>