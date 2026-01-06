<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="mb-6">
    <a href="/admin/benevoles" class="text-blue-600 hover:underline">← Retour à la liste</a>
    <h2 class="text-3xl font-bold text-gray-800 mt-2">Ajouter un Bénévole</h2>
</div>

<div class="bg-white rounded-lg shadow p-6 max-w-2xl">
    <?php if (isset($error)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="/admin/benevoles/create" method="POST" class="space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nom *</label>
                <input type="text" name="nom" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Prénom *</label>
                <input type="text" name="prenom" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Email *</label>
                <input type="email" name="email" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Téléphone</label>
                <input type="text" name="telephone"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Ville</label>
                <input type="text" name="ville"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Date de naissance</label>
                <input type="date" name="date_naissance"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Profession</label>
            <input type="text" name="profession"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Régime Alimentaire</label>
                <input type="text" name="regime_alimentaire" placeholder="Ex: Végétarien"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Restrictions Santé</label>
                <input type="text" name="restrictions_sante" placeholder="Ex: Mal de dos"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Infos Diversité</label>
            <textarea name="infos_diversite" rows="2"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2"></textarea>
            <p class="text-xs text-gray-500 mt-1">Information générique pour statistiques (origine, etc.)</p>
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-medium">Enregistrer</button>
        </div>
    </form>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>