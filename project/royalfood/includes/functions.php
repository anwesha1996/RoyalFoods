<?php
include("includes/dbconfig.php");
	function get_subitem_name($pid){
		$result="select subitemname from tbl_subitemdetails where subitemid=$pid"
                        or die("select subitemname from tbl_subitemdetails where subitemid=$pid"."<br/><br/>".mysql_error());
		foreach ($conn->query($result) as $row){
                   $subitemname= $row['subitemname']; 
                }
                return $subitemname;
	}
	
	function get_subitem_image($pid){
		$result=mysql_query("select subitemimage from tbl_subitemdetails where subitemid=$pid") or die("select subitemimage from tbl_subitemdetails where subitemid=$pid"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['subitemimage'];
	}
	function get_subitem_price($pid){
		$result=mysql_query("select itemprice from tbl_subitemdetails where subitemid=$pid") or die("select itemprice from tbl_subitemdetails where subitemid=$pid"."<br/><br/>".mysql_error());
		$row=mysql_fetch_array($result);
		return $row['itemprice'];
	}
	function remove_product($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['subitemid']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	function get_order_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['subitemid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			$sum+=$price*$q;
		}
		return $sum;
	}
	function addtocart($pid,$q){
            
		if($pid<1 or $q<1) return;
		
		if(is_array($_SESSION['cart'])){
                   
			if(product_exists($pid)) return;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['subitemid']=$pid;
			$_SESSION['cart'][$max]['qty']=$q;
		}
		else{
                      
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['subitemid']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
		}
	}
	function product_exists($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['subitemid']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}

?>