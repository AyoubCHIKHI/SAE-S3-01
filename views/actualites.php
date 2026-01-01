<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités | EGEE - Bénévolat de compétences</title>
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    <?php require __DIR__ . '/../includes/navbar.php'; ?>

    <main class="flex-grow container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-blue-900 mb-8 text-center">Actualités</h1>
        <p class="text-center text-gray-700 mb-12 max-w-2xl mx-auto">
            Retrouvez toutes les dernières nouvelles, événements et témoignages de l'association EGEE.
        </p>

        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Article 1 -->
            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <img src="../assets/img/actualites/MOnswiller-614x460.png" alt="Monswiller face aux crues" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-xs font-semibold tracking-wide text-blue-600 uppercase">Partenariat</span>
                    <h2 class="mt-2 text-xl font-bold text-gray-900 leading-tight">Monswiller se prépare face aux crues !</h2>
                    <p class="mt-3 text-gray-600">
                        Une initiative locale soutenue par EGEE pour aider les communes à anticiper les risques naturels.
                    </p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-sm text-gray-500">12 Déc 2024</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Lire la suite &rarr;</a>
                    </div>
                </div>
            </article>

            <!-- Article 2 -->
            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <img src="../assets/img/actualites/BTransmettre-accompagner-368x460-1.png" alt="Transmettre et accompagner" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-xs font-semibold tracking-wide text-green-600 uppercase">Bénévolat</span>
                    <h2 class="mt-2 text-xl font-bold text-gray-900 leading-tight">Transmettre, accompagner, s’engager ensemble</h2>
                    <p class="mt-3 text-gray-600">
                        Nos bénévoles partagent leur expérience pour guider la nouvelle génération vers la réussite.
                    </p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-sm text-gray-500">05 Nov 2024</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Lire la suite &rarr;</a>
                    </div>
                </div>
            </article>

            <!-- Article 3 -->
            <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <img src="../assets/img/actualites/travail_en_mutation.jpg" alt="Monde du travail" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="text-xs font-semibold tracking-wide text-purple-600 uppercase">Education</span>
                    <h2 class="mt-2 text-xl font-bold text-gray-900 leading-tight">Préparer les jeunes à un monde du travail en mutation</h2>
                    <p class="mt-3 text-gray-600">
                        Interventions dans les lycées et universités pour décrypter les codes de l'entreprise.
                    </p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-sm text-gray-500">28 Oct 2024</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Lire la suite &rarr;</a>
                    </div>
                </div>
            </article>

             <!-- Article 4 -->
             <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                     <span class="text-gray-400">Image à venir</span>
                </div>
                <div class="p-6">
                    <span class="text-xs font-semibold tracking-wide text-orange-600 uppercase">Entreprise</span>
                    <h2 class="mt-2 text-xl font-bold text-gray-900 leading-tight">Soutien aux TPE/PME</h2>
                    <p class="mt-3 text-gray-600">
                        Comment EGEE aide les petites structures à franchir le cap de la digitalisation.
                    </p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-sm text-gray-500">15 Oct 2024</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Lire la suite &rarr;</a>
                    </div>
                </div>
            </article>
        </section>

    </main>

    <?php require __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
