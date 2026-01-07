
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('ADMIN', 'BUREAU', 'POLE') NOT NULL,
    profession VARCHAR(255),
    est_actif BOOLEAN DEFAULT TRUE,
    cree_le TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    mis_a_jour_le TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS historique_connexions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT NULL,
    date_heure TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    adresse_ip VARCHAR(45) NOT NULL,
    succes BOOLEAN NOT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE SET NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    contenu TEXT,
    image_url VARCHAR(255),
    categorie VARCHAR(50),
    auteur_id INT,
    cree_le TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    mis_a_jour_le TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (auteur_id) REFERENCES utilisateurs(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS demandes_inscription (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    role ENUM('ADMIN', 'BUREAU', 'POLE', 'BENEVOLE', 'BENEFICIAIRE') NOT NULL,
    profession VARCHAR(255),
    message TEXT,
    statut ENUM('pending', 'validated', 'refused') DEFAULT 'pending',
    cree_le TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS donateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    telephone VARCHAR(50),
    montant DECIMAL(10, 2),
    date DATE,
    message TEXT,
    cree_le TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    reponse TEXT,
    cree_le TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    repondu_le TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS missions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    categorie VARCHAR(100),
    lieu VARCHAR(255),
    date_debut DATETIME,
    date_fin DATETIME,
    benevoles_attendus INT DEFAULT 0,
    responsable VARCHAR(255),
    materiel_requis TEXT,
    taches_specifiques TEXT,
    cree_le TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS benevoles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(100) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    date_naissance DATE,
    email VARCHAR(255),
    telephone VARCHAR(50),
    ville VARCHAR(100),
    profession VARCHAR(100),
    competences TEXT,
    exigences_alimentaires VARCHAR(100),
    cree_le TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS beneficiaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(100) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(255),
    telephone VARCHAR(50),
    besoins TEXT,
    notes TEXT,
    benevole_assigne_id INT,
    cree_le TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (benevole_assigne_id) REFERENCES benevoles(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS mission_benevoles (
    mission_id INT,
    benevole_id INT,
    assigne_le TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (mission_id, benevole_id),
    FOREIGN KEY (mission_id) REFERENCES missions(id) ON DELETE CASCADE,
    FOREIGN KEY (benevole_id) REFERENCES benevoles(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE IF NOT EXISTS pays (
    code VARCHAR(5) PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS villes (
    id VARCHAR(50) PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    pays_code VARCHAR(5) NOT NULL,
    FOREIGN KEY (pays_code) REFERENCES pays(code) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;
