<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bénévolat de compétences - Association EGEE | Des seniors bénévoles au service de vos projets</title>
        <link rel="stylesheet" href="../assets/css/don.css">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="font-sans">

        <div class="fixed top-0 left-0 w-full z-50">
            <?php include $_SERVER['DOCUMENT_ROOT'].'/includes/navbar.php'; ?>
        </div>

        <div class="pt-28">

            <div id="hero_section" class="flex h-[600px]">
                <div id="partie_blanc" class="flex flex-col justify-center items-center w-[60%] pt-36 mx-auto">
                    <div id="slogan_large" class="text-5xl font-bold text-center">
                        <p>Nos vidéos</p>
                    </div>
                    <p class="text-center px-28 py-8">
                        De son histoire et des vidéos réunissant les 4 associations (EGEE, ECTI, OTECI, AGIRabcd) pratiquant le bénévolat de compétence sous la bannière "Talents Seniors Bénévoles".
                    </p>
                </div>
            </div>


            <main class="px-8 mt-8">
                <h3 class="text-xl font-semibold mb-6 text-center">
                    Quelques vidéos pour découvrir EGEE et son histoire :
                </h3>
                <div class="grid md:grid-cols-2 gap-x-12 justify-items-center">
                    <a href="https://drive.google.com/file/d/1nWbu7OJ1NTTQ9V-Gg3Wp-4F3S8GjgiAG/view" class="text-center transform transition-transform duration-300 hover:scale-105">
                        <img src="../assets/img/video_egee/logo-egee.png" alt="EGEE Aujourd'hui" class="rounded shadow w-50 h-60 object-contain mx-auto">
                        <p class="mt-2 font-medium">EGEE Aujourd'hui</p>
                    </a>
                    <a href="https://drive.google.com/file/d/1XifWfA21C6HdlPYpFI6Bj-_jI0IqEDkD/view" class="text-center transform transition-transform duration-300 hover:scale-105">
                        <img src="../assets/img/video_egee/histoire_egee.png" alt="L'histoire d'EGEE" class="rounded shadow w-50 h-60 object-contain mx-auto">
                        <p class="mt-2 font-medium">L'histoire d'EGEE</p>
                    </a>
                </div>
            </main>

            <main class="px-8 mt-8">
                <h3 class="text-xl font-semibold mb-6 text-center">
                    Différentes conférences :
                </h3>

                <div class="flex justify-center">
                    <a href="https://drive.google.com/file/d/1_u85v106VVUcJs9qqyPjjwvt9912T1CL/view?usp=share_link" class="text-center transform transition-transform duration-300 hover:scale-105">
                        <img src="../assets/img/video_egee/salonjuinior2023.png" alt="EGEE Aujourd'hui" class="rounded shadow w-50 h-60 object-contain mx-auto">
                        <p class="mt-2 font-medium">Salon junior 2023</p>
                    </a>
                </div>
            </main>

            <?php include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'; ?>
    </body>
</html>
