<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold text-gray-800">Gestion des Événements</h2>
    <a href="/admin/evenements/create" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        + Nouvel Événement
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre / Type
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dates</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lieu</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Responsable
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php if (empty($evenements)): ?>
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Aucun événement trouvé.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($evenements as $event): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium text-gray-900">
                                <?= htmlspecialchars($event['titre']) ?>
                            </div>
                            <div class="text-sm text-gray-500">
                                <?= htmlspecialchars($event['type']) ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Du
                                <?= date('d/m/Y H:i', strtotime($event['date_debut'])) ?>
                            </div>
                            <div class="text-sm text-gray-500">Au
                                <?= date('d/m/Y H:i', strtotime($event['date_fin'])) ?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?= htmlspecialchars($event['lieu']) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?= $event['first_name'] ? htmlspecialchars($event['first_name'] . ' ' . $event['last_name']) : '<span class="italic text-gray-400">Aucun</span>' ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php
                            $statusColors = [
                                'PLANIFIE' => 'bg-blue-100 text-blue-800',
                                'TERMINE' => 'bg-green-100 text-green-800',
                                'ANNULE' => 'bg-red-100 text-red-800'
                            ];
                            $colorClass = $statusColors[$event['statut']] ?? 'bg-gray-100 text-gray-800';
                            ?>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $colorClass ?>">
                                <?= htmlspecialchars($event['statut']) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="/admin/evenements/edit?id=<?= $event['id'] ?>"
                                class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                            <a href="/admin/evenements/delete?id=<?= $event['id'] ?>"
                                class="text-red-600 hover:text-red-900 ml-4"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>