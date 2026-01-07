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
        <header class="flex justify-between items-center pb-6 mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Tableau de bord</h1>
            <div class="flex items-center gap-4">
                <span class="text-gray-500">Bonjour, <span
                        class="font-medium text-gray-900"><?= htmlspecialchars($user) ?></span></span>
            </div>
        </header>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg border border-gray-200 p-6">
                <div class="text-xs font-medium text-gray-500 uppercase tracking-widest">Total Articles</div>
                <div class="mt-2 text-3xl font-bold text-gray-900"><?= $stats['articles'] ?? 0 ?></div>
            </div>
            
            <div class="bg-white rounded-lg border border-gray-200 p-6">
                <div class="text-xs font-medium text-gray-500 uppercase tracking-widest">Missions</div>
                <div class="mt-2 text-3xl font-bold text-gray-900"><?= $stats['missions'] ?? 0 ?></div>
            </div>

            <div class="bg-white rounded-lg border border-gray-200 p-6">
                <div class="text-xs font-medium text-gray-500 uppercase tracking-widest">Bénéficiaires</div>
                <div class="mt-2 text-3xl font-bold text-gray-900"><?= $stats['beneficiaries'] ?? 0 ?></div>
            </div>

            <div class="bg-white rounded-lg border border-gray-200 p-6">
                <div class="text-xs font-medium text-gray-500 uppercase tracking-widest">Nouveaux Bénévoles</div>
                <div class="mt-2 text-3xl font-bold text-gray-900"><?= $stats['benevoles'] ?? 0 ?></div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- New Volunteers -->
            <div class="bg-white rounded-lg border border-gray-200 flex flex-col">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h2 class="text-base font-bold text-gray-900">Nouveaux Bénévoles</h2>
                    <a href="/admin/volunteers" class="text-gray-500 hover:text-gray-900 text-sm font-medium transition-colors">Voir tout</a>
                </div>
                <div class="p-6 flex-1">
                    <?php if (empty($recentVolunteers)): ?>
                        <p class="text-gray-400 italic text-center py-4 text-sm">Aucun bénévole récent.</p>
                    <?php else: ?>
                        <ul class="space-y-4">
                            <?php foreach ($recentVolunteers as $vol): ?>
                                <li class="flex items-center justify-between">
                                    <div>
                                        <p class="font-medium text-gray-900 text-sm"><?= htmlspecialchars($vol['first_name'] . ' ' . $vol['last_name']) ?></p>
                                        <p class="text-xs text-gray-500"><?= htmlspecialchars($vol['city'] ?? 'Ville inconnue') ?></p>
                                    </div>
                                    <span class="px-2 py-1 text-[10px] font-medium text-gray-600 bg-gray-100 rounded-full tracking-wide">NOUVEAU</span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Upcoming Missions -->
            <div class="bg-white rounded-lg border border-gray-200 flex flex-col">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h2 class="text-base font-bold text-gray-900">Missions à Venir</h2>
                    <a href="/admin/missions" class="text-gray-500 hover:text-gray-900 text-sm font-medium transition-colors">Voir tout</a>
                </div>
                <div class="p-6 flex-1">
                    <?php if (empty($upcomingMissions)): ?>
                        <p class="text-gray-400 italic text-center py-4 text-sm">Aucune mission planifiée.</p>
                    <?php else: ?>
                        <ul class="space-y-4">
                            <?php foreach ($upcomingMissions as $miss): ?>
                                <li class="flex items-center justify-between group cursor-default">
                                    <div>
                                        <p class="font-medium text-gray-900 group-hover:text-black transition text-sm"><?= htmlspecialchars($miss['title']) ?></p>
                                        <p class="text-xs text-gray-500">
                                            <?= date('d/m/Y', strtotime($miss['start_date'])) ?>
                                        </p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </main>
</body>

</html>