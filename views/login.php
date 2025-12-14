<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter | EGEE - Bénévolat de compétences</title>
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <?php require __DIR__ . '/../includes/navbar.php'; ?>

    <div class="my-auto flex flex-col p-36">

        <label for="username" class="font-bold mt-4">Nom d'utilisateur</label>
        <input
            id="username"
            type="text"
            name="username"
            placeholder=""
            class="border-2 rounded-md p-2 placeholder-gray-600 mt-2"
            required>

        <label for="password" class="font-bold mt-4">Mot de passe</label>
        <input
            id="password"
            type="text"
            name="username"
            placeholder=""
            class="border-2 rounded-md p-2 placeholder-gray-600 mt-2"
            required>


        <button class="bg-blue-400 py-4 px-6 rounded mt-6 text-white transform transition duration-300 hover:bg-blue-600 hover:scale-105 hover:shadow-lg">
            Se connecter
        </button>

    </div>

    <?php require __DIR__ . '/../includes/footer.php'; ?>

</body>

</html>