<?php $currentPage = 'dashboard'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - EGEE Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex">

    <?php require __DIR__ . '/layout/sidebar.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-8 overflow-y-auto h-screen">
        <header class="flex justify-between items-center pb-6 border-b border-gray-300 mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Tableau de bord</h1>
            <div class="flex items-center gap-4">
                <span class="text-gray-600">Bonjour, <span class="font-bold text-blue-900"><?= htmlspecialchars($user) ?></span></span>
            </div>
        </header>

        <!-- Simple Stats Table -->
        <div class="bg-white rounded shadow p-6 mb-8">
            <h2 class="text-xl font-bold mb-4 text-gray-700">Statistiques Récentes</h2>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="py-2 text-gray-600">Métrique</th>
                        <th class="py-2 text-gray-600">Valeur</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-3">Total Articles</td>
                        <td class="py-3 font-semibold"><?= $stats['articles'] ?? 0 ?></td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-3">Total Bénévoles</td>
                        <td class="py-3 font-semibold"><?= $stats['benevoles'] ?? 0 ?></td>
                    </tr>
                    <tr>
                        <td class="py-3">Total Missions / Evénements</td>
                        <td class="py-3 font-semibold"><?= $stats['missions'] ?? 0 ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Recent Benevoles -->
            <div class="bg-white rounded shadow p-6">
                <h2 class="text-xl font-bold mb-4 text-gray-700">Nouveaux Bénévoles</h2>
                <?php if (empty($recentBenevoles)): ?>
                    <p class="text-gray-500 italic">Aucun bénévole récent.</p>
                <?php else: ?>
                    <ul class="divide-y divide-gray-200">
                        <?php foreach ($recentBenevoles as $benevole): ?>
                            <li class="py-3">
                                <p class="font-semibold text-gray-800"><?= htmlspecialchars($benevole['prenom'] . ' ' . $benevole['nom']) ?></p>
                                <p class="text-sm text-gray-500"><?= htmlspecialchars($benevole['ville']) ?> - <?= date('d/m/Y', strtotime($benevole['date_creation'])) ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="mt-4 text-right">
                        <a href="/admin/benevoles" class="text-blue-600 hover:underline text-sm">Voir tout &rarr;</a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Upcoming Events -->
            <div class="bg-white rounded shadow p-6">
                <h2 class="text-xl font-bold mb-4 text-gray-700">Evénements à Venir</h2>
                <?php if (empty($upcomingEvents)): ?>
                    <p class="text-gray-500 italic">Aucun événement planifié.</p>
                <?php else: ?>
                    <ul class="divide-y divide-gray-200">
                        <?php foreach ($upcomingEvents as $evt): ?>
                            <li class="py-3">
                                <p class="font-semibold text-gray-800"><?= htmlspecialchars($evt['titre']) ?></p>
                                <p class="text-sm text-gray-500">
                                    <?= date('d/m/Y H:i', strtotime($evt['date_debut'])) ?>
                                    <span class="px-2 py-0.5 rounded-full text-xs font-bold bg-gray-100 text-gray-600 ml-2"><?= $evt['type'] ?></span>
                                </p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="mt-4 text-right">
                        <a href="/admin/evenements" class="text-blue-600 hover:underline text-sm">Voir tout &rarr;</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </main>
</body>
</html>
