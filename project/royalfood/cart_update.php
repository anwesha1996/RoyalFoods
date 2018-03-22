<?php 
  session_start();
include_once("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
	//add product to session or create new one
	
	
	
if(isset($_POST["submit"]) && $_POST["submit"]=='Add' && $_POST["quantity"]>0)
{
	
	
	foreach($_POST as $key => $value){ //add all post vars to new_product array
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
	//remove unecessary vars
	unset($new_product['submit']);
	
	//we need to get product name and price from database.
    $statement = $mysqli->prepare("SELECT subitemname, itemprice FROM tbl_subitemdetails WHERE subitemid=? LIMIT 1");
    $statement->bind_param('s', $new_product['subitemid']);
    $statement->execute();
    $statement->bind_result($subitemname, $itemprice);
	
	while($statement->fetch()){
		
		
		//fetch product name, price from db and add to new_product array
        $new_product["subitemname"] = $subitemname; 
        $new_product["itemprice"] = $itemprice;
        
		
        if(isset($_SESSION["cart_products1"])){  //if session var already exist
            if(isset($_SESSION["cart_products1"][$new_product['subitemid']])) //check item exist in products array
            {
                unset($_SESSION["cart_products1"][$new_product['subitemid']]); //unset old array item
            }           
        }
        $_SESSION["cart_products1"][$new_product['subitemid']] = $new_product; //update or create product session with new item  
    } 
	
}
header('Location:'.$_SERVER['HTTP_REFERER']);
        exit;
?>
<body>
</body>
</html>
