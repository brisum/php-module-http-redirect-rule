<?php die('Access denied'); ?>

CREATE TABLE `bsm_http_redirect_table` (
`url_from` varchar(255) NOT NULL,
`url_to` varchar(255) NOT NULL,
`code` int(11) NOT NULL,
`is_regexp` tinyint(1) NOT NULL DEFAULT '0',
`create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`url_from`),
KEY `is_regexp` (`is_regexp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8
