<?php $currentPage = 'benevoles'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Gestion des Bénévoles - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex">

    <?php require __DIR__ . '/../layout/sidebar.php'; ?>

    <main class="flex-1 ml-64 p-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Bénévoles</h1>
            <a href="/admin/benevoles/create"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">+ Nouveau</a>
        </div>

        <div class="bg-white rounded shadow overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-4 text-gray-600 font-semibold border-b">Nom Complet</th>
                        <th class="p-4 text-gray-600 font-semibold border-b">Email</th>
                        <th class="p-4 text-gray-600 font-semibold border-b">Ville</th>
                        <th class="p-4 text-gray-600 font-semibold border-b text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($benevoles)): ?>
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500 italic">Aucun bénévole trouvé.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($benevoles as $b): ?>
                            <tr class="hover:bg-gray-50 border-b last:border-0">
                                <td class="p-4 font-medium text-gray-800">
                                    <?= htmlspecialchars($b['prenom'] . ' ' . $b['Nom']) ?></td>
                                <td class="p-4 text-gray-600"><?= htmlspecialchars($b['email']) ?></td>
                                <td class="p-4 text-gray-600"><?= htmlspecialchars($b['nom_ville'] ?? '-') ?></td>
                                <td class="p-4 text-right">
                                    <a href="/admin/benevoles/edit?id=<?= $b['Id_Bénévole'] ?>"
                                        class="text-blue-600 hover:text-blue-800 mr-3">Modifier</a>
                                    <a href="/admin/benevoles/delete?id=<?= $b['Id_Bénévole'] ?>"
                                        class="text-red-600 hover:text-red-800"
                                        onclick="return confirm('Supprimer ce bénévole ?')">Supprimer</a>
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