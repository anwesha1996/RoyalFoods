<?php
$currency = '&#8377; '; //Currency Character or code

//$db_username = 'royal';
//$db_password = 'food@123#';
//$db_name = 'inss_royalfooddb';
//$db_host = '103.21.58.4:3306';

$db_username = 'root';
$db_password = '';
$db_name = 'restaurantdb';
$db_host = 'localhost';

$shipping_cost      = 1.50; //shipping cost
$taxes              = array( //List your Taxes percent here.
                            'VAT' => 12, 
                            'Service Tax' => 5
                            );						
//connect to MySql						
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>