<?php



include_once('conn.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
$kendala = addslashes(htmlentities($_POST['kendala']));

$jenis = addslashes(htmlentities($_POST['jenis']));

$tipe = addslashes(htmlentities($_POST['tipe']));

// $id_petugas = addslashes(htmlentities($_POST['id_petugas']));

$nama_pelanggan = addslashes(htmlentities($_POST['nama_pelanggan']));

$status = 1;
$tglmasuk = date(DATE_ATOM);
$insert = "INSERT INTO pj_servis(kendala,jenis,tipe,nama_pelanggan,status,tgl_masuk ) VALUES ('$kendala','$jenis','$tipe','$nama_pelanggan',$status,'$tglmasuk')";



$exeinsert = mysqli_query($con,$insert);

// var_dump($insert);

$response = array();



if($exeinsert)

{

  $response['code'] =1;

  $response['message'] = "Success! Data Inserted";

}else{
  $response['code'] =0;

  $response['message'] = "Failed! No Data Inserted: ";

}



echo json_encode($response);
}else{
  echo "Halaman tersembunyi!";
}
?>