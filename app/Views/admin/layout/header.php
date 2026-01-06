<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $pageTitle ?? 'Admin' ?> | EGEE
    </title>
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex">
        <?php require __DIR__ . '/sidebar.php'; ?>
        <main class="flex-1 p-8">