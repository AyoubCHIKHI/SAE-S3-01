<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="mb-6">
    <a href="/admin/partenaires" class="text-blue-600 hover:underline">← Retour à la liste</a>
    <h2 class="text-3xl font-bold text-gray-800 mt-2">Ajouter un Partenaire</h2>
</div>

<div class="bg-white rounded-lg shadow p-6 max-w-2xl">
    <?php if (isset($error)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="/admin/partenaires/create" method="POST" class="space-y-4">

        <div>
            <label class="block text-sm font-medium text-gray-700">Nom du partenaire *</label>
            <input type="text" name="nom" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Type *</label>
            <select name="type" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2 bg-white">
                <option value="ENTREPRISE">Entreprise</option>
                <option value="FONDATION">Fondation</option>
                <option value="INSTITUTION">Institution</option>
            </select>
        </div>

        <div class="border-t pt-4 mt-4">
            <h3 class="text-lg font-medium text-gray-900 mb-2">Contact Principal</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nom du contact</label>
                    <input type="text" name="contact_nom"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email du contact</label>
                    <input type="email" name="contact_email"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Téléphone du contact</label>
                <input type="text" name="contact_telephone"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
            </div>
        </div>

        <div class="flex items-center mt-4">
            <input type="checkbox" name="est_grand_donateur" id="grand_donateur"
                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
            <label for="grand_donateur" class="ml-2 block text-sm text-gray-900">
                Ce partenaire est un Grand Donateur
            </label>
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-medium">Enregistrer</button>
        </div>
    </form>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>