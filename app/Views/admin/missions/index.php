<?php $currentPage = 'missions'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Missions - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex">
    <?php require __DIR__ . '/../layout/sidebar.php'; ?>
    <main class="flex-1 ml-64 p-8 overflow-y-auto h-screen">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-semibold text-gray-900">Missions</h1>
            <a href="/admin/missions/create" class="bg-gray-900 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors">Ajouter une Mission</a>
        </div>
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-200 bg-gray-50/50">
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Titre</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Catégorie</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Lieu</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date Début</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Bénévoles</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php if (empty($missions)): ?>
                    <tr>
                        <td colspan="6" class="py-8 text-center text-gray-500 text-sm">Aucune mission trouvée.</td>
                    </tr>
                    <?php else: ?>
                        <?php foreach ($missions as $m): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6 text-sm font-medium text-gray-900"><?= htmlspecialchars($m['titre']) ?></td>
                            <td class="py-4 px-6 text-sm text-gray-500"><?= htmlspecialchars($m['categorie']) ?></td>
                            <td class="py-4 px-6 text-sm text-gray-500"><?= htmlspecialchars($m['lieu']) ?></td>
                            <td class="py-4 px-6 text-sm text-gray-500 text-nowrap"><?= $m['date_debut'] ? date('d/m/Y', strtotime($m['date_debut'])) : '' ?></td>
                            <td class="py-4 px-6 text-sm text-gray-500"><?= htmlspecialchars($m['benevoles_attendus']) ?></td>
                            <td class="py-4 px-6 text-sm text-right space-x-3">
                                <a href="/admin/missions/edit?id=<?= $m['id'] ?>" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Editer</a>
                                <a href="/admin/missions/delete?id=<?= $m['id'] ?>" class="text-gray-400 hover:text-red-700 transition-colors" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
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
