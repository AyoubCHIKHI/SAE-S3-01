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
        <header class="flex justify-between items-center pb-6 mb-8">
            <h1 class="text-2xl font-semibold text-gray-900">Articles</h1>
            <a href="/admin/articles/create" class="bg-gray-900 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors flex items-center gap-2">
                <span>+</span> Nouvel Article
            </a>
        </header>

        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50/50 border-b border-gray-200">
                    <tr>
                        <th class="py-3 px-6 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Titre</th>
                        <th class="py-3 px-6 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Catégorie</th>
                        <th class="py-3 px-6 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="py-3 px-6 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Auteur</th>
                        <th class="py-3 px-6 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm">
                    <?php if (empty($articles)): ?>
                        <tr>
                            <td colspan="5" class="py-8 text-center text-gray-500 italic">Aucun article trouvé.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($articles as $article): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6 font-medium text-gray-900"><?= htmlspecialchars($article['title']) ?></td>
                            <td class="py-4 px-6"><span class="bg-gray-100 text-gray-600 py-1 px-2.5 rounded-full text-xs font-medium"><?= htmlspecialchars($article['category']) ?></span></td>
                            <td class="py-4 px-6 text-gray-500"><?= date('d/m/Y', strtotime($article['created_at'])) ?></td>
                            <td class="py-4 px-6 text-gray-500"><?= htmlspecialchars(($article['first_name'] ?? '') . ' ' . ($article['last_name'] ?? '')) ?></td>
                            <td class="py-4 px-6 text-right flex justify-end gap-3">
                                <a href="/actualite?id=<?= $article['id'] ?>" target="_blank" class="text-gray-400 hover:text-blue-600 transition-colors" title="Voir">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </a>
                                <a href="/admin/articles/delete?id=<?= $article['id'] ?>" onclick="return confirm('Êtes-vous sûr ?')" class="text-gray-400 hover:text-red-700 transition-colors" title="Supprimer">
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
