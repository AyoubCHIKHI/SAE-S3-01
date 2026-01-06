<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vidéos EGEE | Association EGEE</title>
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans">

    <?php require __DIR__ . '/includes/navbar.php'; ?>

    <div class="pt-28">

        <div id="hero_section" class="flex flex-col items-center justify-center bg-blue-50 py-20">
            <div class="text-center">
                <h1 class="text-5xl font-bold text-blue-900 mb-6">Nos vidéos</h1>
                <p class="max-w-2xl mx-auto text-lg text-gray-700 px-4">
                    De son histoire et des vidéos réunissant les 4 associations (EGEE, ECTI, OTECI, AGIRabcd) pratiquant le bénévolat de compétence sous la bannière "Talents Seniors Bénévoles".
                </p>
            </div>
        </div>


        <main class="md:px-20 px-8 mt-12 mb-20">
            <h3 class="text-2xl font-semibold mb-8 text-center text-blue-800">
                Quelques vidéos pour découvrir EGEE et son histoire :
            </h3>
            <div class="grid md:grid-cols-2 gap-12 justify-center max-w-5xl mx-auto">
                
                <a href="https://drive.google.com/file/d/1nWbu7OJ1NTTQ9V-Gg3Wp-4F3S8GjgiAG/view" target="_blank" class="group flex flex-col items-center">
                    <div class="relative overflow-hidden rounded-lg shadow-lg aspect-video w-full max-w-md">
                        <img src="/assets/img/video_egee/logo-egee.png" alt="EGEE Aujourd'hui" class="object-cover w-full h-full transform transition duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-10 transition duration-300"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                             <svg class="w-16 h-16 text-white opacity-80 group-hover:opacity-100 transition" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                        </div>
                    </div>
                    <p class="mt-4 text-xl font-medium text-blue-900 group-hover:text-blue-600 transition">EGEE Aujourd'hui</p>
                </a>

                <a href="https://drive.google.com/file/d/1XifWfA21C6HdlPYpFI6Bj-_jI0IqEDkD/view" target="_blank" class="group flex flex-col items-center">
                    <div class="relative overflow-hidden rounded-lg shadow-lg aspect-video w-full max-w-md">
                        <img src="/assets/img/video_egee/histoire_egee.png" alt="L'histoire d'EGEE" class="object-cover w-full h-full transform transition duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-10 transition duration-300"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                             <svg class="w-16 h-16 text-white opacity-80 group-hover:opacity-100 transition" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                        </div>
                    </div>
                    <p class="mt-4 text-xl font-medium text-blue-900 group-hover:text-blue-600 transition">L'histoire d'EGEE</p>
                </a>
            </div>
        </main>

        <main class="md:px-20 px-8 mb-20">
            <h3 class="text-2xl font-semibold mb-8 text-center text-blue-800">
                Différentes conférences :
            </h3>

            <div class="flex justify-center">
                <a href="https://drive.google.com/file/d/1_u85v106VVUcJs9qqyPjjwvt9912T1CL/view?usp=share_link" target="_blank" class="group flex flex-col items-center">
                    <div class="relative overflow-hidden rounded-lg shadow-lg aspect-video w-full max-w-md">
                        <img src="/assets/img/video_egee/salonjuinior2023.png" alt="Salon Junior 2023" class="object-cover w-full h-full transform transition duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-10 transition duration-300"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                             <svg class="w-16 h-16 text-white opacity-80 group-hover:opacity-100 transition" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                        </div>
                    </div>
                    <p class="mt-4 text-xl font-medium text-blue-900 group-hover:text-blue-600 transition">Salon Junior 2023</p>
                </a>
            </div>
        </main>

        <?php require __DIR__ . '/includes/footer.php'; ?>
    </div>
    
    <!-- Donation Modal Includes -->
    <?php include __DIR__ . '/includes/don_modal.php'; ?>

</body>
</html>
