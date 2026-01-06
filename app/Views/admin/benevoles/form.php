<?php $currentPage = 'benevoles'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $mode === 'create' ? 'Ajouter' : 'Modifier' ?> un Bénévole - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex">
    <?php require __DIR__ . '/../layout/sidebar.php'; ?>
    <main class="flex-1 ml-64 p-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-800"><?= $mode === 'create' ? 'Nouveau Bénévole' : 'Modifier Bénévole' ?></h1>
        
        <div class="bg-white rounded shadow p-6 max-w-2xl">
            <?php if (isset($error)): ?>
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form action="<?= $mode === 'create' ? '/admin/benevoles/store' : '/admin/benevoles/update' ?>" method="POST">
                <?php if ($mode === 'edit'): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($benevole['id']) ?>">
                <?php endif; ?>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700">Nom</label>
                        <input type="text" name="nom" value="<?= htmlspecialchars($benevole['nom'] ?? $data['nom'] ?? '') ?>" class="w-full border p-2 rounded" required>
                    </div>
                    <div>
                         <label class="block text-gray-700">Prénom</label>
                         <input type="text" name="prenom" value="<?= htmlspecialchars($benevole['prenom'] ?? $data['prenom'] ?? '') ?>" class="w-full border p-2 rounded" required>
                    </div>
                </div>

                <div class="mb-4">
                     <label class="block text-gray-700">Email</label>
                     <input type="email" name="email" value="<?= htmlspecialchars($benevole['email'] ?? $data['email'] ?? '') ?>" class="w-full border p-2 rounded" required>
                </div>

                <div class="mb-4">
                     <label class="block text-gray-700">Téléphone</label>
                     <input type="text" name="telephone" value="<?= htmlspecialchars($benevole['telephone'] ?? $data['telephone'] ?? '') ?>" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                     <label class="block text-gray-700">Ville</label>
                     <input type="text" name="ville" value="<?= htmlspecialchars($benevole['ville'] ?? $data['ville'] ?? '') ?>" class="w-full border p-2 rounded">
                </div>
                
                 <div class="mb-4">
                     <label class="block text-gray-700">Profession</label>
                     <input type="text" name="profession" value="<?= htmlspecialchars($benevole['profession'] ?? $data['profession'] ?? '') ?>" class="w-full border p-2 rounded">
                </div>

                <div class="flex justify-end gap-2">
                    <a href="/admin/benevoles" class="px-4 py-2 text-gray-600 hover:text-gray-800">Annuler</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Enregistrer</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
