/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : faunaexotica

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2011-04-08 16:07:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `categoria`
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `cod` int(8) unsigned NOT NULL auto_increment,
  `nombre` varchar(20) NOT NULL,
  `tipo` enum('articulos','animales') NOT NULL,
  PRIMARY KEY  (`cod`),
  UNIQUE KEY `Nombre` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES ('1', 'Perros', 'animales');
INSERT INTO `categoria` VALUES ('2', 'Gatos', 'animales');
INSERT INTO `categoria` VALUES ('3', 'Alimento', 'articulos');
INSERT INTO `categoria` VALUES ('4', 'Accesorios', 'articulos');

-- ----------------------------
-- Table structure for `etiqueta`
-- ----------------------------
DROP TABLE IF EXISTS `etiqueta`;
CREATE TABLE `etiqueta` (
  `cod` int(8) unsigned NOT NULL auto_increment,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY  (`cod`),
  UNIQUE KEY `Nombre` (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of etiqueta
-- ----------------------------

-- ----------------------------
-- Table structure for `pedido`
-- ----------------------------
DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `cod` int(8) NOT NULL auto_increment,
  `cod_usuario` int(8) NOT NULL,
  `direccion` varchar(50) default NULL COMMENT 'Por defecto: direccion usuario',
  `fecha` date NOT NULL,
  PRIMARY KEY  (`cod`),
  KEY `Usuario` (`cod_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pedido
-- ----------------------------

-- ----------------------------
-- Table structure for `pedido_producto`
-- ----------------------------
DROP TABLE IF EXISTS `pedido_producto`;
CREATE TABLE `pedido_producto` (
  `cod_pedido` int(8) NOT NULL,
  `cod_producto` int(8) NOT NULL,
  `cantidad` int(8) NOT NULL default '1',
  PRIMARY KEY  (`cod_pedido`,`cod_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pedido_producto
-- ----------------------------

-- ----------------------------
-- Table structure for `producto`
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `cod` int(8) NOT NULL auto_increment,
  `nombre` varchar(30) NOT NULL,
  `precio` decimal(6,0) default NULL,
  `foto` varchar(100) default NULL,
  `descripcion` text,
  `cantidad_disponible` int(6) NOT NULL default '0',
  `cod_subcategoria` int(8) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  PRIMARY KEY  (`cod`),
  KEY `SubCat` (`cod_subcategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES ('1', 'Collar', '22', 'collar.jpg', 'Collar antiparasitario', '3', '7', '2011-04-02 00:00:00');
INSERT INTO `producto` VALUES ('2', 'Pienso especial', '20', 'pienso.jpg', 'Pienso especial para cachorros', '6', '6', '2011-04-02 18:03:00');
INSERT INTO `producto` VALUES ('6', 'Pienso adultos', '23', 'pienso2.jpg', 'Pienso para adultos', '2', '6', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `producto_etiqueta`
-- ----------------------------
DROP TABLE IF EXISTS `producto_etiqueta`;
CREATE TABLE `producto_etiqueta` (
  `cod_producto` int(8) NOT NULL,
  `cod_etiqueta` int(8) NOT NULL,
  PRIMARY KEY  (`cod_producto`,`cod_etiqueta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of producto_etiqueta
-- ----------------------------

-- ----------------------------
-- Table structure for `subcategoria`
-- ----------------------------
DROP TABLE IF EXISTS `subcategoria`;
CREATE TABLE `subcategoria` (
  `cod` int(8) NOT NULL auto_increment,
  `nombre` varchar(20) NOT NULL,
  `cod_categoria` int(8) NOT NULL,
  PRIMARY KEY  (`cod`),
  KEY `Categoria` (`cod_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of subcategoria
-- ----------------------------
INSERT INTO `subcategoria` VALUES ('1', 'Carlino', '1');
INSERT INTO `subcategoria` VALUES ('2', 'Pitbull', '1');
INSERT INTO `subcategoria` VALUES ('3', 'Absinio', '2');
INSERT INTO `subcategoria` VALUES ('4', 'Beagle', '1');
INSERT INTO `subcategoria` VALUES ('5', 'Angora', '2');
INSERT INTO `subcategoria` VALUES ('6', 'Pienso', '3');
INSERT INTO `subcategoria` VALUES ('7', 'Collares', '4');

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nombre` varchar(25) default NULL,
  `apellido1` varchar(30) default NULL,
  `apellido2` varchar(30) default NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `direccion` varchar(50) default NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `Usuario` USING BTREE (`usuario`),
  UNIQUE KEY `Correo` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('14', null, null, null, 'Oscar', 'f156e7995d521f30e6c59a3d6c75e1e5', null, 'oscar_va90@hotmail.com');
