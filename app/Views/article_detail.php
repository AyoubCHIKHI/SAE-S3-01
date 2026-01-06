<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article['title']) ?> | EGEE</title>
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
</head>
<body class="bg-white text-gray-800 font-sans antialiased min-h-screen flex flex-col">

    <?php require __DIR__ . '/includes/navbar.php'; ?>

    <main class="flex-grow container mx-auto px-4 py-8 md:py-16 max-w-3xl">
        
        <!-- Retour -->
        <div class="mb-8">
            <a href="/actualites" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Retour aux actualités
            </a>
        </div>

        <article>
            <header class="mb-10 text-center">
                <span class="inline-block py-1 px-3 rounded-full bg-blue-50 text-blue-600 text-xs font-semibold tracking-wide uppercase mb-4">
                    <?= htmlspecialchars($article['category']) ?>
                </span>
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 leading-tight">
                    <?= htmlspecialchars($article['title']) ?>
                </h1>
                <time class="text-gray-500 text-sm">
                    Publié le <?= date('d/m/Y', strtotime($article['created_at'])) ?>
                </time>
            </header>

            <?php if ($article['image_url']): ?>
                <figure class="mb-10">
                    <img src="<?= htmlspecialchars($article['image_url']) ?>" alt="<?= htmlspecialchars($article['title']) ?>" class="w-full h-auto rounded-xl shadow-sm">
                </figure>
            <?php endif; ?>

            <div class="prose prose-lg prose-blue mx-auto text-gray-700 leading-relaxed">
                <?= nl2br(htmlspecialchars($article['content'])) ?>
            </div>
        </article>
    </main>

    <?php require __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
