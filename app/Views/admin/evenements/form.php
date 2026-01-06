<?php $currentPage = 'evenements'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $mode === 'create' ? 'Ajouter' : 'Modifier' ?> un Evénement - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex">
    <?php require __DIR__ . '/../layout/sidebar.php'; ?>
    <main class="flex-1 ml-64 p-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-800"><?= $mode === 'create' ? 'Nouvel Evénement' : 'Modifier Evénement' ?></h1>
        
        <div class="bg-white rounded shadow p-6 max-w-2xl">
            <?php if (isset($error)): ?>
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form action="<?= $mode === 'create' ? '/admin/evenements/store' : '/admin/evenements/update' ?>" method="POST">
                <?php if ($mode === 'edit'): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($evenement['id']) ?>">
                <?php endif; ?>

                <div class="mb-4">
                    <label class="block text-gray-700">Titre</label>
                    <input type="text" name="titre" value="<?= htmlspecialchars($evenement['titre'] ?? $data['titre'] ?? '') ?>" class="w-full border p-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Description</label>
                    <textarea name="description" rows="4" class="w-full border p-2 rounded"><?= htmlspecialchars($evenement['description'] ?? $data['description'] ?? '') ?></textarea>
                </div>

                 <div class="mb-4">
                    <label class="block text-gray-700">Type</label>
                    <select name="type" class="w-full border p-2 rounded">
                        <option value="MISSION" <?= (isset($evenement['type']) && $evenement['type'] == 'MISSION') ? 'selected' : '' ?>>Mission</option>
                        <option value="EVENEMENT_INTERNE" <?= (isset($evenement['type']) && $evenement['type'] == 'EVENEMENT_INTERNE') ? 'selected' : '' ?>>Evénement Interne</option>
                        <option value="FORMATION" <?= (isset($evenement['type']) && $evenement['type'] == 'FORMATION') ? 'selected' : '' ?>>Formation</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                         <label class="block text-gray-700">Date Début</label>
                         <input type="datetime-local" name="date_debut" value="<?= isset($evenement['date_debut']) ? date('Y-m-d\TH:i', strtotime($evenement['date_debut'])) : '' ?>" class="w-full border p-2 rounded" required>
                    </div>
                    <div>
                         <label class="block text-gray-700">Date Fin</label>
                         <input type="datetime-local" name="date_fin" value="<?= isset($evenement['date_fin']) ? date('Y-m-d\TH:i', strtotime($evenement['date_fin'])) : '' ?>" class="w-full border p-2 rounded" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Nombre de bénévoles</label>
                    <input type="text" name="nb_benevoles_requis" value="<?= htmlspecialchars($evenement['lieu'] ?? $data['lieu'] ?? '') ?>" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                     <label class="block text-gray-700">Lieu</label>
                     <input type="text" name="lieu" value="<?= htmlspecialchars($evenement['lieu'] ?? $data['lieu'] ?? '') ?>" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Statut</label>
                    <select name="statut" class="w-full border p-2 rounded">
                        <option value="PLANIFIE" <?= (isset($evenement['statut']) && $evenement['statut'] == 'PLANIFIE') ? 'selected' : '' ?>>Planifié</option>
                        <option value="TERMINE" <?= (isset($evenement['statut']) && $evenement['statut'] == 'TERMINE') ? 'selected' : '' ?>>Terminé</option>
                        <option value="ANNULE" <?= (isset($evenement['statut']) && $evenement['statut'] == 'ANNULE') ? 'selected' : '' ?>>Annulé</option>
                    </select>
                </div>

                <div class="flex justify-end gap-2">
                    <a href="/admin/evenements" class="px-4 py-2 text-gray-600 hover:text-gray-800">Annuler</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Enregistrer</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
