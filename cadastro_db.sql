CREATE DATABASE cadastro_db;
use cadastro_db;
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(50) NOT NULL,
  senha VARCHAR(50) NOT NULL,
  nome VARCHAR(50) NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  email VARCHAR(50) NOT NULL,
  data_nascimento DATE NOT NULL,
  nome_cachorro VARCHAR(50) NOT NULL
);