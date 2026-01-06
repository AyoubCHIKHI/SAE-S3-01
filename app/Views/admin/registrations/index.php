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
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Demandes d'inscription en attente</h1>

        <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Date</th>
                        <th class="py-3 px-6 text-left">Identité</th>
                        <th class="py-3 px-6 text-left">Rôle demandé</th>
                        <th class="py-3 px-6 text-left">Profession</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-center">Message</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <?php if (empty($requests)): ?>
                        <tr>
                            <td colspan="7" class="py-3 px-6 text-center">Aucune demande en attente.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($requests as $request): ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <?php echo date('d/m/Y H:i', strtotime($request['created_at'])); ?>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="font-bold"><?php echo htmlspecialchars($request['nom'] . ' ' . $request['prenom']); ?></div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">
                                    <?php echo htmlspecialchars($request['role']); ?>
                                </span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <?php echo htmlspecialchars($request['profession']); ?>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <?php echo htmlspecialchars($request['email']); ?>
                            </td>
                            <td class="py-3 px-6 text-center max-w-xs truncate" title="<?php echo htmlspecialchars($request['message']); ?>">
                                <?php echo htmlspecialchars($request['message']); ?>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center space-x-2">
                                    <a href="/admin/registrations/validate?id=<?php echo $request['id']; ?>" class="text-green-500 hover:text-green-700 font-semibold text-sm border border-green-500 hover:bg-green-50 rounded px-2 py-1" title="Valider">
                                        Accepter
                                    </a>
                                    <a href="/admin/registrations/refuse?id=<?php echo $request['id']; ?>" class="text-red-500 hover:text-red-700 font-semibold text-sm border border-red-500 hover:bg-red-50 rounded px-2 py-1" title="Refuser" onclick="return confirm('Êtes-vous sûr de vouloir refuser cette demande ?');">
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

        <h2 class="text-2xl font-bold mb-6 text-gray-800 mt-12">Historique des demandes</h2>
        <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Date</th>
                        <th class="py-3 px-6 text-left">Identité</th>
                        <th class="py-3 px-6 text-left">Rôle demandé</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-center">Statut</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <?php if (empty($history)): ?>
                        <tr>
                            <td colspan="5" class="py-3 px-6 text-center">Aucun historique disponible.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($history as $req): ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <?php echo date('d/m/Y H:i', strtotime($req['created_at'])); ?>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="font-bold"><?php echo htmlspecialchars($req['nom'] . ' ' . $req['prenom']); ?></div>
                                <div class="text-xs text-gray-500"><?php echo htmlspecialchars($req['profession']); ?></div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span class="bg-gray-200 text-gray-600 py-1 px-3 rounded-full text-xs">
                                    <?php echo htmlspecialchars($req['role']); ?>
                                </span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <?php echo htmlspecialchars($req['email']); ?>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <?php if ($req['status'] === 'validated'): ?>
                                    <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs font-bold">Accepté</span>
                                <?php elseif ($req['status'] === 'refused'): ?>
                                    <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs font-bold">Refusé</span>
                                <?php else: ?>
                                    <span class="bg-gray-200 text-gray-600 py-1 px-3 rounded-full text-xs"><?php echo htmlspecialchars($req['status']); ?></span>
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
