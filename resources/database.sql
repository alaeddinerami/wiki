CREATE TABLE utilisateur (
    idUser INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    PASSWORD VARCHAR(255),
    role VARCHAR(255)
);

CREATE TABLE categorie (
    idCat INT AUTO_INCREMENT PRIMARY KEY,
    nameCat VARCHAR(255)
);

CREATE TABLE wiki (
    idWiki INT AUTO_INCREMENT PRIMARY KEY,
    nameWiki VARCHAR(255),
    descriptionWiki VARCHAR(255),
    idUser INT,
    idCat INT,
    FOREIGN KEY (idUser) REFERENCES user(idUser),
    FOREIGN KEY (idCat) REFERENCES categorie(idCat)
);

CREATE TABLE tags (
    idTag INT AUTO_INCREMENT PRIMARY KEY,
    nameTag VARCHAR(255)
);
