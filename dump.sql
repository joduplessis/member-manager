-- phpMyAdmin SQL Dump
-- version 2.7.0-pl1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 09, 2006 at 04:05 PM
-- Server version: 5.0.18
-- PHP Version: 5.1.1
--
-- Database: `intranet_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(10) NOT NULL auto_increment,
  `member` int(10) NOT NULL,
  `date` date NOT NULL,
  `service` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=950 ;

--
-- Dumping data for table `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `surname` varchar(100) NOT NULL default '',
  `address` varchar(120) NOT NULL,
  `town` varchar(50) NOT NULL default '',
  `suburb` varchar(10) NOT NULL default '',
  `tel_home` varchar(20) NOT NULL default '',
  `tel_work` varchar(20) NOT NULL default '',
  `fax` varchar(20) NOT NULL default '',
  `mobile` varchar(20) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `is_member` varchar(10) NOT NULL,
  `homegroup` varchar(100) NOT NULL default '',
  `date_birthdate` date NOT NULL,
  `date_baptism` date NOT NULL,
  `date_firstvisit` date NOT NULL,
  `date_member` date NOT NULL,
  `date_death` date NOT NULL,
  `occupation` varchar(10) NOT NULL,
  `leadership` varchar(10) NOT NULL,
  `deleted` varchar(10) NOT NULL,
  `notes` blob NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='members table' AUTO_INCREMENT=1871 ;

-- --------------------------------------------------------

--
-- Table structure for table `community_temp`
--

CREATE TABLE `community_temp` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `surname` varchar(100) NOT NULL default '',
  `address` varchar(120) NOT NULL,
  `town` varchar(50) NOT NULL default '',
  `suburb` varchar(10) NOT NULL default '',
  `tel_home` varchar(20) NOT NULL default '',
  `tel_work` varchar(20) NOT NULL default '',
  `fax` varchar(20) NOT NULL default '',
  `mobile` varchar(20) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `is_member` varchar(10) NOT NULL,
  `homegroup` varchar(100) NOT NULL default '',
  `date_birthdate` date NOT NULL,
  `date_baptism` date NOT NULL,
  `date_firstvisit` date NOT NULL,
  `date_member` date NOT NULL,
  `date_death` date NOT NULL,
  `occupation` varchar(10) NOT NULL,
  `leadership` varchar(10) NOT NULL,
  `deleted` varchar(10) NOT NULL,
  `notes` blob NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='members table' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `community_temp`
--


-- --------------------------------------------------------

--
-- Table structure for table `error`
--

CREATE TABLE `error` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(20) NOT NULL default '',
  `date` date NOT NULL default '0000-00-00',
  `description` blob NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `error`
--


-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL auto_increment,
  `description` text NOT NULL,
  `title` varchar(100) NOT NULL default '',
  `date_start` date NOT NULL default '0000-00-00',
  `date_end` date NOT NULL default '0000-00-00',
  `age_group` int(10) NOT NULL default '0',
  `person` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `events`
--


-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL default '',
  `description` blob NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `groups_member`
--

