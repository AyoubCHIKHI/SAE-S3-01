<?php
$pageTitle = 'Créer un article';
require __DIR__ . '/../layout/header.php';
?>

<div class="max-w-4xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="/admin/articles" class="text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <h2 class="text-3xl font-bold text-gray-800">Nouvel Article</h2>
    </div>

    <?php if (isset($error)): ?>
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form action="/admin/articles/create" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-sm border border-gray-200 space-y-6">
        <div>
            <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Titre de l'article</label>
            <input type="text" name="title" id="title" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="category" class="block text-sm font-semibold text-gray-700 mb-1">Catégorie</label>
                <select name="category" id="category"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                    <option value="Generale">Générale</option>
                    <option value="Partenariat">Partenariat</option>
                    <option value="Benevolat">Bénévolat</option>
                    <option value="Education">Education</option>
                    <option value="Entreprise">Entreprise</option>
                </select>
            </div>
            <div>
                <label for="image" class="block text-sm font-semibold text-gray-700 mb-1">Image de couverture</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>
        </div>

        <div>
            <label for="content" class="block text-sm font-semibold text-gray-700 mb-1">Contenu</label>
            <textarea name="content" id="content" rows="12" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                placeholder="Rédigez votre article ici..."></textarea>
        </div>

        <div class="flex justify-end gap-4 pt-4">
            <a href="/admin/articles" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">Annuler</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-md transition">Publier l'article</button>
        </div>
    </form>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
