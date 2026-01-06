<?php
require_once __DIR__ . '/../src/db.php';
require_once __DIR__ . '/../src/models/Article.php';

$pdo = getPDO();
$articleModel = new Article();

// Get an admin user
$stmt = $pdo->query("SELECT id FROM users WHERE role = 'ADMIN' LIMIT 1");
$admin = $stmt->fetch();

if (!$admin) {
    die("Error: No admin user found to attribute articles to.");
}

$authorId = $admin['id'];

$demoArticles = [
    [
        'title' => 'Monswiller se prépare face aux crues !',
        'content' => 'Une initiative locale soutenue par EGEE pour aider les communes à anticiper les risques naturels. Les conseillers EGEE apportent leur expertise en gestion de projet et en analyse de risques pour accompagner les élus locaux dans la mise en place de plans de prévention efficaces.',
        'image_url' => '/assets/img/actualites/MOnswiller-614x460.png',
        'category' => 'Partenariat',
        'author_id' => $authorId
    ],
    [
        'title' => 'Transmettre, accompagner, s’engager ensemble',
        'content' => 'Nos bénévoles partagent leur expérience pour guider la nouvelle génération vers la réussite. À travers des programmes de mentorat et des ateliers pratiques, EGEE favorise le lien intergénérationnel et la transmission des savoir-faire indispensables au monde professionnel.',
        'image_url' => '/assets/img/actualites/BTransmettre-accompagner-368x460-1.png',
        'category' => 'Benevolat',
        'author_id' => $authorId
    ],
    [
        'title' => 'Préparer les jeunes à un monde du travail en mutation',
        'content' => 'Interventions dans les lycées et universités pour décrypter les codes de l\'entreprise. Dans un monde en constante évolution, les conseillers EGEE aident les étudiants à comprendre les nouvelles attentes des employeurs et à développer leur agilité professionnelle.',
        'image_url' => '/assets/img/actualites/travail_en_mutation.jpg',
        'category' => 'Education',
        'author_id' => $authorId
    ]
];

foreach ($demoArticles as $data) {
    if ($articleModel->create($data)) {
        echo "Created: " . $data['title'] . "\n";
    } else {
        echo "Failed: " . $data['title'] . "\n";
    }
}
