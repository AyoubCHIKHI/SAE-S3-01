<?php
require_once __DIR__ . '/../src/models/Article.php';
$articleModel = new Article();
$articles = $articleModel->getAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités | EGEE - Bénévolat de compétences</title>
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    <?php require __DIR__ . '/../includes/navbar.php'; ?>

    <main class="flex-grow container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-blue-900 mb-8 text-center">Actualités</h1>
        <p class="text-center text-gray-700 mb-12 max-w-2xl mx-auto">
            Retrouvez toutes les dernières nouvelles, événements et témoignages de l'association EGEE.
        </p>

        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (empty($articles)): ?>
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 italic">Aucune actualité n'est disponible pour le moment.</p>
                </div>
            <?php else: ?>
                <?php foreach ($articles as $article): 
                    $catColors = [
                        'Partenariat' => 'text-blue-600',
                        'Benevolat' => 'text-green-600',
                        'Education' => 'text-purple-600',
                        'Entreprise' => 'text-orange-600',
                        'Generale' => 'text-gray-600'
                    ];
                    $catColor = $catColors[$article['category']] ?? 'text-gray-600';
                ?>
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <?php if ($article['image_url']): ?>
                            <img src="<?= htmlspecialchars($article['image_url']) ?>" alt="<?= htmlspecialchars($article['title']) ?>" class="w-full h-48 object-cover">
                        <?php else: ?>
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">Image à venir</span>
                            </div>
                        <?php endif; ?>
                        <div class="p-6">
                            <span class="text-xs font-semibold tracking-wide <?= $catColor ?> uppercase"><?= htmlspecialchars($article['category']) ?></span>
                            <h2 class="mt-2 text-xl font-bold text-gray-900 leading-tight"><?= htmlspecialchars($article['title']) ?></h2>
                            <p class="mt-3 text-gray-600 line-clamp-3">
                                <?= htmlspecialchars(substr($article['content'], 0, 150)) . (strlen($article['content']) > 150 ? '...' : '') ?>
                            </p>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-sm text-gray-500"><?= date('d M Y', strtotime($article['created_at'])) ?></span>
                                <a href="/actualite?id=<?= $article['id'] ?>" class="text-blue-600 hover:text-blue-800 font-medium">Lire la suite &rarr;</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>

    </main>

    <?php require __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
