<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Association EGEE - Notre mission</title>
    <link rel="stylesheet" href="../assets/css/StyleNotreMission.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <?php require $_SERVER['DOCUMENT_ROOT'] .'/includes/navbar.php' ?>

    <section class="banner">
        <h2>Notre mission</h2>
    </section>

    <section class="intro">
        <p>Parce que des <span class="accent-bold">inégalités subsistent</span>
            sur le chemin de la vie professionnelle.<br>
            Parce que les <span class="accent-bold">doutes et les difficultés</span>
            surgissent parfois.<br>
            Chacun peut avoir besoin d’un <span class="accent-bold">œil extérieur</span>,
            averti, objectif et lucide sur le monde du travail.
        </p>
    </section>

    <div class="main-container">
        <main class="content">
            <!-- Bloc 1 -->
            <div class="mission-block">
                <div class="image-side">
                    <img src="../assets/img/Nos_Missions/3P_travaillent.webp" alt="Jeunes en atelier">
                </div>
                <div class="text-side">
                    <p class="subtitle">Nous accompagnons les :</p>
                    <ul>
                        <li><span class="accent-bold">jeunes générations</span></li>
                        <li><span class="accent-bold">entrepreneurs</span></li>
                        <li><span class="accent-bold">personnes en reconversion</span> ou en transition professionnelle.</li>
                    </ul>
                    <p>Nos bénévoles les <span class="accent-bold">informent</span>,
                        les <span class="accent-bold">écoutent</span>,
                        les <span class="accent-bold">conseillent</span> et les
                        <span class="accent-bold">mentorent</span>
                        pour leur ouvrir la voie de choix éclairés et les aider à maîtriser
                        leurs démarches, rebondir ou se repositionner.
                    </p>
                </div>
            </div>

            <!-- Bloc 2 -->
            <div class="mission-block reverse">
                <div class="image-side">
                    <img src="../assets/img/Nos_Missions/pouce_en_lair.jpg" alt="Jeunes satisfaits">
                </div>
                <div class="text-side">
                    <p class="subtitle">Nos domaines d’action</p>
                    <p>Parce que nous sommes convaincus que l’accès à
                        <span class="accent-bold">l’éducation</span>, la
                        <span class="accent-bold">formation</span> et l’
                        <span class="accent-bold">emploi</span> est au cœur de la
                        <span class="accent-bold">cohésion sociale</span>
                        et territoriale, nous agissons dans trois domaines appelés les
                        <span class="accent-bold">3E</span> :
                    </p>
                    <ul>
                        <li>L’éducation</li>
                        <li>L’employabilité</li>
                        <li>L’entrepreneuriat</li>
                    </ul>
                </div>
            </div>

            <!-- Bloc 3 -->
            <div class="mission-block">
                <div class="image-side">
                    <img src="../assets/img/Nos_Missions/beaucoupDeGens.jpg" alt="Réseau de bénévoles">
                </div>
                <div class="text-side">
                    <p class="subtitle">Notre réseau de bénévoles</p>
                    <p>Hommes et femmes, anciens entrepreneurs, dirigeants, cadres,
                        professions libérales ou encore enseignants, nos conseillers
                        bénévoles sont présents sur tout le territoire à travers un réseau de
                        <span class="accent-bold">13 délégations régionales</span>.
                    </p>
                </div>
            </div>
        </main>

        <aside class="lire-aussi">
            <h4>Lire aussi</h4>
            <ul>
                <li><a href="nous_connaitre.php">Nous connaitre</a></li>
                <li><a href="video_egee.php">Vidéo EGEE</a></li>
                <li><a href="#">Conseil d'administration</a></li>
                <li><a href="RapportActivitee.php">Rapports d'activités</a></li>
            </ul>
        </aside>
    </div>

    <?php require $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'; ?>

</body>
</html>
