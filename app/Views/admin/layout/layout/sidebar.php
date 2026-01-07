<aside class="w-64 bg-slate-800 text-white flex flex-col">
    <div class="h-16 flex items-center justify-center border-b border-slate-700">
        <h1 class="text-xl font-bold">EGEE Admin</h1>
    </div>
    <nav class="flex-1 px-2 py-4 space-y-2">
        <?php
        $uri = $_SERVER['REQUEST_URI'];
        $menuItems = [
            ['label' => 'Tableau de bord', 'url' => '/admin', 'icon' => ''],
            ['label' => 'Bénévoles', 'url' => '/admin/volunteers', 'icon' => ''],
            ['label' => 'Partenaires', 'url' => '/admin/partenaires', 'icon' => ''],
            ['label' => 'Événements', 'url' => '/admin/evenements', 'icon' => ''],
            ['label' => 'Actualités', 'url' => '/admin/articles', 'icon' => ''],
        ];

        foreach ($menuItems as $item):
            $isActive = ($uri === $item['url'] || strpos($uri, $item['url'] . '/') === 0) && !($item['url'] === '/admin' && $uri !== '/admin');
            $bgClass = $isActive ? 'bg-slate-700 text-white' : 'text-gray-300 hover:bg-slate-700 hover:text-white';
            ?>
            <a href="<?= $item['url'] ?>" class="block px-4 py-2 rounded <?= $bgClass ?>">
                <?= $item['label'] ?>
            </a>
        <?php endforeach; ?>
    </nav>
    <div class="p-4 border-t border-slate-700">
        <div class="flex items-center gap-3 mb-4">
            <div>
                <p class="text-sm font-medium"><?= htmlspecialchars($_SESSION['user_email'] ?? 'User') ?></p>
                <p class="text-xs text-gray-400"><?= htmlspecialchars($_SESSION['user_role'] ?? 'Role') ?></p>
            </div>
        </div>
        <a href="/admin/logout"
            class="block w-full text-center px-4 py-2 border border-red-500 text-red-400 rounded hover:bg-red-500 hover:text-white transition">Déconnexion</a>
    </div>
</aside>