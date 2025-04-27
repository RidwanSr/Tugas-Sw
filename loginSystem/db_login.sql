CREATE DATABASE IF NOT EXISTS db_login;

USE db_login;

CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    alamat VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    telepon VARCHAR(20) NOT NULL
);
