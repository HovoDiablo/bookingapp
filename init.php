<?php
error_reporting(1);
error_reporting(E_ALL ^ E_NOTICE);

require_once 'countries.php';
require_once '/Classes/class.dbPDO.php';
require_once '/Classes/class.websiteAPI.php';

$db = new DB();
$websiteAPI = new WebbsiteAPI();


?>