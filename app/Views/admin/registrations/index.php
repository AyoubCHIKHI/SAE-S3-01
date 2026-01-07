<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Demandes d'inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex">
    <?php 
    $currentPage = 'registrations'; 
    require __DIR__ . '/../layout/sidebar.php'; 
    ?>

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-8 overflow-y-auto h-screen">
        <h1 class="text-2xl font-semibold mb-6 text-gray-900">Demandes d'inscription en attente</h1>

        <div class="bg-white border border-gray-200 rounded-lg overflow-x-auto mb-12">
            <table class="min-w-full table-auto text-left">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-200">
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Identité</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Rôle demandé</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Profession</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Message</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php if (empty($requests)): ?>
                        <tr>
                            <td colspan="7" class="py-8 text-center text-gray-500 text-sm italic">Aucune demande en attente.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($requests as $request): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                                <?php echo date('d/m/Y H:i', strtotime($request['created_at'])); ?>
                            </td>
                            <td class="py-4 px-6">
                                <div class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($request['nom'] . ' ' . $request['prenom']); ?></div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    <?php echo htmlspecialchars($request['role']); ?>
                                </span>
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500">
                                <?php echo htmlspecialchars($request['profession']); ?>
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500">
                                <?php echo htmlspecialchars($request['email']); ?>
                            </td>
                            <td class="py-4 px-6 text-center max-w-xs truncate text-sm text-gray-500" title="<?php echo htmlspecialchars($request['message']); ?>">
                                <?php echo htmlspecialchars($request['message']); ?>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex item-center justify-center space-x-2">
                                    <a href="/admin/registrations/validate?id=<?php echo $request['id']; ?>" class="text-gray-900 hover:text-green-700 font-semibold text-xs border border-gray-300 hover:border-green-500 hover:bg-green-50 rounded px-3 py-1.5 transition-colors" title="Valider">
                                        Accepter
                                    </a>
                                    <a href="/admin/registrations/refuse?id=<?php echo $request['id']; ?>" class="text-gray-500 hover:text-red-700 font-semibold text-xs border border-gray-300 hover:border-red-500 hover:bg-red-50 rounded px-3 py-1.5 transition-colors" title="Refuser" onclick="return confirm('Êtes-vous sûr de vouloir refuser cette demande ?');">
                                        Refuser
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <h2 class="text-xl font-semibold mb-6 text-gray-900">Historique des demandes</h2>
        <div class="bg-white border border-gray-200 rounded-lg overflow-x-auto">
            <table class="min-w-full table-auto text-left">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-200">
                         <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Identité</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Rôle demandé</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="py-3 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Statut</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php if (empty($history)): ?>
                        <tr>
                            <td colspan="5" class="py-8 text-center text-gray-500 text-sm italic">Aucun historique disponible.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($history as $req): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                                <?php echo date('d/m/Y H:i', strtotime($req['created_at'])); ?>
                            </td>
                            <td class="py-4 px-6">
                                <div class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($req['nom'] . ' ' . $req['prenom']); ?></div>
                                <div class="text-xs text-gray-500"><?php echo htmlspecialchars($req['profession']); ?></div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    <?php echo htmlspecialchars($req['role']); ?>
                                </span>
                            </td>
                            <td class="py-4 px-6 text-sm text-gray-500">
                                <?php echo htmlspecialchars($req['email']); ?>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <?php if ($req['status'] === 'validated'): ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Accepté</span>
                                <?php elseif ($req['status'] === 'refused'): ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Refusé</span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800"><?php echo htmlspecialchars($req['status']); ?></span>
                                <?php endif; ?>
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
