CREATE TABLE tipo_veiculo(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL
)ENGINE = InnoDB;

INSERT INTO tipo_veiculo (descricao)
VALUES ('Carro'),('Moto');

SELECT * FROM tipo_veiculo;
