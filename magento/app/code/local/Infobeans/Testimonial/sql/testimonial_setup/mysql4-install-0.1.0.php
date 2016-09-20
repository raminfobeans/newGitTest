<?php

$installer = $this;
$installer->startSetup();
$installer->run(" 
CREATE TABLE {$this->getTable('testimonial')} (
`testimonial_id` int(11) unsigned NOT NULL auto_increment,
`name`	varchar(255) NOT NULL default '',
`email`	varchar(255) NOT NULL default '',
`company` varchar(255) NOT NULL default '',
`image` varchar(800) NOT NULL default '',
`testimonial` text NOT NULL default '',
`status` smallint(6) NOT NULL default '0',
`created_time` datetime NULL,
`update_time` datetime NULL,
 PRIMARY KEY(testimonial_id)
) ENGINE=InnoDB default CHARSET=utf8; " );

$installer->endSetup();
	 
