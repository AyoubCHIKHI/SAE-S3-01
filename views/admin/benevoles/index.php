<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold text-gray-800">Gestion des Bénévoles</h2>
    <a href="/admin/benevoles/create" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        + Nouveau Bénévole
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom Prénom
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email / Tel
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ville</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Profession
                </th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php if (empty($benevoles)): ?>
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Aucun bénévole trouvé.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($benevoles as $benevole): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">
                                <?= htmlspecialchars($benevole['nom'] . ' ' . $benevole['prenom']) ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                <?= htmlspecialchars($benevole['email']) ?>
                            </div>
                            <div class="text-sm text-gray-500">
                                <?= htmlspecialchars($benevole['telephone']) ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?= htmlspecialchars($benevole['ville']) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?= htmlspecialchars($benevole['profession']) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="/admin/benevoles/edit?id=<?= $benevole['id'] ?>"
                                class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                            <a href="/admin/benevoles/delete?id=<?= $benevole['id'] ?>"
                                class="text-red-600 hover:text-red-900 ml-4"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bénévole ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>