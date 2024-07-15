CREATE DATABASE ratings_db;

USE ratings_db;

CREATE TABLE ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    rating FLOAT NOT NULL
);
