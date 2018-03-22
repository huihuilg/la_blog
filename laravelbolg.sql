-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-02-25 03:50:06
-- 服务器版本： 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelbolg`
--

-- --------------------------------------------------------

--
-- 表的结构 `laravel_about`
--

DROP TABLE IF EXISTS `laravel_about`;
CREATE TABLE IF NOT EXISTS `laravel_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL COMMENT '自我介绍',
  `bolg_content` varchar(100) NOT NULL,
  `server` varchar(50) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `laravel_about`
--

INSERT INTO `laravel_about` (`id`, `content`, `bolg_content`, `server`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '空白，不代表没有，只是因为还未准备好。。。', 'l.huihuil.com 创建于2017年02月02日 ', '阿里云服务器', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `laravel_article`
--

DROP TABLE IF EXISTS `laravel_article`;
CREATE TABLE IF NOT EXISTS `laravel_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '发表文章用户',
  `rid` int(11) NOT NULL DEFAULT '0' COMMENT '品论',
  `istop` int(11) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `picture` varchar(500) NOT NULL DEFAULT 'img/1.jpg',
  `content` text NOT NULL COMMENT '内容',
  `count` int(11) NOT NULL DEFAULT '0' COMMENT '阅读数',
  `reply_count` int(11) NOT NULL DEFAULT '0' COMMENT '回复数',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `laravel_article`
--

INSERT INTO `laravel_article` (`id`, `uid`, `rid`, `istop`, `title`, `picture`, `content`, `count`, `reply_count`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 1, '我是第一条数据', 'img/2.jpg', '日照香炉生紫烟日照香炉生紫烟日照香炉生紫烟日照香炉生紫烟日照香炉生紫烟', 7, 6, '2018-02-20 04:58:09', '2018-02-24 08:05:56', NULL),
(2, 1, 0, 1, '测试', 'img/2.jpg', '测试1', 1, 0, '2018-02-20 04:58:09', '2018-02-24 07:20:42', '2018-02-24 07:20:42'),
(3, 1, 0, 0, '测试2', 'img/3.jpg', '测试2', 0, 0, '2018-02-20 04:58:09', '2018-02-24 00:41:34', NULL),
(4, 1, 0, 0, '测试3', 'img/4.jpg', '测试3', 3, 2, '2018-02-20 04:58:09', '2018-02-24 07:39:41', NULL),
(10, 1, 0, 0, '666', 'img/6.jpg', '哈哈哈哈', 3, 1, '2018-02-20 04:58:09', '2018-02-24 07:09:14', '2018-02-24 07:09:14'),
(17, 1, 0, 1, '皓月', 'img/2.jpg', '海上生明月', 1, 3, '2018-02-20 04:58:09', '2018-02-24 07:23:38', NULL),
(19, 1, 1, 0, '', 'img/1.jpg', '						来看看', 0, 0, '2018-02-23 23:48:22', '2018-02-24 07:48:59', '2018-02-24 07:48:59'),
(20, 1, 1, 0, '', 'img/1.jpg', '						分页', 0, 0, '2018-02-23 23:48:29', '2018-02-24 00:41:34', NULL),
(21, 1, 17, 0, '', 'img/1.jpg', '						00', 0, 0, '2018-02-24 00:41:33', '2018-02-24 08:05:19', NULL),
(22, 1, 10, 0, '', 'img/1.jpg', '			呵呵			', 0, 0, '2018-02-24 00:42:47', '2018-02-24 00:42:47', NULL),
(25, 1, 4, 0, '', 'img/1.jpg', '				1312		', 0, 0, '2018-02-24 07:39:34', '2018-02-24 07:49:11', '2018-02-24 07:49:11'),
(26, 1, 4, 0, '', 'img/1.jpg', '					4	', 0, 0, '2018-02-24 07:39:40', '2018-02-24 07:39:40', NULL),
(27, 1, 1, 0, '', 'img/1.jpg', '					2112	', 0, 0, '2018-02-24 08:05:43', '2018-02-24 08:06:06', '2018-02-24 08:06:06'),
(28, 1, 1, 0, '', 'img/1.jpg', '					放大	', 0, 0, '2018-02-24 08:05:49', '2018-02-24 08:06:06', '2018-02-24 08:06:06'),
(29, 1, 1, 0, '', 'img/1.jpg', '						非', 0, 0, '2018-02-24 08:05:55', '2018-02-24 08:05:55', NULL),
(30, 1, 0, 0, '2133', '/uploads/2018-02-24-16-37-37-5a9194d10e885.jpg', 'fdsafsafsd', 0, 0, '2018-02-24 08:37:37', '2018-02-24 08:37:37', NULL),
(31, 1, 0, 0, '543543', '/uploads/2018-02-24-16-38-08-5a9194f03add4.jpg', '543543trqtw', 0, 0, '2018-02-24 08:38:08', '2018-02-24 08:38:08', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `laravel_comment`
--

DROP TABLE IF EXISTS `laravel_comment`;
CREATE TABLE IF NOT EXISTS `laravel_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture` varchar(500) DEFAULT NULL,
  `content` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `laravel_comment`
--

INSERT INTO `laravel_comment` (`id`, `picture`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'img/8.jpg', '我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。', '2018-02-20 04:58:09', NULL, NULL),
(2, '', '我希望我的爱情是这样的，相濡以沫，举案齐眉，平淡如水。我在岁月中找到她', '2018-02-20 04:58:09', NULL, NULL),
(3, NULL, '测试', NULL, NULL, NULL),
(5, NULL, '456', '2018-02-22 04:38:23', '2018-02-22 04:38:23', NULL),
(6, 'uploads/2018-02-22-12-38-45-5a8eb9d58e062.jpg', '89', '2018-02-22 04:38:45', '2018-02-22 04:38:45', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `laravel_ly`
--

DROP TABLE IF EXISTS `laravel_ly`;
CREATE TABLE IF NOT EXISTS `laravel_ly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `rid` int(11) DEFAULT NULL,
  `rcontent` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `laravel_ly`
--

INSERT INTO `laravel_ly` (`id`, `uid`, `content`, `rid`, `rcontent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 1, '						1', NULL, NULL, '2018-02-24 08:31:00', '2018-02-24 08:31:00', NULL),
(10, 1, '						2', NULL, NULL, '2018-02-24 08:31:05', '2018-02-24 08:31:05', NULL),
(11, 1, '						33121', NULL, NULL, '2018-02-24 08:31:12', '2018-02-24 08:31:12', NULL),
(12, 2, '			87954			', NULL, NULL, '2018-02-24 08:31:45', '2018-02-24 08:31:45', NULL),
(13, 2, '						45652', NULL, NULL, '2018-02-24 08:31:51', '2018-02-24 08:31:51', NULL),
(14, 13, '					465	', NULL, NULL, '2018-02-24 08:35:28', '2018-02-24 08:35:28', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `laravel_user`
--

DROP TABLE IF EXISTS `laravel_user`;
CREATE TABLE IF NOT EXISTS `laravel_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `is_lock` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `picture` varchar(500) NOT NULL DEFAULT '/img/1.jpg',
  `sex` int(11) NOT NULL DEFAULT '0' COMMENT '性别（0女1男2保密）',
  `phone` varchar(11) DEFAULT NULL COMMENT '手机',
  `email` varchar(30) DEFAULT NULL COMMENT '邮箱',
  `qm` varchar(100) DEFAULT NULL COMMENT '个性签名',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `laravel_user`
--

INSERT INTO `laravel_user` (`id`, `is_admin`, `is_lock`, `user_name`, `password`, `picture`, `sex`, `phone`, `email`, `qm`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '/uploads/2018-02-22-15-16-13-5a8edebd8aaa5.jpg', 1, '18438628559', '1325045107@qq.com', '海阔天空', '2018-02-20 04:58:09', '2018-02-24 04:38:19', NULL),
(2, 0, 0, '123456', 'e10adc3949ba59abbe56e057f20f883e', '/img/9.jpg', 0, '18438628559', NULL, NULL, '2018-02-20 04:58:09', '2018-02-24 04:37:37', NULL),
(12, 0, 0, '123', 'e10adc3949ba59abbe56e057f20f883e', '/img/9.jpg', 0, '18438628559', NULL, NULL, '2018-02-22 02:00:58', '2018-02-24 04:41:56', NULL),
(13, 0, 0, 'test', 'e10adc3949ba59abbe56e057f20f883e', '/img/2.jpg', 0, '18438628559', '1325045107@qq.com', '123', '2018-02-24 08:33:55', '2018-02-24 08:35:17', NULL),
(14, 0, 0, 'test1', 'e10adc3949ba59abbe56e057f20f883e', '/img/1.jpg', 0, '18438628559', NULL, NULL, '2018-02-24 08:36:13', '2018-02-24 08:36:13', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
