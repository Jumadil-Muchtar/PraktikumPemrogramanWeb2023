--Query Database Tugas 7

CREATE DATABASE tugas7;

USE tugas7;

CREATE TABLE data (
    id INT(11) PRIMARY KEY AUTO_INCREMENT ,
    nim CHAR(255) NOT NULL UNIQUE,
    nama VARCHAR(255) NOT NULL,
    alamat VARCHAR(255) NOT NULL,
    fakultas VARCHAR(255) NOT NULL
);

CREATE TABlE admin (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password TEXT NOT NULL
);