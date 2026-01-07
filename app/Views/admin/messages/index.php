<?php $currentPage = 'messages'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans flex">

    <?php require __DIR__ . '/../layout/sidebar.php'; ?>

    <main class="flex-1 ml-64 p-8">
        <header class="mb-10">
            <h1 class="text-3xl font-bold text-gray-900">Messagerie</h1>
            <p class="text-gray-500 mt-1"><?= count($messages) ?> conversation(s)</p>
        </header>

        <div class="max-w-4xl space-y-12">
            <?php if (empty($messages)): ?>
                <div class="text-gray-500 italic">Aucun message reçu pour le moment.</div>
            <?php else: ?>
                <?php foreach ($messages as $msg): ?>
                <div class="border-b border-gray-200 pb-8 last:border-0">
                    <div class="flex items-baseline justify-between mb-4">
                        <div class="flex items-center gap-2 text-gray-900 font-semibold">
                            <span><?= htmlspecialchars($msg['nom']) ?></span>
                            <span class="text-gray-400 font-normal">&mdash;</span>
                            <a href="mailto:<?= htmlspecialchars($msg['email']) ?>" class="text-gray-600 hover:text-black font-normal"><?= htmlspecialchars($msg['email']) ?></a>
                        </div>
                        <span class="text-sm text-gray-400 font-mono"><?= date('d/m/Y H:i', strtotime($msg['cree_le'])) ?></span>
                    </div>

                    <div class="text-gray-800 text-base leading-relaxed mb-6 whitespace-pre-wrap"><?= htmlspecialchars($msg['message']) ?></div>

                    <?php if ($msg['repondu_le']): ?>
                        <div class="bg-gray-50 p-4 border border-gray-100 rounded-sm">
                            <p class="text-xs text-gray-500 uppercase font-semibold mb-2">Répondu le <?= date('d/m/Y à H:i', strtotime($msg['repondu_le'])) ?></p>
                            <div class="text-gray-700"><?= htmlspecialchars($msg['reponse']) ?></div>
                        </div>
                    <?php else: ?>
                        <div class="mt-4">
                            <form action="/admin/messages/reply" method="POST">
                                <input type="hidden" name="id" value="<?= $msg['id'] ?>">
                                <textarea name="reply" rows="3" class="w-full bg-gray-50 border border-gray-200 p-3 text-sm focus:outline-none focus:border-gray-400 focus:bg-white transition-colors" placeholder="Rédiger une réponse..."></textarea>
                                <div class="mt-2 text-right">
                                    <button type="submit" class="text-sm font-semibold text-gray-600 hover:text-black hover:underline transition-colors uppercase tracking-wide">
                                        Envoyer
                                    </button>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
