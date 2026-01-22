use EcommerceTech;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'client') 
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    prix FLOAT,
    id_categorie INT,
    FOREIGN KEY (id_categorie) REFERENCES categories(id)
);

CREATE TABLE commandeItems(
        id INT AUTO_INCREMENT PRIMARY KEY,
        quantite int NOT NULL,
        id_produit INT,
        id_commande INT,
        Foreign Key (id_produit) REFERENCES produits(id),
        Foreign Key (id_commande) REFERENCES commandes(id)
);



CREATE TABLE commandes(
        id INT AUTO_INCREMENT PRIMARY KEY,
        date_creation DATETIME NOT NULL,
        id_user INT,
        Foreign Key (id_user) REFERENCES users(id)
);
ALTER TABLE commandes
MODIFY COLUMN status ENUM('en cours','annule','livree') NOT NULL DEFAULT 'en cours'
AFTER date_creation;

ALTER TABLE produits
ADD COLUMN image VARCHAR(255)NOT NULL AFTER prix;

select * from produits;

delete from users;
select * from users;