<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Association EGEE - Notre mission</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-white text-gray-800 leading-relaxed">

<?php require $_SERVER['DOCUMENT_ROOT'] .'/includes/navbar.php' ?>

<!-- Bandeau principal -->
<section class="bg-[#dcefff] px-10 py-5 border-l-[5px] border-[#00a0c6] mt-5">
    <h2 class="text-[#00a0c6] font-semibold text-2xl">Notre mission</h2>
</section>

<!-- Bloc d’intro -->
<section class="bg-[#dcefff] p-8 text-center my-8 mx-auto w-[90%] rounded-md">
    <p class="text-black text-[15px] leading-8">
        Parce que des <span class="font-bold text-black">inégalités subsistent</span>
        sur le chemin de la vie professionnelle.<br>
        Parce que les <span class="font-bold text-black">doutes et les difficultés</span>
        surgissent parfois.<br>
        Chacun peut avoir besoin d’un
        <span class="font-bold text-black">œil extérieur</span>,
        averti, objectif et lucide sur le monde du travail.
    </p>
</section>

<!-- Conteneur principal -->
<div class="flex flex-col lg:flex-row justify-between items-start px-10 py-10 lg:px-16">
    <!-- Contenu principal -->
    <main class="flex-1 flex flex-col gap-16 lg:mr-8">
        <!-- Bloc 1 -->
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10">
            <div class="w-full lg:w-[420px]">
                <img src="../assets/img/Nos_Missions/3P_travaillent.webp"
                     alt="Jeunes en atelier"
                     class="w-full rounded-lg shadow-md">
            </div>
            <div class="flex-1 text-black text-[15px] leading-7">
                <p class="font-bold text-[16px] mb-2">Nous accompagnons les :</p>
                <ul class="list-disc ml-6 mb-4">
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
        <div class="flex flex-col-reverse lg:flex-row-reverse items-center justify-between gap-10">
            <div class="w-full lg:w-[420px]">
                <img src="../assets/img/Nos_Missions/pouce_en_lair.jpg"
                     alt="Jeunes satisfaits"
                     class="w-full rounded-lg shadow-md">
            </div>
            <div class="flex-1 text-black text-[15px] leading-7">
                <p class="font-bold text-[16px] mb-2">Nos domaines d’action</p>
                <p>
                    Parce que nous sommes convaincus que l’accès à
                    <span class="font-bold">l’éducation</span>, la
                    <span class="font-bold">formation</span> et l’
                    <span class="font-bold">emploi</span> est au cœur de la
                    <span class="font-bold">cohésion sociale</span>
                    et territoriale, nous agissons dans trois domaines appelés les
                    <span class="font-bold">3E</span> :
                </p>
                <ul class="list-disc ml-6 mt-3">
                    <li>L’éducation</li>
                    <li>L’employabilité</li>
                    <li>L’entrepreneuriat</li>
                </ul>
            </div>
        </div>

        <!-- Bloc 3 -->
        <div class="flex flex-col lg:flex-row items-center justify-between gap-10">
            <div class="w-full lg:w-[420px]">
                <img src="../assets/img/Nos_Missions/beaucoupDeGens.jpg"
                     alt="Réseau de bénévoles"
                     class="w-full rounded-lg shadow-md">
            </div>
            <div class="flex-1 text-black text-[15px] leading-7">
                <p class="font-bold text-[16px] mb-2">Notre réseau de bénévoles</p>
                <p>
                    Hommes et femmes, anciens entrepreneurs, dirigeants, cadres,
                    professions libérales ou encore enseignants, nos conseillers
                    bénévoles sont présents sur tout le territoire à travers un réseau de
                    <span class="font-bold">13 délégations régionales</span>.
                </p>
            </div>
        </div>
    </main>

    <!-- Bloc Lire aussi -->
    <aside class="w-full lg:w-[250px] bg-[#dcefff] border-l-[4px] border-[#00a0c6]
                      p-5 shadow-md lg:sticky lg:top-10 h-fit opacity-40
                      hover:opacity-100 hover:shadow-lg transition-opacity duration-300 ease-in-out">
        <h4 class="text-black text-[18px] mb-2 font-semibold">Lire aussi</h4>
        <ul class="list-none space-y-2">
            <li><a href="nous_connaitre.php" class="text-[#004b8d] hover:text-black transition">Nous connaitre</a></li>
            <li><a href="video_egee.php" class="text-[#004b8d] hover:text-black transition">Vidéo EGEE</a></li>
            <li><a href="#" class="text-[#004b8d] hover:text-black transition">Conseil d'administration</a></li>
            <li><a href="RapportActivitee.php" class="text-[#004b8d] hover:text-black transition">Rapports d'activités</a></li>
        </ul>
    </aside>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'; ?>

</body>
</html>
