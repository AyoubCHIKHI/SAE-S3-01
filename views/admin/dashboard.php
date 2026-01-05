<?php
$pageTitle = 'Tableau de bord';
require __DIR__ . '/layout/header.php';
?>

<header class="flex justify-between items-center mb-8">
    <h2 class="text-3xl font-bold text-gray-800">Tableau de bord</h2>
</header>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Stats Cards -->
    <?php if (in_array($_SESSION['user_role'], [ROLE_ADMIN, ROLE_RESP_BENEVOLE])): ?>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Bénévoles</h3>
            <div class="flex items-center justify-between">
                <span class="text-3xl font-bold text-gray-800"><?= $stats['benevoles'] ?></span>
                <span class="p-2 bg-blue-100 text-blue-600 rounded-full">
                    <!-- Icon User Group -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </span>
            </div>
            <a href="/admin/benevoles" class="text-sm text-blue-600 hover:text-blue-800 mt-4 inline-block font-medium">Voir
                les bénévoles →</a>
        </div>
    <?php endif; ?>

    <?php if (in_array($_SESSION['user_role'], [ROLE_ADMIN, ROLE_RESP_PARTENAIRE])): ?>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Partenaires</h3>
            <div class="flex items-center justify-between">
                <span class="text-3xl font-bold text-gray-800"><?= $stats['partenaires'] ?></span>
                <span class="p-2 bg-green-100 text-green-600 rounded-full">
                    <!-- Icon Office Building -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </span>
            </div>
            <a href="/admin/partenaires"
                class="text-sm text-green-600 hover:text-green-800 mt-4 inline-block font-medium">Gérer les partenaires
                →</a>
        </div>
    <?php endif; ?>

    <?php if (in_array($_SESSION['user_role'], [ROLE_ADMIN, ROLE_RESP_EVENEMENT])): ?>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Événements</h3>
            <div class="flex items-center justify-between">
                <span class="text-3xl font-bold text-gray-800"><?= $stats['evenements'] ?></span>
                <span class="p-2 bg-purple-100 text-purple-600 rounded-full">
                    <!-- Icon Calendar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </span>
            </div>
            <a href="/admin/evenements"
                class="text-sm text-purple-600 hover:text-purple-800 mt-4 inline-block font-medium">Voir le calendrier →</a>
        </div>
    <?php endif; ?>

    <!-- Welcome Card (Bottom) -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 col-span-full">
        <h3 class="text-xl font-semibold mb-2">Bienvenue dans l'interface d'administration</h3>
        <p class="text-gray-600">Vous êtes connecté en tant que
            <strong><?= htmlspecialchars($_SESSION['user_email']) ?></strong>
            (<?= htmlspecialchars($_SESSION['user_role']) ?>).
        </p>
        <div class="mt-4 p-4 bg-gray-50 border-l-4 border-gray-500 text-gray-700 text-sm">
            <p>Utilisez le menu latéral pour naviguer entre les différentes sections de gestion.</p>
        </div>
    </div>
</div>

<?php require __DIR__ . '/layout/footer.php'; ?>