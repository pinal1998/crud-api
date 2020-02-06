<?php

$connection=mysqli_connect("localhost","root","","akashtechnolab");
$response=array();

if (isset($_POST['st_id']) && isset($_POST['st_name']) && isset($_POST['st_gender']) && isset($_POST['st_email']))
{
        $st_id=mysqli_real_escape_string($connection,$_POST['st_id']);
        $st_name=mysqli_real_escape_string($connection,$_POST['st_name']);
        $st_gender=mysqli_real_escape_string($connection,$_POST['st_gender']);
        $st_email=mysqli_real_escape_string($connection,$_POST['st_email']);
        
        $query=mysqli_query($connection,"select * from tbl_student where st_id={$st_id}")or die (mysqli_error($connection));
        $count=mysqli_num_rows($query);
        
        if($count >0){
            $query=mysqli_query($connection,"update tbl_student set st_name='{$st_name}',st_gender='{$st_gender}',st_email='{$st_email}' where st_id='{$st_id}'") or die (mysqli_error($connection));
            if ($query){
                $response["flag"]='1';
                $response["message"]="Record updated";
            }  else{
                $response["flag"]='0';
                $response["message"]="error in query";
            }
        }else{
                $response["flag"]='0';
               $response["message"]="Record not found";
            }         
            
        }
        else{
            $response["flag"]='0';
            $response["message"]="Required field is missing";
        }
        echo json_encode($response);
        
   
