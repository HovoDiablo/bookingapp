<?php
require_once 'init.php';

if (isset($_REQUEST) ) {
    if (isset($_REQUEST['action'])) {
        $action = $_REQUEST['action'];
        switch ($action) {
            case 'getDestination':
                    $response = $websiteAPI -> getDestinations($_REQUEST['search']);
                echo $response;
                break;
            case 'getByRegion':
                echo $htmlStr = $websiteAPI->generateHotelsList($_REQUEST);
                break;
            default:
                
                break;
        }
    }
    
}
?>