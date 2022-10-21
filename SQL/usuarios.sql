CREATE TABLE usuarios(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(25) NOT NULL,
    senha VARCHAR(50) NOT NULL
)Engine = InnoDB;

INSERT INTO usuarios (usuario, senha)
VALUES
('admin', 'admin');

SELECT senha FROM usuarios WHERE id = 1;