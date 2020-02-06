<?php

$connection = mysqli_connect("localhost","root","","akashtechnolab");
$response=array();

if (isset($_POST['st_id']) && !empty($_POST['st_id']))
{
    $st_id = $_POST['st_id'];
    $displayquery=mysqli_query($connection,"select * from tbl_student where st_id='{$st_id}'") or die (mysqli_error($connection));
    $count = mysqli_num_rows($displayquery);
//    $st_id=mysqli_real_escape_string($connection,$_POST['st_id']);
    if($count > 0)
    {
        $query=mysqli_query($connection,"delete from tbl_student where st_id='{$st_id}'") or die (mysqli_error($connection));
        if ($query)
        {
            $response['flag']= 1;
            $response['message']="Record deleted";
        }
        else
        {
            $response['flag']= 0;
            $response['message']="Please Try Again";
        }
    }
    else
    {
        $response['flag']= 0;
        $response['message']="Record Not Found";
    }
}
else
{
    $response['flag']= 0;
    $response['message']="Requied fields missing";
}
echo json_encode($response);
    
