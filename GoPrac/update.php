<?php

header("Access-Control-Allow-Origin: *");
$conn=mysqli_connect('localhost','root','','gopracproject');

//get the content from json file
$inputJSON = file_get_contents('php://input');
//echo $inputJSON;

$content = json_decode($inputJSON, true);

//fetch the details
$id=$content['id'];
$code=$content['code'];

//echo $id;
//echo $code;

$query="UPDATE codes_table SET Codes='$code' WHERE id='$id'";

if(!mysqli_query($conn,$query))
{ 
    http_response_code(500);
    echo json_encode(array('success' => false));
    die('Error : Query Not Executed. Please Fix the Issue! ' . mysql_error());
}
else
{
      //echo "Successfully Updated to:".$code;
      echo json_encode(array('success' => true));
}

?>