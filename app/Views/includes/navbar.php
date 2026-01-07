<div class="w-full">

    <input type="checkbox" id="drawer-toggle" class="hidden peer" />

    <nav class="fixed top-0 left-0 right-0 z-50 flex justify-between w-full bg-white/80 backdrop-blur-md shadow px-8 py-4 transition duration-300">
        <a href="/" class="flex-shrink-0">
            <img src="/assets/img/Logo.svg" alt="EGEE Logo" class="w-32 md:w-42 lg:w-44 transform transition duration-300 hover:scale-105 rounded-lg">
        </a>

        <div class="hidden md:flex gap-8 lg:gap-6 lg:mt-4 mx-auto whitespace-nowrap text-gray-500">
            <div class="relative group">
                <button class="flex gap-1 items-center text-gray-500 hover:text-blue-400 transition">
                    Nos actions
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transform transition-transform duration-300 group-hover:-rotate-180" fill="currentColor" aria-hidden="true">
                        <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6z" />
                    </svg>
                </button>
                <div class="absolute top-full left-0 mt-2 w-40 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transform -translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                    <a href="/nos_actions#education" class="block px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 hover:font-semibold transition">Education</a>
                    <a href="/nos_actions#emploi" class="block px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 hover:font-semibold transition">Emploi</a>
                    <a href="/nos_actions#entreprise" class="block px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 hover:font-semibold transition rounded-b-lg">Entreprise</a>
                </div>
            </div>

            <div class="relative group">
                <button class="flex gap-1 items-center text-gray-500 hover:text-blue-500 transition">
                    EGEE en France
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transform transition-transform duration-300 group-hover:-rotate-180" fill="currentColor" aria-hidden="true">
                        <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6z" />
                    </svg>
                </button>
                <div class="absolute top-full left-0 mt-2 w-60 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transform -translate-y-2 group-hover:translate-y-0 transition-all duration-300 z-50">
                    <a href="/egee_en_france" class="block px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 hover:font-semibold transition">EGEE ILE-DE-FRANCE</a>
                    <a href="/egee_en_france" class="block px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 hover:font-semibold transition">EGEE GRAND EST</a>
                    <a href="/egee_en_france" class="block px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 hover:font-semibold transition rounded-b-lg">EGEE BRETAGNE</a>
                </div>
            </div>

            <a href="/nous_connaitre" class="relative inline-block after:block after:h-[2px] after:w-0 after:bg-blue-500 after:transition-all hover:after:w-full hover:text-black">Nous connaitre</a>


            <a href="/nous_contacter" class="md:hidden lg:block relative inline-block after:block after:h-[2px] after:w-0 after:bg-blue-500 after:transition-all hover:after:w-full hover:text-black">Nous contacter</a>

            <button class="ouvrir-don-trigger flex gap-1 transform transition duration-300 hover:scale-105 hover:text-red-500">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15.7 4C18.87 4 21 6.98 21 9.76C21 15.39 12.16 20 12 20C11.84 20 3 15.39 3 9.76C3 6.98 5.13 4 8.3 4C10.12 4 11.31 4.91 12 5.71C12.69 4.91 13.88 4 15.7 4Z" />
                </svg>
                Faire un don
            </button>

            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="/admin" class="relative inline-block text-blue-600 font-semibold hover:text-blue-800">Tableau de bord</a>
            <?php endif; ?>
        </div>

        <label for="drawer-toggle" class="md:hidden w-10 h-10 flex items-center justify-center ml-auto cursor-pointer transition-transform transform hover:scale-110">
            <img src="/assets/img/icon_menu_burger.svg" alt="Menu">
        </label>
    </nav>

    <div class="mt-36"></div>

    <div id="nav_mobile" class="fixed inset-0 bg-white z-40 transform translate-x-full peer-checked:translate-x-0 transition-transform duration-300 flex flex-col p-8 gap-6 overflow-y-auto">
        <label for="drawer-toggle" class="self-end cursor-pointer p-2 hover:bg-gray-200 rounded-full transition-transform transform hover:rotate-90">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </label>


        <a href="/nous_connaitre" class="text-xl font-semibold text-gray-700 hover:text-blue-500">Nous connaitre</a>
        <a href="/nous_contacter" class="text-xl font-semibold text-gray-700 hover:text-blue-500">Nous contacter</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="/admin" class="text-xl font-semibold text-blue-600 hover:text-blue-800">Tableau de bord</a>
        <?php endif; ?>
        <button class="ouvrir-don-trigger flex gap-3 items-center text-2xl font-semibold text-red-500">
            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15.7 4C18.87 4 21 6.98 21 9.76C21 15.39 12.16 20 12 20C11.84 20 3 15.39 3 9.76C3 6.98 5.13 4 8.3 4C10.12 4 11.31 4.91 12 5.71C12.69 4.91 13.88 4 15.7 4Z" />
            </svg>
            Faire un don
        </button>

        <details class="group">
            <summary class="flex justify-between items-center cursor-pointer text-xl font-semibold text-gray-700 hover:text-blue-500 list-none py-2">
                Nos actions
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 transition-transform duration-300 group-open:rotate-180" fill="currentColor">
                    <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6z" />
                </svg>
            </summary>
            <div class="flex flex-col mt-2 pl-6 border-l border-gray-200">
                <a href="/nos_actions#education" class="py-3 text-lg text-gray-700 hover:text-blue-500">Education</a>
                <a href="/nos_actions#emploi" class="py-3 text-lg text-gray-700 hover:text-blue-500">Emploi</a>
                <a href="/nos_actions#entreprise" class="py-3 text-lg text-gray-700 hover:text-blue-500">Entreprise</a>
            </div>
        </details>

        <details class="group">
            <summary class="flex justify-between items-center cursor-pointer text-xl font-semibold text-gray-700 hover:text-blue-500 list-none py-2">
                EGEE en France
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 transition-transform duration-300 group-open:rotate-180" fill="currentColor">
                    <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6z" />
                </svg>
            </summary>
            <div class="flex flex-col mt-2 pl-6 border-l border-gray-200">
                <a href="/egee_en_france" class="py-3 text-lg text-gray-700 hover:text-blue-500">EGEE ILE-DE-FRANCE</a>
                <a href="/egee_en_france" class="py-3 text-lg text-gray-700 hover:text-blue-500">EGEE GRAND EST</a>
                <a href="/egee_en_france" class="py-3 text-lg text-gray-700 hover:text-blue-500">EGEE BRETAGNE</a>
            </div>
        </details>
    </div>

</div>

<?php require __DIR__ . '/don_modal.php'; ?>