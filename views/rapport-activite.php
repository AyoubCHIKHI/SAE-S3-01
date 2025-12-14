<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Association EGEE - Rapports d'activitées</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-white text-[#333] leading-relaxed">

        <?php require __DIR__.'/../includes/footer.php'; ?>

<!-- Bandeau principal -->
<section class="bg-[#dcefff] px-10 py-5 border-l-[5px] border-[#00a0c6] mt-5">
    <h2 class="text-[#00a0c6] font-semibold text-2xl">Rapports d'Activités</h2>
</section>

<!-- Introduction -->
<section class="p-8 text-left my-8 mx-auto w-[90%] rounded-md">
    <p class="text-[#004b8d] text-[15px] leading-8">
            <span class="font-bold text-black">
                Cliquez sur les images pour visualiser le Rapport d’Activité EGEE selon l’année
            </span>
    </p>
</section>

<!-- Conteneur principal -->
<div class="flex flex-col lg:flex-row justify-between items-start px-10 py-10 lg:px-16">
    <!-- Contenu principal -->
    <main class="flex-1 flex flex-wrap justify-center items-start gap-10 lg:mr-8">

        <!-- Rapport 2022 -->
        <div class="flex justify-center items-center">
            <div class="w-[180px]">
                <a href="https://www.egee.asso.fr/wp-content/uploads/2023/05/EGEE-RA2022_V12-1.pdf" target="_blank">
                    <img src="../assets/img/RapportActivitee/RapportActivite2022.png"
                         alt="Rapport 2022"
                         class="w-full h-auto rounded-lg shadow-md transition-transform duration-200 ease-in-out hover:scale-105">
                </a>
            </div>
        </div>

        <!-- Rapport 2023 -->
        <div class="flex justify-center items-center">
            <div class="w-[180px]">
                <a href="https://www.egee.asso.fr/wp-content/uploads/2024/05/RA-2023-VD.pdf" target="_blank">
                    <img src="../assets/img/RapportActivitee/RapportActivite2023.png"
                         alt="Rapport 2023"
                         class="w-full h-auto rounded-lg shadow-md transition-transform duration-200 ease-in-out hover:scale-105">
                </a>
            </div>
        </div>

        <!-- Rapport 2024 -->
        <div class="flex justify-center items-center">
            <div class="w-[180px]">
                <a href="https://www.egee.asso.fr/wp-content/uploads/2025/05/Rapport-Annuel-2024.pdf" target="_blank">
                    <img src="../assets/img/RapportActivitee/Rapport2024.webp"
                         alt="Rapport 2024"
                         class="w-full h-auto rounded-lg shadow-md transition-transform duration-200 ease-in-out hover:scale-105">
                </a>
            </div>
        </div>

    </main>

    <!-- Bloc "Lire aussi" -->
    <aside class="w-full lg:w-[250px] bg-[#dcefff] border-l-[4px] border-[#00a0c6]
                      p-5 shadow-md lg:sticky lg:top-10 h-fit opacity-40
                      hover:opacity-100 hover:shadow-lg transition-opacity duration-300 ease-in-out">
        <h4 class="text-black text-[18px] mb-2 font-semibold">Lire aussi</h4>
        <ul class="list-none space-y-2">
            <li><a href="nous_connaitre.php" class="text-[#004b8d] hover:text-black transition">Nous connaitre</a></li>
            <li><a href="video_egee.php" class="text-[#004b8d] hover:text-black transition">Vidéo EGEE</a></li>
            <li><a href="#" class="text-[#004b8d] hover:text-black transition">Conseil d'administration</a></li>
            <li><a href="Nos_Missions.php" class="text-[#004b8d] hover:text-black transition">Nos missions</a></li>
        </ul>
    </aside>
</div>

<!-- Autres rapports -->
<section class="bg-[#dcefff] px-10 py-5 border-l-[5px] border-[#00a0c6]
                     mx-[400px] my-[20px] text-[#004b8d] transition-colors duration-200">
    <h2 class="text-black font-semibold mb-2">Autres rapports</h2>
    <ul class="list-disc ml-5">
        <li>
            <a href="https://www.egee.asso.fr/wp-content/uploads/2020/07/Rapport-dActivit%C3%A9-EGEE-2019.pdf"
               class="text-[#004b8d] hover:text-black transition">Rapport 2019</a>
        </li>
    </ul>
</section>

        <?php require __DIR__.'/../includes/footer.php'; ?>
    </body>
</html>
