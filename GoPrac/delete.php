<?php

header("Access-Control-Allow-Origin: *");
$conn=mysqli_connect('localhost','root','','gopracproject');

$id=$_GET['id'];

$query="DELETE FROM codes_table WHERE id='$id'";

if(!mysqli_query($conn,$query))
{ 
    http_response_code(500);
      echo json_encode(array('success' => false));
      die('Error : Query Not Executed. Please Fix the Issue! ' . mysql_error());
}
else
{
      echo json_encode(array('success' => true));
}

mysqli_close($conn);

?>