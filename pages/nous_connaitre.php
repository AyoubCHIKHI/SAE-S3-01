<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bénévolat de compétences - Association EGEE | Des seniors bénévoles au service de vos projets</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="../assets/css/don.css">
    </head>

    <body>

        <?php include $_SERVER['DOCUMENT_ROOT'].'/includes/navbar.php'; ?>


        <div id="hero_section" class="flex h-[600px]">
            <div id="partie_blanc" class="flex flex-col justify-center items-center w-[60%] pt-36">
                <div id="slogan_large" class="text-5xl font-bold text-center">
                    <p>Nous connaitre,</p>
                    <p>Tout savoir sur nous</p>
                </div>
                <p class="text-center px-28 py-8">
                    Nos domaines d'actions.
                </p>
            </div>

            <div id="partie_bleue" class="flex flex-1 bg-blue-500">
                <!-- Partie bleue décorative -->
            </div>
        </div>

        <header class="px-8 mt-12">
            <h2 class="text-2xl font-bold mb-2">Nous connaitre</h2>
            <div class="flex gap-4 text-2xl">
                <!-- Section vide pour icônes ou liens -->
            </div>
        </header>

        <main class="px-8 mt-8">
            <h3 class="text-xl font-semibold mb-6 text-center">
                Les objectifs de l’association, son organisation, ses résultats…
            </h3>

            <div class="grid md:grid-cols-3 gap-x-8 gap-y-12 justify-items-center">

                <a href="Nos_Missions.php" class="text-center transform transition-transform duration-300 hover:scale-105">
                <img src="../assets/img/nous_connaitre/logo_mission.png" alt="Notre Mission"
                    class="rounded shadow w-40 h-40 object-contain mx-auto">
                <p class="mt-2 font-medium">Notre Mission</p>
                </a>

                <a href="video_egee.php" class="text-center transform transition-transform duration-300 hover:scale-105">
                <img src="../assets/img/nous_connaitre/logo_video.jpg" alt="Vidéos EGEE"
                    class="rounded shadow w-40 h-40 object-contain mx-auto">
                <p class="mt-2 font-medium">Vidéos EGEE</p>
                </a>

                <a href="ConseilAdministration.php" class="text-center transform transition-transform duration-300 hover:scale-105">
                <img src="../assets/img/nous_connaitre/logo_admin.png" alt="Conseil d’administration"
                    class="rounded shadow w-40 h-40 object-contain mx-auto">
                <p class="mt-2 font-medium">Conseil d’administration</p>
                </a>

                <a href="RapportActivitee.php" class="text-center transform transition-transform duration-300 hover:scale-105">
                <img src="../assets/img/nous_connaitre/logo_feuille.png" alt="Rapport d’activité"
                    class="rounded shadow w-40 h-40 object-contain mx-auto">
                <p class="mt-2 font-medium">Rapport d’activité</p>
                </a>

                <a href="https://drive.google.com/file/d/1QO9TdzlWsWi8NJITOPsyEqNbs2jnA066/view" class="text-center transform transition-transform duration-300 hover:scale-105">
                <img src="../assets/img/nous_connaitre/logo_engagement.png" alt="Nos engagements"
                    class="rounded shadow w-40 h-40 object-contain mx-auto">
                <p class="mt-2 font-medium">Nos engagements</p>
                </a>

            </div>
        </main>


        <?php include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'; ?>

    </body>
</html>
