<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Actions | EGEE - Bénévolat de compétences</title>
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html { scroll-behavior: smooth; }
        section { scroll-margin-top: 6rem; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <?php require __DIR__ . '/includes/navbar.php'; ?>

    <div class="bg-white border-b border-gray-200 py-16">
        <div class="container mx-auto px-4 text-center max-w-4xl">
            <h1 class="text-4xl md:text-5xl font-bold text-blue-900 mb-6">Nos Actions</h1>
            <p class="text-xl text-gray-600 leading-relaxed">
                Retrouvez l'ensemble de nos missions au service de l'Education, de l'Emploi et de l'Entreprise.
            </p>
        </div>
    </div>

    <main class="container mx-auto px-4 py-12 max-w-6xl space-y-24">

        <section id="education" class="flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/2">
                <img src="/assets/img/accueil/education.png" alt="Illustration Education" class="rounded-lg shadow-md w-full h-[400px] object-cover">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold text-blue-900 mb-6 border-l-4 border-blue-400 pl-4">Education</h2>
                <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                    Nous intervenons auprès des jeunes pour les aider à préparer leur avenir professionnel.
                    Nos bénévoles partagent leur expérience pour rendre le monde de l'entreprise plus concret et accessible.
                </p>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="text-blue-400 font-bold">•</span>
                        <span>Aide à l'orientation et découverte des métiers.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-blue-400 font-bold">•</span>
                        <span>Préparation aux entretiens (simulations, savoir-être).</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-blue-400 font-bold">•</span>
                        <span>Accompagnement de la vie étudiante et tutorat.</span>
                    </li>
                </ul>
            </div>
        </section>

        <hr class="border-gray-200">

        <section id="emploi" class="flex flex-col md:flex-row-reverse items-center gap-12">
            <div class="md:w-1/2">
                <img src="/assets/img/accueil/emploie.png" alt="Illustration Emploi" class="rounded-lg shadow-md w-full h-[400px] object-cover">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold text-blue-900 mb-6 border-l-4 border-blue-600 pl-4">Emploi</h2>
                <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                    Nous accompagnons les demandeurs d'emploi et les personnes en reconversion.
                    L'objectif est de sécuriser les parcours et de favoriser le retour à l'activité par un suivi personnalisé.
                </p>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="text-blue-600 font-bold">•</span>
                        <span>Techniques de Recherche d'Emploi (TRE).</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-blue-600 font-bold">•</span>
                        <span>Parrainage et coaching individuel.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-blue-600 font-bold">•</span>
                        <span>Soutien à la mobilité professionnelle.</span>
                    </li>
                </ul>
            </div>
        </section>

        <hr class="border-gray-200">

        <section id="entreprise" class="flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/2">
                <img src="/assets/img/accueil/entreprise.webp" alt="Illustration Entreprise" class="rounded-lg shadow-md w-full h-[400px] object-cover">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold text-blue-900 mb-6 border-l-4 border-blue-900 pl-4">Entreprise</h2>
                <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                    Nous soutenons les entrepreneurs et les dirigeants de TPE/PME à tous les stades de leur développement.
                    Notre expertise permet de rompre l'isolement du dirigeant.
                </p>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <span class="text-blue-900 font-bold">•</span>
                        <span>Aide à la création et à la reprise d'entreprise.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-blue-900 font-bold">•</span>
                        <span>Suivi de gestion et développement commercial.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-blue-900 font-bold">•</span>
                        <span>Prévention des difficultés et accompagnement stratégique.</span>
                    </li>
                </ul>
            </div>
        </section>

    </main>

    <?php require __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
