-- New Database Schema adapted for MySQL

SET FOREIGN_KEY_CHECKS = 0;

-- Drop Tables if they exist (to clean up old schema if overlapping names, though names are different)
DROP TABLE IF EXISTS Profession, Compétence, Régime_Alimentaire, Mission, Pays, evenement, Media, 
TYPE_PARTENAIRE, TYPE_VERSEMENT, DONATEUR, TYPE_USAGE, TYPE_SOUTIEN, TYPE_INDICATEUR, Ville, 
PARTENAIRE, CONTACT_PARTENAIRE, CONVENTION, SUBVENTION, INDICATEUR, RESULTAT_INDICATEUR, 
Bénévole, Coordonnée, VERSEMENT, PROFILE_BENEVOLE, PossèdeProf, A, Regime, Participe, 
possedeMedia, avoir_type_versement, SOUTIEN_MISSION, SOUTIEN_EVENEMENT;

-- Helper: We keep the existing 'users' table for authentication if it exists
-- but we might need to adjust foreign keys if the new schema references it (it doesn't seem to).

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

CREATE TABLE Profession(
   id_profession VARCHAR(50),
   nom_profession VARCHAR(50),
   PRIMARY KEY(id_profession)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Compétence(
   id_competence VARCHAR(50),
   description_compétence VARCHAR(50),
   PRIMARY KEY(id_competence)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Régime_Alimentaire(
   id_regime VARCHAR(50),
   type_de_régime_alimentaire VARCHAR(50),
   PRIMARY KEY(id_regime)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Mission(
   Id_Mission INT AUTO_INCREMENT,
   Referent VARCHAR(50),
   date_ DATE,
   nom VARCHAR(50),
   heure TIME,
   nbBeneAtt VARCHAR(50),
   Lieu VARCHAR(50),
   BenevoleAttendu VARCHAR(50),
   PRIMARY KEY(Id_Mission, Referent)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Pays(
   id_pays VARCHAR(50),
   nom_pays VARCHAR(50),
   PRIMARY KEY(id_pays)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE evenement(
   id_evenement VARCHAR(50),
   nom_ VARCHAR(50),
   date_debut DATE,
   date_fin DATE,
   PRIMARY KEY(id_evenement)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Media(
   id_media VARCHAR(50),
   nom_media VARCHAR(50),
   PRIMARY KEY(id_media)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE TYPE_PARTENAIRE(
   id_type VARCHAR(50),
   libelle VARCHAR(50),
   PRIMARY KEY(id_type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE TYPE_VERSEMENT(
   id_type VARCHAR(50),
   libelle VARCHAR(50),
   PRIMARY KEY(id_type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE DONATEUR(
   id_donateur VARCHAR(50),
   seuil_donateur VARCHAR(50),
   est_anonyme BOOLEAN,
   PRIMARY KEY(id_donateur)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE TYPE_USAGE(
   id_usage VARCHAR(50),
   libelle VARCHAR(50),
   PRIMARY KEY(id_usage)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE TYPE_SOUTIEN(
   id_type VARCHAR(50),
   libelle VARCHAR(50),
   PRIMARY KEY(id_type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE TYPE_INDICATEUR(
   id_type VARCHAR(50),
   nom_type VARCHAR(50),
   PRIMARY KEY(id_type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Ville(
   id_ville VARCHAR(50),
   nom_ville VARCHAR(50),
   id_pays VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_ville),
   FOREIGN KEY(id_pays) REFERENCES Pays(id_pays)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE PARTENAIRE(
   id_partenaire VARCHAR(50),
   status VARCHAR(50),
   date_ajout VARCHAR(50), -- Consider DATE type? Keeping VARCHAR as requested
   id_donateur VARCHAR(50) NOT NULL,
   id_type VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_partenaire),
   FOREIGN KEY(id_donateur) REFERENCES DONATEUR(id_donateur),
   FOREIGN KEY(id_type) REFERENCES TYPE_PARTENAIRE(id_type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE CONTACT_PARTENAIRE(
   id_contact VARCHAR(50),
   nom VARCHAR(50),
   fonction VARCHAR(50),
   adresse VARCHAR(50),
   email VARCHAR(50),
   téléphone VARCHAR(50),
   id_partenaire VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_contact),
   FOREIGN KEY(id_partenaire) REFERENCES PARTENAIRE(id_partenaire)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE CONVENTION(
   id_convention VARCHAR(50),
   titre VARCHAR(50),
   date_signature VARCHAR(50),
   date_debut VARCHAR(50),
   date_fin VARCHAR(50),
   montant_convention VARCHAR(50),
   id_partenaire VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_convention),
   FOREIGN KEY(id_partenaire) REFERENCES PARTENAIRE(id_partenaire)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE SUBVENTION(
   id_subvention VARCHAR(50),
   montant VARCHAR(50),
   annee VARCHAR(50),
   periode_versement VARCHAR(50),
   id_partenaire VARCHAR(50) NOT NULL,
   id_usage VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_subvention),
   UNIQUE(id_partenaire),
   FOREIGN KEY(id_partenaire) REFERENCES PARTENAIRE(id_partenaire),
   FOREIGN KEY(id_usage) REFERENCES TYPE_USAGE(id_usage)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE INDICATEUR(
   id_indicateur VARCHAR(50),
   nomIndicateur VARCHAR(50),
   unite VARCHAR(50),
   id_type VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_indicateur),
   FOREIGN KEY(id_type) REFERENCES TYPE_INDICATEUR(id_type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE RESULTAT_INDICATEUR(
   id_calcul VARCHAR(50),
   periode VARCHAR(50),
   valeur VARCHAR(50),
   date_generation VARCHAR(50),
   id_evenement VARCHAR(50),
   Id_Mission INT,
   Referent VARCHAR(50),
   id_indicateur VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_calcul),
   FOREIGN KEY(id_evenement) REFERENCES evenement(id_evenement),
   FOREIGN KEY(Id_Mission, Referent) REFERENCES Mission(Id_Mission, Referent),
   FOREIGN KEY(id_indicateur) REFERENCES INDICATEUR(id_indicateur)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Bénévole(
   Id_Bénévole INT AUTO_INCREMENT,
   Nom VARCHAR(50),
   prenom VARCHAR(50),
   age VARCHAR(50),
   OrigineGéo VARCHAR(50),
   id_evenement VARCHAR(50) NOT NULL,
   id_ville VARCHAR(50) NOT NULL,
   PRIMARY KEY(Id_Bénévole),
   FOREIGN KEY(id_evenement) REFERENCES evenement(id_evenement),
   FOREIGN KEY(id_ville) REFERENCES Ville(id_ville)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Coordonnée(
   id_coordonné VARCHAR(50),
   email VARCHAR(50),
   téléphone VARCHAR(50),
   Id_Bénévole INT NOT NULL,
   PRIMARY KEY(id_coordonné),
   FOREIGN KEY(Id_Bénévole) REFERENCES Bénévole(Id_Bénévole)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE VERSEMENT(
   id_versement VARCHAR(50),
   montant VARCHAR(50),
   date_versement VARCHAR(50),
   id_donateur VARCHAR(50) NOT NULL,
   id_partenaire VARCHAR(50) NOT NULL,
   id_subvention VARCHAR(50),
   id_usage VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_versement),
   FOREIGN KEY(id_donateur) REFERENCES DONATEUR(id_donateur),
   FOREIGN KEY(id_partenaire) REFERENCES PARTENAIRE(id_partenaire),
   FOREIGN KEY(id_subvention) REFERENCES SUBVENTION(id_subvention),
   FOREIGN KEY(id_usage) REFERENCES TYPE_USAGE(id_usage)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE PROFILE_BENEVOLE(
   idProfil VARCHAR(50),
   date_création VARCHAR(50),
   date_modification VARCHAR(50),
   age VARCHAR(50),
   Id_Bénévole INT NOT NULL,
   PRIMARY KEY(idProfil),
   FOREIGN KEY(Id_Bénévole) REFERENCES Bénévole(Id_Bénévole)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE PossèdeProf(
   Id_Bénévole INT,
   id_profession VARCHAR(50),
   PRIMARY KEY(Id_Bénévole, id_profession),
   FOREIGN KEY(Id_Bénévole) REFERENCES Bénévole(Id_Bénévole),
   FOREIGN KEY(id_profession) REFERENCES Profession(id_profession)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE A(
   Id_Bénévole INT,
   id_competence VARCHAR(50),
   PRIMARY KEY(Id_Bénévole, id_competence),
   FOREIGN KEY(Id_Bénévole) REFERENCES Bénévole(Id_Bénévole),
   FOREIGN KEY(id_competence) REFERENCES Compétence(id_competence)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Regime(
   Id_Bénévole INT,
   id_regime VARCHAR(50),
   PRIMARY KEY(Id_Bénévole, id_regime),
   FOREIGN KEY(Id_Bénévole) REFERENCES Bénévole(Id_Bénévole),
   FOREIGN KEY(id_regime) REFERENCES Régime_Alimentaire(id_regime)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE Participe(
   Id_Bénévole INT,
   Id_Mission INT,
   Referent VARCHAR(50),
   PRIMARY KEY(Id_Bénévole, Id_Mission, Referent),
   FOREIGN KEY(Id_Bénévole) REFERENCES Bénévole(Id_Bénévole),
   FOREIGN KEY(Id_Mission, Referent) REFERENCES Mission(Id_Mission, Referent)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE possedeMedia(
   id_evenement VARCHAR(50),
   id_media VARCHAR(50),
   PRIMARY KEY(id_evenement, id_media),
   FOREIGN KEY(id_evenement) REFERENCES evenement(id_evenement),
   FOREIGN KEY(id_media) REFERENCES Media(id_media)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE avoir_type_versement(
   id_versement VARCHAR(50),
   id_type VARCHAR(50),
   PRIMARY KEY(id_versement, id_type),
   FOREIGN KEY(id_versement) REFERENCES VERSEMENT(id_versement),
   FOREIGN KEY(id_type) REFERENCES TYPE_VERSEMENT(id_type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE SOUTIEN_MISSION(
   Id_Mission INT,
   Referent VARCHAR(50),
   id_partenaire VARCHAR(50),
   id_convention VARCHAR(50),
   id_type VARCHAR(50),
   date_debut VARCHAR(50),
   date_fin VARCHAR(50),
   montant VARCHAR(50),
   PRIMARY KEY(Id_Mission, Referent, id_partenaire, id_convention, id_type),
   FOREIGN KEY(Id_Mission, Referent) REFERENCES Mission(Id_Mission, Referent),
   FOREIGN KEY(id_partenaire) REFERENCES PARTENAIRE(id_partenaire),
   FOREIGN KEY(id_convention) REFERENCES CONVENTION(id_convention),
   FOREIGN KEY(id_type) REFERENCES TYPE_SOUTIEN(id_type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE SOUTIEN_EVENEMENT(
   id_evenement VARCHAR(50),
   id_partenaire VARCHAR(50),
   id_type VARCHAR(50),
   date_debut VARCHAR(50),
   date_fin VARCHAR(50),
   montant VARCHAR(50),
   PRIMARY KEY(id_evenement, id_partenaire, id_type),
   FOREIGN KEY(id_evenement) REFERENCES evenement(id_evenement),
   FOREIGN KEY(id_partenaire) REFERENCES PARTENAIRE(id_partenaire),
   FOREIGN KEY(id_type) REFERENCES TYPE_SOUTIEN(id_type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;
