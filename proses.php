<?php
    
require_once('conn.php');

$id = addslashes(htmlentities($_POST['id']));
$idKaryawan = addslashes(htmlentities($_POST['idKaryawanAPI']));

$getdata = mysqli_query($con,"SELECT * FROM pj_servis WHERE id='$id'");
$rows = mysqli_num_rows($getdata);

$update = "UPDATE pj_servis SET status=2,id_karyawan=$idKaryawan WHERE id='$id'";
$exequery = mysqli_query($con,$update);

$respose = array();

if($rows > 0)
{
  if($exequery)
  {
    $respose['code'] = 1;
    $respose['message'] = "Updated Success";
  }else{
    $respose['code'] = 0;
    $respose['message'] = "Updated Failed";
  }
}else{
  $respose['code'] = 0;
  $respose['message'] = "Updated Failed, No data selected";
}
echo json_encode($respose);

?>