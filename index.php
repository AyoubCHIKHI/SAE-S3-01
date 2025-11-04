<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bénévolat de compétences - Association EGEE | Des seniors bénévoles au service de vos projets</title>
    <link rel="stylesheet" href="assets/css/don.css">

    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <script src="assets/js/carousel.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php'; ?>

    <article id="hero_section" class="flex flex-col-reverse md:flex-row gap-4 md:gap-16 lg:gap-52 justify-center items-center py-12">
        <section class="flex flex-col justify-center items-center mt-16">
            <div id="slogan_large" class="text-2xl md:text-4xl lg:text-5xl md:pl-12 font-bold whitespace-nowrap">
                <p>Transmetrre le savoir,</p>
                <p class="indent-8">construire <span id="bloc_blue" class="">l'avenir</span></p>
            </div>

            <p class="text-center md:w-[22rem] text-base py-8">
                Chacun peut avoir besoin d’un oeil extérieur, averti, objectif et lucide sur le monde du travail.
            </p>

            <div class="flex flex-col md:flex-row gap-4 md:gap-8 lg:gap-16">
                <button id="ouvrir-don" class="flex items-center gap-2 bg-blue-500 text-white px-4 py-2 rounded transform transition duration-300 hover:bg-blue-600 hover:scale-105 hover:shadow-lg">
                    <img src="assets/img/accueil/heart.svg" alt="icon_don" class="w-6">
                    Faire un don
                </button>

                <button onclick="location.href='/pages/nos_actions.php'" class="flex items-center gap-2 text-black px-4 py-2 border border-blue-500 rounded transform transition duration-300 hover:bg-blue-50 hover:scale-105 hover:shadow-lg">
                    <img src="assets/img/accueil/play.svg" alt="icon_don" class="w-6">
                    Nos actions
                </button>
            </div>
        </section>

        <section class="w-64 h-48 md:w-96 md:h-72 min-w-64 overflow-hidden rounded-lg md:mr-16">
            <img src="assets/img/accueil/hero_image.png" alt="hero_section_illustration"
                class="rounded border-4 border-blue-300 object-cover w-full h-full">
        </section>

    </article>

    <article id="notre_mission" class="flex flex-col bg-blue-300 justify-center items-center mt-16 py-16">

        <div class="flex justify-center items-center text-blue-950 gap-4">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" version="1.1" id="Layer_1" viewBox="0 0 511.999 511.999" xml:space="preserve">
                <path d="M297.607,4.825H196.939c-9.024,0-16.339,7.316-16.339,16.339c0,10.57,0,92.615,0,106.756L89.01,310.019l120.683-46.653    c4.103-1.586,8.673-1.45,12.677,0.377l76.878,35.096l-85.97-170.919v-25.596h84.328c9.024,0,16.339-7.316,16.339-16.339V21.165    C313.946,12.141,306.63,4.825,297.607,4.825z" />
                <path d="M392.12,483.493c-15.622-31.061-53.925-107.224-69.417-138.024l-107.645-49.142L67.135,353.511L1.759,483.493    c-5.454,10.845,2.437,23.681,14.596,23.681h361.168C389.66,507.174,397.584,494.355,392.12,483.493z" />
                <path d="M510.239,483.493L392.12,248.656c-6.028-11.988-23.177-11.965-29.194,0l-26.167,52.031    c32.068,63.755,12.981,25.806,84.556,168.123c6.114,12.155,6.867,25.909,2.423,38.364h71.905    C507.785,507.174,515.702,494.352,510.239,483.493z" />
            </svg>
            <p class="font-bold text-3xl">Notre mission</p>
        </div>

        <div id="carousel-mission" class="relative flex justify-center items-center w-full overflow-hidden">
            <div id="slides" class="flex transition-transform duration-700 ease-in-out">
                <div class="slide w-full flex-shrink-0 flex justify-center items-center">
                    <p class="text-start text-xl w-[16em] md:w-[32em] py-16">
                        Nos bénévoles informent, écoutent, conseillent et mentorent les jeunes pour leur ouvrir la voie de choix éclairés et les aider à maîtriser leurs démarches, leur parcours professionnel, rebondir ou se repositionner.
                    </p>
                </div>

                <div class="slide w-full flex-shrink-0 flex justify-center items-center">
                    <p class="text-start text-xl w-[16em] md:w-[32em] py-16">
                        Nous accompagnons également <b>les entrepreneurs</b> dans leurs projets, qu’il s’agisse de création, de développement ou de transition, pour favoriser la réussite et la pérennité de leurs entreprises.
                    </p>
                </div>

                <div class="slide w-full flex-shrink-0 flex justify-center items-center">
                    <p class="text-center text-xl w-[16em] md:w-[32em] py-16">
                        EGEE s’engage à <b>transmettre l’expérience</b> et les compétences des seniors au service des générations futures et du tissu économique français.</p>
                </div>

            </div>
        </div>

        <div class="flex gap-8 pt-4">
            <button id="prev-mission">
                <img src="assets/img/left-arrow.svg" alt="flèche gauche" class="w-8 transform transition duration-300 hover:scale-105">
            </button>

            <button id="next-mission" class="flex justify-center items-center w-10 rounded-xl bg-blue-500 transform transition duration-300 hover:bg-blue-600 hover:scale-105 hover:shadow-lg">
                <img src="assets/img/arrow-sm-right.svg" alt="flèche droite" class="w-10">
            </button>
        </div>

    </article>

    <article id="nos_actions" class="flex flex-col justify-center items-center bg-blue-200 pt-20 pb-12">
        <div class="flex justify-center items-center text-blue-950 gap-4 mb-12">
            <img class="w-7" src="assets/img/accueil/ic_nos_actions.svg" alt="Hand_Charity_Heart_icon">
            <p class="font-bold text-3xl">Nos actions</p>
        </div>

        <section id="présentation_action" class="flex flex-col md:flex-row justify-between items-center w-full lg:w-auto lg:gap-20 mx-12">

            <div class="flex flex-col items-center justify-center w-72 gap-3 transform transition duration-300 hover:bg-blue-50 hover:scale-105 hover:shadow-lg rounded-md py-4 cursor-pointer">
                <img src="assets/img/accueil/education.png" alt="les_étudiants" class="w-62 h-52 md:w-44 md:h-56 rounded-md object-cover">
                <p class="font-bold text-xl">Education</p>
                <p class="text-center text-sm lg:text-base">Préparer les jeunes à leur future vie professionnelle</p>
                <a href="education.php" class="hidden md:block">
                    <div class="w-8 h-8 rounded-full bg-black mt-4">
                        <img src="assets/img/cheveron-right.svg" class="w-48">
                    </div>
                </a>
            </div>

            <div class="flex flex-col items-center justify-center w-72 gap-3 md:mb-28 transform transition duration-300 hover:bg-blue-50 hover:scale-105 hover:shadow-lg rounded-md py-4 cursor-pointer">
                <img src="assets/img/accueil/emploie.png" alt="" class="w-62 h-52 rounded-md object-cover">
                <p class="font-bold text-xl">Emploi</p>
                <p class="text-center text-base">Accompagner l’entrée dans la vie active et le retour à l’emploi</p>
                <a href="emploie.php" class="hidden md:block">
                    <div class="w-8 h-8 rounded-full bg-black mt-4">
                        <img src="assets/img/cheveron-right.svg" class="w-8">
                    </div>
                </a>
            </div>

            <div class="flex flex-col items-center justify-center w-72 gap-3 transform transition duration-300 hover:bg-blue-50 hover:scale-105 hover:shadow-lg rounded-md py-4 cursor-pointer">
                <img src="assets/img/accueil/entreprise.webp" alt="" class="w-62 h-52 md:w-44 md:h-56 rounded-md object-cover">
                <p class="font-bold text-xl">Entreprise</p>
                <p class="text-center text-sm lg:text-base">Soutenir les entrepreneurs dans la création, la croissance et les difficultés</p>
                <a href="entreprise.php" class="hidden md:block">
                    <div class="w-8 h-8 rounded-full bg-black mt-4">
                        <img src="assets/img/cheveron-right.svg" class="w-8">
                    </div>
                </a>
            </div>

        </section>

    </article>

    <article id="faites_un_don" class="flex flex-col items-center justify-center py-32">

        <div class="flex justify-center items-center text-blue-500 gap-2 pb-8">
            <p class="font-bold text-4xl ">
                Faites un don
            </p>
            <svg class="w-8 h-8 rotate-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15.7 4C18.87 4 21 6.98 21 9.76C21 15.39 12.16 20 12 20C11.84 20 3 15.39 3 9.76C3 6.98 5.13 4 8.3 4C10.12 4 11.31 4.91 12 5.71C12.69 4.91 13.88 4 15.7 4Z" />
            </svg>
        </div>

        <p class="text-center text-xl w-[16em] md:w-[28em]">
            Votre soutien est essentiel à notre mission !
            Ensemble, aidons les jeunes à mieux construire leur avenir professionnel.
        </p>

        <div class="flex items-center gap-x-4 pt-6">
            <label for="toggle_don" class="text-base text-gray-700">Une fois</label>
            <label for="toggle_don" class="relative inline-block w-14 h-8 cursor-pointer">
                <input type="checkbox" id="toggle_don" class="peer sr-only">
                <span class="absolute inset-0 bg-gray-300 rounded-full transition-colors duration-200 ease-in-out 
                    peer-checked:bg-blue-600 peer-disabled:bg-gray-200 peer-disabled:opacity-60">
                </span>
                <span class="absolute top-1/2 left-1 -translate-y-1/2 size-6 bg-white rounded-full shadow-md 
                    transition-transform duration-200 ease-in-out peer-checked:translate-x-6">
                </span>
            </label>
            <label for="toggle_don" class="text-base text-gray-700">Chaque mois</label>
        </div>


        <section id="proposition_montant" class="grid grid-cols-2 md:grid-cols-3 gap-4 py-8">

            <p class="flex items-center justify-center h-28 w-44 bg-blue-100 rounded-md text-lg transform transition hover:bg-blue-300 hover:border-2 hover:border-blue-800 duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">10€</p>
            <p class="flex items-center justify-center h-28 w-44 bg-blue-100 rounded-md text-lg transform transition hover:bg-blue-300 hover:border-2 hover:border-blue-800 duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">25€</div>
            <p class="flex items-center justify-center h-28 w-44 bg-blue-100 rounded-md text-lg transform transition hover:bg-blue-300 hover:border-2 hover:border-blue-800 duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">50€</div>
            <p class="flex items-center justify-center h-28 w-44 bg-blue-100 rounded-md text-lg transform transition hover:bg-blue-300 hover:border-2 hover:border-blue-800 duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">100€</div>
            <p class="flex items-center justify-center h-28 w-44 bg-blue-100 rounded-md text-lg transform transition hover:bg-blue-300 hover:border-2 hover:border-blue-800 duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">300€</div>
            <div class="flex items-center justify-center h-28 w-44 bg-blue-100 rounded-md text-lg transform transition duration-300 hover:shadow-lg hover:border-2 hover:border-blue-800">
                <!-- [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none ; Permet de cacher les boutons incrémentation/décrémentation -->
                <input type="number" placeholder="autre" class="w-full h-full bg-transparent text-center text-lg focus:outline-none focus:ring-0 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" />
            </div>

        </section>

        <button class="bg-blue-800 text-white text-xl rounded-3xl px-6 py-4 mt-4 transform transition duration-300 hover:scale-105 hover:shadow-lg">
            Suivant
        </button>

    </article>

    <article id="egee_en_france" class="flex flex-col items-center justify-center bg-blue-500 mb-16 p-8 text-white">

        <div>
            <div class="flex justify-start items-center gap-3 ">
                <img class="w-10" src="assets/img/accueil/ic_autialités.svg" alt="news_paper_icon">
                <p class="font-bold text-3xl ">Acualités</p>
            </div>

            <p class="">
                Restez informés des temps forts et des projets de notre association
            </p>

            <div id="ligne_articles" class="flex flex-col md:flex-row gap-8 my-8">
                <div class="flex flex-col justify-center gap-2 rounded-md transform transition duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">
                    <img src="assets/img/actualites/MOnswiller-614x460.png" alt="" class="w-72 h-56 border-2 border-black rounded-md shadow-md">
                    <p class="max-w-72 font-bold">Monswiller se prépare face aux crues !</p>
                </div>
                <div class="flex flex-col justify-center gap-2 rounded-md transform transition duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">
                    <img src="assets/img/actualites/BTransmettre-accompagner-368x460-1.png" alt="" class="w-72 h-56 border-2 border-black rounded-md shadow-md object-cover">
                    <p class="max-w-72 font-bold">Transmettre, accompagner, s’engager ensemble</p>
                </div>
                <div class="flex flex-col justify-center gap-4 rounded-md transform transition duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">
                    <img src="assets/img/actualites/travail_en_mutation.jpg" alt="" class="w-72 h-56 border-2 border-black rounded-md shadow-md">
                    <p class=" max-w-72 font-bold">Préparer les jeunes à un monde du travail en mutation</p>
                </div>
            </div>

            <button class="my-6 bg-blue-900 text-center px-4 py-2 rounded-md rounded-md transform transition duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">
                Découvrez tous nos articles
            </button>
        </div>


    </article>

    <article id="egee_en_france" class="flex flex-col justify-center items-center my-22">
        <p class="text-blue-500 font-bold text-3xl pb-32">
            EGEE en France
        </p>

        <img src="assets/img/accueil/location.svg" class="w-32 mb-10" alt="LOC">
        <p class="text-2xl uppercase">Où nous trouver</p>

        <p class="text-center text-xl mt-10 w-[16em] md:w-[36em]">
            L’association EGEE compte près de 1 800 conseillers bénévoles
            seniors répartis dans 13 délégations régionalessur
            l’ensemble du territoire français.
        </p>
        <a href="pages/egee_en_france.php">
            <button class="bg-blue-400 py-4 px-6 rounded my-12 text-white transform transition duration-300 hover:bg-blue-600 hover:scale-105 hover:shadow-lg">
                EGEE en France
            </button>
        </a>

    </article>

    <article id="egee_newsletter" class="flex justify-center my-16">

        <section class="flex flex-col justify-center items-center bg-blue-100 w-[90%] h-[90%] rounded-md py-12">
            <p class="text-center text-blue-500 font-bold text-2xl md:text-4xl mb-8 w-[12em]">
                Inscrivez-vous aux actualités EGEE
            </p>
            <p class="text-center text-lg md:text-xl px-4 w-[16em] md:w-[32em]">
                Soyez le premier informé des événements à venir, des ressources
                éducatives et des opportunités de vous impliquer.
            </p>

            <div class="flex items-center justify-center h-16 bg-blue-300 rounded-md my-16 p-4 w-[16em] md:w-auto">
                <input
                    type="email"
                    placeholder="Saisissez votre email"
                    class="bg-transparent outline-none placeholder-gray-700" />

                <button class="flex justify-center items-center ml-auto w-12 h-10 rounded-xl bg-blue-500 transform transition duration-300 hover:bg-blue-600 hover:scale-105 hover:shadow-lg">
                    <img src="assets/img/cheveron-right.svg" alt="flèche droite" class="w-8">
                </button>
            </div>

        </section>

    </article>

    <?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

</body>

</html>