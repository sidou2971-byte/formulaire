-- CREATE DATABASE ma_base;
-- \c ma_base;

CREATE TABLE operateur_fonctionnement (
    id SERIAL PRIMARY KEY,
    rc VARCHAR(255) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    telephone VARCHAR(50),
    raison_sociale VARCHAR(255) NOT NULL
);

CREATE TABLE operateur_revente (
    id SERIAL PRIMARY KEY,
    rc VARCHAR(255) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    telephone VARCHAR(50),
    raison_sociale VARCHAR(255) NOT NULL
);

CREATE TABLE admin (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL
);

CREATE TABLE secteur (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
);

CREATE TABLE banque (
    id SERIAL PRIMARY KEY,
    nom_banque VARCHAR(255) NOT NULL
);

CREATE TABLE dossier (
    id SERIAL PRIMARY KEY,
    id_operateur INTEGER NOT NULL,
    type_operateur VARCHAR(50) NOT NULL CHECK (type_operateur IN ('fonctionnement', 'revente')),
    id_secteur INTEGER NOT NULL REFERENCES secteur(id) ON DELETE RESTRICT,
    montant NUMERIC(15, 2) NOT NULL,
    domiciliation BOOLEAN DEFAULT FALSE,
    remarque TEXT
    -- L'id_operateur est une clé étrangère polymorphique.
    -- Elle pointera soit vers operateur_fonctionnement(id), soit vers operateur_revente(id).
);

CREATE TABLE dossier_banque (
    id SERIAL PRIMARY KEY,
    id_dossier INTEGER NOT NULL REFERENCES dossier(id) ON DELETE CASCADE,
    id_banque INTEGER NOT NULL REFERENCES banque(id) ON DELETE CASCADE,
    UNIQUE(id_dossier, id_banque)
);

CREATE TABLE licence (
    id SERIAL PRIMARY KEY,
    numero_licence VARCHAR(255) UNIQUE NOT NULL,
    date_licence DATE NOT NULL
);

CREATE TABLE dossier_licence (
    id SERIAL PRIMARY KEY,
    id_dossier INTEGER NOT NULL REFERENCES dossier(id) ON DELETE CASCADE,
    id_licence INTEGER NOT NULL REFERENCES licence(id) ON DELETE CASCADE,
    UNIQUE(id_dossier, id_licence)
);

CREATE TABLE "D10" (
    id SERIAL PRIMARY KEY,
    id_dossier INTEGER NOT NULL REFERENCES dossier(id) ON DELETE CASCADE,
    pays_origine VARCHAR(255),
    pays_expediteur VARCHAR(255),
    montant NUMERIC(15, 2),
    quantite NUMERIC(15, 2),
    piece_jointe VARCHAR(255)
);

CREATE TABLE "BL" (
    id SERIAL PRIMARY KEY,
    id_dossier INTEGER NOT NULL REFERENCES dossier(id) ON DELETE CASCADE,
    montant NUMERIC(15, 2),
    quantite NUMERIC(15, 2),
    piece_jointe VARCHAR(255)
);

CREATE TABLE "AA" (
    id SERIAL PRIMARY KEY,
    id_dossier INTEGER NOT NULL REFERENCES dossier(id) ON DELETE CASCADE,
    montant NUMERIC(15, 2),
    quantite NUMERIC(15, 2),
    piece_jointe VARCHAR(255)
);

CREATE TABLE traitement (
    id SERIAL PRIMARY KEY,
    id_dossier INTEGER NOT NULL REFERENCES dossier(id) ON DELETE CASCADE,
    id_admin INTEGER NOT NULL REFERENCES admin(id) ON DELETE SET NULL,
    statut VARCHAR(50) NOT NULL,
    commentaire TEXT,
    date_traitement TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Note concernant la règle de gestion:
-- "Si domiciliation = true -> au moins un document (D10, AA ou BL) est obligatoire"
-- En SQL pur, cette vérification est complexe car elle implique plusieurs tables enfant (D10, AA, BL).
-- Il est vivement recommandé d'implémenter cette règle de validation côté Back-end (ex: Laravel Validation) 
-- lors de la soumission du formulaire, avant l'insertion en base de données.
