<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Association EGEE - Rapports d'activitées</title>
        <link rel="stylesheet" href="../assets/css/StyleRapportActivitee.css">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>

        <?php require $_SERVER['DOCUMENT_ROOT'].'/includes/navbar.php'; ?>


        <section class="banner">
            <h2>Rapport d'Activitées</h2>
        </section>


        <section class="intro">
            <span class="accent-bold">Cliquez sur les images pour visualiser le Rapport d’Activité EGEE selon l’année </span>
        </section>


        <div class="main-container">
            <main class="content">

                <div class="mission-block">
                    <div class="image-side">
                        <a href="https://www.egee.asso.fr/wp-content/uploads/2023/05/EGEE-RA2022_V12-1.pdf" target="_blank">
                            <img src="../assets/img/RapportActivitee/RapportActivite2022.png" alt="Jeunes en atelier">
                        </a>
                    </div>
                </div>

                <!-- Bloc 2 -->
                <div class="mission-block">
                    <div class="image-side">
                        <a href="https://www.egee.asso.fr/wp-content/uploads/2024/05/RA-2023-VD.pdf" target="_blank">
                        <img src="../assets/img/RapportActivitee/RapportActivite2023.png" alt="Jeunes satisfaits">
                        </a>
                    </div>
                </div>

                <!-- Bloc 3 -->
                <div class="mission-block">
                    <div class="image-side">
                        <a href="https://www.egee.asso.fr/wp-content/uploads/2025/05/Rapport-Annuel-2024.pdf" target="_blank">
                        <img src="../assets/img/RapportActivitee/Rapport2024.webp" alt="Réseau de bénévoles">
                        </a>
                    </div>
                </div>

            </main>

            <!-- Bloc Lire aussi -->
            <aside class="lire-aussi">
                <h4>Lire aussi</h4>
                <ul>
                    <li><a href="nous_connaitre.php">Nous connaitre</a></li>
                    <li><a href="video_egee.php">Vidéo EGEE</a></li>
                    <li><a href="#">Conseil d'administration</a></li>
                    <li><a href="Nos_Missions.php">Nos missions</a></li>
                </ul>
            </aside>
        </div>

        <section class="bannerT">
            <h2>Autres rapports</h2>
            <ul>
                <li><a href="https://www.egee.asso.fr/wp-content/uploads/2020/07/Rapport-dActivit%C3%A9-EGEE-2019.pdf">Rapport 2019</a></li>
            </ul>
        </section>

        <?php require $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'; ?>
    </body>
</html>
