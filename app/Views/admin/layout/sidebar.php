<!-- Sidebar -->
<aside class="w-64 bg-gray-800 text-white flex flex-col fixed h-full">
    <div class="p-6 border-b border-gray-700">
        <span class="font-bold text-xl">EGEE Admin</span>
    </div>
    <nav class="flex-1 py-4">
        <a href="/admin" class="block px-6 py-3 hover:bg-gray-700 <?= $currentPage === 'dashboard' ? 'bg-gray-700 font-bold' : '' ?>">
            Tableau de bord
        </a>
        <a href="/admin/articles" class="block px-6 py-3 hover:bg-gray-700 <?= $currentPage === 'articles' ? 'bg-gray-700 font-bold' : '' ?>">
            Articles
        </a>
        <a href="/admin/benevoles" class="block px-6 py-3 hover:bg-gray-700 <?= $currentPage === 'benevoles' ? 'bg-gray-700 font-bold' : '' ?>">
            Bénévoles
        </a>
        <a href="/admin/evenements" class="block px-6 py-3 hover:bg-gray-700 <?= $currentPage === 'evenements' ? 'bg-gray-700 font-bold' : '' ?>">
            Evénements
        </a>
    </nav>
    <div class="p-4 border-t border-gray-700">
        <a href="/admin/logout" class="block text-center text-red-400 hover:text-red-300">
            Déconnexion
        </a>
    </div>
</aside>
