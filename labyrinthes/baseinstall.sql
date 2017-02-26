DROP DATABASE IF EXISTS labyrinthe;

CREATE DATABASE labyrinthe DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use labyrinthe;

CREATE TABLE parfaitlaby (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `case` VARCHAR(40),
    ligne VARCHAR(30),
    couleur VARCHAR(10),
    PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
                        