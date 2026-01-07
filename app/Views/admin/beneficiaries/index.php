<?php $currentPage = 'beneficiaries'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bénéficiaires - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex">
    <?php require __DIR__ . '/../layout/sidebar.php'; ?>
    <main class="flex-1 ml-64 p-8 overflow-y-auto h-screen">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-semibold text-gray-900">Bénéficiaires</h1>
            <a href="/admin/beneficiaries/create" class="bg-gray-900 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors">Ajouter un Bénéficiaire</a>
        </div>
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-200 bg-gray-50/50">
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Besoins</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Bénévole Assigné</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                     <?php if (empty($beneficiaries)): ?>
                    <tr>
                        <td colspan="5" class="py-8 text-center text-gray-500 text-sm">Aucun bénéficiaire trouvé.</td>
                    </tr>
                    <?php else: ?>
                        <?php foreach ($beneficiaries as $b): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6 text-sm font-medium text-gray-900"><?= htmlspecialchars($b['prenom'] . ' ' . $b['nom']) ?></td>
                            <td class="py-4 px-6 text-sm text-gray-500"><?= htmlspecialchars($b['email']) ?></td>
                            <td class="py-4 px-6 text-sm text-gray-500 max-w-xs truncate" title="<?= htmlspecialchars($b['besoins']) ?>"><?= htmlspecialchars($b['besoins']) ?></td>
                            <td class="py-4 px-6 text-sm">
                                <?php if ($b['v_prenom']): ?>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                        <?= htmlspecialchars($b['v_prenom'] . ' ' . $b['v_nom']) ?>
                                    </span>
                                <?php else: ?>
                                    <span class="text-gray-400 text-xs italic">Non assigné</span>
                                <?php endif; ?>
                            </td>
                            <td class="py-4 px-6 text-sm text-right space-x-3">
                                <a href="/admin/beneficiaries/edit?id=<?= $b['id'] ?>" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Editer</a>
                                <a href="/admin/beneficiaries/delete?id=<?= $b['id'] ?>" class="text-gray-400 hover:text-red-700 transition-colors" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
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
