CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    flag VARCHAR(255)
);

INSERT INTO users (username, password, flag) VALUES ('Romeo', 'Tokiyo', 'CTF{T4chyonS4Li}');
