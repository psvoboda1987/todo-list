SET NAMES utf8;
SET time_zone='+00:00';
SET foreign_key_checks=0;
SET sql_mode='NO_AUTO_VALUE_ON_ZERO';

USE `test`;

CREATE TABLE `task`(`task_id` int(11) NOT NULL AUTO_INCREMENT,
    `date_origin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_deadline` date NOT NULL,
    `task` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `priority` tinyint(4) NOT NULL,
    `state` tinyint(1) NOT NULL DEFAULT '1',
    `removed` tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY(`task_id`)) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

ALTER TABLE `task` CHANGE `date_deadline` `date_deadline` date NOT NULL AFTER `date_origin`,
CHANGE `priority` `priority` tinyint(4) NOT NULL AFTER `description`;

INSERT INTO `task`(`task_id`, `date_origin`, `date_deadline`, `task`, `description`, `priority`, `state`, `removed`) VALUES (1, '2019-09-20 22:51:51', '2019-09-27', 'go to sleep', 'now', 2, 1, 0),
(2, '2019-09-23 22:13:55', '2019-09-24', 'sleep', 'sleep 8 hours', 2, 1, 0),
(3, '2019-09-24 06:14:27', '2019-09-24', 'learn vue', 'from youtube', 2, 1, 0),
(5, '2019-09-24 18:04:39', '0000-00-00', 'write', 'null', 2, 1, 0);