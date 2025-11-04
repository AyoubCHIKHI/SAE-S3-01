<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Je fais un don à EGEE | Bénévolat de compétences</title>
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../assets/css/don.css">
</head>

<body class="flex flex-col h-screen">

    <?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php'; ?>

    <article class="flex flex-col md:flex-row flex-1 justify-center items-center gap-4 md:gap-24 py-8 md:p-16">

        <section id="coordonnées" class="flex justify-center flex-col">
            <p class="text-3xl font-bold">Contactez-nous</p>
            <p class="w-[18em] my-2">Envie d’échanger ou de collaborer ? EGEE vous écoute et vous accompagne.</p>

            <div class="flex flex-col w-[20em] gap-4 my-8 whitespace-nowrap">
                <div
                    class="flex items-center border-2 border-blue-300 rounded py-2 px-4 gap-4 cursor-pointer transition transform hover:scale-105 hover:bg-blue-50"
                    onclick="window.location.href='tel:+33147055771'">
                    <img src="../assets/img/nous_contactez/telephone.svg" alt="téléphone" class="w-6">
                    <p>01 47 05 57 71</p>
                </div>


                <div
                    class="flex items-center border-2 border-blue-300 rounded py-2 px-4 gap-4 cursor-pointer transition transform hover:scale-105 hover:bg-blue-50"
                    onclick="window.location.href='mailto:contact@egee.asso.fr'">
                    <img src="../assets/img/nous_contactez/mail.svg" alt="email" class="w-6">
                    <p>contact@egee.asso.fr</p>
                </div>

                <div
                    class="flex items-center border-2 border-blue-300 rounded py-2 px-4 gap-4 cursor-pointer transition transform hover:scale-105 hover:bg-blue-50"
                    onclick="window.open('https://www.google.com/maps?q=14+Villa+de+Lourcine+75014+PARIS', '_blank')">
                    <img src="../assets/img/nous_contactez/location-pin.svg" alt="localisation" class="w-6">
                    <p>14 Villa de Lourcine - 75014 PARIS</p>
                </div>
            </div>

        </section>

        <section id="formulaire_contact" class="flex flex-col justify-center py-6 md:py-0 md:px-12">

            <div class="flex gap-4">

                <div class="flex flex-col">
                    <label for="nom" class="font-bold">NOM:</label>
                    <input
                        id="nom"
                        type="text"
                        name="nom"
                        placeholder="Votre nom"
                        class="border-2 rounded-md p-2 placeholder-gray-600 mt-2">
                </div>

                <div class="flex flex-col">
                    <label for="prénom" class="font-bold">Prénom:</label>
                    <input
                        id="prénom"
                        type="text"
                        name="prénom"
                        placeholder="Votre prénom"
                        class="border-2 rounded-md p-2 placeholder-gray-600 mt-2">
                </div>

            </div>

            <label for="email" class="font-bold mt-4">Email:</label>
            <input
                id="email"
                type="email"
                name="email"
                placeholder="votremail@mail.com"
                class="border-2 rounded-md p-2 placeholder-gray-600 mt-2">

            <label for="telephone" class="font-bold mt-4">Numéro:</label>
            <input
                id="telephone"
                type="tel"
                name="telephone"
                placeholder="0123456789"
                class="border-2 rounded-md p-2 placeholder-gray-600 mt-2">

            <label for="message" class="font-bold mt-4">Votre message:</label>
            <textarea
                id="message"
                name="message"
                placeholder="Écrivez votre message"
                class="border-2 rounded-md p-2 h-[8em] placeholder-gray-600 mt-2"></textarea>

            <button class="bg-blue-400 py-4 px-6 rounded mt-6 text-white transform transition duration-300 hover:bg-blue-600 hover:scale-105 hover:shadow-lg">
                Envoyer votre message
            </button>

        </section>

    </article>

    <?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

</body>

</html>