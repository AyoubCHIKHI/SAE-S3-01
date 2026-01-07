<!-- Sidebar -->
<aside class="w-64 bg-gray-800 text-white flex flex-col fixed h-full">
    <div class="p-6 border-b border-gray-700">
        <span class="font-bold text-xl">EGEE Admin</span>
    </div>
    <nav class="flex-1 py-4">
        <a href="/" class="block px-6 py-3 hover:bg-gray-700 border-b border-gray-700 mb-2 pb-4">
             Accueil du site
        </a>
        <a href="/admin" class="block px-6 py-3 hover:bg-gray-700 <?= $currentPage === 'dashboard' ? 'bg-gray-700 font-bold' : '' ?>">
            Tableau de bord
        </a>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'ADMIN'): ?>
        <a href="/admin/registrations" class="block px-6 py-3 hover:bg-gray-700 <?= $currentPage === 'registrations' ? 'bg-gray-700 font-bold' : '' ?>">
            Demandes d'inscription
        </a>
        <?php endif; ?>

        <?php if (isset($_SESSION['role']) && in_array($_SESSION['role'], ['ADMIN', 'BUREAU'])): ?>
        <a href="/admin/articles" class="block px-6 py-3 hover:bg-gray-700 <?= $currentPage === 'articles' ? 'bg-gray-700 font-bold' : '' ?>">
            Articles
        </a>
        <a href="/admin/donators" class="block px-6 py-3 hover:bg-gray-700 <?= $currentPage === 'donators' ? 'bg-gray-700 font-bold' : '' ?>">
            Donateurs
        </a>
        <a href="/admin/messages" class="block px-6 py-3 hover:bg-gray-700 <?= $currentPage === 'messages' ? 'bg-gray-700 font-bold' : '' ?>">
            Communications
        </a>
        <a href="/admin/volunteers" class="block px-6 py-3 hover:bg-gray-700 <?= $currentPage === 'volunteers' ? 'bg-gray-700 font-bold' : '' ?>">
            Bénévoles
        </a>
        <a href="/admin/missions" class="block px-6 py-3 hover:bg-gray-700 <?= $currentPage === 'missions' ? 'bg-gray-700 font-bold' : '' ?>">
            Missions
        </a>
        <a href="/admin/beneficiaries" class="block px-6 py-3 hover:bg-gray-700 <?= $currentPage === 'beneficiaries' ? 'bg-gray-700 font-bold' : '' ?>">
            Bénéficiaires
        </a>
        <?php endif; ?>


    <div class="p-4 border-t border-gray-700">
        <a href="/admin/logout" class="block text-center text-red-400 hover:text-red-300">
            Déconnexion
        </a>
    </div>
</aside>
