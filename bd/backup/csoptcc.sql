-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.7.10-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema csoptcc
--

CREATE DATABASE IF NOT EXISTS csoptcc;
USE csoptcc;

--
-- Definition of table `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE `carrinho` (
  `oid_carrinho` int(11) NOT NULL AUTO_INCREMENT,
  `oid_peca` int(11) DEFAULT NULL,
  `oid_cliente` int(11) DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `valorvendido` float(9,2) DEFAULT NULL,
  `valortotal` float(9,2) DEFAULT NULL,
  PRIMARY KEY (`oid_carrinho`),
  KEY `oid_peca` (`oid_peca`),
  KEY `oid_cliente` (`oid_cliente`),
  CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`oid_peca`) REFERENCES `peca` (`oid_peca`),
  CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`oid_cliente`) REFERENCES `cliente` (`oid_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carrinho`
--

/*!40000 ALTER TABLE `carrinho` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrinho` ENABLE KEYS */;


--
-- Definition of table `carro`
--

DROP TABLE IF EXISTS `carro`;
CREATE TABLE `carro` (
  `oid_carro` int(11) NOT NULL AUTO_INCREMENT,
  `oid_modelo` int(11) DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `descricao` text,
  `ano` date DEFAULT NULL,
  PRIMARY KEY (`oid_carro`),
  KEY `oid_modelo` (`oid_modelo`),
  CONSTRAINT `carro_ibfk_1` FOREIGN KEY (`oid_modelo`) REFERENCES `modelo` (`oid_modelo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carro`
--

/*!40000 ALTER TABLE `carro` DISABLE KEYS */;
/*!40000 ALTER TABLE `carro` ENABLE KEYS */;


--
-- Definition of table `carropeca`
--

DROP TABLE IF EXISTS `carropeca`;
CREATE TABLE `carropeca` (
  `oid_carropeca` int(11) NOT NULL AUTO_INCREMENT,
  `oid_carro` int(11) DEFAULT NULL,
  `oid_peca` int(11) DEFAULT NULL,
  PRIMARY KEY (`oid_carropeca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carropeca`
--

/*!40000 ALTER TABLE `carropeca` DISABLE KEYS */;
/*!40000 ALTER TABLE `carropeca` ENABLE KEYS */;


--
-- Definition of table `cidade`
--

DROP TABLE IF EXISTS `cidade`;
CREATE TABLE `cidade` (
  `oid_cidade` int(11) NOT NULL AUTO_INCREMENT,
  `oid_estado` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`oid_cidade`),
  KEY `oid_estado` (`oid_estado`),
  CONSTRAINT `cidade_ibfk_1` FOREIGN KEY (`oid_estado`) REFERENCES `estado` (`oid_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cidade`
--

/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;


--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `oid_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `oid_endereco` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `senha` varchar(150) DEFAULT NULL,
  `ultimoacesso` date DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpfcnpj` int(11) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL,
  PRIMARY KEY (`oid_cliente`),
  KEY `oid_endereco` (`oid_endereco`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`oid_endereco`) REFERENCES `endereco` (`oid_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE `comentario` (
  `oid_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `oid_peca` int(11) DEFAULT NULL,
  `oid_cliente` int(11) DEFAULT NULL,
  `comentario` text,
  PRIMARY KEY (`oid_comentario`),
  KEY `oid_peca` (`oid_peca`),
  KEY `oid_cliente` (`oid_cliente`),
  CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`oid_peca`) REFERENCES `peca` (`oid_peca`),
  CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`oid_cliente`) REFERENCES `cliente` (`oid_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comentario`
--

/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;


--
-- Definition of table `confighome`
--

DROP TABLE IF EXISTS `confighome`;
CREATE TABLE `confighome` (
  `oid_confighome` int(11) NOT NULL AUTO_INCREMENT,
  `oid_peca` int(11) DEFAULT NULL,
  `oid_localhome` int(11) DEFAULT NULL,
  `visivel` int(1) DEFAULT NULL,
  PRIMARY KEY (`oid_confighome`),
  KEY `oid_peca` (`oid_peca`),
  KEY `oid_localhome` (`oid_localhome`),
  CONSTRAINT `confighome_ibfk_1` FOREIGN KEY (`oid_peca`) REFERENCES `peca` (`oid_peca`),
  CONSTRAINT `confighome_ibfk_2` FOREIGN KEY (`oid_localhome`) REFERENCES `localhome` (`oid_localhome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `confighome`
--

/*!40000 ALTER TABLE `confighome` DISABLE KEYS */;
/*!40000 ALTER TABLE `confighome` ENABLE KEYS */;


--
-- Definition of table `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE `contato` (
  `oid_contato` int(11) NOT NULL AUTO_INCREMENT,
  `oid_entidade` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `site` varchar(30) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `classname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`oid_contato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contato`
--

/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;


--
-- Definition of table `conteudosite`
--

DROP TABLE IF EXISTS `conteudosite`;
CREATE TABLE `conteudosite` (
  `oid_conteudosite` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text,
  `classname` varchar(150) DEFAULT NULL,
  `titulo` varchar(40) DEFAULT NULL,
  `subtitulo` varchar(30) DEFAULT NULL,
  `datacriacao` varchar(25) DEFAULT NULL,
  `oid_imagem` int(11) DEFAULT NULL,
  `oid_endereco` int(11) DEFAULT NULL,
  `valores` text,
  `visao` text,
  `missao` text,
  PRIMARY KEY (`oid_conteudosite`),
  KEY `oid_imagem` (`oid_imagem`),
  KEY `oid_endereco` (`oid_endereco`),
  CONSTRAINT `conteudosite_ibfk_1` FOREIGN KEY (`oid_imagem`) REFERENCES `imagem` (`oid_imagem`),
  CONSTRAINT `conteudosite_ibfk_2` FOREIGN KEY (`oid_endereco`) REFERENCES `endereco` (`oid_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conteudosite`
--

/*!40000 ALTER TABLE `conteudosite` DISABLE KEYS */;
INSERT INTO `conteudosite` (`oid_conteudosite`,`descricao`,`classname`,`titulo`,`subtitulo`,`datacriacao`,`oid_imagem`,`oid_endereco`,`valores`,`visao`,`missao`) VALUES 
 (1,'123','tDica','tudo bem moh',NULL,'2016-09-26 16:48:37',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `conteudosite` ENABLE KEYS */;


--
-- Definition of table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE `endereco` (
  `oid_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `oid_cidade` int(11) DEFAULT NULL,
  `logradouro` varchar(120) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `cep` int(7) DEFAULT NULL,
  `bairro` varchar(150) DEFAULT NULL,
  `complemento` varchar(40) DEFAULT NULL,
  `classname` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`oid_endereco`),
  KEY `oid_cidade` (`oid_cidade`),
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`oid_cidade`) REFERENCES `cidade` (`oid_cidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `endereco`
--

/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;


--
-- Definition of table `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
  `oid_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`oid_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estado`
--

/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;


--
-- Definition of table `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE `estoque` (
  `oid_estoque` int(11) NOT NULL AUTO_INCREMENT,
  `nomeexibicao` varchar(15) DEFAULT NULL,
  `oid_endereco` int(11) DEFAULT NULL,
  PRIMARY KEY (`oid_estoque`),
  KEY `oid_endereco` (`oid_endereco`),
  CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`oid_endereco`) REFERENCES `endereco` (`oid_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estoque`
--

/*!40000 ALTER TABLE `estoque` DISABLE KEYS */;
/*!40000 ALTER TABLE `estoque` ENABLE KEYS */;


--
-- Definition of table `grupousuario`
--

DROP TABLE IF EXISTS `grupousuario`;
CREATE TABLE `grupousuario` (
  `oid_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `descricao` text,
  `oid_permissao` int(11) DEFAULT NULL,
  PRIMARY KEY (`oid_grupo`),
  KEY `oid_permissao_grupo_idx` (`oid_permissao`),
  CONSTRAINT `oid_permissao_grupo` FOREIGN KEY (`oid_permissao`) REFERENCES `permissao` (`oid_permissao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grupousuario`
--

/*!40000 ALTER TABLE `grupousuario` DISABLE KEYS */;
INSERT INTO `grupousuario` (`oid_grupo`,`nome`,`descricao`,`oid_permissao`) VALUES 
 (9,'f','f',16);
/*!40000 ALTER TABLE `grupousuario` ENABLE KEYS */;


--
-- Definition of table `imagem`
--

DROP TABLE IF EXISTS `imagem`;
CREATE TABLE `imagem` (
  `oid_imagem` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `classname` varchar(150) DEFAULT NULL,
  `caminho` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`oid_imagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagem`
--

/*!40000 ALTER TABLE `imagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagem` ENABLE KEYS */;


--
-- Definition of table `localhome`
--

DROP TABLE IF EXISTS `localhome`;
CREATE TABLE `localhome` (
  `oid_localhome` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`oid_localhome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `localhome`
--

/*!40000 ALTER TABLE `localhome` DISABLE KEYS */;
/*!40000 ALTER TABLE `localhome` ENABLE KEYS */;


--
-- Definition of table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `oid_log` int(11) NOT NULL AUTO_INCREMENT,
  `quem` varchar(150) DEFAULT NULL,
  `oque` varchar(150) DEFAULT NULL,
  `quando` varchar(150) DEFAULT NULL,
  `onde` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`oid_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;


--
-- Definition of table `lote`
--

DROP TABLE IF EXISTS `lote`;
CREATE TABLE `lote` (
  `oid_lote` int(11) NOT NULL AUTO_INCREMENT,
  `oid_transportadora` int(11) DEFAULT NULL,
  `dt_saoid_a` date DEFAULT NULL,
  `dt_entrega` date DEFAULT NULL,
  `frete` float(9,2) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`oid_lote`),
  KEY `oid_transportadora` (`oid_transportadora`),
  CONSTRAINT `lote_ibfk_1` FOREIGN KEY (`oid_transportadora`) REFERENCES `transportadora` (`oid_transportadora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lote`
--

/*!40000 ALTER TABLE `lote` DISABLE KEYS */;
/*!40000 ALTER TABLE `lote` ENABLE KEYS */;


--
-- Definition of table `lotepedido`
--

DROP TABLE IF EXISTS `lotepedido`;
CREATE TABLE `lotepedido` (
  `oid_lotepedido` int(11) NOT NULL AUTO_INCREMENT,
  `oid_pedido` int(11) DEFAULT NULL,
  `oid_lote` int(11) DEFAULT NULL,
  PRIMARY KEY (`oid_lotepedido`),
  KEY `oid_pedido` (`oid_pedido`),
  KEY `oid_lote` (`oid_lote`),
  CONSTRAINT `lotepedido_ibfk_1` FOREIGN KEY (`oid_pedido`) REFERENCES `pedido` (`oid_pedido`),
  CONSTRAINT `lotepedido_ibfk_2` FOREIGN KEY (`oid_lote`) REFERENCES `lote` (`oid_lote`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lotepedido`
--

/*!40000 ALTER TABLE `lotepedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `lotepedido` ENABLE KEYS */;


--
-- Definition of table `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE `marca` (
  `oid_marca` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `descricao` text,
  PRIMARY KEY (`oid_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marca`
--

/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;


--
-- Definition of table `modelo`
--

DROP TABLE IF EXISTS `modelo`;
CREATE TABLE `modelo` (
  `oid_modelo` int(11) NOT NULL AUTO_INCREMENT,
  `oid_marca` int(11) DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `descricao` text,
  PRIMARY KEY (`oid_modelo`),
  KEY `oid_marca` (`oid_marca`),
  CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`oid_marca`) REFERENCES `marca` (`oid_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modelo`
--

/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;


--
-- Definition of table `motivocontato`
--

DROP TABLE IF EXISTS `motivocontato`;
CREATE TABLE `motivocontato` (
  `oid_motivocontato` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`oid_motivocontato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `motivocontato`
--

/*!40000 ALTER TABLE `motivocontato` DISABLE KEYS */;
/*!40000 ALTER TABLE `motivocontato` ENABLE KEYS */;


--
-- Definition of table `peca`
--

DROP TABLE IF EXISTS `peca`;
CREATE TABLE `peca` (
  `oid_peca` int(11) NOT NULL AUTO_INCREMENT,
  `oid_tipopeca` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `ano` date DEFAULT NULL,
  `descricao` text,
  `validade` date DEFAULT NULL,
  `codbarra` varchar(10) DEFAULT NULL,
  `preco` float(9,2) DEFAULT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `marca` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`oid_peca`),
  KEY `oid_tipopeca` (`oid_tipopeca`),
  CONSTRAINT `peca_ibfk_1` FOREIGN KEY (`oid_tipopeca`) REFERENCES `tipopeca` (`oid_tipopeca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `peca`
--

/*!40000 ALTER TABLE `peca` DISABLE KEYS */;
/*!40000 ALTER TABLE `peca` ENABLE KEYS */;


--
-- Definition of table `peca_estoque`
--

DROP TABLE IF EXISTS `peca_estoque`;
CREATE TABLE `peca_estoque` (
  `oid_peca` int(11) DEFAULT NULL,
  `oid_estoque` int(11) DEFAULT NULL,
  `qtdmin` int(11) DEFAULT NULL,
  `qtdatual` int(11) DEFAULT NULL,
  KEY `oid_peca` (`oid_peca`),
  KEY `oid_estoque` (`oid_estoque`),
  CONSTRAINT `peca_estoque_ibfk_1` FOREIGN KEY (`oid_peca`) REFERENCES `peca` (`oid_peca`),
  CONSTRAINT `peca_estoque_ibfk_2` FOREIGN KEY (`oid_estoque`) REFERENCES `estoque` (`oid_estoque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `peca_estoque`
--

/*!40000 ALTER TABLE `peca_estoque` DISABLE KEYS */;
/*!40000 ALTER TABLE `peca_estoque` ENABLE KEYS */;


--
-- Definition of table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `oid_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `oid_cliente` int(11) DEFAULT NULL,
  `oid_endereco` int(11) DEFAULT NULL,
  `tipocartao` varchar(30) DEFAULT NULL,
  `numcartao` int(15) DEFAULT NULL,
  `frete` float(9,2) DEFAULT NULL,
  `dtrealizado` date DEFAULT NULL,
  `formapagamento` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`oid_pedido`),
  KEY `oid_cliente` (`oid_cliente`),
  KEY `oid_endereco` (`oid_endereco`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`oid_cliente`) REFERENCES `cliente` (`oid_cliente`),
  CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`oid_endereco`) REFERENCES `endereco` (`oid_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pedido`
--

/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;


--
-- Definition of table `pedido_peca`
--

DROP TABLE IF EXISTS `pedido_peca`;
CREATE TABLE `pedido_peca` (
  `oid_pedidopeca` int(11) NOT NULL AUTO_INCREMENT,
  `oid_peca` int(11) DEFAULT NULL,
  `oid_pedido` int(11) DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `valorvendido` float(9,2) DEFAULT NULL,
  `valortotal` float(9,2) DEFAULT NULL,
  PRIMARY KEY (`oid_pedidopeca`),
  KEY `oid_peca` (`oid_peca`),
  KEY `oid_pedido` (`oid_pedido`),
  CONSTRAINT `pedido_peca_ibfk_1` FOREIGN KEY (`oid_peca`) REFERENCES `peca` (`oid_peca`),
  CONSTRAINT `pedido_peca_ibfk_2` FOREIGN KEY (`oid_pedido`) REFERENCES `pedido_peca` (`oid_pedidopeca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pedido_peca`
--

/*!40000 ALTER TABLE `pedido_peca` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido_peca` ENABLE KEYS */;


--
-- Definition of table `permissao`
--

DROP TABLE IF EXISTS `permissao`;
CREATE TABLE `permissao` (
  `oid_permissao` int(11) NOT NULL AUTO_INCREMENT,
  `acs_cms` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`oid_permissao`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissao`
--

/*!40000 ALTER TABLE `permissao` DISABLE KEYS */;
INSERT INTO `permissao` (`oid_permissao`,`acs_cms`) VALUES 
 (16,1),
 (17,1),
 (18,0);
/*!40000 ALTER TABLE `permissao` ENABLE KEYS */;


--
-- Definition of table `promocao`
--

DROP TABLE IF EXISTS `promocao`;
CREATE TABLE `promocao` (
  `oid_promocao` int(11) NOT NULL AUTO_INCREMENT,
  `oid_peca` int(11) DEFAULT NULL,
  `dt_inicio` date DEFAULT NULL,
  `dt_termino` date DEFAULT NULL,
  `precovendido` float(9,2) DEFAULT NULL,
  PRIMARY KEY (`oid_promocao`),
  KEY `oid_peca` (`oid_peca`),
  CONSTRAINT `promocao_ibfk_1` FOREIGN KEY (`oid_peca`) REFERENCES `peca` (`oid_peca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promocao`
--

/*!40000 ALTER TABLE `promocao` DISABLE KEYS */;
/*!40000 ALTER TABLE `promocao` ENABLE KEYS */;


--
-- Definition of table `sac`
--

DROP TABLE IF EXISTS `sac`;
CREATE TABLE `sac` (
  `oid_sac` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) DEFAULT NULL,
  `comentario` text,
  `oid_motivocontato` int(11) DEFAULT NULL,
  PRIMARY KEY (`oid_sac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sac`
--

/*!40000 ALTER TABLE `sac` DISABLE KEYS */;
/*!40000 ALTER TABLE `sac` ENABLE KEYS */;


--
-- Definition of table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `oid_status` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `descricao` text,
  PRIMARY KEY (`oid_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

/*!40000 ALTER TABLE `status` DISABLE KEYS */;
/*!40000 ALTER TABLE `status` ENABLE KEYS */;


--
-- Definition of table `tipopeca`
--

DROP TABLE IF EXISTS `tipopeca`;
CREATE TABLE `tipopeca` (
  `oid_tipopeca` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`oid_tipopeca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipopeca`
--

/*!40000 ALTER TABLE `tipopeca` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipopeca` ENABLE KEYS */;


--
-- Definition of table `transportadora`
--

DROP TABLE IF EXISTS `transportadora`;
CREATE TABLE `transportadora` (
  `oid_transportadora` int(11) NOT NULL AUTO_INCREMENT,
  `oid_endereco` int(11) DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `ramo` varchar(40) DEFAULT NULL,
  `frete` float(9,2) DEFAULT NULL,
  PRIMARY KEY (`oid_transportadora`),
  KEY `oid_endereco` (`oid_endereco`),
  CONSTRAINT `transportadora_ibfk_1` FOREIGN KEY (`oid_endereco`) REFERENCES `endereco` (`oid_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transportadora`
--

/*!40000 ALTER TABLE `transportadora` DISABLE KEYS */;
/*!40000 ALTER TABLE `transportadora` ENABLE KEYS */;


--
-- Definition of table `usuariosistema`
--

DROP TABLE IF EXISTS `usuariosistema`;
CREATE TABLE `usuariosistema` (
  `oid_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `oid_grupo` int(11) DEFAULT NULL,
  `nomecompleto` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `login` varchar(150) DEFAULT NULL,
  `senha` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`oid_usuario`),
  KEY `oid_grupo` (`oid_grupo`),
  CONSTRAINT `usuariosistema_ibfk_1` FOREIGN KEY (`oid_grupo`) REFERENCES `grupousuario` (`oid_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuariosistema`
--

/*!40000 ALTER TABLE `usuariosistema` DISABLE KEYS */;
INSERT INTO `usuariosistema` (`oid_usuario`,`oid_grupo`,`nomecompleto`,`email`,`login`,`senha`) VALUES 
 (5,9,'asdfasdf','asdf','admin','admin');
/*!40000 ALTER TABLE `usuariosistema` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
