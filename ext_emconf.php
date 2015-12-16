<?php
$EM_CONF[$_EXTKEY] = array(
	'title' => 'MK FAL-Explorer',
	'description' => 'Provides an windows explorer function for FAL-References',
	'category' => 'fe',
	'state' => 'beta',
	'version' => '0.0.3',
	'uploadfolder' => 0,
	'clearCacheOnLoad' => 1,
	'author' => 'Eric Hertwig',
	'author_email' => 'dev@dmk-ebusiness.de',
	'author_company' => 'DMK E-BUSINESS GmbH',
	'version' => '0.0.3',
	'_md5_values_when_last_written' => '',
	'constraints' => array(
		'depends' => array(
			'rn_base' => '0.15.15-',
			'typo3' => '6.2.0-6.2.99',
		),
		'conflicts' => array(),
		'suggests' => array(
			'mksearch' => '1.4.8-',
		),
	),
);
