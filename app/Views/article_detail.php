<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article['titre']) ?> | EGEE</title>
    <meta name="description" content="<?= htmlspecialchars(substr($article['contenu'], 0, 160)) ?>">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Article",
      "headline": "<?= htmlspecialchars($article['titre']) ?>",
      "datePublished": "<?= date('c', strtotime($article['cree_le'])) ?>",
      "author": {
        "@type": "Organization",
        "name": "EGEE"
      },
      "description": "<?= htmlspecialchars(substr($article['contenu'], 0, 160)) ?>"
    }
    </script>
</head>
<body class="bg-white text-slate-900 font-sans antialiased min-h-screen flex flex-col">

    <?php require __DIR__ . '/includes/navbar.php'; ?>

    <main class="flex-grow container mx-auto px-4 py-12 max-w-2xl" id="main-content">
        
        <!-- Fil d'Ariane Simple -->
        <nav class="mb-10 flex items-center text-sm text-slate-500" aria-label="Fil d'Ariane">
            <a href="/actualites" class="hover:text-blue-600 transition-colors">Actualités</a>
            <svg class="h-4 w-4 mx-2 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <span class="truncate" aria-current="page"><?= htmlspecialchars($article['titre']) ?></span>
        </nav>

        <article itemscope itemtype="https://schema.org/Article">
            <header class="mb-10">
                <div class="mb-4">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">
                        <?= htmlspecialchars($article['categorie']) ?>
                    </span>
                </div>
                <h1 itemprop="headline" class="text-3xl md:text-5xl font-black text-slate-900 mb-6 tracking-tight leading-tight">
                    <?= htmlspecialchars($article['titre']) ?>
                </h1>
                <div class="flex items-center text-slate-500 text-sm">
                    <time itemprop="datePublished" datetime="<?= date('Y-m-d', strtotime($article['cree_le'])) ?>">
                        Publié le <?= date('d F Y', strtotime($article['cree_le'])) ?>
                    </time>
                    <span class="mx-2">&bull;</span>
                    <span>Par EGEE</span>
                </div>
            </header>

            <?php if ($article['image_url']): ?>
                <figure class="mb-12">
                    <img src="<?= htmlspecialchars($article['image_url']) ?>" 
                         alt="<?= htmlspecialchars($article['titre']) ?>" 
                         itemprop="image" 
                         class="w-full h-auto rounded-lg border border-slate-100 transition-opacity hover:opacity-95">
                </figure>
            <?php endif; ?>

            <div itemprop="articleBody" class="prose prose-slate prose-lg max-w-none prose-headings:font-black prose-a:text-blue-600">
                <?php 
                $content = trim($article['contenu']);
                $paragraphs = preg_split("/\n\s*\n/", $content);
                foreach ($paragraphs as $paragraph): 
                    if (trim($paragraph)):
                ?>
                    <p><?= nl2br(htmlspecialchars(trim($paragraph))) ?></p>
                <?php 
                    endif;
                endforeach; 
                ?>
            </div>
        </article>

        <!-- Section de fin -->
        <div class="mt-16 pt-8 border-t border-slate-100">
            <a href="/actualites" class="inline-flex items-center text-slate-600 hover:text-slate-900 font-medium transition-colors">
                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Voir toutes les actualités
            </a>
        </div>
    </main>

    <?php require __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
