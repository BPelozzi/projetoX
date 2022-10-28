CREATE TABLE `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_ensaios` int NOT NULL,
  `id_usuarios` int NOT NULL,
  `cliente` varchar(45) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `acompanhante` varchar(45) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `celular` varchar(45) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_id_ensaio_idx` (`id_ensaios`),
  KEY `id_ensaio_idx` (`id_ensaios`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE `ensaios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuarios` varchar(45) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tipo_ensaio` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `data_ensaio` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `hora_ensaio` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `local_ensaio` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `pacote_fotos` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nome_crianca` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `idade_crianca` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nome_crianca2` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `idade_crianca2` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `material_smash` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `valor_pacote` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `forma_pagamento` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `pagamento_concluido` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `observacoes` blob,
  `impressao_foto` varchar(45) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ajudante` varchar(45) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `tempo_ensaio` varchar(45) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `data_insercao` datetime DEFAULT NULL,
  `situacao` varchar(45) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE `forma_pagamento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `forma_pagamento` varchar(45) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE `tb_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `situacao` varchar(45) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`,`situacao`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(45) COLLATE utf8mb3_unicode_ci NOT NULL,
  `senha` varchar(45) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

NRUNORMORMORMROMROMRMORMORMORMROMROMRO

