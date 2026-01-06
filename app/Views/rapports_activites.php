<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapport d'Activités | Association EGEE</title>
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .mission-block {
            @apply flex justify-center p-8;
        }
        .mission-block img {
            @apply rounded-lg shadow-lg transition-transform duration-300 hover:scale-105;
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body class="font-sans">

    <?php require __DIR__ . '/includes/navbar.php'; ?>

    <div class="pt-28">
        <section class="text-center py-12 bg-blue-50">
            <h2 class="text-4xl font-bold text-blue-900">Rapport d'Activités</h2>
        </section>

        <section class="text-center py-8">
            <p class="text-xl text-gray-700">
                <span class="font-bold">Cliquez sur les images pour visualiser le Rapport d’Activité EGEE selon l’année</span>
            </p>
        </section>

        <div class="container mx-auto px-4 flex flex-col lg:flex-row gap-8">
            <main class="w-full lg:w-3/4 flex flex-col gap-12">

                <!-- 2022 -->
                <div class="mission-block flex justify-center p-4 md:p-8">
                    <a href="https://www.egee.asso.fr/wp-content/uploads/2023/05/EGEE-RA2022_V12-1.pdf" target="_blank" class="block w-full max-w-md">
                        <img src="/assets/img/RapportActivitee/RapportActivite2022.png" alt="Rapport d'Activité 2022" class="w-full h-auto rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                    </a>
                </div>

                <!-- 2023 -->
                <div class="mission-block flex justify-center p-4 md:p-8">
                    <a href="https://www.egee.asso.fr/wp-content/uploads/2024/05/RA-2023-VD.pdf" target="_blank" class="block w-full max-w-md">
                        <img src="/assets/img/RapportActivitee/RapportActivite2023.png" alt="Rapport d'Activité 2023" class="w-full h-auto rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                    </a>
                </div>

                <!-- 2024 -->
                <div class="mission-block flex justify-center p-4 md:p-8">
                    <a href="https://www.egee.asso.fr/wp-content/uploads/2025/05/Rapport-Annuel-2024.pdf" target="_blank" class="block w-full max-w-md">
                        <img src="/assets/img/RapportActivitee/Rapport2024.webp" alt="Rapport d'Activité 2024" class="w-full h-auto rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                    </a>
                </div>

            </main>

            <!-- Sidebar -->
            <aside class="w-full lg:w-1/4 bg-gray-50 p-6 rounded-lg shadow h-fit order-first lg:order-last">
                <h4 class="text-xl font-bold mb-4 text-blue-900 border-b-2 border-blue-500 pb-2">Lire aussi</h4>
                <ul class="space-y-3">
                    <li><a href="/nous_connaitre" class="text-gray-700 hover:text-blue-500 transition-colors">Nous connaître</a></li>
                    <li><a href="/video_egee" class="text-gray-700 hover:text-blue-500 transition-colors">Vidéos EGEE</a></li>
                    <li><a href="/conseil-administration" class="text-gray-700 hover:text-blue-500 transition-colors">Conseil d'administration</a></li>
                    <li><a href="/nos_missions" class="text-gray-700 hover:text-blue-500 transition-colors">Nos missions</a></li>
                </ul>
            </aside>
        </div>

        <section class="text-center py-12 mt-12 bg-gray-100">
            <h2 class="text-2xl font-bold mb-6">Autres rapports</h2>
            <ul>
                <li><a href="https://www.egee.asso.fr/wp-content/uploads/2020/07/Rapport-dActivit%C3%A9-EGEE-2019.pdf" class="text-blue-600 hover:underline" target="_blank">Rapport 2019</a></li>
            </ul>
        </section>

        <?php require __DIR__ . '/includes/footer.php'; ?>
    </div>

    <!-- Donation Modal Includes -->
    <?php include __DIR__ . '/includes/don_modal.php'; ?>
    
    <script>
       // Simple script to handle donation modal if not already handled by don_modal.php
       // Assuming logic is centralized or duplicated in navbar/footer inclusion context
    </script>
</body>
</html>
