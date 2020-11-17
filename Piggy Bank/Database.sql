
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `user_details` (
`id` int(30) UNSIGNED NOT NULL UNIQUE AUTO_INCREMENT,
 `account_number` bigint(12) NOT NULL PRIMARY KEY ,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL UNIQUE,
  `password` varchar(30) NOT NULL,
  `secret_code` int(6) NOT NULL UNIQUE,
  `gender` varchar(6) NOT NULL,
  `mobile_number` varchar(10) , constraint MobileNumber check (mobile_number not like '%[^0-9]%'),
  `email_address` varchar(30) NOT NULL UNIQUE,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8;


CREATE TABLE IF NOT EXISTS `transaction_details` (
  `transaction_id` int(30) NOT NULL UNIQUE AUTO_INCREMENT,
  `user` varchar(30) NOT NULL,
  `particulars` varchar(30) NOT NULL,
  `credit` bigint(255) DEFAULT NULL,
  `debit` bigint(255) DEFAULT NULL,
  `amount` bigint(255) DEFAULT NULL,
  `date_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET = utf8;

