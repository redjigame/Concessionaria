CREATE TABLE combustivel(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL
)ENGINE = InnoDB;

INSERT INTO combustivel (descricao)
VALUES 
('Gasolina'),
('Alcool'),
('Gas'),
('Flex (Gasolina) | (Alcool)'),
('Flex (Gasolina) | (Gas)');