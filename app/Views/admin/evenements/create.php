<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="mb-6">
    <a href="/admin/evenements" class="text-blue-600 hover:underline">← Retour à la liste</a>
    <h2 class="text-3xl font-bold text-gray-800 mt-2">Créer un Événement</h2>
</div>

<div class="bg-white rounded-lg shadow p-6 max-w-2xl">
    <?php if (isset($error)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="/admin/evenements/create" method="POST" class="space-y-4">

        <div>
            <label class="block text-sm font-medium text-gray-700">Titre de l'événement *</label>
            <input type="text" name="titre" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" rows="3"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2"></textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Type *</label>
                <select name="type" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2 bg-white">
                    <option value="MISSION">Mission</option>
                    <option value="EVENEMENT_INTERNE">Événement Interne</option>
                    <option value="FORMATION">Formation</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Statut *</label>
                <select name="statut" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2 bg-white">
                    <option value="PLANIFIE">Planifié</option>
                    <option value="TERMINE">Terminé</option>
                    <option value="ANNULE">Annulé</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Date de début *</label>
                <input type="datetime-local" name="date_debut" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Date de fin *</label>
                <input type="datetime-local" name="date_fin" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Lieu</label>
                <input type="text" name="lieu"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Nb Bénévoles Requis</label>
                <input type="number" name="nb_benevoles_requis" min="0"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Responsable</label>
            <select name="responsable_id"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-2 bg-white">
                <option value="">-- Sélectionner un responsable --</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?= $user['id'] ?>">
                        <?= htmlspecialchars($user['last_name'] . ' ' . $user['first_name']) ?> (
                        <?= $user['role'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="flex justify-end pt-4">
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-medium">Enregistrer</button>
        </div>
    </form>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>