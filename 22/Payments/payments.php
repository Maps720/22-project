CREATE TABLE `payments` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `product_id` float(10,2) NOT NULL,
 `transaction_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `payment_amount` float(10,2) NOT NULL,
 `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
 `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
 `invoice_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `createdtime` datetime DEFAULT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;