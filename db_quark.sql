-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 166.62.8.77
-- Generation Time: Jan 01, 2014 at 09:42 PM
-- Server version: 5.0.96
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quarkApp`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `code`
--


-- --------------------------------------------------------

--
-- Table structure for table `Devices`
--

CREATE TABLE `Devices` (
  `id` int(11) NOT NULL auto_increment,
  `reg_id` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `Devices`
--

INSERT INTO `Devices` VALUES(1, 'APA91bEdG1p2vIBdY5ri13sZCDuE97zSxDenzZFpUmsJB0EtjEZ5R0vf6_wAJV4Mi56V3Fo2WimhQhhXl0OJRDse6VEaPQV5UAMk-xdwXO9ieKNlH1t_-klilwY5IaKbR7_o5VHQV6SllkDCueRowYOqebxpARAb3g');
INSERT INTO `Devices` VALUES(2, 'APA91bHyBYeZ1YViXBj71VDPxijxeQQJAutWcUjEIH6YeYmvNPDzjIENhuhq6QsDf26ob6_bcifrBFve_Efdp85m5Os6kPKCPZOg3oRhh3DyGiGUYfdbg2qQsHlHgqXkOgzop_Cf9BCtvagloaLA_HXP7LjSllxgqA');
INSERT INTO `Devices` VALUES(3, 'APA91bH4VGs44Jf-Ji2v9hHn_D1ci1HpB6_bho4k5KSuoldRI6XRu2X84Y8MYgPFTIJXdf09QeX4BUzvK7u1He1Imo3JxvM7v7uPXre4MJye2Gqp2I7gg6X8UysoTUPZF64FrJoCmvxdEO4miGG_dI7x10Dr9f2EfQ');
INSERT INTO `Devices` VALUES(4, 'APA91bHfna64JflE14PMkf4_YxbbxDPgT-YEt3PwvARpG6M0H7GgDr1C9ZPeJjjrATfwUri6rOBAX_U7aNskXcYsdol6kiZFlz9C3pz6mM2V5elfLlUUQzdWOiGmjQv8A0a_x4eJ-kSW5ag5TQDG-5hpHrJPqm66Hw');
INSERT INTO `Devices` VALUES(5, 'APA91bHxEdSApQT6U3OADerRbDrH_H5hsOL-Zpe4-mi1yEmOGT89XcuSMmS6FG5njvrukbtd0NZFHval82qWCDdT-DgBFpI7VF1YBOjDZKIKw6nYyFBasDga3nMW6ePFOWckvym6j5Af6bUODE1SlbicZ5awZAHt3A');
INSERT INTO `Devices` VALUES(6, 'APA91bEp_zpsPzBZXhd6CQTMhgEsddCc0-wzKSpKYawjtbxI_XZWWc-gRwDcjci70RkGleSNzLKHsoZ1V2lzj4e26Y8Yg0H_hdKK-q_pU0QtNXljZXYKVUdHi3A2oaopvy1T5FySBS_ed2Wre95ycG-4zRkFEmPoBQ');
INSERT INTO `Devices` VALUES(7, 'APA91bFF-VN607k8XdEtjt6AWL6Fb-arwHYFcW5T_qIv5467ClT0Z5gHYh6Aug21wZLgidzaCR0vbnrDFNmtC1uKq1puRKGdiOESZsD4VmElKappUeSRujU-u7n8KHSnhLMiTALZ0xfkwY1HnnLpGmaCC9UKDawZ4Q');
INSERT INTO `Devices` VALUES(8, 'APA91bHXks3cqDKad6Ls7eASDwuX0nTXzzGX8CufzYkyREjmJf1kwMcRYCMWykvF_AQlw4XcUhM0I2txGB3_JBqW6PBy1qljmvWpXj_iad-AFjxktvztvDIampuXelyIbtLEZ4VouL37EypdXIuDCy-72BbPt_7ZMQ');
INSERT INTO `Devices` VALUES(9, 'APA91bEVqewJmRzHQ7pweOYF4VRPKjtZqYhq0MFb1oN7aumhA-9D7OfR5vV46dF3XeJ0_CXDcgYz7agkxqx0Mu9XALb-tmzUZcgC1H87SYLtIDOFUYVKYWHdZPmnZfhtVjzS-aKS3MMWt_v5s8bP-5M1id1MHcekPg');

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `intro` text NOT NULL,
  `details` text NOT NULL,
  `route` text NOT NULL,
  `rules` text NOT NULL,
  `judging_criteria` text NOT NULL,
  `additional_info` text NOT NULL,
  `contacts` text NOT NULL,
  `min_participants` int(11) NOT NULL,
  `max_participants` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `venue` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Events`
--

