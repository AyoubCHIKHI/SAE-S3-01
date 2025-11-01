<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Où sommes-nous | Bénévolat de compétences</title>

    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../assets/css/don.css">
    <link rel="stylesheet" href="../assets/css/egee_en_france.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" defer></script>
    <script src="../assets/js/egee_en_france.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <?php require $_SERVER['DOCUMENT_ROOT'].'/includes/navbar.php'; ?>

    <!-- Titre et image -->
    <div class="flex justify-center">
        <h1 class="text-center font-bold text-8xl mt-10 ml-20 mx-10 pr-10">
            EGEE Paris proche <br> de chez vous
        </h1>
    <!--    <img src="../assets/img/egee_en_france/carte.png" alt="carte" class="w-96">-->
    </div>

    <!-- Texte descriptif -->
    <p class="text-3xl flex justify-center text-center ml-10 mt-20">
        EGEE Paris est présent dans toutes les régions de <br> France grâce à un réseau d’antennes locales.
        Ces antennes, animées par des bénévoles <br> expérimentés, accompagnent les jeunes, les  entrepreneurs et les acteurs locaux.
        Une présence nationale pour être au plus près <br> des besoins de chaque territoire.
    </p>

    <!-- Carte et informations -->
    <div class="flex flex-col md:flex-row mt-10 gap-20 ml-10 justify-center items-center">
        <div id="map"></div>

        <div class = "flex flex-col"  >
            <ul class="border-2 border-blue-300 rounded py-2 px-4 mt-10">
                <li class="mb-2">EGEE ILE-DE-FRANCE :</li>
                <li class="cursor-pointer transition transform hover:scale-105 hover:bg-blue-50 mb-2"
                    onclick="window.open('https://www.linkedin.com/in/lcayron/?originalSubdomain=fr')">
                    Délégué Régional Île-de-France : Loïc CAYRON
                </li>
                <li class="cursor-pointer transition transform hover:scale-105 hover:bg-blue-50 mb-2"
                    onclick="window.open('https://www.google.com/maps?q=14+Villa+de+Lourcine+75014+PARIS', '_blank')">
                    14, Villa de Lourcine – 75014 PARIS
                </li>
                <li class="cursor-pointer transition transform hover:scale-105 hover:bg-blue-50 mb-2"
                    onclick="window.location.href='tel:+33147055771'">
                    📞 01 47 05 57 71
                </li>
                <li class="cursor-pointer transition transform hover:scale-105 hover:bg-blue-50"
                    onclick="window.location.href='mailto:contact@egee.asso.fr'">
                    ✉️ lcayron@egee.asso.fr
                </li>
            </ul>

            <ul class="border-2 border-blue-300 rounded py-2 px-4 mt-10">
                <li class="mb-2">EGEE BRETAGNE :</li>
                <li class="cursor-pointer transition transform hover:scale-105 hover:bg-blue-50 mb-2"
                    onclick="window.open('https://www.egee.asso.fr/')">
                    Délégué régional : Gérard MATHERON
                </li>
                <li class="cursor-pointer transition transform hover:scale-105 hover:bg-blue-50 mb-2"
                    onclick="window.open('https://www.google.com/maps/place/14+Vla+de+Lourcine,+75014+Paris/@48.8286287,2.3435359,14.75z/data=!4m15!1m8!3m7!1s0x47e671bc2399ce61:0x58767236f8e2d40b!2s14+Vla+de+Lourcine,+75014+Paris!3b1!8m2!3d48.8307177!4d2.338807!16s%2Fg%2F11s1bp2042!3m5!1s0x47e671bc2399ce61:0x58767236f8e2d40b!8m2!3d48.8307177!4d2.338807!16s%2Fg%2F11s1bp2042?entry=ttu&g_ep=EgoyMDI1MTAwMS4wIKXMDSoASAFQAw%3D%3D', '_blank')">
                    CCI Bretagne – 2 avenue de la Préfecture – 35042 Rennes Cédex
                </li>
                <li class="cursor-pointer transition transform hover:scale-105 hover:bg-blue-50 mb-2"
                    onclick="window.location.href='tel:+33299336345'">
                    📞 02 99 33 63 45
                </li>
                <li class="cursor-pointer transition transform hover:scale-105 hover:bg-blue-50"
                    onclick="window.location.href='mailto:bret@egee.asso.fr '">
                    ✉️ bret@egee.asso.fr
                </li>
            </ul>

            <ul class="border-2 border-blue-300 rounded py-2 px-4 mt-10">
                <li class="mb-2">Délégation régionale GRAND EST :</li>
                <li class="cursor-pointer transition transform hover:scale-105 hover:bg-blue-50 mb-2"
                    onclick="window.open('https://www.linkedin.com/in/sylvain-valsasina-7a3b52122/?originalSubdomain=fr')">
                    Délégué régional  : Sylvain VALSASINA
                </li>
                <li class="cursor-pointer transition transform hover:scale-105 hover:bg-blue-50 mb-2"
                    onclick="window.open('https://www.google.fr/maps/place/Maison+de+l\'entreprise/@48.7049911,6.126948,16z/data=!3m2!4b1!5s0x4794a2da310ae0a5:0x6f27cb4ae9388a53!4m6!3m5!1s0x4794a2da30ef9b33:0xcdfa5c402c99932a!8m2!3d48.7049876!4d6.1295229!16s%2Fg%2F11cs68g93l?hl=fr&entry=ttu&g_ep=EgoyMDI1MTAwMS4wIKXMDSoASAFQAw%3D%3D', '_blank')">
                    Maison de l’Entreprise – 8, rue Alfred Kastler – 54522 Maxéville cédex
                </li>
                <li class="cursor-pointer transition transform hover:scale-105 hover:bg-blue-50 mb-2"
                    onclick="window.location.href='tel:+33608562114'">
                    📞 06 08 56 21 14
                </li>
                <li class="cursor-pointer transition transform hover:scale-105 hover:bg-blue-50"
                    onclick="window.location.href='mailto:gest@egee.asso.fr'">
                    ✉️ gest@egee.asso.fr
                </li>
            </ul>



        </div>
    </div>

    <?php require $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'; ?>
    
</body>
</html>
