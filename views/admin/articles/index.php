<?php
$pageTitle = 'Gestion des Actualités';
require __DIR__ . '/../layout/header.php';
?>

<div class="flex justify-between items-center mb-8">
    <h2 class="text-3xl font-bold text-gray-800">Actualités</h2>
    <a href="/admin/articles/create" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Nouvel Article
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 text-gray-700 uppercase text-xs font-semibold">
            <tr>
                <th class="px-6 py-4 border-b">Image</th>
                <th class="px-6 py-4 border-b">Titre</th>
                <th class="px-6 py-4 border-b">Catégorie</th>
                <th class="px-6 py-4 border-b">Auteur</th>
                <th class="px-6 py-4 border-b">Date</th>
                <th class="px-6 py-4 border-b text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <?php if (empty($articles)): ?>
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        Aucun article publié pour le moment.
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($articles as $article): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 border-b">
                            <?php if ($article['image_url']): ?>
                                <img src="<?= htmlspecialchars($article['image_url']) ?>" alt="" class="w-12 h-12 object-cover rounded shadow-sm">
                            <?php else: ?>
                                <div class="w-12 h-12 bg-gray-100 flex items-center justify-center rounded text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 border-b">
                            <div class="font-medium text-gray-900"><?= htmlspecialchars($article['title']) ?></div>
                        </td>
                        <td class="px-6 py-4 border-b">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                <?= htmlspecialchars($article['category']) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 border-b text-gray-600">
                            <?= htmlspecialchars($article['first_name'] . ' ' . $article['last_name']) ?>
                        </td>
                        <td class="px-6 py-4 border-b text-sm text-gray-500">
                            <?= date('d/m/Y', strtotime($article['created_at'])) ?>
                        </td>
                        <td class="px-6 py-4 border-b text-right space-x-2">
                             <a href="/actualite?id=<?= $article['id'] ?>" target="_blank" class="text-blue-500 hover:text-blue-700 inline-block align-middle">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                             </a>
                             <form action="/admin/articles/delete" method="POST" class="inline" onsubmit="return confirm('Supprimer cet article ?');">
                                <input type="hidden" name="id" value="<?= $article['id'] ?>">
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
