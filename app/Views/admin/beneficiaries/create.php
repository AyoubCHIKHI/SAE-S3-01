<?php $currentPage = 'beneficiaries'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Bénéficiaire - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex">
    <?php require __DIR__ . '/../layout/sidebar.php'; ?>
    <main class="flex-1 ml-64 p-8 overflow-y-auto h-screen">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Ajouter un Bénéficiaire</h1>
        <div class="bg-white rounded shadow p-6 max-w-2xl">
            <form action="/admin/beneficiaries/store" method="POST" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Prénom</label>
                        <input type="text" name="first_name" class="w-full border p-2 rounded" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Nom</label>
                        <input type="text" name="last_name" class="w-full border p-2 rounded" required>
                    </div>
                </div>
                 <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Email</label>
                        <input type="email" name="email" class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">Téléphone</label>
                        <input type="text" name="phone" class="w-full border p-2 rounded">
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Besoins spécifiques</label>
                    <textarea name="needs" class="w-full border p-2 rounded" rows="3"></textarea>
                </div>
                 <div>
                    <label class="block text-gray-700">Assigner un Bénévole (Optionnel)</label>
                    <select name="assigned_volunteer_id" class="w-full border p-2 rounded">
                        <option value="">-- Aucun --</option>
                        <?php foreach ($volunteers as $v): ?>
                            <option value="<?= $v['id'] ?>"><?= htmlspecialchars($v['first_name'] . ' ' . $v['last_name']) ?> (<?= htmlspecialchars($v['city'] ?? '') ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700">Notes</label>
                    <textarea name="notes" class="w-full border p-2 rounded" rows="2"></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Enregistrer</button>
            </form>
        </div>
    </main>
</body>
</html>
