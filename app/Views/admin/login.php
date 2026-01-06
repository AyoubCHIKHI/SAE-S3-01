<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - EGEE</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <div class="flex justify-center mb-6">
            <img src="/assets/img/Logo.svg" alt="EGEE Logo" class="w-32">
        </div>
        <h1 class="text-2xl font-bold text-center text-blue-900 mb-6">Connexion Admin</h1>

        <?php if (isset($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form action="/admin/login" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full border rounded px-3 py-2 text-gray-700 focus:outline-none focus:border-blue-500" placeholder="admin@egee.asso.fr" required>
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-bold mb-2">Mot de passe</label>
                <input type="password" id="password" name="password" class="w-full border rounded px-3 py-2 text-gray-700 focus:outline-none focus:border-blue-500" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition">
                Se connecter
            </button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-500">
            <a href="/register" class="text-blue-600 hover:underline">Pas de compte ? Faire une demande</a>
        </p>
        <p class="mt-2 text-center text-sm text-gray-500">
            <a href="/" class="hover:underline">Retour au site</a>
        </p>
    </div>

</body>
</html>
