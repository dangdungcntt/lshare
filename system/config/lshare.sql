-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE TABLE `breadcrumb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `href` varchar(50) NOT NULL DEFAULT '0',
  `route` varchar(50) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `breadcrumb`;
INSERT INTO `breadcrumb` (`id`, `href`, `route`, `name`, `level`) VALUES
(1,	'/admin/',	'/admin/',	'Trang quản trị',	0),
(2,	'/admin/file/',	'/admin/file/',	'Quản lý tệp',	1),
(3,	'/admin/users',	'/admin/users',	'Quản lý người dùng',	1),
(4,	'/admin/file/upload/',	'/admin/file/upload/',	'Thêm tệp',	2),
(5,	'/admin/users/add/',	'/admin/users/add/',	'Thêm người dùng',	2),
(6,	'#',	'/admin/users/edit/',	'Sửa người dùng',	2),
(7,	'#',	'/admin/file/edit/',	'Sửa tệp',	2);

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `category`;

CREATE TABLE `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `description` text,
  `link` text,
  `view` text,
  `click` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `tag` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `file`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(50) NOT NULL DEFAULT '0',
  `href` varchar(50) NOT NULL DEFAULT '0',
  `route` varchar(50) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '0',
  `has-child` bit(1) NOT NULL DEFAULT b'0',
  `parent` int(11) NOT NULL DEFAULT '0',
  `permission` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `menu`;
INSERT INTO `menu` (`id`, `icon`, `href`, `route`, `name`, `has-child`, `parent`, `permission`) VALUES
(1,	'fa-home',	'/admin/',	'/admin/',	'Trang quản trị',	CONV('0', 2, 10) + 0,	0,	0),
(2,	'fa-file-text',	'#',	'#',	'Quản lý tệp',	CONV('1', 2, 10) + 0,	0,	10),
(3,	'fa-th-list',	'/admin/file/',	'/admin/file/',	'Danh sách tệp',	CONV('0', 2, 10) + 0,	2,	10),
(4,	'fa-cloud-upload',	'/admin/file/upload/',	'/admin/file/upload/',	'Thêm tệp',	CONV('0', 2, 10) + 0,	2,	10),
(5,	'fa-user-circle-o',	'#',	'#',	'Quản lý người dùng',	CONV('1', 2, 10) + 0,	0,	99),
(6,	'fa-users',	'/admin/users/',	'/admin/users/',	'Danh sách',	CONV('0', 2, 10) + 0,	5,	99),
(7,	'fa-user-plus',	'/admin/users/add/',	'/admin/users/add/',	'Thêm người dùng',	CONV('0', 2, 10) + 0,	5,	99);

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `permission`;
INSERT INTO `permission` (`id`, `name`) VALUES
(0,	'Guest'),
(10,	'Censor'),
(99,	'Admin');

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `permission` int(11) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '0',
  `fb_id` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE `user`;
INSERT INTO `user` (`id`, `username`, `permission`, `password`, `name`, `fb_id`) VALUES
(1,	'admin',	100,	'21232f297a57a5a743894a0e4a801fc3',	'Nguyễn Đăng Dũng',	'100006487845973');

-- 2017-11-26 15:16:40
