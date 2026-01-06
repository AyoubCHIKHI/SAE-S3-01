<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bureau EGEE | Association EGEE</title>
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans">

    <?php require __DIR__ . '/includes/navbar.php'; ?>

    <div class="pt-28 pb-12">
        <section class="text-center py-12 bg-blue-50 mb-12">
            <h2 class="text-4xl font-bold text-blue-900">Bureau EGEE</h2>
        </section>

        <section class="mx-auto my-12 p-8 md:p-12 bg-[#dcefff] rounded-xl w-[90%] max-w-5xl text-center shadow-sm">
            <h2 class="text-[#004b8d] font-bold text-3xl mb-8">Composition du bureau</h2>
            <div class="flex justify-center">
                <img src="/assets/img/ConseilAdministration/bureauEGEE.webp" alt="Schéma du Bureau EGEE" class="w-full max-w-4xl h-auto rounded-xl shadow-lg transform transition duration-300 hover:scale-[1.02]">
            </div>
        </section>

        <?php require __DIR__ . '/includes/footer.php'; ?>
    </div>
    
    <!-- Donation Modal Includes -->
    <?php include __DIR__ . '/includes/don_modal.php'; ?>
</body>
</html>
