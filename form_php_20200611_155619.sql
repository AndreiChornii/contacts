-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "contacts" -------------------------------------
CREATE TABLE `contacts`( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`Contact` VarChar( 200 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 11;
-- -------------------------------------------------------------


-- CREATE TABLE "links" ----------------------------------------
CREATE TABLE `links`( 
	`id_user` Int( 11 ) NOT NULL,
	`id_contact` Int( 11 ) NOT NULL,
	CONSTRAINT `id_user` UNIQUE( `id_user`, `id_contact` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------


-- CREATE TABLE "users" ----------------------------------------
CREATE TABLE `users`( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`username` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`email` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`password` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`phone` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`age` Int( 3 ) NOT NULL,
	PRIMARY KEY ( `id` ),
	CONSTRAINT `unique_email` UNIQUE( `email` ),
	CONSTRAINT `unique_phone` UNIQUE( `phone` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 33;
-- -------------------------------------------------------------


-- Dump data of "contacts" ---------------------------------
INSERT INTO `contacts`(`id`,`Contact`) VALUES 
( '1', 'Andrei' ),
( '2', 'Anatolii' ),
( '3', 'Max' ),
( '4', 'Jaramy' ),
( '5', 'Brine' ),
( '6', 'Yurii' ),
( '7', 'Ann' ),
( '8', 'Vika' ),
( '9', 'Vitalii' ),
( '10', 'Sergei' );
-- ---------------------------------------------------------


-- Dump data of "links" ------------------------------------
INSERT INTO `links`(`id_user`,`id_contact`) VALUES 
( '13', '1' ),
( '5', '3' ),
( '13', '3' ),
( '26', '3' ),
( '6', '4' ),
( '12', '4' ),
( '12', '5' ),
( '14', '5' ),
( '32', '5' ),
( '4', '6' ),
( '32', '6' ),
( '8', '7' ),
( '13', '7' ),
( '21', '7' ),
( '22', '7' ),
( '27', '7' ),
( '32', '7' ),
( '4', '8' ),
( '27', '8' ),
( '32', '8' ),
( '7', '9' ),
( '14', '9' ),
( '23', '9' ),
( '30', '9' ),
( '32', '9' ),
( '5', '10' ),
( '13', '10' ),
( '14', '10' );
-- ---------------------------------------------------------


-- Dump data of "users" ------------------------------------
INSERT INTO `users`(`id`,`username`,`email`,`password`,`phone`,`age`) VALUES 
( '1', 'vasa424', 'raewrw@fsf.com', 'ehgewrt3qr5t3q43', '+380504550011', '50' ),
( '2', 'Andreoe563', 'rae@fsf.com', 'ehgewrt3qr5t3q43', '+380504550012', '50' ),
( '3', 'Andreoe543', 'ra234re@fsf.com', 'ehgewrt3qr5t3q43', '+380504550013', '50' ),
( '4', 'andreichornii4123', 'raewrw@fsf.con', 'fwqrg24242', '+380668885522', '50' ),
( '5', '32r422qwe', 'raewrw@fsf.coo', 'veqbesfa', '+380930004433', '50' ),
( '6', 'andreichornii786', 'raewrw@fsf.ooo', 'ftif6i76rf7i6rf', '+380630705237', '50' ),
( '7', 'amadeus', 'amadeus@gmail.com', 'amadeus_pass', '+380735554433', '50' ),
( '8', 'aaaaa', 'aaaaa@gmail.com', 'rrrrrr', '+380501112233', '50' ),
( '10', 'admin', 'admin@gmail.com', 'rgq3rhwarq3r', '+380501112234', '50' ),
( '11', 'test1', 'test@gmail.com', 'gfbnwr5wth', '+380999998877', '50' ),
( '12', 'ttttt', 'tttt@gg.com', 'bt42t24tw52', '+380507776655', '50' ),
( '13', 'spider', 'spider@gmail.com', '4g25g1t1', '+380509512233', '50' ),
( '14', 'gameover', 'game@hhh.vvv', 'bt4q2g5q425q2', '+380930003344', '50' ),
( '19', 'temppppp', 'max@gmail.com', 'b4qgr3qrgq3', '+380668764455', '50' ),
( '20', 'antilopa', 'antilopa@ffff.vvv', '3rg4rgbr4q25', '+380669871122', '50' ),
( '21', 'domain', 'domain@fff.vvv', 'fveqrgq342', '+380505554433', '50' ),
( '22', 'proba', 'proba@gmail.com', 'begrt3qrg3', '+380500300908', '50' ),
( '23', 'andrei_test', 'andrei_test@gmail.com', 'fg3rg3tbg3r', '+380667770044', '50' ),
( '24', 'alert', 'alert@gmail.com', 'fevr3q4', '+380507772233', '50' ),
( '26', 'alert2', 'alert2@gmail.com', 'fevr3q4', '+380507772232', '50' ),
( '27', 'pdo_test', 'pdo_test@gmail.com', 'frbr3qrgq3', '+380933335588', '50' ),
( '28', 'pdo_close', 'pdo_close@gmail.com', 'bt4nye5w6q', '+380505551199', '50' ),
( '30', 'close', 'close@gmail.com', 'tnmet56y4tqr', '+380661234567', '50' ),
( '32', 'test20', 'test20@gmail.com', 'Rhenj567', '+380502225577', '50' );
-- ---------------------------------------------------------


-- CREATE INDEX "link_id_contact" ------------------------------
CREATE INDEX `link_id_contact` USING BTREE ON `links`( `id_contact` );
-- -------------------------------------------------------------


-- CREATE LINK "link_id_contact" -------------------------------
ALTER TABLE `links`
	ADD CONSTRAINT `link_id_contact` FOREIGN KEY ( `id_contact` )
	REFERENCES `contacts`( `id` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "link_id_user" ----------------------------------
ALTER TABLE `links`
	ADD CONSTRAINT `link_id_user` FOREIGN KEY ( `id_user` )
	REFERENCES `users`( `id` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


