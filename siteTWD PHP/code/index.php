<?php

require_once(__DIR__ . '/config/config.php');
require_once(__DIR__ . '/config/AutoLoad.php');
error_reporting(E_ALL ^ E_NOTICE);
AutoLoad::charger();
new FrontController();



