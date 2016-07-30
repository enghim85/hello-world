-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2016-07-30 12:28:56
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table mohachun_db.mc_categories
CREATE TABLE IF NOT EXISTS `mc_categories` (
  `id_cate` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `slug` varchar(64) NOT NULL,
  `route_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `excerpt` text NOT NULL,
  `sequence` int(10) unsigned NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `seo_title` text NOT NULL,
  `meta` text NOT NULL,
  PRIMARY KEY (`id_cate`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table mohachun_db.mc_categories: 7 rows
/*!40000 ALTER TABLE `mc_categories` DISABLE KEYS */;
INSERT INTO `mc_categories` (`id_cate`, `parent_id`, `name`, `slug`, `route_id`, `description`, `excerpt`, `sequence`, `image`, `seo_title`, `meta`) VALUES
	(1, 2, 'Clothes', 'clothes', 1, 'Sale of kind of clothes', '', 0, NULL, 'Clothes', 'clothes'),
	(2, 0, 'Accessories Store', 'accessories-store', 4, 'Sale of kind of Accessories Store', '', 0, NULL, 'Accessories Store', 'Accessories Store'),
	(3, 0, 'Jewelry Store', 'jewelry-store', 5, 'Sale of kind of Jewelry Store', '', 0, NULL, 'Jewelry Store', 'We sale all kind of Jewelry Store.'),
	(4, 0, 'Cosmetics & Beauty Supply', 'cosmetics-beauty-supply', 7, 'Sale all kind of Cosmetics & Beauty', '', 0, NULL, 'Cosmetics & Beauty Supply', 'Sale all kind of Cosmetics & Beauty'),
	(5, 0, 'Sporting Goods Store', 'sporting-goods-store', 10, 'Sale all kind of Sport Equipment.', '', 0, NULL, 'Sporting Goods Store', 'Sale all kind of Sport Equipment.'),
	(6, 0, 'Sports & Recreation', 'sports-recreation', 11, 'Sale all kind of Sport Equipment and Recreation.', '', 0, NULL, 'Sports & Recreation', 'Sale all kind of Sport Equipment and Recreation.'),
	(7, 0, 'Sportswear', 'sportswear', 13, 'Sell all kind of sport clothes', '', 0, NULL, 'Sportswear', 'Sell all kind of sport clothes');
/*!40000 ALTER TABLE `mc_categories` ENABLE KEYS */;


-- Dumping structure for table mohachun_db.mc_category_shops
CREATE TABLE IF NOT EXISTS `mc_category_shops` (
  `shop_id` int(10) unsigned NOT NULL,
  `cate_id` int(10) unsigned NOT NULL,
  `sequence` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`shop_id`,`cate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table mohachun_db.mc_category_shops: ~9 rows (approximately)
/*!40000 ALTER TABLE `mc_category_shops` DISABLE KEYS */;
INSERT INTO `mc_category_shops` (`shop_id`, `cate_id`, `sequence`) VALUES
	(1, 1, 0),
	(2, 2, 0),
	(2, 3, 0),
	(3, 4, 0),
	(4, 1, 0),
	(5, 5, 0),
	(5, 6, 0),
	(6, 1, 0),
	(6, 7, 0);
/*!40000 ALTER TABLE `mc_category_shops` ENABLE KEYS */;


-- Dumping structure for table mohachun_db.mc_products
CREATE TABLE IF NOT EXISTS `mc_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(30) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `route_id` int(11) NOT NULL,
  `description` text,
  `excerpt` text,
  `price` float(10,2) NOT NULL DEFAULT '0.00',
  `saleprice` float(10,2) NOT NULL DEFAULT '0.00',
  `free_shipping` tinyint(1) NOT NULL DEFAULT '0',
  `shippable` tinyint(1) NOT NULL DEFAULT '1',
  `taxable` tinyint(1) NOT NULL DEFAULT '1',
  `fixed_quantity` tinyint(1) NOT NULL DEFAULT '0',
  `weight` varchar(10) NOT NULL DEFAULT '0',
  `track_stock` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL,
  `related_products` text,
  `images` text,
  `seo_title` text,
  `meta` text,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table mohachun_db.mc_products: 0 rows
/*!40000 ALTER TABLE `mc_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `mc_products` ENABLE KEYS */;


-- Dumping structure for table mohachun_db.mc_routes
CREATE TABLE IF NOT EXISTS `mc_routes` (
  `id_route` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `route` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_route`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table mohachun_db.mc_routes: 13 rows
/*!40000 ALTER TABLE `mc_routes` DISABLE KEYS */;
INSERT INTO `mc_routes` (`id_route`, `slug`, `route`) VALUES
	(1, 'clothes', 'shop/category/1'),
	(2, 'kool-collection', 'shops/index/1'),
	(4, 'accessories-store', 'shop/category/2'),
	(5, 'jewelry-store', 'shop/category/3'),
	(6, 'deluxe-watch-shop', 'shops/index/2'),
	(7, 'cosmetics-beauty-supply', 'shop/category/4'),
	(8, 'sd-perfume-cambodia', 'shops/index/3'),
	(9, 'sasa-boutique-baktouk', 'shops/index/4'),
	(10, 'sporting-goods-store', 'shop/category/5'),
	(11, 'sports-recreation', 'shop/category/6'),
	(12, 'pro-kit-soccer-store', 'shops/index/5'),
	(13, 'sportswear', 'shop/category/7'),
	(14, 'isport-cambodia-shop', 'shops/index/6');
/*!40000 ALTER TABLE `mc_routes` ENABLE KEYS */;


-- Dumping structure for table mohachun_db.mc_search
CREATE TABLE IF NOT EXISTS `mc_search` (
  `code` varchar(40) NOT NULL,
  `term` varchar(255) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table mohachun_db.mc_search: 0 rows
/*!40000 ALTER TABLE `mc_search` DISABLE KEYS */;
/*!40000 ALTER TABLE `mc_search` ENABLE KEYS */;


-- Dumping structure for table mohachun_db.mc_shops
CREATE TABLE IF NOT EXISTS `mc_shops` (
  `id_shop` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(128) NOT NULL,
  `shop_des` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `route_id` int(10) NOT NULL,
  `logo` varchar(255) NOT NULL COMMENT 'It''s image',
  `id_fb` varchar(128) NOT NULL,
  `url_fb` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `related_shops` text NOT NULL,
  `seo_title` text NOT NULL,
  `meta` text NOT NULL,
  `enabled` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_shop`),
  UNIQUE KEY `id_fb` (`id_fb`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table mohachun_db.mc_shops: 6 rows
/*!40000 ALTER TABLE `mc_shops` DISABLE KEYS */;
INSERT INTO `mc_shops` (`id_shop`, `shop_name`, `shop_des`, `slug`, `route_id`, `logo`, `id_fb`, `url_fb`, `address`, `phone`, `related_shops`, `seo_title`, `meta`, `enabled`) VALUES
	(1, 'Kool Collection', 'Kool Collection Store, A Men Fasion store in Phnom Penh, which serve for the fashion for Cambodian!', 'kool-collection', 2, '', '131826983501920', 'https://www.facebook.com/koolcollectionpage', '177 street 19 Sangkat Chey Chumnas Khan Daun Penh, Phnom Penh, Cambodia 12206', '023 214 509', '', 'Kool Collection', 'Kool Collection', '1'),
	(2, 'Deluxe Watch Shop', 'Sell High Quality Brand Name Watches and Accessories.', 'deluxe-watch-shop', 6, '', '826157990782984', 'https://www.facebook.com/DeluxeWatchShop', '', '077 715050', '', 'Deluxe Watch Shop', 'Sell High Quality Brand Name Watches and Accessories.', '1'),
	(3, 'SD Perfume Cambodia', 'SD Perfume Cambodia is a subsidiary of SD Perfume Singapore . Our stocks are fresh from Singapore and it\'s all original 100%.', 'sd-perfume-cambodia', 8, '', '449228985259681', 'https://www.facebook.com/sdcambodia', '901 St 128 Phnom Penh, Phnom Penh, Cambodia 12222', '069 888 021', '', 'SD Perfume Cambodia', 'SD Perfume Cambodia is a subsidiary of SD Perfume Singapore . Our stocks are fresh from Singapore and it\'s all original 100%', '1'),
	(4, 'SASA Boutique BakTouk ហាងលក់សំលៀកបំពាក់បុរសសាសាបូទិកបាក់ទូក', 'ផ្ទះលេខ១០៤ និង ១០៦ ផ្លូវលេខ ១៣៩ សង្កាត់វាលវង់ ខណ្ឌ ៧មករា ជាប់សណ្ឋាគារទឹករាំផ្ការាំ ភ្នំពេញ', 'sasa-boutique-baktouk', 9, '', '210627679121317', 'https://www.facebook.com/sasabaktoukpage', '104+106Eo,E1 St139, Phnom Penh, Cambodia', '012 476 519', '', 'SASA Boutique BakTouk ហាងលក់សំលៀកបំពាក់បុរសសាសាបូទិកបាក់ទូក', 'SASA Boutique BakTouk ហាងលក់សំលៀកបំពាក់បុរសសាសាបូទិកបាក់ទូក', '1'),
	(5, 'Pro Kit Soccer Store', 'Football/Soccer Store\r\nSoccer Shoes, Gloves, Clothing, Trainers, Jerseys', 'pro-kit-soccer-store', 12, '', '227774970711747', 'https://www.facebook.com/prokitsoccerstore', 'street 199, 26eo, Phnom Penh, Cambodia 12312', '017 791 110', '', 'Pro Kit Soccer Store', 'We sell all Soccer Shoes, Gloves, Clothing, Trainers, Jerseys.', '1'),
	(6, 'ISport Cambodia Shops', 'We whole sale and retails all kind of sport wears, and provide service on printing name and number, logo embroidery, and also tailoring the sport clothes.', 'isport-cambodia-shop', 14, '', '1110388488990589', 'https://www.facebook.com/isport169', 'No. 428, (Near Mondial Traffic Light) Mao Tse Tong Blvd, Beng Salang District, Khan Toul Kork,, Phnom Penh, Cambodia 855', '010 383 220, 015 669 932,099 353', '', 'ISport Cambodia Shop', 'We whole sale and retails all kind of sport wears, and provide service on printing name and number, logo embroidery, and also tailoring the sport clothes', '1');
/*!40000 ALTER TABLE `mc_shops` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
