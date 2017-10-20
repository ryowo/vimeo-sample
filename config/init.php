<?php
// Show all errors and warnings
ini_set('display_errors', 'On');
error_reporting(E_ALL);

// Load the autoloader
require_once(dirname(__DIR__) . '/vendor/autoload.php');

// Load Configs
require(__DIR__ . '/config.php');

require(__DIR__ . '/functions.php');


use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;

// 
return $lib = new Vimeo($config['client_id'], $config['client_secret'], $config['access_token']);
