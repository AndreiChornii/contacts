-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "users" ----------------------------------------
CREATE TABLE `users` ( 
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
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- Dump data of "users" ------------------------------------
INSERT INTO `users`(`id`,`username`,`email`,`password`,`phone`,`age`) VALUES 
( '1', 'vasa424', 'raewrw@fsf.com', 'ehgewrt3qr5t3q43', '+380504550011', '50' ),
( '2', 'Andreoe563', 'rae@fsf.com', 'ehgewrt3qr5t3q43', '+380504550012', '50' ),
( '3', 'Andreoe543', 'ra234re@fsf.com', 'ehgewrt3qr5t3q43', '+380504550013', '50' ),
( '4', 'andreichornii4123', 'raewrw@fsf.con', 'fwqrg24242', '+380668885522', '50' ),
( '5', '32r422qwe', 'raewrw@fsf.coo', 'veqbesfa', '+380930004433', '50' ),
( '6', 'andreichornii786', 'raewrw@fsf.ooo', 'ftif6i76rf7i6rf', '+380630705237', '50' );
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


