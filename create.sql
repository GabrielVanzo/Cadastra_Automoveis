DROP DATABASE IF EXISTS test_webline_db;
CREATE DATABASE IF NOT EXISTS test_webline_db;

CREATE TABLE test_webline_db.montadoras (
  codigo INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL
);

INSERT INTO test_webline_db.montadoras (nome) VALUES
('Volkswagen'),
('Ford'),
('Fiat'),
('Chevrolet');

CREATE TABLE test_webline_db.automoveis (
  codigo INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  placa VARCHAR(20) NOT NULL,
  chassi VARCHAR(100) NOT NULL,
  montadora INT,
  FOREIGN KEY (montadora) REFERENCES montadoras(codigo)
);
