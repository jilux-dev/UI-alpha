-- Basic user info. Willux needs to complete this --
--
-- MUST LEEEEEEEEEEERN MYSQL :-) t. bnft

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,	-- BASIC USER ID
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL, --AS IN WEBSITE NAME (EXAMPLE JILUX.FI)
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL, -- USER PASSWORD
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL, -- SALTED PASSWORD
  
-- NEEDS TO BE DONE --  
  `modules` char(16) COLLATE utf8_unicode_ci NOT NULL, -- CLIENT PURCHASED MODULES (GALLERY, BLOG TOOL, INVOICE ETC.)
  `client_name`  char(16) COLLATE utf8_unicode_ci NOT NULL, -- CLIENT REAL NAME (EXAMPLE: Matti Nykänen)
  `client_address` char(16) COLLATE utf8_unicode_ci NOT NULL, -- CLIENT REAL ADDRESS (EXAMPLE: Matinkänninentie 11 A 666)
  `client_phone` char(16) COLLATE utf8_unicode_ci NOT NULL, -- CLIENT REAL PHONE (EXAMPLE: 13376662007 )
  `client_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL, -- USER EMAIL (!!!!! ATM ITS JUST EMAIL IN TABLE !!!!)
  `usercategory` char(16) COLLATE utf8_unicode_ci NOT NULL, -- USER CATEGORY AS IN CLIENT, ADMIN, USER, HOST etc
-- DO THE ABOVE --

  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
