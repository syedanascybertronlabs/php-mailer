<?php

function conection()
{	
	return $con = mysqli_connect("localhost","root","","php_mailing");
}

function insert($values,$table_name)
{
	$con=conection();	
	$sql="insert into ".$table_name." values(".$values.")";
	$res = mysqli_query($con,$sql);
	
}


function fetch_record($table_name)
{
	$con=conection();
	 $query="select * from ".$table_name;
	$res = mysqli_query($con,$query);
	return $res;
}


function fetch_selected_record($table_name,$column_name,$value)
{
	$con=conection();
	   $query="select * from ".$table_name." where ".$column_name."='".$value."'";
	$res = mysqli_query($con,$query);
	return $res;
}

function fetch_like($table_name,$column_name,$value)
{
	$con=conection();
	$query="select * from ".$table_name." where ".$column_name." like '".$value."%'";
	$res = mysqli_query($con,$query);
	return $res;
}

function del_record($table_name,$col_name,$value)
{
	$con=conection();
	$query="delete from $table_name where $col_name=$value";
	$res = mysqli_query($con,$query);
	if($res)
	{
		echo "<script> alert('Deleted Successfully') </script>";
	}	
}

function upd_record($table_name,$update_value,$col_name,$value)
{
	$con=conection();			
	$query="update $table_name set $update_value where $col_name=$value";
	$res = mysqli_query($con,$query);
	
}




?>