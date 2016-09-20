<?php
/**
 * Magento Testimonial
 *
 * Testimonial Plus for Magento
 * Author: Hire Magento
 * Website: www.hiremagento.com 
 * Suport Email: hiremagento@gmail.com
 *
**/
$installer = $this;
$installer->startSetup();
$installer->run(" 
CREATE TABLE {$this->getTable('hm_testimonial')} (
`testimonial_id` int(11) unsigned NOT NULL auto_increment,
`name`	varchar(255) NOT NULL default '',
`email`	varchar(255) NOT NULL default '',
`company` varchar(255) NOT NULL default '',
`website` varchar(255) NOT NULL default '',
`image` varchar(800) NOT NULL default '',
`video` text NOT NULL default '',
`sidebar` smallint(6) NOT NULL default '0',
`position` int(6) NOT NULL default 0,
`testimonial` text NOT NULL default '',
`status` smallint(6) NOT NULL default '0',
`created_time` datetime NULL,
`update_time` datetime NULL,
 PRIMARY KEY(testimonial_id)
) ENGINE=InnoDB default CHARSET=utf8;" );

$installer->endSetup();
	 
