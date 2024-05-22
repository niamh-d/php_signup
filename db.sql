CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `date_joined` datetime NOT NULL DEFAULT CURRENT_TIME,
  PRIMARY KEY (`id`)
);