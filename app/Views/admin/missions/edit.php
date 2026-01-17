<?php $currentPage = 'missions'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier Mission - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex">
    <?php require __DIR__ . '/../layout/sidebar.php'; ?>
    <main class="flex-1 ml-64 p-8 overflow-y-auto h-screen">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Modifier une Mission</h1>
        <div class="bg-white rounded shadow p-6 max-w-2xl">
            <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>
            <form action="/admin/missions/update" method="POST" class="space-y-4">
                <input type="hidden" name="id" value="<?= $mission['id'] ?>">
                <div>
                    <label class="block text-gray-700">Titre</label>
                    <input type="text" name="titre" value="<?= htmlspecialchars($mission['titre']) ?>"
                        class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block text-gray-700">Description</label>
                    <textarea name="description" class="w-full border p-2 rounded"
                        rows="3"><?= htmlspecialchars($mission['description']) ?></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Catégorie</label>
                        <select name="categorie" class="w-full border p-2 rounded">
                            <option value="Social" <?= ($mission['categorie'] == 'Social') ? 'selected' : '' ?>>Social
                            </option>
                            <option value="Solidarité" <?= ($mission['categorie'] == 'Solidarité') ? 'selected' : '' ?>>
                                Solidarité</option>
                            <option value="Autre" <?= ($mission['categorie'] == 'Autre') ? 'selected' : '' ?>>Autre
                            </option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700">Lieu</label>
                        <input type="text" name="lieu" value="<?= htmlspecialchars($mission['lieu']) ?>"
                            class="w-full border p-2 rounded">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Date/Heure Début</label>
                        <input type="datetime-local" name="date_debut"
                            value="<?= $mission['date_debut'] ? date('Y-m-d\TH:i', strtotime($mission['date_debut'])) : '' ?>"
                            class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">Date/Heure Fin</label>
                        <input type="datetime-local" name="date_fin"
                            value="<?= $mission['date_fin'] ? date('Y-m-d\TH:i', strtotime($mission['date_fin'])) : '' ?>"
                            class="w-full border p-2 rounded">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Nombre de bénévoles attendus</label>
                        <input type="number" name="benevoles_attendus"
                            value="<?= htmlspecialchars($mission['benevoles_attendus']) ?>"
                            class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">Responsable Référent</label>
                        <input type="text" name="responsable" value="<?= htmlspecialchars($mission['responsable']) ?>"
                            class="w-full border p-2 rounded">
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Matériel nécessaire</label>
                    <textarea name="materiel_requis" class="w-full border p-2 rounded"
                        rows="2"><?= htmlspecialchars($mission['materiel_requis']) ?></textarea>
                </div>
                <div>
                    <label class="block text-gray-700">Tâches spécifiques</label>
                    <textarea name="taches_specifiques" class="w-full border p-2 rounded"
                        rows="2"><?= htmlspecialchars($mission['taches_specifiques']) ?></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Mettre à
                    jour</button>
            </form>
        </div>
    </main>
</body>

</html>