INSERT INTO `Events` VALUES(1, 'Event 1', 'Introduction to event 1', 'Details to event 1', 'http:////////xyz', 'Rules for event 1', 'Criterta', 'Information', 'Contacts', 2, 10, 1, 'TBA');
INSERT INTO `Events` VALUES(2, 'Event 2', 'Introduction to event 2', 'Details to event 2', 'http:////////xyz2', 'Rules for event 1', 'Criterta', 'Information', 'Contacts', 0, 0, 0, 'TBA later');
INSERT INTO `Events` VALUES(3, 'This is a long event name', 'Introduction to event', 'Event details are here.', 'http://abc.def.ghi', 'Some rules', '', '', '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `Key`
--

CREATE TABLE `Key` (
  `key` int(11) NOT NULL,
  `ev_ws` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Key`
--

INSERT INTO `Key` VALUES(1, 'Event');
INSERT INTO `Key` VALUES(2, 'Workshop');

-- --------------------------------------------------------

--
-- Table structure for table `Registrations`
--

CREATE TABLE `Registrations` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `workshop` int(11) NOT NULL,
  `dd_no` text NOT NULL,
  `contact_no` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Registrations`
--

INSERT INTO `Registrations` VALUES(1, 'fasf', 0, 'asfas', 'asfasf');

-- --------------------------------------------------------

--
-- Table structure for table `Sponsors`
--

CREATE TABLE `Sponsors` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `website` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `Sponsors`
--

INSERT INTO `Sponsors` VALUES(16, 'Nike new6', 'NikeLogo1.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `Updates`
--

CREATE TABLE `Updates` (
  `id` int(11) NOT NULL auto_increment,
  `update_head` text NOT NULL,
  `update_body` text NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  `expiry` varchar(20) NOT NULL,
  `for_ev_ws` int(11) NOT NULL,
  `ev_ws` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `Updates`
--

INSERT INTO `Updates` VALUES(68, 'Test again', 'http://www.google.com', '1388213767', '1388256931', 1, 3);
INSERT INTO `Updates` VALUES(67, 'Test', 'Bla bla Bla.\r\nTimestamp Checking..', '1388212522', '1388255685', 1, 3);
INSERT INTO `Updates` VALUES(66, 'Test', 'Timestamp not displaying properly. Lack of space.', '1388211323', '1388296873', 1, 2);
INSERT INTO `Updates` VALUES(65, 'Test', 'Tab not receiving updates? Has gcm reg id.', '1388210471', '1388469394', 1, 2);
INSERT INTO `Updates` VALUES(64, 'Notification Check 3', 'Testing - Ayush!\r\n@\r\n#\r\n$\r\n%\r\n^\r\n&\r\n*\r\n{}\r\n[]\r\n|\r\n\\\\/\r\n:;\r\n\\"\\"\r\n\\''\\''', '1388210192', '1388382897', 1, 2);
INSERT INTO `Updates` VALUES(61, 'HEADHEADHEADHEAD', 'BODYBODYBODY', '1386837157', '1387355532', 1, 2);
INSERT INTO `Updates` VALUES(62, 'New update', 'New Body.\r\nTesting by Ayush.\r\nDoes \\"this\\" work?\r\n& does & work?', '1388209715', '1388468790', 1, 1);
INSERT INTO `Updates` VALUES(63, 'Notification Check 2', 'Apostrophes dont display properly!\r\nEg. \\"this\\"\r\nTesting more: !@#$%^&*\r\n|\r\n\\\\\r\n/\r\n\\"\\"\r\n\\''\\''\r\n;\r\n:\r\n<>', '1388209988', '1388296117', 2, 1);
INSERT INTO `Updates` VALUES(60, 'Head for an update.Head for an update.Head for an update.Head for an updateHead for an update.Head for an update.', 'dcagkuagvdakgjvgqlvjg/qjgvc', '1386832787', '1388128718', 1, 2);
INSERT INTO `Updates` VALUES(59, 'Test Head', 'Test Body', '1386052137', '1388212121', 1, 2);
INSERT INTO `Updates` VALUES(58, 'new update', 'new body', '1385885119', '1386662702', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(20) default NULL,
  `password` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` VALUES(2, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `Workshops`
--

CREATE TABLE `Workshops` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `introduction` text NOT NULL,
  `content` text NOT NULL,
  `rules` text NOT NULL,
  `team_event` tinyint(1) NOT NULL,
  `no_of_members` int(11) NOT NULL,
  `venue` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Workshops`
--

INSERT INTO `Workshops` VALUES(1, 'abcdef', 0, '', '', '', 0, 0, 'abcdefghi');
INSERT INTO `Workshops` VALUES(2, 'This is a long workshop name.', 10000, 'This is the workshop intoduction', 'this is supposed to be content', 'here are the rules for the workshop. here are the rules', 0, 0, '');
