<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold text-gray-800">Gestion des Partenaires</h2>
    <a href="/admin/partenaires/create" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        + Nouveau Partenaire
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom / Type
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grand
                    Donateur</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php if (empty($partenaires)): ?>
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Aucun partenaire trouvé.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($partenaires as $partenaire): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">
                                <?= htmlspecialchars($partenaire['nom']) ?>
                            </div>
                            <div class="text-sm text-gray-500">
                                <?= htmlspecialchars($partenaire['type']) ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                <?= htmlspecialchars($partenaire['contact_nom']) ?>
                            </div>
                            <div class="text-sm text-gray-500">
                                <?= htmlspecialchars($partenaire['contact_email']) ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?= $partenaire['est_grand_donateur'] ? '<span class="text-green-600 font-bold">Oui</span>' : 'Non' ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="/admin/partenaires/edit?id=<?= $partenaire['id'] ?>"
                                class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                            <a href="/admin/partenaires/delete?id=<?= $partenaire['id'] ?>"
                                class="text-red-600 hover:text-red-900 ml-4"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce partenaire ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>