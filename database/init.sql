-- init.sql: Complete Database Schema for SAE-S3-01

-- Users (Admins, Bureau, Pole)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('ADMIN', 'BUREAU', 'POLE') NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Login Logs
CREATE TABLE IF NOT EXISTS login_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ip_address VARCHAR(45) NOT NULL,
    success BOOLEAN NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Benevoles (Volunteers)
CREATE TABLE IF NOT EXISTS benevoles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    telephone VARCHAR(20),
    ville VARCHAR(255),
    date_naissance DATE,
    profession VARCHAR(255),
    regime_alimentaire VARCHAR(255),
    restrictions_sante TEXT,
    infos_diversite TEXT COMMENT 'Informations génériques pour statistiques de diversité',
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_mise_a_jour TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Partenaires (Partners)
CREATE TABLE IF NOT EXISTS partenaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    type ENUM('ENTREPRISE', 'FONDATION', 'INSTITUTION') NOT NULL,
    contact_nom VARCHAR(255),
    contact_email VARCHAR(255),
    contact_telephone VARCHAR(20),
    est_grand_donateur BOOLEAN DEFAULT FALSE,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Evenements (Events/Missions)
CREATE TABLE IF NOT EXISTS evenements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    type ENUM('MISSION', 'EVENEMENT_INTERNE', 'FORMATION') NOT NULL,
    date_debut DATETIME NOT NULL,
    date_fin DATETIME NOT NULL,
    lieu VARCHAR(255),
    nb_benevoles_requis INT,
    responsable_id INT,
    statut ENUM('PLANIFIE', 'TERMINE', 'ANNULE') DEFAULT 'PLANIFIE',
    FOREIGN KEY (responsable_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Participations (Link Benevole <-> Evenement)
CREATE TABLE IF NOT EXISTS participations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    benevole_id INT NOT NULL,
    evenement_id INT NOT NULL,
    statut ENUM('INSCRIT', 'CONFIRME', 'PRESENT', 'ABSENT') DEFAULT 'INSCRIT',
    FOREIGN KEY (benevole_id) REFERENCES benevoles(id) ON DELETE CASCADE,
    FOREIGN KEY (evenement_id) REFERENCES evenements(id) ON DELETE CASCADE,
    UNIQUE KEY unique_participation (benevole_id, evenement_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Articles (News/Actualités)
CREATE TABLE IF NOT EXISTS articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image_url VARCHAR(255),
    category VARCHAR(50) DEFAULT 'Generale',
    author_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Internal Documents
CREATE TABLE IF NOT EXISTS documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    file_path VARCHAR(255) NOT NULL,
    uploaded_by INT,
    category VARCHAR(50) DEFAULT 'Divers',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uploaded_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Newsletter Subscribers
CREATE TABLE IF NOT EXISTS newsletter_subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_active BOOLEAN DEFAULT TRUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Newsletters (Sent/Drafts)
CREATE TABLE IF NOT EXISTS newsletters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    status ENUM('DRAFT', 'SENT') DEFAULT 'DRAFT',
    sent_at DATETIME NULL,
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Payments (Manual Entry for Donations/Dues)
CREATE TABLE IF NOT EXISTS payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    benevole_id INT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    payment_date DATE NOT NULL,
    type ENUM('DONATION', 'MEMBERSHIP') NOT NULL DEFAULT 'DONATION',
    method ENUM('CHECK', 'CASH', 'TRANSFER', 'OTHER') DEFAULT 'OTHER',
    notes TEXT,
    recorded_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (benevole_id) REFERENCES benevoles(id) ON DELETE SET NULL,
    FOREIGN KEY (recorded_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
