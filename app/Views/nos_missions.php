<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Association EGEE - Notre mission</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-white text-gray-800 leading-relaxed min-h-full flex flex-col">

    <?php require __DIR__.'/includes/navbar.php' ?>

    <!-- Bandeau principal -->
    <section class="bg-[#dcefff] px-6 md:px-10 py-5 border-l-[5px] border-[#00a0c6] mt-5">
        <h2 class="text-[#00a0c6] font-semibold text-2xl">Notre mission</h2>
    </section>

    <!-- Bloc d’intro -->
    <section class="bg-[#dcefff] p-6 md:p-8 text-center my-8 mx-auto w-[95%] md:w-[90%] rounded-md shadow-sm">
        <p class="text-black text-[15px] leading-8">
            Parce que des <span class="font-bold text-black">inégalités subsistent</span>
            sur le chemin de la vie professionnelle.<br class="hidden md:inline">
            Parce que les <span class="font-bold text-black">doutes et les difficultés</span>
            surgissent parfois.<br class="hidden md:inline">
            Chacun peut avoir besoin d’un
            <span class="font-bold text-black">œil extérieur</span>,
            averti, objectif et lucide sur le monde du travail.
        </p>
    </section>

    <!-- Conteneur principal: flex-grow pousse le footer -->
    <div class="flex-grow w-full max-w-7xl mx-auto px-4 md:px-10 py-10 lg:px-16 bg-white">
        <!-- Contenu principal -->
        <main class="flex flex-col gap-16">
            
            <!-- Bloc 1 -->
            <div class="flex flex-col lg:flex-row items-center gap-10">
                <div class="w-full lg:w-[420px] flex-shrink-0">
                    <img src="/assets/img/Nos_Missions/3P_travaillent.webp"
                         alt="Jeunes en atelier"
                         class="w-full h-auto rounded-lg shadow-md object-cover">
                </div>
                <div class="flex-1 text-black text-[15px] leading-7">
                    <p class="font-bold text-[16px] mb-2 text-lg text-[#00a0c6]">Nous accompagnons les :</p>
                    <ul class="list-disc ml-6 mb-4 space-y-1">
                        <li><span class="font-bold">jeunes générations</span></li>
                        <li><span class="font-bold">entrepreneurs</span></li>
                        <li><span class="font-bold">personnes en reconversion</span> ou en transition professionnelle.</li>
                    </ul>
                    <p>
                        Nos bénévoles les <span class="font-bold">informent</span>,
                        les <span class="font-bold">écoutent</span>,
                        les <span class="font-bold">conseillent</span> et les
                        <span class="font-bold">mentorent</span>
                        pour leur ouvrir la voie de choix éclairés et les aider à maîtriser
                        leurs démarches, rebondir ou se repositionner.
                    </p>
                </div>
            </div>

            <!-- Bloc 2 -->
            <div class="flex flex-col lg:flex-row-reverse items-center gap-10">
                <div class="w-full lg:w-[420px] flex-shrink-0">
                    <img src="/assets/img/Nos_Missions/pouce_en_lair.jpg"
                         alt="Jeunes satisfaits"
                         class="w-full h-auto rounded-lg shadow-md object-cover">
                </div>
                <div class="flex-1 text-black text-[15px] leading-7">
                    <p class="font-bold text-[16px] mb-2 text-lg text-[#00a0c6]">Nos domaines d’action</p>
                    <p class="mb-2">
                        Parce que nous sommes convaincus que l’accès à
                        <span class="font-bold">l’éducation</span>, la
                        <span class="font-bold">formation</span> et l’
                        <span class="font-bold">emploi</span> est au cœur de la
                        <span class="font-bold">cohésion sociale</span>
                        et territoriale, nous agissons dans trois domaines appelés les
                        <span class="font-bold">3E</span> :
                    </p>
                    <ul class="list-disc ml-6 space-y-1">
                        <li>L’éducation</li>
                        <li>L’employabilité</li>
                        <li>L’entrepreneuriat</li>
                    </ul>
                </div>
            </div>

            <!-- Bloc 3 -->
            <div class="flex flex-col lg:flex-row items-center gap-10">
                <div class="w-full lg:w-[420px] flex-shrink-0">
                    <img src="/assets/img/Nos_Missions/beaucoupDeGens.jpg"
                         alt="Réseau de bénévoles"
                         class="w-full h-auto rounded-lg shadow-md object-cover">
                </div>
                <div class="flex-1 text-black text-[15px] leading-7">
                    <p class="font-bold text-[16px] mb-2 text-lg text-[#00a0c6]">Notre réseau de bénévoles</p>
                    <p>
                        Hommes et femmes, anciens entrepreneurs, dirigeants, cadres,
                        professions libérales ou encore enseignants, nos conseillers
                        bénévoles sont présents sur tout le territoire à travers un réseau de
                        <span class="font-bold">13 délégations régionales</span>.
                    </p>
                </div>
            </div>
            
        </main>
    </div>

    <!-- Footer au bas de page (flex item) -->
    <div class="mt-auto">
        <?php require __DIR__.'/includes/footer.php'; ?>
    </div>

</body>
</html>

