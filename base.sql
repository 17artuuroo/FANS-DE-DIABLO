CREATE DATABASE usuarios_db;
USE usuarios_db;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(50) UNIQUE,
  password VARCHAR(255)
);
