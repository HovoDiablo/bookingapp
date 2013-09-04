<?php
/**
 *
 */
class WebbsiteAPI extends DB{

    protected $apiKey = 'n2muguh3ds8v4r22eh7tmppc';
    protected $secret = 'sbTsWt9r';
	protected $connectionURL = "http://api.ean.com/ean-services/rs/hotel/v3/list?";
    protected $browser;

	function __construct() {
	    parent::__construct();
		//global $countries;
        //$this->countries = $countries;
	}

    public function generateCountriesList() {
        $htmlStr = "";
        $htmlStr .= "<select name=\"countryCode\">";
           foreach ($this->countries as $key => $value) {
                $countryName = $value['name'];
                $countryCode = $value['code'];
                $htmlStr .= "<option value=\"$countryCode\">$countryName</option>";
           }
        $htmlStr .= "</select>";
        echo $htmlStr;
    }

    public function generateSelectList($listName=null,$start=1,$quantity=1,$class=null) {
        $htmlStr = "";
        $htmlStr .= "<select name=\"$listName\" id=\"$listName\" class=\"$class\">";
        for ($i=$start; $i <= $quantity; $i++) {
            $htmlStr .= "<option value=\"$i\">$i</option>";
        }
        $htmlStr .= "</select>";
        echo $htmlStr;
    }

    public function detectUserAgent() {
        $browser = get_browser(null,true);
        $this->browser = $browser['browser'];
    }

    public function getRequestParams($arr) {

       unset($arr['submit']);
       unset($arr['action']);
       unset($arr['search']);
       $requestParams = http_build_query($arr);

       return $requestParams;

    }

    public function createRequestURL($postOBJ) {
        $requestURL = "";
        $requestURL .= $this->connectionURL;
        $requestURL .= "&cid=55505&apiKey=$this->apiKey&customerUserAgent=$this->browser";
        $requestURL .= "&customerIpAddress=127.0.0.1&locale=en_EN&currencyCode=USD&minorRev=11&useCache=true";
        $requestURL .= "&supplierCacheTolerance=MED";
        $requestURL .= "&".$this->getRequestParams($postOBJ);

        return $requestURL;

    }

    public function getRequestData($postOBJ) {
        $requestURL = $this->createRequestURL($postOBJ);
        $json = file_get_contents($requestURL);
        return json_decode($json);
    }

    public function generateHotelsList($postOBJ) {
         $requestResult = $this->getRequestData($postOBJ);
         $htmlStr = '';
         if ($requestResult) {
             if (isset($requestResult->HotelListResponse->EanWsError)) {
                $htmlStr .= $requestResult->HotelListResponse->EanWsError->verboseMessage;
             }else {
                $htmlStr .= "<ul>";
                 $allHotels = $requestResult->HotelListResponse->HotelList->HotelSummary;
                 foreach ($allHotels as $key => $value) {
                       //var_dump($value);
                       $htmlStr .= "<li>$value->name - $value->hotelRating</li>";
                 }
                 $htmlStr .= "</ul>";

             }
             return $htmlStr;
         }

    }

    public function getDestinations($queryStr) {
        $query = "SELECT Destination,Country, DestinationID FROM destination_detail WHERE Destination like :query";
        //$query = "SELECT DISTINCT(City) AS Destination, Country, RegionID FROM activePropertylist WHERE City like :query LIMIT 8";
        //$query = "SELECT RegionName, ﻿RegionID FROM citycoordinateslist WHERE RegionName like :query LIMIT 8";
        parent::prepare($query);
        parent::bind(':query','%'.$queryStr.'%',PDO::PARAM_STR);
        $status = parent::execute();
        if ($status) {

            $result = parent::fetch();
            foreach ($result as $key => $value) {
                $res[] = array(
                            'Destination' => $value['Destination'],
                            'Country' => $value['Country'],
                            'destinationId'=> $value['DestinationID']
                            );
            }

        }

       return json_encode($res);

    }

}

?>