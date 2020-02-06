<?php

$connection=mysqli_connect("localhost","root","","akashtechnolab");

$response=array();
$response["student"]=array();

$query=mysqli_query($connection,"select * from tbl_student") or die (mysqli_error($connection));
$count=mysqli_num_rows($query);

if ($count > 0){
    
    

    while($row=mysqli_fetch_array($query)){
        $temparry=array();
     
        $temparry["st_id"] = $row["st_id"];
        $temparry["st_name"]=$row["st_name"];
        $temparry["st_gender"]=$row["st_gender"];
        $temparry["st_email"]=$row["st_email"];
        
        array_push($response["student"], $temparry);
        $response["flag"] = 1;
           $response['message']="$count Record found";
    }
}     else {
        $response["flag"] = 0;
        $response["message"]=" Record  not  found";
  
        

    }

    

echo json_encode($response);