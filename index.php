<?php
?>

<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bénévolat de compétences - Association EGEE | Des seniors bénévoles au service de vos projets</title>
        <script src ="../assets/js/accueil.js"></script>
        <link rel="stylesheet" href="assets/css/don.css">

        <link rel="icon" type="image/png" href="assets/img/favicon.png">
		<script src="https://cdn.tailwindcss.com"></script>
	</head>

    <body>
    <?php include __DIR__ . '/pages/navbar.php'; ?>
        <article id="hero_section" class="flex flex-col-reverse md:flex-row gap-4 md:gap-24 justify-center items-center h-[52em] my-2">
            <section id="partie_blanc" class="flex flex-col justify-center items-center mt-16">
                <div id="slogan_large" class="text-3xl md:pl-12 md:text-5xl font-bold whitespace-nowrap">
                    <p>Transmetrre le savoir,</p>
                    <p class="indent-8">construire <span id="bloc_blue" class="">l'avenir</span></p>
                </div>

                <p class="text-center w-[22rem] py-8">
                    Chacun peut avoir besoin d’un oeil extérieur, averti, objectif et lucide sur le monde du travail.
                </p>

                <div class="flex flex-col md:flex-row gap-4 md:gap-16">
                    <button class="flex items-center gap-2 bg-blue-500 text-white px-4 py-2 rounded transform transition duration-300 hover:bg-blue-600 hover:scale-105 hover:shadow-lg">
                        <img src="assets/img/accueil/heart.svg" alt="icon_don" class="w-6">
                        Faire un don
                    </button>

                    <button class="flex items-center gap-2 text-black px-4 py-2 border border-blue-500 rounded transform transition duration-300 hover:bg-blue-50 hover:scale-105 hover:shadow-lg">
                        <img src="assets/img/accueil/play.svg" alt="icon_don" class="w-6">
                        Nos actions
                    </button>

                </div>
            </section>


            <section id="hero_caroussel" class="w-64 h-48 md:w-96 md:h-72 overflow-hidden rounded-lg md:mr-16">
                <img src="assets/img/accueil/hero_image.png" alt="hero_section_illustration"
                     class="rounded border-4 border-blue-300 object-cover w-full h-full">
            </section>

        </article>

        <article id="notre_mission" class="flex flex-col justify-center items-center my-16">

            <section class="flex gap-2 pb-4 md:pb-12 text-3xl font-bold">
                <p class="text-blue-500">01</p>
                <p class="text-blue-300">-</p>
                <p class="text-blue-300">03</p>
            </section>

            <p class="text-blue-500 font-bold text-4xl">
                Notre mission
            </p>

            <!-- ✅ CARROUSEL DE TEXTES -->
            <div id="carousel-mission" class="relative flex justify-center items-center w-full overflow-hidden">
                <div id="slides" class="flex transition-transform duration-700 ease-in-out">
                    <div class="slide w-full flex-shrink-0 flex justify-center items-center">
                        <p class="text-center text-xl md:text-2xl w-[16em] md:w-[72em] md:px-96 py-24">
                            Nos <b>bénévoles</b> informent, écoutent, conseillent et mentorent <b>les jeunes</b> pour leur ouvrir la voie de <b>choix éclairés</b> et les aider à maîtriser leurs démarches, leur parcours professionnel, rebondir ou se repositionner.
                        </p>
                    </div>

                    <div class="slide w-full flex-shrink-0 flex justify-center items-center">
                        <p class="text-center text-xl md:text-2xl w-[16em] md:w-[72em] md:px-96 py-24">
                            Nous accompagnons également <b>les entrepreneurs</b> dans leurs projets, qu’il s’agisse de création, de développement ou de transition, pour favoriser la réussite et la pérennité de leurs entreprises.
                        </p>
                    </div>

                    <div class="slide w-full flex-shrink-0 flex justify-center items-center">
                        <p class="text-center text-xl md:text-2xl w-[16em] md:w-[72em] md:px-96 py-24">
                            EGEE s’engage à <b>transmettre l’expérience</b> et les compétences des seniors au service des générations futures et du tissu économique français.
                        </p>
                    </div>
                </div>
            </div>

            <!-- BOUTONS DE NAVIGATION -->
            <div class="flex gap-8 pt-4">
                <button id="prev-mission">
                    <img src="assets/img/left-arrow.svg" alt="flèche gauche" class="w-10 transform transition duration-300 hover:scale-105">
                </button>

                <button id="next-mission" class="flex justify-center items-center w-16 h-12 rounded-xl bg-blue-500 transform transition duration-300 hover:bg-blue-600 hover:scale-105 hover:shadow-lg">
                    <img src="assets/img/arrow-sm-right.svg" alt="flèche droite" class="w-12">
                </button>
            </div>

        </article>

        <article id="nos_actions" class="flex flex-col justify-center items-center my-36">
            <p class="text-blue-500 font-bold text-4xl mb-24">
                Nos actions
            </p>

            <section id="présentation_action" class="flex flex-col md:flex-row justify-center items-center gap-12 md:gap-6">
                
                <div class="flex flex-col items-center justify-center w-72 gap-3 transform transition duration-300 hover:bg-blue-50 hover:scale-105 hover:shadow-lg rounded-md py-4 cursor-pointer">
                    <img src="assets/img/accueil/education.png" alt="" class="w-62 h-52 md:w-44 md:h-56 border-4 border-blue-300 rounded-md object-cover">
                    <p class="font-bold text-xl">Education</p>
                    <p class="text-center">Préparer les jeunes à leur future vie professionnelle</p>
                    <a href="education.html" class="hidden md:block">
                        <div class="w-8 h-8 rounded-full bg-black mt-4">
                            <img src="assets/img/cheveron-right.svg" class="w-48">
                        </div>  
                    </a>
                </div>

                <div class="flex flex-col items-center justify-center w-72 gap-3 md:mb-28 transform transition duration-300 hover:bg-blue-50 hover:scale-105 hover:shadow-lg rounded-md py-4 cursor-pointer">
                    <img src="assets/img/accueil/emploie.png" alt="" class="w-62 h-52 border-4 border-blue-300 rounded-md object-cover">
                    <p class="font-bold text-xl">Emploi</p>
                    <p class="text-center">Accompagner l’entrée dans la vie active et le retour à l’emploi</p>
                    <a href="emploie.html" class="hidden md:block">
                        <div class="w-8 h-8 rounded-full bg-black mt-4">
                            <img src="assets/img/cheveron-right.svg" class="w-8">
                        </div>
                    </a>
                </div>

                <div class="flex flex-col items-center justify-center w-72 gap-3 transform transition duration-300 hover:bg-blue-50 hover:scale-105 hover:shadow-lg rounded-md py-4 cursor-pointer">
                    <img src="assets/img/accueil/entreprise.webp" alt="" class="w-62 h-52 md:w-44 md:h-56 border-4 border-blue-300 rounded-md object-cover">
                    <p class="font-bold text-xl">Entreprise</p>
                    <p class="text-center">Soutenir les entrepreneurs dans la création, la croissance et les difficultés</p>
                    <a href="entreprise.html" class="hidden md:block">
                        <div class="w-8 h-8 rounded-full bg-black mt-4">
                            <img src="assets/img/cheveron-right.svg" class="w-8">
                        </div>  
                    </a>
                </div>

            </section>

        </article>

        <article id="egee_en_france" class="flex flex-col justify-center items-center my-22">
            <p class="text-blue-500 font-bold text-4xl pb-32">
                EGEE en France
            </p>
        
            <img src="assets/img/accueil/location.svg" class="w-32 mb-10" alt="LOC">
            <p class="text-2xl uppercase">Où nous trouver</p>

            <p class="text-center text-xl mt-10 w-[16em] md:w-[36em]">
                L’association EGEE compte près de 1 800 conseillers bénévoles 
                seniors répartis dans 13 délégations régionalessur 
                l’ensemble du territoire français.
            </p>
            <a href="pages/egee_en_france.html">
                <button class="bg-blue-400 py-4 px-6 rounded my-12 text-white transform transition duration-300 hover:bg-blue-600 hover:scale-105 hover:shadow-lg">
                    EGEE en France
                </button>
            </a>
            
        </article>

        <article id="egee_newsletter" class="flex justify-center my-16">
            
            <section class="flex flex-col justify-center items-center bg-blue-100 w-[90%] h-[90%] rounded-md py-12">
                <p class="text-center text-blue-500 font-bold text-4xl mb-8 w-[12em]">
                     Inscrivez-vous aux actualités EGEE
                </p>
                <p class="text-center text-xl px-4 w-[20em] md:w-[38em]">
                    Soyez le premier informé des événements à venir, des ressources
                     éducatives et des opportunités de vous impliquer.
                </p>

                <div class="flex items-center justify-center h-16 bg-blue-300 rounded-md my-16 p-4">
                    <input 
                        type="email" 
                        placeholder="Saisissez votre email" 
                        class="flex-1 bg-transparent outline-none placeholder-gray-700"
                    />
                
                    <button class="flex justify-center items-center w-12 h-10 ml-10 rounded-xl bg-blue-500 transform transition duration-300 hover:bg-blue-600 hover:scale-105 hover:shadow-lg">
                        <img src="assets/img/cheveron-right.svg" alt="flèche droite" class="w-8">
                    </button>
                </div>

            </section>

        </article>
    <?php include __DIR__ . '/pages/footer.php'; ?>
        <!-- don -->
        <div id="fond-assombri" class="cache"></div>
        <button id="fermer-tout" class="cache bouton-fermeture">&times;</button>

        <div id="page-image" class="modale cache">
            <div class="image">
                <img src="assets/img/don/donImage1.png" alt="Image don">
            </div>
        </div>

        <div id="page-don" class="modale cache">
            <div class="conteneur-don">
                <h2>1. MON DON</h2>
                <div class="type-don">
                    <label>
                        <input type="radio" name="frequence" checked>
                        Je donne une fois
                    </label>
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

    <script src="assets/js/don.js"></script>
    <script src="assets/js/carousel.js"></script>
    </body>
</html>