CREATE TABLE `groups_member` (
  `id` int(10) NOT NULL auto_increment,
  `groups_id` int(10) NOT NULL default '0',
  `member_id` int(10) NOT NULL default '0',
  `groups_role` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `groups_member`
--


-- --------------------------------------------------------

--
-- Table structure for table `homegroup`
--

CREATE TABLE `homegroup` (
  `id` int(10) NOT NULL auto_increment,
  `suburb` int(10) NOT NULL default '0',
  `member_id` int(11) NOT NULL default '0',
  `age_id` int(11) NOT NULL default '0',
  `day` varchar(10) NOT NULL default '',
  `time` varchar(10) NOT NULL default '',
  `elder` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=209 ;

--
-- Dumping data for table `homegroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `involvement`
--

CREATE TABLE `involvement` (
  `id` int(10) NOT NULL auto_increment,
  `title` varchar(150) NOT NULL default '',
  `description` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `involvement`
--

-- --------------------------------------------------------

--
-- Table structure for table `involvement_member`
--

CREATE TABLE `involvement_member` (
  `id` int(10) NOT NULL auto_increment,
  `involvement_id` int(10) NOT NULL default '0',
  `member_id` int(10) NOT NULL default '0',
  `role` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `involvement_member`
--


-- --------------------------------------------------------

--
-- Table structure for table `leadership`
--

CREATE TABLE `leadership` (
  `id` int(10) NOT NULL auto_increment,
  `title` varchar(40) collate latin1_general_ci NOT NULL default '',
  `description` varchar(255) collate latin1_general_ci NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `leadership`
--
-------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `surname` varchar(100) NOT NULL default '',
  `address1` varchar(120) NOT NULL default '',
  `address2` varchar(120) NOT NULL default '',
  `country` varchar(50) NOT NULL default '',
  `region` varchar(50) NOT NULL default '',
  `town` varchar(50) NOT NULL default '',
  `code` varchar(10) NOT NULL default '',
  `suburb` varchar(10) NOT NULL default '',
  `tel_home` varchar(20) NOT NULL default '',
  `tel_work` varchar(20) NOT NULL default '',
  `fax` varchar(20) NOT NULL default '',
  `mobile` varchar(20) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `birthdate` date NOT NULL default '0000-00-00',
  `first_visit` date NOT NULL default '0000-00-00',
  `baptism` date NOT NULL default '0000-00-00',
  `is_member` int(1) default NULL,
  `member_date` date NOT NULL default '0000-00-00',
  `marital_status` varchar(30) NOT NULL default '',
  `child_of` varchar(10) NOT NULL default '',
  `homegroup` varchar(10) NOT NULL default '0',
  `occupation` varchar(100) NOT NULL default '',
  `leadership` varchar(30) NOT NULL default '',
  `notes` text NOT NULL,
  `elder_flag` varchar(255) NOT NULL default '0',
  `temp_agezone` varchar(20) NOT NULL default '',
  `delete_flag` varchar(5) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='members table' AUTO_INCREMENT=7051 ;

--
-- Dumping data for table `members`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL auto_increment,
  `description` text NOT NULL,
  `expire` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

CREATE TABLE `occupations` (
  `id` int(10) NOT NULL auto_increment,
  `occupation` varchar(255) collate latin1_general_ci NOT NULL default '',
  `description` varchar(255) collate latin1_general_ci NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `occupations`
--

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(10) NOT NULL auto_increment,
  `image` varchar(255) NOT NULL default '',
  `member_id` int(10) NOT NULL default '0',
  `relationship_id` int(10) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `pictures`
--

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `id` int(11) NOT NULL auto_increment,
  `primary_person` int(11) NOT NULL default '0',
  `secondary_person` int(11) NOT NULL default '0',
  `relationship` int(11) NOT NULL default '0',
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `relationship`
--


-- --------------------------------------------------------

--
-- Table structure for table `relationship_type`
--

CREATE TABLE `relationship_type` (
  `id` int(10) NOT NULL auto_increment,
  `description` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `relationship_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL auto_increment,
  `role` varchar(50) collate latin1_general_ci NOT NULL default '',
  `involvement` varchar(10) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `roles`
--


-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL auto_increment,
  `time` varchar(10) collate latin1_general_ci NOT NULL,
  `description` varchar(255) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `service`
--


-- --------------------------------------------------------

--
-- Table structure for table `skill_member`
--

CREATE TABLE `skill_member` (
  `id` int(10) NOT NULL auto_increment,
  `skill_id` int(10) NOT NULL default '0',
  `member_id` int(10) NOT NULL default '0',
  `qualifications` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `skill_member`
--


-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) NOT NULL auto_increment,
  `skill` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `skills`
--

--
-- Table structure for table `suburbs`
--

CREATE TABLE `suburbs` (
  `id` int(10) NOT NULL auto_increment,
  `suburb` varchar(100) NOT NULL default '',
  `town_id` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE `towns` (
  `id` int(10) NOT NULL auto_increment,
  `town` varchar(100) NOT NULL default '',
  `region_id` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `surname` varchar(100) NOT NULL default '',
  `username` varchar(100) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `elder` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;
