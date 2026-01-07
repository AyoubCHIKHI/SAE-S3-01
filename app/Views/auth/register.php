<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande d'inscription - EGEE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#F9FAFB] flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-lg">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-semibold text-gray-900">Demande d'inscription</h1>
            <p class="text-gray-500 mt-2">Rejoignez le réseau EGEE en créant votre espace</p>
        </div>

        <?php if (isset($success)): ?>
            <div class="bg-white border border-gray-200 rounded-xl p-8 text-center shadow-sm">
                <div class="w-12 h-12 bg-blue-50 text-[#0055A4] rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h2 class="text-lg font-medium text-gray-900 mb-2">Demande envoyée !</h2>
                <p class="text-gray-600 text-sm mb-6"><?php echo $success; ?></p>
                <a href="/" class="inline-block bg-[#0055A4] text-white px-6 py-2 rounded-lg hover:bg-[#004488] transition-all text-sm font-medium">Retour à l'accueil</a>
            </div>
        <?php else: ?>

            <?php if (isset($error)): ?>
                <div class="bg-red-50 text-red-600 px-4 py-3 rounded-md text-sm mb-6 border border-red-100">
                    <strong class="font-semibold">Erreur :</strong> <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="/register" method="POST" class="space-y-5 bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="role">Type de demande</label>
                    <select name="role" id="role" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-[#0055A4]/10 focus:border-[#0055A4] transition-all" required>
                        <option value="">Sélectionnez un rôle...</option>
                        <option value="ADMIN" <?php echo (isset($data['role']) && $data['role'] === 'ADMIN') ? 'selected' : ''; ?>>Administrateur</option>
                        <option value="BUREAU" <?php echo (isset($data['role']) && $data['role'] === 'BUREAU') ? 'selected' : ''; ?>>Membre du Bureau</option>
                        <option value="POLE" <?php echo (isset($data['role']) && $data['role'] === 'POLE') ? 'selected' : ''; ?>>Responsable de Pôle</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="prenom">Prénom</label>
                        <input class="w-full border border-gray-200 rounded-lg px-4 py-2 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-[#0055A4]/10 focus:border-[#0055A4] transition-all" 
                               id="prenom" name="prenom" type="text" value="<?php echo $data['prenom'] ?? ''; ?>" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="nom">Nom</label>
                        <input class="w-full border border-gray-200 rounded-lg px-4 py-2 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-[#0055A4]/10 focus:border-[#0055A4] transition-all" 
                               id="nom" name="nom" type="text" value="<?php echo $data['nom'] ?? ''; ?>" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="profession">Profession</label>
                    <input class="w-full border border-gray-200 rounded-lg px-4 py-2 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-[#0055A4]/10 focus:border-[#0055A4] transition-all" 
                           id="profession" name="profession" type="text" value="<?php echo $data['profession'] ?? ''; ?>" placeholder="ex: Retraité, Cadre...">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email professionnel</label>
                    <input class="w-full border border-gray-200 rounded-lg px-4 py-2 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-[#0055A4]/10 focus:border-[#0055A4] transition-all" 
                           id="email" name="email" type="email" value="<?php echo $data['email'] ?? ''; ?>" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="password">Mot de passe</label>
                    <input class="w-full border border-gray-200 rounded-lg px-4 py-2 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-[#0055A4]/10 focus:border-[#0055A4] transition-all" 
                           id="password" name="password" type="password" placeholder="••••••••" required>
                    <p class="text-[10px] text-gray-400 mt-1 uppercase tracking-wider font-semibold">Sera utilisé lors de l'activation</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="message">Message d'introduction (optionnel)</label>
                    <textarea class="w-full border border-gray-200 rounded-lg px-4 py-2 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-[#0055A4]/10 focus:border-[#0055A4] transition-all" 
                              id="message" name="message" rows="2"><?php echo $data['message'] ?? ''; ?></textarea>
                </div>

                <div class="text-xs text-gray-400">
                    En soumettant ce formulaire, vous acceptez notre <a href="/mentions_legales" class="text-[#0055A4] underline font-medium" target="_blank">politique de confidentialité</a>.
                </div>

                <button class="w-full bg-[#0055A4] text-white font-semibold py-3 px-4 rounded-lg hover:bg-[#004488] active:scale-[0.98] transition-all" type="submit">
                    Soumettre ma demande
                </button>
            </form>

            <div class="text-center mt-8">
                <a href="/admin/login" class="text-sm font-medium text-[#0055A4] hover:underline transition-all">Déjà un compte ? Se connecter</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
