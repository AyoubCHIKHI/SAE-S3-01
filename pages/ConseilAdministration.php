<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Association EGEE - Bureau</title>
        <link rel="stylesheet" href="../assets/css/StyleNotreMission.css">
        <link rel="stylesheet" href="../assets/css/don.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            .bureau-section {
                text-align: center;
                margin: 50px auto;
                padding: 40px;
                background-color: #dcefff;
                border-radius: 10px;
                width: 90%;
            }

            .bureau-section h2 {
                color: #004b8d;
                font-weight: 700;
                font-size: 26px;
                margin-bottom: 30px;
            }

            .bureau-image {
                display: flex;
                justify-content: center;
            }

            .bureau-image img {
                max-width: 700px;
                width: 100%;
                height: auto;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            }
        </style>
    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT'].'/includes/navbar.php'; ?>

        <section class="banner">
            <h2>Bureau EGEE</h2>
        </section>

        <section class="bureau-section">
            <h2>Composition du bureau</h2>
            <div class="bureau-image">
                <img src="../assets/img/ConseilAdministration/bureauEGEE.webp" alt="Schéma du Bureau EGEE">
            </div>
        </section>

        <?php include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'; ?>
    </body>
</html>
