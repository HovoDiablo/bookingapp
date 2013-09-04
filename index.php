<?php
    require_once 'init.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>new_file</title>
		<meta name="description" content="" />
		<meta name="author" content="LUSINE" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
		
		<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap-theme.css"/>
		<link rel="stylesheet" type="text/css" href="/datepicker/css/datepicker.css"/>
		<link rel="stylesheet" type="text/css" href="/bootstrap/css/typeahead.css"/>
		<link rel="stylesheet" type="text/css" href="/css/main.css"/>
		
		<script type="text/javascript" src="/js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="/bootstrap/js/bootstrap.js"></script>
        
        <script type="text/javascript" src="/bootstrap/js/typeahead.js"></script>
		<script type="text/javascript" src="/bootstrap/js/hogan.js"></script>
		<script type="text/javascript" src="/datepicker/js/bootstrap-datepicker.js"></script>
		<script type="text/javascript" src="/js/functions.js"></script>
		<script type="text/javascript" src="/js/main.js"></script>
	</head>
	<body>
	    <div class="container">
	    <div class="row col-md-12">
	        
    		<ul class="nav nav-tabs">
              <li class="active"><a href="#city" data-toggle="tab"><span class="glyphicon glyphicon-screenshot"></span>Destiantion</a></li>
              <li><a href="#hotel" data-toggle="tab"><span class="glyphicon glyphicon-home"></span>Hotel</a></li>
              <li><a href="#flights" data-toggle="tab"><span class="glyphicon glyphicon-plane"></span>Flights</a></li>
            </ul>
            
            <div class="tab-content col-md-5">
              <div class="tab-pane active" id="city">
                <?php
                    require_once '/searchForms/destinationForm.php';
                ?>   
              </div>
              <div class="tab-pane" id="hotel">
                <?php
                    require_once '/searchForms/hotelForm.php';
                ?>    
              </div>
              <div class="tab-pane" id="flights">
                <?php
                    require_once '/searchForms/flightForm.php';
                ?>   
              </div>
            </div>
            
    		
    		
        </div>
        <div class="row col-md-12" id="resultsContainer">
            <div id="progressBar" class="col-md-5">
                <div class="progress progress-striped active">
                  <div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                </div>
            </div>
            <div id="results">
            
            </div>   
        </div>
        
        </div>
	</body>
</html>
