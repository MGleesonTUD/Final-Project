CREATE DATABASE shop;
use shop;
CREATE TABLE user (
                      id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                      firstname VARCHAR(30) NOT NULL,
                      lastname VARCHAR(30) NOT NULL,
                      email VARCHAR(50) NOT NULL,
                      age INT(3),
                      password VARCHAR(50) NOT NULL,
                      date TIMESTAMP
);

CREATE TABLE products (
                      id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                      name VARCHAR(255) NOT NULL,
                      price DECIMAL(10, 2) NOT NULL

);