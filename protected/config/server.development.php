<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    // application components
    'components' => array(
        'facebook' => array(
            'appId' => '326556410807158', // needed for JS SDK, Social Plugins and PHP SDK
            'secret' => '44a76fb2b2c907e2d3fcc2303fe4bacd', // needed for the PHP SDK 
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=fb_reflect',
            'username' => 'root',
            'password' => '',
        // Enable profiling
        // 'enableProfiling' => true,
        // 'enableParamLogging' => true,
        ),
    ),
);