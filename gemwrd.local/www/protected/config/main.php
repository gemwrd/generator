<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'gemwrd.ru',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components'=>array(
		'urlManager' => array('urlFormat'=>'path',
			'showScriptName' => false,
			'rules' => array('<controller:\w+>/<action:\w+>/*' => '<controller>/<action>',
			),

	    ),
	),
);