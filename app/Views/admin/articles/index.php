<?php $currentPage = 'articles'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Articles - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex">

    <?php require __DIR__ . '/../layout/sidebar.php'; ?>

    <main class="flex-1 ml-64 p-8 overflow-y-auto h-screen">
        <header class="flex justify-between items-center pb-6 border-b border-gray-300 mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Articles</h1>
            <a href="/admin/articles/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition flex items-center gap-2">
                <span>+</span> Nouvel Article
            </a>
        </header>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50 text-gray-700 uppercase p-4 text-xs font-bold border-b">
                    <tr>
                        <th class="p-4 text-left">Titre</th>
                        <th class="p-4 text-left">Catégorie</th>
                        <th class="p-4 text-left">Date</th>
                        <th class="p-4 text-left">Auteur</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    <?php if (empty($articles)): ?>
                        <tr>
                            <td colspan="5" class="p-4 text-center italic">Aucun article trouvé.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($articles as $article): ?>
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-4 font-bold text-blue-900"><?= htmlspecialchars($article['title']) ?></td>
                            <td class="p-4"><span class="bg-blue-100 text-blue-800 py-1 px-2 rounded-full text-xs"><?= htmlspecialchars($article['category']) ?></span></td>
                            <td class="p-4"><?= date('d/m/Y', strtotime($article['created_at'])) ?></td>
                            <td class="p-4"><?= htmlspecialchars(($article['first_name'] ?? '') . ' ' . ($article['last_name'] ?? '')) ?></td>
                            <td class="p-4 text-right flex justify-end gap-2">
                                <a href="/actualite?id=<?= $article['id'] ?>" target="_blank" class="text-gray-500 hover:text-blue-500" title="Voir">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </a>
                                <a href="/admin/articles/delete?id=<?= $article['id'] ?>" onclick="return confirm('Êtes-vous sûr ?')" class="text-gray-500 hover:text-red-500" title="Supprimer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
