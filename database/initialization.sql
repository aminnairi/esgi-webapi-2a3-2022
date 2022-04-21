DROP DATABASE IF EXISTS `esgi-webapi-2a3-2022`;

CREATE DATABASE `esgi-webapi-2a3-2022` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE users(
    id          INTEGER     NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email       VARCHAR(50) NOT NULL UNIQUE,
    firstname   VARCHAR(25) NOT NULL,
    lastname    VARCHAR(25) NOT NULL,
    role        VARCHAR(15) NOT NULL,
    password    CHAR(60)    NOT NULL,
    token       VARCHAR(60)
) ENGINE = InnoDB;
