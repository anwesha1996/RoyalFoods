<?php
session_start();
//    $dsn="mysql:dbname=inss_royalfooddb;host=103.21.58.4:3306";
//            $username="royal";
//            $password="food@123#";
$dsn="mysql:dbname=restaurantdb;host=localhost";
            $username="root";
            $password="";
            try{
                $conn=new PDO ($dsn,$username,$password,array(PDO::ATTR_AUTOCOMMIT=>false));
            } catch (Exception $ex) {
                die('could not connect'.$ex->getMessage());
            }
            