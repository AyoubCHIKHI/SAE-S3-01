<?php $currentPage = 'evenements'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Evénements - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex">

    <?php require __DIR__ . '/../layout/sidebar.php'; ?>

    <main class="flex-1 ml-64 p-8">
        <div class="flex justify-between items-center mb-6">
             <h1 class="text-2xl font-bold text-gray-800">Evénements / Missions</h1>
             <a href="/admin/evenements/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">+ Nouvel Evénement</a>
        </div>
        
        <div class="bg-white rounded shadow overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-4 text-gray-600 font-semibold border-b">Titre</th>
                        <th class="p-4 text-gray-600 font-semibold border-b">Type</th>
                        <th class="p-4 text-gray-600 font-semibold border-b">Date</th>
                        <th class="p-4 text-gray-600 font-semibold border-b">Statut</th>
                        <th class="p-4 text-gray-600 font-semibold border-b text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($evenements)): ?>
                        <tr><td colspan="5" class="p-4 text-center text-gray-500 italic">Aucun événement planifié.</td></tr>
                    <?php else: ?>
                        <?php foreach ($evenements as $e): ?>
                        <tr class="hover:bg-gray-50 border-b last:border-0">
                            <td class="p-4 font-medium text-gray-800"><?= htmlspecialchars($e['titre']) ?></td>
                            <td class="p-4"><span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-xs font-bold"><?= $e['type'] ?></span></td>
                            <td class="p-4 text-gray-600"><?= date('d/m/Y H:i', strtotime($e['date_debut'])) ?></td>
                            <td class="p-4">
                                <?php if($e['statut'] == 'PLANIFIE'): ?>
                                    <span class="text-green-600 font-semibold">Planifié</span>
                                <?php elseif($e['statut'] == 'TERMINE'): ?>
                                    <span class="text-gray-500">Terminé</span>
                                <?php else: ?>
                                    <span class="text-red-500">Annulé</span>
                                <?php endif; ?>
                            </td>
                            <td class="p-4 text-right">
                                <a href="/admin/evenements/edit?id=<?= $e['id'] ?>" class="text-blue-600 hover:text-blue-800 mr-3">Modifier</a>
                                <a href="/admin/evenements/delete?id=<?= $e['id'] ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Supprimer cet événement ?')">Supprimer</a>
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