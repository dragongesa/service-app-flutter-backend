<?php
    
require_once('conn.php');

$id = addslashes(htmlentities($_POST['id']));

$getdata = mysqli_query($con,"SELECT * FROM pj_servis WHERE id='$id'");
$rows = mysqli_num_rows($getdata);
$date = date(DATE_ATOM);
$update = "UPDATE pj_servis SET status=3, finishedAt='$date'  WHERE id='$id'";
$exequery = mysqli_query($con,$update);

$respose = array();

if($rows > 0)
{
  if($exequery)
  {
    $respose['code'] = 1;
    $respose['message'] = "Update Success";
  }else{
    $respose['code'] = 0;
    $respose['message'] = "Update Failed";
  }
}else{
  $respose['code'] = 0;
  $respose['message'] = "Update Failed, No data selected";
}
echo json_encode($respose);

?>