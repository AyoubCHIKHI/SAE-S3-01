
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article['title']) ?> | EGEE</title>
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    <?php require __DIR__ . '/includes/navbar.php'; ?>

    <main class="flex-grow container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <!-- Breadcrumbs -->
            <nav class="mb-8 flex text-gray-500 text-sm">
                <a href="/" class="hover:text-blue-600">Accueil</a>
                <span class="mx-2">/</span>
                <a href="/actualites" class="hover:text-blue-600">Actualités</a>
                <span class="mx-2">/</span>
                <span class="text-gray-800 font-medium"><?= htmlspecialchars($article['title']) ?></span>
            </nav>

            <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Header Image -->
                <?php if ($article['image_url']): ?>
                    <img src="<?= htmlspecialchars($article['image_url']) ?>" alt="" class="w-full h-[400px] object-cover">
                <?php endif; ?>

                <div class="p-8 md:p-12">
                    <!-- Meta info -->
                    <div class="flex items-center gap-4 mb-6">
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold uppercase rounded-full">
                            <?= htmlspecialchars($article['category']) ?>
                        </span>
                        <span class="text-gray-400 text-sm">
                            Publié le <?= date('d F Y', strtotime($article['created_at'])) ?>
                        </span>
                    </div>

                    <h1 class="text-4xl md:text-5xl font-extrabold text-blue-900 mb-8 leading-tight">
                        <?= htmlspecialchars($article['title']) ?>
                    </h1>

                    <!-- Content -->
                    <div class="prose prose-blue max-w-none text-gray-700 leading-relaxed text-lg space-y-6">
                        <?= nl2br(htmlspecialchars($article['content'])) ?>
                    </div>

                    <!-- Footer -->
                    <div class="mt-12 pt-8 border-t border-gray-100 flex justify-between items-center">
                        <button onclick="window.history.back()" class="flex items-center text-blue-600 hover:text-blue-800 font-semibold transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Retour aux actualités
                        </button>
                        
                        <!-- Share (dummy) -->
                        <div class="flex gap-4">
                            <span class="text-sm text-gray-400 uppercase font-bold tracking-widest self-center">Partager :</span>
                            <div class="bg-gray-100 p-2 rounded-full text-blue-600 cursor-pointer hover:bg-blue-600 hover:text-white transition">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </main>

    <?php require __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
