-- Basic user info Willux needs to complete this --

CREATE TABLE `jlx-clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,	-- BASIC USER ID
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL, --AS IN WEBSITE NAME (EXAMPLE JILUX.FI)
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL, -- USER PASSWORD
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL, -- SALTED PASSWORD
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL, -- USER EMAIL
  
-- NEEDS TO BE DONE --  
  `modules` char(16) COLLATE utf8_unicode_ci NOT NULL, -- CLIENT PURCHASED MODULES (GALLERY, BLOG TOOL, INVOICE ETC.)
  
-- DO THE ABOVE --

  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;