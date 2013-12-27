-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 27 2013 г., 13:23
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `database_crm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `o_caller_report`
--

CREATE TABLE IF NOT EXISTS `o_caller_report` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `company` varchar(255) NOT NULL,
  `site_address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `business_type` text NOT NULL,
  `service_type` int(11) unsigned NOT NULL,
  `additional_products` varchar(255) NOT NULL,
  `next_call` datetime NOT NULL,
  `next_meeting_date` datetime NOT NULL,
  `contact_type` int(11) unsigned NOT NULL,
  `comment` text NOT NULL,
  `caller_id` tinyint(3) unsigned NOT NULL,
  `call_status` tinyint(3) unsigned NOT NULL,
  `manager_id` tinyint(3) unsigned NOT NULL,
  `meeting_result` tinyint(3) unsigned DEFAULT NULL,
  `comm_proposal` tinyint(4) NOT NULL,
  `contract` tinyint(3) unsigned NOT NULL,
  `importancy` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `manager_comment` text NOT NULL,
  `order_code` varchar(50) NOT NULL,
  `seo_audit_done` int(11) NOT NULL,
  `seo_file` int(11) NOT NULL,
  `changed` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `caller_id` (`caller_id`),
  KEY `call_status` (`call_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_caller_result`
--

CREATE TABLE IF NOT EXISTS `o_caller_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caller_res_id` tinyint(3) unsigned NOT NULL,
  `date` date NOT NULL,
  `status_res_id` tinyint(3) unsigned NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_call_later`
--

CREATE TABLE IF NOT EXISTS `o_call_later` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `company` varchar(255) NOT NULL,
  `site_address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `caller_id` int(11) NOT NULL,
  `call_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_call_status`
--

CREATE TABLE IF NOT EXISTS `o_call_status` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_client`
--

CREATE TABLE IF NOT EXISTS `o_client` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(50) NOT NULL,
  `phone_number` int(11) unsigned NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact_person` char(30) NOT NULL,
  `business_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_client_site`
--

CREATE TABLE IF NOT EXISTS `o_client_site` (
  `company_id` int(10) unsigned NOT NULL,
  `site` char(25) NOT NULL,
  `seo_manager` int(10) unsigned NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `o_commersial_offer`
--

CREATE TABLE IF NOT EXISTS `o_commersial_offer` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `fill_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_products` text NOT NULL,
  `fillial_web` text NOT NULL,
  `sales_form` varchar(255) NOT NULL,
  `market_position` varchar(255) NOT NULL,
  `marketing_strategy` text NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_advantages` varchar(255) NOT NULL,
  `price_level` varchar(255) NOT NULL,
  `site_tasks_adv` text NOT NULL,
  `site_tasks_mark` text NOT NULL,
  `site_tasks_info` text NOT NULL,
  `site_type` varchar(255) NOT NULL,
  `functional_modules` text NOT NULL,
  `additional_languages` varchar(255) NOT NULL,
  `site_stilistics` varchar(255) NOT NULL,
  `firm_style_attributes` varchar(255) NOT NULL,
  `slogan` text NOT NULL,
  `see_plus` text NOT NULL,
  `see_minus` text NOT NULL,
  `sites_you_like` text NOT NULL,
  `site_colors` text NOT NULL,
  `site_brightness` varchar(255) NOT NULL,
  `composition` varchar(255) NOT NULL,
  `design_type` varchar(255) NOT NULL,
  `components_basic` varchar(255) NOT NULL,
  `components_web_form` text NOT NULL,
  `components_interactive` text NOT NULL,
  `components_corporative` text NOT NULL,
  `components_people` text NOT NULL,
  `components_online_consult` text NOT NULL,
  `components_publication` text NOT NULL,
  `cms_type` varchar(255) NOT NULL,
  `modules_type` text NOT NULL,
  `menu_structure` text NOT NULL,
  `mainpage_elements` text NOT NULL,
  `site_done_before` varchar(255) NOT NULL,
  `site_url_before` varchar(255) NOT NULL,
  `tasks_completness_before` text NOT NULL,
  `seo_before` text NOT NULL,
  `advertisement_before` text NOT NULL,
  `new_product_reason` text NOT NULL,
  `additional_info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_comm_offer_context`
--

CREATE TABLE IF NOT EXISTS `o_comm_offer_context` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bussiness_theme` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `adv_budget` varchar(255) NOT NULL,
  `seo_systems` text NOT NULL,
  `geo_time_targeting` text NOT NULL,
  `theme_priority` text NOT NULL,
  `price_wanted` text NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_comm_offer_short`
--

CREATE TABLE IF NOT EXISTS `o_comm_offer_short` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_comm_proposal`
--

CREATE TABLE IF NOT EXISTS `o_comm_proposal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `res` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_contact_type`
--

CREATE TABLE IF NOT EXISTS `o_contact_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contact_type` char(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_contract`
--

CREATE TABLE IF NOT EXISTS `o_contract` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `contract_status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_everyday_report`
--

CREATE TABLE IF NOT EXISTS `o_everyday_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `tasks` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_files`
--

CREATE TABLE IF NOT EXISTS `o_files` (
  `message_id` int(11) unsigned NOT NULL,
  `file` varchar(50) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `o_importancy`
--

CREATE TABLE IF NOT EXISTS `o_importancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `importancy` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_inner_mail`
--

CREATE TABLE IF NOT EXISTS `o_inner_mail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` text NOT NULL,
  `from_user` int(11) unsigned NOT NULL,
  `to_user` int(11) unsigned NOT NULL,
  `status` char(4) NOT NULL DEFAULT 'new',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_keyword`
--

CREATE TABLE IF NOT EXISTS `o_keyword` (
  `company_id` int(10) unsigned NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_keyword_position`
--

CREATE TABLE IF NOT EXISTS `o_keyword_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `keyword_position` varchar(11) DEFAULT NULL,
  `engine` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_keyword_price`
--

CREATE TABLE IF NOT EXISTS `o_keyword_price` (
  `keyword_id` int(11) unsigned NOT NULL,
  `price_seopult` int(10) unsigned NOT NULL,
  `price_sape` int(10) unsigned NOT NULL,
  `budget_seopult` float unsigned NOT NULL,
  `budget_sape` float unsigned NOT NULL,
  `top10` int(10) unsigned NOT NULL,
  `top5` float unsigned NOT NULL,
  `top3` float unsigned NOT NULL,
  `rating_google` int(10) unsigned NOT NULL,
  `rating_yandex` int(10) unsigned NOT NULL,
  `coef_seopult` float unsigned NOT NULL,
  `coef_sape` float unsigned NOT NULL,
  PRIMARY KEY (`keyword_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `o_meeting`
--

CREATE TABLE IF NOT EXISTS `o_meeting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `result` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_orders_history`
--

CREATE TABLE IF NOT EXISTS `o_orders_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `description` text NOT NULL,
  `next_contact_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `report_id` (`report_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_position`
--

CREATE TABLE IF NOT EXISTS `o_position` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `position` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_post`
--

CREATE TABLE IF NOT EXISTS `o_post` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` text NOT NULL,
  `from_user` int(11) unsigned NOT NULL,
  `to_user` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_priority`
--

CREATE TABLE IF NOT EXISTS `o_priority` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `priority` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_product`
--

CREATE TABLE IF NOT EXISTS `o_product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product` char(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_projects`
--

CREATE TABLE IF NOT EXISTS `o_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `responding` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_roles`
--

CREATE TABLE IF NOT EXISTS `o_roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` char(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_sales_report`
--

CREATE TABLE IF NOT EXISTS `o_sales_report` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `company_id` int(11) unsigned NOT NULL,
  `phone_number` int(11) unsigned NOT NULL,
  `contact_type` int(11) unsigned NOT NULL,
  `service_type` int(11) unsigned NOT NULL,
  `sales_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_seodays`
--

CREATE TABLE IF NOT EXISTS `o_seodays` (
  `keyword_id` int(11) unsigned NOT NULL,
  `one` tinyint(3) unsigned DEFAULT NULL,
  `two` tinyint(3) unsigned DEFAULT NULL,
  `three` tinyint(3) unsigned DEFAULT NULL,
  `four` tinyint(3) unsigned DEFAULT NULL,
  `five` tinyint(3) unsigned DEFAULT NULL,
  `six` tinyint(3) unsigned DEFAULT NULL,
  `seven` tinyint(3) unsigned DEFAULT NULL,
  `eight` tinyint(3) unsigned DEFAULT NULL,
  `nine` tinyint(3) unsigned DEFAULT NULL,
  `ten` tinyint(3) unsigned DEFAULT NULL,
  `eleven` tinyint(3) unsigned DEFAULT NULL,
  `twelve` tinyint(3) unsigned DEFAULT NULL,
  `thirteen` tinyint(3) unsigned DEFAULT NULL,
  `forteen` tinyint(3) unsigned DEFAULT NULL,
  `fifteen` tinyint(3) unsigned DEFAULT NULL,
  `siksteen` tinyint(3) unsigned DEFAULT NULL,
  `sevnteen` tinyint(3) unsigned DEFAULT NULL,
  `eihteen` tinyint(3) unsigned DEFAULT NULL,
  `ninteen` tinyint(3) unsigned DEFAULT NULL,
  `twenty` tinyint(3) unsigned DEFAULT NULL,
  `twent_on` tinyint(3) unsigned DEFAULT NULL,
  `twent_tw` tinyint(3) unsigned DEFAULT NULL,
  `twent_thre` tinyint(3) unsigned DEFAULT NULL,
  `twent_fou` tinyint(3) unsigned DEFAULT NULL,
  `twent_fiv` tinyint(3) unsigned DEFAULT NULL,
  `twent_si` tinyint(3) unsigned DEFAULT NULL,
  `twent_seve` tinyint(3) unsigned DEFAULT NULL,
  `twent_eigh` tinyint(3) unsigned DEFAULT NULL,
  `twent_nin` tinyint(3) unsigned DEFAULT NULL,
  `thirty` tinyint(3) unsigned DEFAULT NULL,
  `thirt_on` tinyint(3) unsigned DEFAULT NULL,
  `seoresult` int(10) unsigned NOT NULL,
  PRIMARY KEY (`keyword_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `o_seoreport`
--

CREATE TABLE IF NOT EXISTS `o_seoreport` (
  `keyword_id` int(10) unsigned NOT NULL,
  `spent_seopult` float unsigned DEFAULT NULL,
  `spent_sape` float unsigned DEFAULT NULL,
  `spent_seopult_client` float unsigned DEFAULT NULL,
  `spent_sape_client` float unsigned DEFAULT NULL,
  PRIMARY KEY (`keyword_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `o_seo_audit_done`
--

CREATE TABLE IF NOT EXISTS `o_seo_audit_done` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `result` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_seo_companies`
--

CREATE TABLE IF NOT EXISTS `o_seo_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `company_name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `h1` varchar(255) NOT NULL,
  `h2` varchar(255) NOT NULL,
  `h3` varchar(255) NOT NULL,
  `h4` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `density` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_sites`
--

CREATE TABLE IF NOT EXISTS `o_sites` (
  `company_id` int(10) unsigned NOT NULL,
  `site` char(25) NOT NULL,
  `seo_manager` int(10) unsigned NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `o_task_system`
--

CREATE TABLE IF NOT EXISTS `o_task_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `modify_time` datetime NOT NULL,
  `first_deadline` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `deadline_change_time` datetime NOT NULL,
  `deadline_change_by` int(11) NOT NULL,
  `task` text NOT NULL,
  `task_change_time` datetime NOT NULL,
  `task_change_by` int(11) NOT NULL,
  `first_executor` varchar(255) NOT NULL,
  `executor` varchar(255) NOT NULL,
  `executor_change_time` datetime NOT NULL,
  `executor_change_by` int(11) NOT NULL,
  `executor_comment` text NOT NULL,
  `executor_comment_change_time` datetime NOT NULL,
  `executor_comment_change_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `status_change_time` datetime NOT NULL,
  `status_change_by` int(11) NOT NULL,
  `task_file` varchar(255) NOT NULL,
  `executor_file` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `project_name` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_user`
--

CREATE TABLE IF NOT EXISTS `o_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `realname` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `role` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `email` char(40) NOT NULL,
  `ban` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `last_move` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `company` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `o_user_info`
--

CREATE TABLE IF NOT EXISTS `o_user_info` (
  `id` int(11) unsigned NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `birthday` char(11) NOT NULL,
  `about_myself` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `o_vacancy`
--

CREATE TABLE IF NOT EXISTS `o_vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `file` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
