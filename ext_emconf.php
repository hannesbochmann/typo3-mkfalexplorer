<?php
$EM_CONF[$_EXTKEY] = array(
	'title' => 'MK FAL-Explorer',
	'description' => 'Provides an windows explorer function for FAL-References',
	'category' => 'fe',
	'state' => 'beta',
	'uploadfolder' => 0,
	'clearCacheOnLoad' => 1,
	'author' => 'Eric Hertwig',
	'author_email' => 'dev@dmk-ebusiness.de',
	'author_company' => 'DMK E-BUSINESS GmbH',
	'version' => '0.0.1',
	'_md5_values_when_last_written' => '',
	'constraints' => array(
		'depends' => array(
			'rn_base' => '0.14.11-',
			'typo3' => '6.2.0-6.2.99',
			'mklib' => '0.9.62-',
		),
		'conflicts' => array(),
		'suggests' => array(
			'mksearch' => '1.4.8-',
		),
	),
);
