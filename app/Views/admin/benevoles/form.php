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
        <h1 class="text-2xl font-bold mb-6 text-gray-800">
            <?= $mode === 'create' ? 'Nouveau Bénévole' : 'Modifier Bénévole' ?></h1>

        <div class="bg-white rounded shadow p-6 max-w-2xl">
            <?php if (isset($error)): ?>
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form action="<?= $mode === 'create' ? '/admin/benevoles/store' : '/admin/benevoles/update' ?>"
                method="POST">
                <?php if ($mode === 'edit'): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($benevole['id']) ?>">
                <?php endif; ?>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700">Nom</label>
                        <input type="text" name="nom"
                            value="<?= htmlspecialchars($benevole['Nom'] ?? $data['nom'] ?? '') ?>"
                            class="w-full border p-2 rounded" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Prénom</label>
                        <input type="text" name="prenom"
                            value="<?= htmlspecialchars($benevole['prenom'] ?? $data['prenom'] ?? '') ?>"
                            class="w-full border p-2 rounded" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700">Age</label>
                        <input type="text" name="age"
                            value="<?= htmlspecialchars($benevole['age'] ?? $data['age'] ?? '') ?>"
                            class="w-full border p-2 rounded">
                    </div>
                    <div>
                        <label class="block text-gray-700">Origine Géographique</label>
                        <input type="text" name="origine"
                            value="<?= htmlspecialchars($benevole['OrigineGéo'] ?? $data['origine'] ?? '') ?>"
                            class="w-full border p-2 rounded">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" name="email"
                        value="<?= htmlspecialchars($benevole['email'] ?? $data['email'] ?? '') ?>"
                        class="w-full border p-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Téléphone</label>
                    <input type="text" name="telephone"
                        value="<?= htmlspecialchars($benevole['telephone'] ?? $data['telephone'] ?? '') ?>"
                        class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Ville</label>
                    <select name="id_ville" class="w-full border p-2 rounded" required>
                        <option value="">Sélectionner une ville</option>
                        <?php if (isset($villes)):
                            foreach ($villes as $v): ?>
                                <option value="<?= $v['id_ville'] ?>" <?= (isset($benevole['id_ville']) && $benevole['id_ville'] == $v['id_ville']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($v['nom_ville']) ?>
                                </option>
                            <?php endforeach; endif; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Evénement associé</label>
                    <select name="id_evenement" class="w-full border p-2 rounded" required>
                        <option value="">Sélectionner un événement</option>
                        <?php if (isset($evenements)):
                            foreach ($evenements as $e): ?>
                                <option value="<?= $e['id_evenement'] ?>" <?= (isset($benevole['id_evenement']) && $benevole['id_evenement'] == $e['id_evenement']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($e['nom_']) ?>
                                </option>
                            <?php endforeach; endif; ?>
                    </select>
                </div>

                <div class="flex justify-end gap-2">
                    <a href="/admin/benevoles" class="px-4 py-2 text-gray-600 hover:text-gray-800">Annuler</a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Enregistrer</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>