
CREATE TABLE modelo(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(50) NOT NULL,
    marca INT NOT NULL,
	anno YEAR,
    
    CONSTRAINT fk_modelo_marca
    FOREIGN KEY (marca)
    REFERENCES marca(id),
    
    CONSTRAINT uk_modelo
    UNIQUE (descricao,marca,anno)
)ENGINE = InnoDB;

INSERT INTO modelo (descricao, marca, anno)
VALUES
('ONIX',6,2022);

SELECT * FROM modelo;
