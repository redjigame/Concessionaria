DROP TABLE IF EXISTS veiculo;
CREATE TABLE veiculo(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    motorizacao CHAR(3) NOT NULL,
    ano YEAR NOT NULL,
    chassi CHAR(17) NOT NULL,
    
    tipo_veiculo INT NOT NULL,
    combustivel INT NOT NULL,
    modelo INT NOT NULL,
    
    CONSTRAINT fk_veiculo_modelo
    FOREIGN KEY (modelo)
    REFERENCES modelo(id),
    
    CONSTRAINT fk_veiculo_tipoveiculo
    FOREIGN KEY (tipo_veiculo)
    REFERENCES tipo_veiculo(id),
    
    CONSTRAINT fk_veiculo_combustivel
    FOREIGN KEY (combustivel)
    REFERENCES combustivel(id)
)ENGINE = InnoDB;

INSERT INTO veiculo
(motorizacao,ano,chassi,modelo,tipo_veiculo,combustivel)
VALUES
('1.8',2018,'9BWZZZ377VT004251',1,1,1);
