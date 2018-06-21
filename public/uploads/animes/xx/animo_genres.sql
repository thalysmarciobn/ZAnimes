/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50545
 Source Host           : localhost:3306
 Source Schema         : animo

 Target Server Type    : MySQL
 Target Server Version : 50545
 File Encoding         : 65001

 Date: 21/06/2018 01:08:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for animo_genres
-- ----------------------------
DROP TABLE IF EXISTS `animo_genres`;
CREATE TABLE `animo_genres`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of animo_genres
-- ----------------------------
INSERT INTO `animo_genres` VALUES (1, 'Ação', 'acao');
INSERT INTO `animo_genres` VALUES (2, 'Artes Marciais', 'artes-marciais');
INSERT INTO `animo_genres` VALUES (3, 'Aventura', 'aventura');
INSERT INTO `animo_genres` VALUES (4, 'Bishoujo', 'bishoujo');
INSERT INTO `animo_genres` VALUES (5, 'Bishounen', 'bishounen');
INSERT INTO `animo_genres` VALUES (6, 'Comédia', 'comedia');
INSERT INTO `animo_genres` VALUES (7, 'Comédia Romântica', 'comedia-romantica');
INSERT INTO `animo_genres` VALUES (8, 'Demônio', 'demonio');
INSERT INTO `animo_genres` VALUES (9, 'Drama', 'drama');
INSERT INTO `animo_genres` VALUES (10, 'Ecchi', 'ecchi');
INSERT INTO `animo_genres` VALUES (11, 'Espaço', 'espaco');
INSERT INTO `animo_genres` VALUES (13, 'Esporte', 'esporte');
INSERT INTO `animo_genres` VALUES (14, 'Fantasia', 'fantasia');
INSERT INTO `animo_genres` VALUES (15, 'Faroeste', 'faroeste');
INSERT INTO `animo_genres` VALUES (16, 'Ficção Científica', 'ficcao-cintifica');
INSERT INTO `animo_genres` VALUES (17, 'Harém', 'harem');
INSERT INTO `animo_genres` VALUES (18, 'Histórico', 'historico');
INSERT INTO `animo_genres` VALUES (19, 'Jogos', 'jogos');
INSERT INTO `animo_genres` VALUES (20, 'Kodomo', 'kodomo');
INSERT INTO `animo_genres` VALUES (21, 'Magia', 'magia');
INSERT INTO `animo_genres` VALUES (22, 'Mecha', 'mecha');
INSERT INTO `animo_genres` VALUES (23, 'Militar', 'militar');
INSERT INTO `animo_genres` VALUES (24, 'Mistério', 'misterio');
INSERT INTO `animo_genres` VALUES (25, 'Musical', 'musical');
INSERT INTO `animo_genres` VALUES (26, 'Paródia', 'parodia');
INSERT INTO `animo_genres` VALUES (27, 'Policial', 'policial');
INSERT INTO `animo_genres` VALUES (28, 'Psicológico', 'psicologico');
INSERT INTO `animo_genres` VALUES (29, 'Romance', 'romance');
INSERT INTO `animo_genres` VALUES (30, 'Samurai', 'samurai');
INSERT INTO `animo_genres` VALUES (31, 'Seinen', 'seinen');
INSERT INTO `animo_genres` VALUES (32, 'Shoujo', 'shoujo');
INSERT INTO `animo_genres` VALUES (33, 'Shoujo-ai', 'shoujo-ai');
INSERT INTO `animo_genres` VALUES (34, 'Shounen', 'shounen');
INSERT INTO `animo_genres` VALUES (35, 'Shounen-ai', 'shounen-ai');
INSERT INTO `animo_genres` VALUES (36, 'Slice Of Life', 'slice-of-life');
INSERT INTO `animo_genres` VALUES (37, 'Sobrenatural', 'sobrenatural');
INSERT INTO `animo_genres` VALUES (38, 'Superpoder', 'superpoder');
INSERT INTO `animo_genres` VALUES (39, 'Suspense', 'suspense');
INSERT INTO `animo_genres` VALUES (40, 'Terror', 'terror');
INSERT INTO `animo_genres` VALUES (41, 'Thriller', 'thriller');
INSERT INTO `animo_genres` VALUES (42, 'Tokusatsu', 'tokusatsu');
INSERT INTO `animo_genres` VALUES (43, 'Vampiros', 'vampiros');
INSERT INTO `animo_genres` VALUES (44, 'Vida Escolar', 'vida-escolar');
INSERT INTO `animo_genres` VALUES (45, 'Yuri', 'yuri');

SET FOREIGN_KEY_CHECKS = 1;
