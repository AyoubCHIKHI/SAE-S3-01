<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités | EGEE</title>
    <meta name="description" content="Découvrez les dernières actualités, événements et témoignages de l'association EGEE.">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-slate-900 font-sans antialiased min-h-screen flex flex-col">

    <?php require __DIR__ . '/includes/navbar.php'; ?>

    <main class="flex-grow" id="main-content">
        <!-- Hero Section Simple -->
        <header class="bg-slate-50 border-b border-slate-100 py-16 mb-12">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-5xl font-black text-slate-900 mb-4 tracking-tight">Actualités</h1>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                    Dernières nouvelles, événements et témoignages de notre engagement pour le bénévolat de compétences.
                </p>
            </div>
        </header>

        <div class="container mx-auto px-4 pb-20">
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10" aria-labelledby="news-heading">
                <h2 id="news-heading" class="sr-only">Liste des actualités</h2>
                
                <?php if (empty($articles)): ?>
                    <div class="col-span-full text-center py-20 bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                        <p class="text-slate-500 font-medium italic">Aucune actualité n'est disponible pour le moment.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($articles as $article): 
                        $articleId = "article-" . $article['id'];
                    ?>
                        <article class="group flex flex-col bg-white border border-slate-100 rounded-xl overflow-hidden transition-all hover:border-slate-300" aria-labelledby="<?= $articleId ?>-title">
                            <a href="/actualite?id=<?= $article['id'] ?>" class="block overflow-hidden aspect-video bg-slate-100">
                                <?php if ($article['image_url']): ?>
                                    <img src="<?= htmlspecialchars($article['image_url']) ?>" 
                                         alt="" 
                                         role="presentation" 
                                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center text-slate-300">
                                        <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </a>
                            
                            <div class="p-8 flex-grow flex flex-col">
                                <span class="text-[10px] font-black tracking-widest text-slate-400 uppercase mb-3">
                                    <?= htmlspecialchars($article['categorie']) ?>
                                </span>
                                
                                <h3 id="<?= $articleId ?>-title" class="text-xl font-bold text-slate-900 leading-snug mb-3 group-hover:text-blue-600 transition-colors">
                                    <a href="/actualite?id=<?= $article['id'] ?>">
                                        <?= htmlspecialchars($article['titre']) ?>
                                    </a>
                                </h3>
                                
                                <p class="text-slate-600 line-clamp-3 text-sm leading-relaxed mb-6">
                                    <?= htmlspecialchars(substr($article['contenu'], 0, 160)) ?>...
                                </p>
                                
                                <div class="mt-auto flex items-center justify-between pt-6 border-t border-slate-50">
                                    <time datetime="<?= date('Y-m-d', strtotime($article['cree_le'])) ?>" class="text-xs font-medium text-slate-400">
                                        <?= date('d M Y', strtotime($article['cree_le'])) ?>
                                    </time>
                                    <a href="/actualite?id=<?= $article['id'] ?>" 
                                       class="text-xs font-bold text-slate-900 group-hover:text-blue-600 flex items-center transition-colors"
                                       aria-label="Lire l'article : <?= htmlspecialchars($article['titre']) ?>">
                                        LIRE LA SUITE
                                        <svg class="w-3 h-3 ml-1 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>
        </div>
    </main>

    <?php require __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
