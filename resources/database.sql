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
ALTER TABLE Wiki
ADD COLUMN dateUpdated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

CREATE VIEW wikiView as

SELECT
    Wiki.*,
    utilisateur.name,
    categorie.nameCat,
    GROUP_CONCAT(tags.nameTag ORDER BY tags.nameTag ASC SEPARATOR ', ') AS tag_names
FROM
    Wiki
JOIN
    utilisateur ON wiki.idUser = utilisateur.idUser
JOIN
    categorie ON wiki.idCat = categorie.idCat
LEFT JOIN
    wiki_tags ON Wiki.idWiki = wiki_tags.idWiki
LEFT JOIN
    tags ON wiki_tags.idTag = tags.idTag
WHERE
    Wiki.archived = 0
GROUP BY
    Wiki.idWiki
ORDER BY
    wiki.dateUpdated DESC;


