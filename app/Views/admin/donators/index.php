<?php $currentPage = 'donators'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Donateurs - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex">

    <?php require __DIR__ . '/../layout/sidebar.php'; ?>

    <main class="flex-1 ml-64 p-8 overflow-y-auto h-screen">
        <header class="flex justify-between items-center pb-6 mb-8">
            <h1 class="text-2xl font-semibold text-gray-900">Donateurs</h1>
        </header>

        <!-- Formulaire d'ajout rapide -->
        <section class="bg-white p-6 rounded-lg border border-gray-200 mb-8">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Ajouter un donateur</h2>
            <form action="/admin/donators/store" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="name" placeholder="Nom complet" required class="border border-gray-300 p-2 rounded-lg text-sm focus:border-gray-500 focus:outline-none">
                <input type="email" name="email" placeholder="Email" class="border border-gray-300 p-2 rounded-lg text-sm focus:border-gray-500 focus:outline-none">
                <input type="tel" name="phone" placeholder="Téléphone" class="border border-gray-300 p-2 rounded-lg text-sm focus:border-gray-500 focus:outline-none">
                <input type="number" step="0.01" name="amount" placeholder="Montant (€)" class="border border-gray-300 p-2 rounded-lg text-sm focus:border-gray-500 focus:outline-none">
                <textarea name="message" placeholder="Message / Note" class="border border-gray-300 p-2 rounded-lg text-sm focus:border-gray-500 focus:outline-none col-span-2"></textarea>
                <div class="col-span-2 text-right">
                    <button type="submit" class="bg-gray-900 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors">
                        Ajouter le donateur
                    </button>
                </div>
            </form>
        </section>

        <!-- Liste des donateurs -->
        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-200 bg-gray-50/50">
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Don</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm">
                    <?php if (empty($donators)): ?>
                        <tr>
                            <td colspan="5" class="py-8 text-center text-gray-500 italic">Aucun donateur trouvé.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($donators as $donator): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6 font-medium text-gray-900">
                                <?= htmlspecialchars($donator['name']) ?>
                                <div class="text-xs text-gray-500 font-normal"><?= htmlspecialchars($donator['phone'] ?? '') ?></div>
                            </td>
                            <td class="py-4 px-6 text-gray-500"><?= htmlspecialchars($donator['email']) ?></td>
                            <td class="py-4 px-6 font-semibold text-gray-900"><?= number_format($donator['amount'] ?? 0, 2) ?> €</td>
                            <td class="py-4 px-6 text-gray-500"><?= date('d/m/Y', strtotime($donator['created_at'])) ?></td>
                            <td class="py-4 px-6 text-right">
                                <a href="/admin/donators/delete?id=<?= $donator['id'] ?>" onclick="return confirm('Êtes-vous sûr ?')" class="text-gray-400 hover:text-red-700 font-bold transition-colors" title="Supprimer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
