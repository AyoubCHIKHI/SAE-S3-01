<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande d'inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Demande d'inscription</h1>

        <?php if (isset($success)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Succès !</strong>
                <span class="block sm:inline"><?php echo $success; ?></span>
            </div>
            <div class="text-center mt-4">
                <a href="/" class="text-blue-500 hover:text-blue-700">Retour à l'accueil</a>
            </div>
        <?php else: ?>

            <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Erreur :</strong>
                    <span class="block sm:inline"><?php echo $error; ?></span>
                </div>
            <?php endif; ?>

            <form action="/register" method="POST" class="space-y-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="role">
                        Type de demande
                    </label>
                    <select name="role" id="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="">Sélectionnez un rôle...</option>
                        <option value="ADMIN" <?php echo (isset($data['role']) && $data['role'] === 'ADMIN') ? 'selected' : ''; ?>>Administrateur</option>
                        <option value="BUREAU" <?php echo (isset($data['role']) && $data['role'] === 'BUREAU') ? 'selected' : ''; ?>>Membre du Bureau</option>
                        <option value="POLE" <?php echo (isset($data['role']) && $data['role'] === 'POLE') ? 'selected' : ''; ?>>Responsable de Pôle</option>
                    </select>
                </div>

                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                            Nom
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" name="nom" type="text" value="<?php echo $data['nom'] ?? ''; ?>" required>
                    </div>
                    <div class="w-1/2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="prenom">
                            Prénom
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="prenom" name="prenom" type="text" value="<?php echo $data['prenom'] ?? ''; ?>" required>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="profession">
                        Profession
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="profession" name="profession" type="text" value="<?php echo $data['profession'] ?? ''; ?>">
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" value="<?php echo $data['email'] ?? ''; ?>" required>
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Mot de passe (pour votre futur compte)
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" required>
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                        Message (optionnel)
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" name="message" rows="3"><?php echo $data['message'] ?? ''; ?></textarea>
                </div>

                <div class="flex items-center justify-between mt-6">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">
                        Envoyer la demande
                    </button>
                </div>
            </form>
            <div class="text-center mt-4 text-sm">
                <a href="/admin/login" class="text-blue-500 hover:text-blue-700">Déjà inscrit ? Connexion</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
