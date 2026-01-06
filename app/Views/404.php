<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Non Trouvée | EGEE</title>
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800 font-sans antialiased min-h-screen flex flex-col">

    <?php require __DIR__ . '/includes/navbar.php'; ?>

    <main class="flex-grow flex flex-col items-center justify-center text-center px-4 py-16">
        <h1 class="text-9xl font-extrabold text-blue-600 mb-4">404</h1>
        <p class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">Oups ! Page introuvable.</p>
        <p class="text-gray-600 mb-8 max-w-md mx-auto">
            La page que vous recherchez semble avoir été déplacée, supprimée ou n'existe pas.
        </p>
        <a href="/" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition duration-150 ease-in-out shadow-lg hover:shadow-xl">
            Retour à l'accueil
        </a>
    </main>

    <?php require __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
