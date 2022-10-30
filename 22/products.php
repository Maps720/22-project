CREATE TABLE `products` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
 `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `price` float(10,2) NOT NULL,
 `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;