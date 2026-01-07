<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - EGEE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#F9FAFB] flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <img src="/assets/img/Logo.svg" alt="EGEE Logo" class="w-24 mx-auto mb-6">
            <h1 class="text-xl font-semibold text-gray-900">Content de vous revoir</h1>
            <p class="text-gray-500 mt-2 text-sm">Entrez vos accès pour gérer la plateforme</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="bg-red-50 text-red-600 px-4 py-3 rounded-md text-sm mb-6 border border-red-100">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form action="/admin/login" method="POST" class="space-y-5">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email professionnel</label>
                <input type="email" id="email" name="email" 
                    class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-[#0055A4]/10 focus:border-[#0055A4] transition-all placeholder:text-gray-400" 
                    placeholder="nom@egee.asso.fr" required>
            </div>
            <div>
                <div class="flex items-center justify-between mb-1">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <a href="#" class="text-xs text-[#0055A4] hover:underline">Oublié ?</a>
                </div>
                <input type="password" id="password" name="password" 
                    class="w-full border border-gray-200 rounded-lg px-4 py-2.5 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-[#0055A4]/10 focus:border-[#0055A4] transition-all" required>
            </div>
            
            <button type="submit" class="w-full bg-[#0055A4] text-white font-medium py-2.5 px-4 rounded-lg hover:bg-[#004488] active:scale-[0.98] transition-all shadow-sm">
                Se connecter
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-gray-100 text-center space-y-3 font-medium">
            <p class="text-sm text-gray-600">
                Pas encore de compte ? 
                <a href="/register" class="text-[#0055A4] hover:underline">Demander un accès</a>
            </p>
            <p>
                <a href="/" class="text-sm text-gray-400 hover:text-gray-600">← Retour au site</a>
            </p>
        </div>
    </div>

</body>
</html>
