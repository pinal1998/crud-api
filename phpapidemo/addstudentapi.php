<?php

$connection=mysqli_connect("localhost","root","","akashtechnolab");
$response=array();

if (isset($_POST['st_name']) && isset($_POST['st_gender'])  && isset($_POST['st_email']))
{

        
        $st_name=mysqli_real_escape_string($connection,$_POST['st_name']);
        $st_gender=mysqli_real_escape_string($connection,$_POST['st_gender']);
        $st_email=mysqli_real_escape_string($connection,$_POST['st_email']);
        
        $query=mysqli_query($connection,"insert into tbl_student(st_name,st_gender,st_email)values('{$st_name}','{$st_gender}','{$st_email}')")
        or die (mysqli_error($connection));
        
        
 if ($query){
     $response['flag']= '1';
     $response['message']= "Record inserted";
     
 }  else{
     $response['flag']= '0';
     $response['message']= "Error in query";
     
 } 
}else  {
     $response['flag']= '0';
     $response['message']= "Required Field Is Missing";
} 
   echo json_encode($response);
 ?>
        
        


