<div id="fenetreDon" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50 opacity-0 transition-opacity duration-300">
    <div id="contenuModal"
        class="bg-white rounded-lg shadow-lg w-11/12 md:w-2/3 lg:w-1/2 relative p-6 transform scale-95 transition-transform duration-300">

        <button id="fermerModal"
            class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-xl font-bold">&times;</button>

        <div class="flex flex-col md:flex-row items-center">
            <img src="../assets/img/don/donImage1.png" alt="illustration_egge_don" class="w-72 md:w-96 mb-4 md:mb-0 md:mr-6">

            <article class="flex-1 flex flex-col items-center">
                <div id="choixFrequence" class="flex justify-evenly items-center gap-4 p-4 rounded-lg bg-blue-200 mb-4 w-full">
                    <button id="donUnique" class="px-4 py-2 bg-white rounded hover:bg-blue-300 transition">Je donne une fois</button>
                    <div class="w-px h-6 bg-gray-300"></div>
                    <button id="donMensuel" class="px-4 py-2 bg-white rounded hover:bg-blue-300 transition">Je donne tous les mois</button>
                </div>

                <section id="montantsDons" class="grid grid-cols-2 gap-4 w-full">
                    <p class="don-montant flex items-center justify-center bg-blue-100 px-12 py-8 rounded-md text-lg cursor-pointer transition">10€</p>
                    <p class="don-montant flex items-center justify-center bg-blue-100 px-12 py-8 rounded-md text-lg cursor-pointer transition">25€</p>
                    <p class="don-montant flex items-center justify-center bg-blue-100 px-12 py-8 rounded-md text-lg cursor-pointer transition">50€</p>
                    <p class="don-montant flex items-center justify-center bg-blue-100 px-12 py-8 rounded-md text-lg cursor-pointer transition">100€</p>
                    <div class="col-span-2 bg-blue-100 px-12 py-8 rounded-md text-lg transition">
                        <input id="autreMontant" type="number" placeholder="autre"
                            class="w-full h-full bg-transparent text-center text-lg focus:outline-none focus:ring-0 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" />
                    </div>
                </section>
                <button id="ouvrir-don" class="flex items-center gap-2 bg-blue-500 text-white px-4 py-2 mt-4 rounded transform transition duration-300 hover:bg-blue-600 hover:scale-105 hover:shadow-lg">
                    <img src="assets/img/accueil/heart.svg" alt="icon_don" class="w-6">
                    Je donne
                </button>
            </article>
        </div>
    </div>
</div>

<script src="../assets/js/don_modal.js" defer></script>