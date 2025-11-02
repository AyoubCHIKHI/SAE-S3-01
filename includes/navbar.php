<nav class="sticky flex justify-between w-full bg-white/80 backdrop-blur-md top-0 z-50 shadow px-8 py-4 transition-transform duration-300">

    <a href="/index.php" class="flex-shrink-0">
        <img src="/assets/img/Logo.svg" alt="EGEE Logo" class="w-32 md:w-42 lg:w-44 transform transition duration-300 hover:scale-105 rounded-lg">
    </a>

    <div class="hidden md:flex gap-8 lg:gap-6 lg:mt-4 mx-auto whitespace-nowrap text-gray-500">
        <a href="/pages/nos_actions.php" class="flex gap-1 group hover:text-blue-400 ">
            Nos actions
            <svg xmlns="http://www.w3.org/2000/svg" 
                class="w-6 h-6 transform transition-transform duration-300 group-hover:-rotate-180" 
                fill="currentColor" 
                aria-hidden="true">
                <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6z"/>
            </svg>
        </a>
        <a href="/pages/egee_en_france.php" class="flex gap-1 group hover:text-blue-400">
            EGEE en France
            <svg xmlns="http://www.w3.org/2000/svg" 
                class="w-6 h-6 transform transition-transform duration-300 group-hover:-rotate-180" 
                fill="currentColor" 
                aria-hidden="true">
                <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6z"/>
            </svg>
        </a>
        <a href="/pages/nous_connaitre.php" class="relative inline-block after:block after:h-[2px] after:w-0 after:bg-blue-500 after:transition-all hover:after:w-full hover:text-black">
            Actualités
        </a>
        <a href="/pages/nous_connaitre.php" class="md:hidden lg:block relative inline-block after:block after:h-[2px] after:w-0 after:bg-blue-500 after:transition-all hover:after:w-full hover:text-black">
            Nous connaitre
        </a>
        <a href="/pages/nous_contacter.php" class="md:hidden lg:block relative inline-block after:block after:h-[2px] after:w-0 after:bg-blue-500 after:transition-all hover:after:w-full hover:text-black">
            Nous contacter
        </a>
        <button href="#" id="ouvrir-don" class="flex gap-1 transform transition duration-300 hover:scale-105 hover:text-red-500">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15.7 4C18.87 4 21 6.98 21 9.76C21 15.39 12.16 20 12 20C11.84 20 3 15.39 3 9.76C3 6.98 5.13 4 8.3 4C10.12 4 11.31 4.91 12 5.71C12.69 4.91 13.88 4 15.7 4Z"/>
            </svg>
            Faire un don
        </button>


    </div>

    <img src="/assets/img/icon_menu_burger.svg" alt="icon_menu_burger" class="md:hidden w-8 mr-4 ml-auto flex-shrink-0 transition transform hover:scale-125 cursor-pointer">
</nav>

<?php require 'don_modal.php'; ?>
