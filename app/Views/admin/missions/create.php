<?php $currentPage = 'missions'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Mission - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex">
    <?php require __DIR__ . '/../layout/sidebar.php'; ?>
    <main class="flex-1 ml-64 p-8 overflow-y-auto h-screen">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Ajouter une Mission</h1>
        <div class="bg-white rounded shadow p-6 max-w-2xl">
            <form action="/admin/missions/store" method="POST" class="space-y-4">
                <div>
                    <label class="block text-gray-700">Titre</label>
                    <input type="text" name="title" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block text-gray-700">Description</label>
                    <textarea name="description" class="w-full border p-2 rounded" rows="3"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Catégorie</label>
                        <select name="category" class="w-full border p-2 rounded">
                            <option value="Social">Social</option>
                            <option value="Solidarité">Solidarité</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700">Lieu</label>
                        <input type="text" name="location" class="w-full border p-2 rounded">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Date/Heure Début</label>
                        <input type="datetime-local" name="start_date" class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">Date/Heure Fin</label>
                        <input type="datetime-local" name="end_date" class="w-full border p-2 rounded">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">Nombre de bénévoles attendus</label>
                        <input type="number" name="expected_volunteers" class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">Responsable Référent</label>
                        <input type="text" name="responsible_person" class="w-full border p-2 rounded">
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700">Matériel nécessaire</label>
                    <textarea name="equipment_needed" class="w-full border p-2 rounded" rows="2"></textarea>
                </div>
                <div>
                    <label class="block text-gray-700">Tâches spécifiques</label>
                    <textarea name="specific_tasks" class="w-full border p-2 rounded" rows="2"></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Enregistrer</button>
            </form>
        </div>
    </main>
</body>
</html>
