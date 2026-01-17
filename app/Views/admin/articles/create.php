<?php $currentPage = 'articles'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvel Article - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex">

    <?php require __DIR__ . '/../layout/sidebar.php'; ?>

    <main class="flex-1 ml-64 p-8 overflow-y-auto h-screen">
        <header class="flex justify-between items-center pb-6 border-b border-gray-300 mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Rédiger un article</h1>
            <a href="/admin/articles" class="text-gray-600 hover:text-blue-600">Retour</a>
        </header>

        <div class="bg-white rounded-lg shadow p-8 max-w-4xl mx-auto">
            <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>
            <form action="/admin/articles/store" method="POST" class="space-y-6">

                <div>
                    <label for="titre" class="block text-gray-700 font-bold mb-2">Titre de l'article</label>
                    <input type="text" id="titre" name="titre"
                        class="w-full border rounded px-4 py-2 focus:outline-none focus:border-blue-500"
                        placeholder="Ex: Rentrée solennelle..." required>
                </div>

                <div>
                    <label for="categorie" class="block text-gray-700 font-bold mb-2">Catégorie</label>
                    <select id="categorie" name="categorie"
                        class="w-full border rounded px-4 py-2 focus:outline-none focus:border-blue-500 bg-white">
                        <option value="Generale">Générale</option>
                        <option value="Education">Education</option>
                        <option value="Emploi">Emploi</option>
                        <option value="Entreprise">Entreprise</option>
                    </select>
                </div>

                <div>
                    <label for="image_url" class="block text-gray-700 font-bold mb-2">URL de l'image (optionnel)</label>
                    <input type="text" id="image_url" name="image_url"
                        class="w-full border rounded px-4 py-2 focus:outline-none focus:border-blue-500"
                        placeholder="https://...">
                </div>

                <div>
                    <label for="contenu" class="block text-gray-700 font-bold mb-2">Contenu</label>
                    <textarea id="contenu" name="contenu" rows="10"
                        class="w-full border rounded px-4 py-2 focus:outline-none focus:border-blue-500"
                        required></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 text-white font-bold py-3 px-8 rounded hover:bg-blue-700 transition">
                        Publier
                    </button>
                </div>

            </form>
        </div>
    </main>
</body>

</html>