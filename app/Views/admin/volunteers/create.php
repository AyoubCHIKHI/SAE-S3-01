<?php $currentPage = 'volunteers'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Bénévole - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex">
    <?php require __DIR__ . '/../layout/sidebar.php'; ?>
    <main class="flex-1 ml-64 p-8 overflow-y-auto h-screen">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Ajouter un Bénévole</h1>
        <div class="bg-white rounded shadow p-6 max-w-3xl">
            <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>
            <form action="/admin/volunteers/store" method="POST" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Prénom</label>
                        <input type="text" name="prenom" value="<?= htmlspecialchars($data['prenom'] ?? '') ?>" class="w-full border p-2 rounded" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Nom</label>
                        <input type="text" name="nom" value="<?= htmlspecialchars($data['nom'] ?? '') ?>" class="w-full border p-2 rounded" required>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Date de naissance</label>
                        <input type="date" name="date_naissance" value="<?= htmlspecialchars($data['date_naissance'] ?? '') ?>" class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">Ville</label>
                        <select name="ville" class="w-full border p-2 rounded">
                            <option value="">Sélectionner une ville</option>
                            <?php if (!empty($villes)): foreach($villes as $v): ?>
                                <option value="<?= htmlspecialchars($v['nom']) ?>" <?= (isset($data['ville']) && $data['ville'] == $v['nom']) ? 'selected' : '' ?>><?= htmlspecialchars($v['nom']) ?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                     <div>
                        <label class="block text-gray-700">Email</label>
                        <input type="email" name="email" value="<?= htmlspecialchars($data['email'] ?? '') ?>" class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">Téléphone</label>
                        <input type="text" name="telephone" value="<?= htmlspecialchars($data['telephone'] ?? '') ?>" class="w-full border p-2 rounded">
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Profession</label>
                    <input type="text" name="profession" value="<?= htmlspecialchars($data['profession'] ?? '') ?>" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block text-gray-700">Compétences particulières</label>
                    <textarea name="competences" class="w-full border p-2 rounded" rows="2"><?= htmlspecialchars($data['competences'] ?? '') ?></textarea>
                </div>
                <div>
                    <label class="block text-gray-700">Régime alimentaire</label>
                    <input type="text" name="exigences_alimentaires" value="<?= htmlspecialchars($data['exigences_alimentaires'] ?? '') ?>" placeholder="Végétarien, Halal, etc." class="w-full border p-2 rounded">
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Enregistrer</button>
            </form>
        </div>
    </main>
</body>
</html>
