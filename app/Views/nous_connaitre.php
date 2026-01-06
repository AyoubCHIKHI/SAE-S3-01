<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous connaître | Bénévolat de compétences - Association EGEE</title>
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <?php require __DIR__ . '/includes/navbar.php'; ?>



    <div class="flex flex-col justify-center items-center pt-16">
        <div id="slogan_large" class="text-5xl font-bold text-center">
            <p>Nous connaitre,</p>
            <p>Tout savoir sur nous</p>
        </div>
    </div>



    <main class="px-8 mt-8">
        <h3 class="text-xl font-semibold mb-6 text-center">
            Les objectifs de l’association, son organisation, ses résultats…
        </h3>

        <div class="grid md:grid-cols-3 gap-x-4 gap-y-4 p-16 justify-items-stretch">

            <a href="/nos_missions"
                class="flex flex-col items-center justify-center shadow-md rounded-md p-12 bg-blue-200 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <img class="size-12" src="/assets/img/nous_connaitre/goal-2.svg" alt="Notre Mission">
                <p class="my-2 text-lg font-medium text-blue-900">Notre Mission</p>
                <p class="py-4 text-gray-700 text-center">Découvrez notre vision, nos valeurs et nos objectifs pour un avenir durable.</p>
            </a>

            <a href="/videos"
                class="flex flex-col items-center justify-center shadow-md rounded-md p-12 bg-blue-200 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <img class="size-12" src="/assets/img/nous_connaitre/video-library.svg" alt="Vidéos EGEE">
                <p class="my-2 text-lg font-medium text-blue-900">Vidéos EGEE</p>
                <p class="py-4 text-gray-700 text-center">Plongez dans nos vidéos pour découvrir nos actions et témoignages inspirants.</p>
            </a>

            <a href="conseil-administration"
                class="flex flex-col items-center justify-center shadow-md rounded-md p-12 bg-blue-200 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <img class="size-12" src="/assets/img/nous_connaitre/conseil_d'administration.svg" alt="Conseil d’administration">
                <p class="my-2 text-center text-lg font-medium text-blue-900">Conseil d’administration</p>
                <p class="py-4 text-gray-700 text-center">Découvrez les membres qui guident et soutiennent notre organisation au quotidien.</p>
            </a>

            <a href="/rapports"
                class="flex flex-col items-center justify-center shadow-md rounded-md p-12 bg-blue-200 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <img class="size-12" src="/assets/img/nous_connaitre/rapport_d'activité.svg" alt="Rapport d’activité">
                <p class="my-2 text-lg font-medium text-blue-900">Rapport d’activité</p>
                <p class="py-4 text-gray-700 text-center">Consultez nos réalisations et résultats de l’année écoulée.</p>
            </a>

            <a href="https://drive.google.com/file/d/1QO9TdzlWsWi8NJITOPsyEqNbs2jnA066/view" target='_blank'
                class="flex flex-col items-center justify-center shadow-md rounded-md p-12 bg-blue-200 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <img class="size-12" src="/assets/img/nous_connaitre/nos_engagements.svg" alt="Nos engagements">
                <p class="my-2 text-lg font-medium text-blue-900">Nos engagements</p>
                <p class="py-4 text-gray-700 text-center">Découvrez nos engagements concrets pour un impact positif et durable.</p>
            </a>

        </div>
    </main>


    <?php require __DIR__ . '/includes/footer.php'; ?>

</body>

</html>