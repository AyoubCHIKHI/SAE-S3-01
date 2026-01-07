<div id="fenetreDon" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50 opacity-0 transition-opacity duration-300">
    <div id="contenuModal" class="bg-white rounded-lg shadow-lg w-11/12 md:w-2/3 lg:w-1/2 relative p-6 transform scale-95 transition-transform duration-300">
        <button id="fermerModal"
            class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-xl font-bold">&times;</button>

        <div class="flex flex-col md:flex-row items-center">
            <img src="/assets/img/don/donImage1.png" alt="illustration_egge_don" class="w-72 md:w-96 mb-4 md:mb-0 md:mr-6">

            <article class="flex-1 flex flex-col items-center ">
                <form action="/don/store" method="POST" class="w-full flex flex-col items-center">
                    <div class="flex items-center gap-x-4 py-8">
                        <label for="type_don_unique" class="text-base text-gray-700">Je donne une fois</label>
                        <label for="toggle_don" class="relative inline-block w-14 h-8 cursor-pointer">
                            <input type="checkbox" id="toggle_don" class="peer sr-only">
                            <span class="absolute inset-0 bg-gray-300 rounded-full transition-colors duration-200 ease-in-out 
                        peer-checked:bg-blue-600 peer-disabled:bg-gray-200 peer-disabled:opacity-60">
                            </span>
                            <span class="absolute top-1/2 left-1 -translate-y-1/2 size-6 bg-white rounded-full shadow-md 
                        transition-transform duration-200 ease-in-out peer-checked:translate-x-6">
                            </span>
                        </label>
                        <label for="type_don_recur" class="text-base text-gray-700">Je donne tous les mois</label>
                    </div>

                    <div class="w-full grid grid-cols-2 gap-4 mb-4">
                        <input type="text" name="prenom" placeholder="Prénom" required class="border rounded p-2 w-full" />
                        <input type="text" name="nom" placeholder="Nom" required class="border rounded p-2 w-full" />
                    </div>
                    <div class="w-full grid grid-cols-2 gap-4 mb-4">
                        <input type="email" name="email" placeholder="Email" required class="border rounded p-2 w-full" />
                        <input type="tel" name="telephone" placeholder="Téléphone" class="border rounded p-2 w-full" />
                    </div>
                    <textarea name="message" placeholder="Un petit message ? (optionnel)" class="border rounded p-2 w-full mb-4 h-24"></textarea>

                    <input type="hidden" name="montant" id="montantInput" value="" required>

                    <section id="montantsDons" class="grid grid-cols-2 gap-4 w-full">
                        <p class="don-montant flex items-center justify-center bg-blue-100 px-12 py-8 rounded-md text-lg cursor-pointer transition" data-amount="10">10€</p>
                        <p class="don-montant flex items-center justify-center bg-blue-100 px-12 py-8 rounded-md text-lg cursor-pointer transition" data-amount="25">25€</p>
                        <p class="don-montant flex items-center justify-center bg-blue-100 px-12 py-8 rounded-md text-lg cursor-pointer transition" data-amount="50">50€</p>
                        <p class="don-montant flex items-center justify-center bg-blue-100 px-12 py-8 rounded-md text-lg cursor-pointer transition" data-amount="100">100€</p>
                        <div class="col-span-2 bg-blue-100 px-12 py-8 rounded-md text-lg transition">
                            <input id="autreMontant" type="number" placeholder="Autre montant"
                                class="w-full h-full bg-transparent text-center text-lg focus:outline-none focus:ring-0 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" />
                        </div>
                    </section>
                    <button id="ouvrir-don" type="submit" class="flex items-center gap-2 bg-blue-500 text-white px-4 py-2 mt-4 rounded transform transition duration-300 hover:bg-blue-600 hover:scale-105 hover:shadow-lg">
                        <img src="/assets/img/accueil/heart.svg" alt="icon_don" class="w-6">
                        Je donne
                    </button>
                </form>
            </article>
        </div>
    </div>
</div>

<script src="/assets/js/don_modal.js" defer></script>