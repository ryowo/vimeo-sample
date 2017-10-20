<?php
// Show all errors and warnings
ini_set('display_errors', 'On');
error_reporting(E_ALL);

// Load the autoloader
require_once('vendor/autoload.php');

// Load Configs
require(__DIR__ . '/config.php');
return $config;