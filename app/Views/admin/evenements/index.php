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
                        <th class="p-4 text-gray-600 font-semibold border-b">Nom</th>
                        <th class="p-4 text-gray-600 font-semibold border-b">Date Début</th>
                        <th class="p-4 text-gray-600 font-semibold border-b">Date Fin</th>
                        <th class="p-4 text-gray-600 font-semibold border-b text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($evenements)): ?>
                        <tr><td colspan="4" class="p-4 text-center text-gray-500 italic">Aucun événement planifié.</td></tr>
                    <?php else: ?>
                        <?php foreach ($evenements as $e): ?>
                        <tr class="hover:bg-gray-50 border-b last:border-0">
                            <td class="p-4 font-medium text-gray-800"><?= htmlspecialchars($e['nom_']) ?></td>
                            <td class="p-4 text-gray-600"><?= date('d/m/Y', strtotime($e['date_debut'])) ?></td>
                            <td class="p-4 text-gray-600"><?= date('d/m/Y', strtotime($e['date_fin'])) ?></td>
                            <td class="p-4 text-right">
                                <a href="/admin/evenements/edit?id=<?= $e['id_evenement'] ?>" class="text-blue-600 hover:text-blue-800 mr-3">Modifier</a>
                                <a href="/admin/evenements/delete?id=<?= $e['id_evenement'] ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Supprimer cet événement ?')">Supprimer</a>
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