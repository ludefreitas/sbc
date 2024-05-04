CREATE TABLE `tb_evento_status_insc` (
  `idstatus_insc_evento` int(11) NOT NULL AUTO_INCREMENT,
  `descstatus_insc_evento` varchar(32) NOT NULL,
  PRIMARY KEY (`idstatus_insc_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE `tb_evento_status` (
  `idstatus_evento` int(11) NOT NULL AUTO_INCREMENT,
  `descstatus_evento` varchar(32) NOT NULL,
  PRIMARY KEY (`idstatus_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `tb_evento_status_bateria` (
  `idstatus_bateria_evento` int(11) NOT NULL AUTO_INCREMENT,
  `descstatus_bateria_evento` varchar(32) NOT NULL,
  PRIMARY KEY (`idstatus_bateria_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `tb_evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `idespaco` int(11) NOT NULL,
  `idtemporada` int(11) NOT NULL,
  `idstatus_evento` int(11) NOT NULL,
  `desc_evento` varchar(16) NOT NULL,
  `obs_evento` varchar(512) DEFAULT '',
  `imagem_evento` varchar(128) DEFAULT '',
  `pdf_regras_evento` varchar(128) DEFAULT '',
  `iduser` int(11) NOT NULL,
  `iduser2` int(11) NOT NULL,
  `tem_insc` tinyint(4) DEFAULT 0,
  `token` tinyint(4) DEFAULT 0,
  `tipo_resultado_evento` varchar(16) NULL,
  `tem_premiacao` tinyint(4) DEFAULT 0,
  `programa_evento` varchar(32) NOT NULL,
  `origem_evento` varchar(32) NOT NULL,
  `tipo_evento` varchar(32) NOT NULL,
  `dia_inicio_evento` varchar(10) NOT NULL,
  `dia_final_evento` varchar(10) NOT NULL,
  `hora_inicio_evento` varchar(10) NOT NULL,
  `hora_termino_evento` varchar(10) NOT NULL,
  `dt_inicio_divulgacao_evento` timestamp NOT NULL DEFAULT current_timestamp(),
  `dt_final_divulgacao_evento` timestamp NOT NULL DEFAULT current_timestamp(),
  `dt_comeco_insc_evento` timestamp NOT NULL DEFAULT current_timestamp(),
  `dt_termino_insc_evento` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_evento`),
  KEY `fk_evento_status_evento_idx` (`idstatus_evento`),
  KEY `fk_evento_espaco_idx` (`idespaco`),
  KEY `fk_evento_users_idx` (`iduser`),
  KEY `fk_evento_users2_idx` (`iduser2`),
  KEY `fk_evento_temporada_idx` (`idtemporada`),
  CONSTRAINT `fk_evento_status_evento` FOREIGN KEY (`idstatus_evento`) REFERENCES `tb_evento_status` (`idstatus_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
   CONSTRAINT `fk_evento_espaco` FOREIGN KEY (`idespaco`) REFERENCES `tb_espaco` (`idespaco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_temporada` FOREIGN KEY (`idtemporada`) REFERENCES `tb_temporada` (`idtemporada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_users2` FOREIGN KEY (`iduser2`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `tb_evento_categoria` (
  `idcategoria_evento` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(11) NOT NULL,
  `desc_categoria_evento` varchar(32) NOT NULL,
  `idade_inicial` varchar(16) DEFAULT NULL,
  `idade_final` varchar(16) DEFAULT NULL,
  `insc_equipe` tinyint(4) DEFAULT 0,
  `insc_individual` tinyint(4) DEFAULT 0,
  `vagas_categoria_geral` int(8) DEFAULT NULL,
  `vagas_categoria_laudo` int(8) DEFAULT NULL,
  `vagas_categoria_pcd` int(8) DEFAULT NULL,
  `vagas_categoria_pvs` int(8) DEFAULT NULL,
  `genero_categoria` varchar(32) NOT NULL,
  `obs_categoria` varchar(512) DEFAULT '',
  PRIMARY KEY (`idcategoria_evento`),
  KEY `fk_categoria_evento_idx` (`id_evento`),
  CONSTRAINT `fk_categoria_evento` FOREIGN KEY (`id_evento`) REFERENCES `tb_evento` (`id_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `tb_evento_insc_indiv` (   
`idinsc_evento_indiv` int(11) NOT NULL AUTO_INCREMENT,   
`idstatus_insc_evento` int(11) NOT NULL,   
`idcategoria_evento` int(11) NOT NULL,   
`idturma` int(11) NOT NULL,   
`idade_evento` int(11) NOT NULL,   
`numordem_evento` int(11) DEFAULT 0,   
`posicao_evento` int(11) DEFAULT 0,   
`resultado_evento` varchar(10) DEFAULT 0,   
`numsorte_evento` int(11) DEFAULT 0,   
`numcpf_evento` varchar(16) NOT NULL,   
`certificado_evento` tinyint(4) DEFAULT 0,   
`pdf_certificado` tinyint(4) DEFAULT 0,   
`esta_presente` tinyint(4) DEFAULT 0,   
`iduser` int(11) NOT NULL,   
`insc_evento_laudo` int(11) NOT NULL DEFAULT 0,   
`insc_evento_pcd` int(11) NOT NULL DEFAULT 0,   
`insc_evento_pvs` int(11) NOT NULL DEFAULT 0,   
`dt_insc_evento` timestamp NOT NULL DEFAULT current_timestamp(),   
`dt_exclusao_insc_evento` timestamp NULL DEFAULT current_timestamp(),   
PRIMARY KEY (`idinsc_evento_indiv`),   
KEY `fk_insc_evento_categoria_idx` (`idcategoria_evento`),   
KEY `fk_insc_evento_users_idx` (`iduser`),   
KEY `fk_insc_evento_turma_idx` (`idturma`),   
KEY `fk_insc_evento_status_insc_idx` (`idstatus_insc_evento`),   
CONSTRAINT `fk_insc_evento_categoria` FOREIGN KEY (`idcategoria_evento`) REFERENCES `tb_evento_categoria` (`idcategoria_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,   
CONSTRAINT `fk_insc_evento_users` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,   
CONSTRAINT `fk_insc_evento_turma` FOREIGN KEY (`idturma`) REFERENCES `tb_turma` (`idturma`) ON DELETE NO ACTION ON UPDATE NO ACTION,   
CONSTRAINT `fk_insc_evento_status_insc` FOREIGN KEY (`idstatus_insc_evento`) REFERENCES `tb_evento_status_insc` (`idstatus_insc_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION ) 
ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `tb_evento_bateria` (
  `idbateria_evento` int(11) NOT NULL AUTO_INCREMENT,
  `idstatus_bateria_evento` int(11) NOT NULL,
  `idcategoria_evento` int(11) NOT NULL,
  `quantidade_participanteS` int(11) NOT NULL,
  `desc_bateria_evento` varchar(32) NOT NULL,
  `horario_bateria_evento` varchar(10) NOT NULL,
  PRIMARY KEY (`idbateria_evento`),
  KEY `fk_bateria_categoria_evento_idx` (`idcategoria_evento`),
  KEY `fk_bateria_status_bateria_idx` (`idstatus_bateria_evento`),
  CONSTRAINT `fk_bateria_categoria_evento` FOREIGN KEY (`idcategoria_evento`) REFERENCES `tb_evento_categoria` (`idcategoria_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bateria_status_bateria` FOREIGN KEY (`idstatus_bateria_evento`) REFERENCES `tb_evento_status_bateria` (`idstatus_bateria_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


CREATE TABLE `tb_evento_insc_bateria_resultado` (
  `idresultado_evento` int(11) NOT NULL AUTO_INCREMENT,
  `idinsc_evento_indiv` int(11) NOT NULL,
  `idbateria_evento` int(11) NOT NULL,
  `disputa_1` varchar(16) DEFAULT NULL,
  `disputa_2` varchar(16) DEFAULT NULL,
  `disputa_3` varchar(16) DEFAULT NULL,
  `disputa_4` varchar(16) DEFAULT NULL,
  `disputa_5` varchar(16) DEFAULT NULL,
  `total_disputa` varchar(16) DEFAULT NULL,
  `obs_resultado` varchar(512) DEFAULT '',
  PRIMARY KEY (`idresultado_evento`),
  KEY `fk_resultado_insc_evento_idx` (`idinsc_evento_indiv`),
  KEY `fk_resultado_bateria_evento_idx` (`idbateria_evento`),
  CONSTRAINT `fk_resultado_insc_evento` FOREIGN KEY (`idinsc_evento_indiv`) REFERENCES `tb_evento_insc_indiv` (`idinsc_evento_indiv`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_resultado_resultado_evento` FOREIGN KEY (`idbateria_evento`) REFERENCES `tb_evento_bateria` (`idbateria_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;





