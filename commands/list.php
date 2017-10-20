<?php

$lib = require(dirname(__DIR__) . '/config/init.php');

$results = $lib->request('/me/videos', array('page' => 1, 'per_page' => 50, 'sort' => 'modified_time', 'direction' => 'desc'));
return $results;