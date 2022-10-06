use dbtlv;

CREATE TABLE IF NOT EXISTS postagem (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title    VARCHAR(50) NULL,
	content   VARCHAR(250) NULL,    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)  ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome    VARCHAR(50) NULL,
	email   VARCHAR(250) NULL,    
    celular VARCHAR(50) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)  ENGINE=INNODB;


INSERT INTO cliente(nome,email,celular) 
VALUES('Amador Bueno','amador@bueno.com.br','71 9 7358-9899'),
('Pedro Alvares Cabral','pedrao@brasil.com.br','44 9 5358-9899'),
('Tio Phill','rssantan@gmail.com','11 9 7358-4119'),
('Heloísa Tavares Filho','Helo@netflix.com','11 9 8358-4119'),
('Conde de Sarzedas','vampire@hbo.com','21 9 3358-4119'),
('Magda Albuquerque Junior','domindo@fantastico.org','13 9 1234-4119')