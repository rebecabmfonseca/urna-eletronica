CREATE TABLE `tipo_candidato` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `numeros` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

INSERT INTO tipo_candidato (titulo,numeros) VALUES
	 ('vereador',5),
	 ('prefeito',2),
	 ('vice-prefeito',2);

CREATE TABLE `candidatos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `partido` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` int DEFAULT NULL,
  `vice` int DEFAULT NULL,
  `voto` int DEFAULT '0',
  `sou_vice` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo` (`tipo`),
  KEY `vice` (`vice`),
  CONSTRAINT `candidatos_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_candidato` (`id`),
  CONSTRAINT `candidatos_ibfk_2` FOREIGN KEY (`vice`) REFERENCES `candidatos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
INSERT INTO candidatos (nome,numero,partido,foto,tipo,vice,voto,sou_vice) VALUES
	 ('Christianne Varão','51222','PEN','cv1.jpg',1,NULL,0,0),
	 ('Homero do Zé Filho','55555','PSL','cv2.jpg',1,NULL,5,0),
	 ('Dandor','43333','PV','cv3.jpg',1,NULL,0,0),
	 ('Filho','15123','MDB','cv4.jpg',1,NULL,0,0),
	 ('Joel Varão','27222','PSDC','cv5.jpg',1,NULL,0,0),
	 ('Professor Clebson Almeida','45000','PSDB','cv6.jpg',1,NULL,0,0),
	 ('Arão','12','PRP','v3.jpg',3,NULL,1,1),
	 ('Chiquinho do Adbon','12','PDT','cp3.jpg',2,7,1,0),
	 ('Biga','15','MDB','v2.jpg',3,NULL,2,1),
	 ('Malrinete Gralhada','15','MDB','cp2.jpg',2,9,2,0);
INSERT INTO candidatos (nome,numero,partido,foto,tipo,vice,voto,sou_vice) VALUES
	 ('João Rodrigues','45','PV','v1.jpg',3,NULL,0,1),
	 ('Dr. Francisco','45','PSC','cp1.jpg',2,11,0,0),
	 ('Francisca Ferreira Ramos','54','PPL','v4.jpg',3,NULL,0,1),
	 ('Zé Lopes','54','PPL','cp4.jpg',2,13,0,0),
	 ('Malú','65','PC do B','v5.jpg',3,NULL,0,1),
	 ('Lindomar Pescador','65','PC do B','cp5.jpg',2,15,0,0),
	 ('Voto Branco','branco',' - ',' - ',NULL,NULL,2,0),
	 ('Voto Nulo','nulo',' - ',' - ',NULL,NULL,4,0);
