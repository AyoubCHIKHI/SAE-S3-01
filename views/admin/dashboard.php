<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | EGEE</title>
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-slate-800 text-white flex flex-col">
        <div class="h-16 flex items-center justify-center border-b border-slate-700">
            <h1 class="text-xl font-bold">EGEE Admin</h1>
        </div>
        <nav class="flex-1 px-2 py-4 space-y-2">
            <a href="/admin" class="block px-4 py-2 bg-slate-700 rounded text-white">Dashboard</a>
            <!-- Placeholders for future modules -->
            <a href="#" class="block px-4 py-2 hover:bg-slate-700 rounded text-gray-300">Utilisateurs (Future)</a>
        </nav>
        <div class="p-4 border-t border-slate-700">
            <div class="flex items-center gap-3 mb-4">
               <div>
                  <p class="text-sm font-medium"><?= htmlspecialchars($_SESSION['user_email'] ?? 'User') ?></p>
                  <p class="text-xs text-gray-400"><?= htmlspecialchars($_SESSION['user_role'] ?? 'Role') ?></p>
               </div>
            </div>
            <a href="/admin/logout" class="block w-full text-center px-4 py-2 border border-red-500 text-red-400 rounded hover:bg-red-500 hover:text-white transition">Déconnexion</a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <header class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Tableau de bord</h2>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Welcome Card -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 col-span-full">
                <h3 class="text-xl font-semibold mb-2">Bienvenue dans l'interface d'administration</h3>
                <p class="text-gray-600">Vous êtes connecté en tant que <strong><?= htmlspecialchars($_SESSION['user_role']) ?></strong>.</p>
                <div class="mt-4 p-4 bg-blue-50 border-l-4 border-blue-500 text-blue-700">
                    <p>Cette section est sécurisée. Seuls les utilisateurs connectés avec un rôle approprié peuvent voir cette page.</p>
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>
