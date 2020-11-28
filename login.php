<?php 
require "conn.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $response = array();
    $username = $_POST["username"];
    $password = $_POST["password"];

    $check = "SELECT * FROM pj_user WHERE username='$username' AND password='$password'";
    $data = "SELECT * FROM pj_user WHERE username='$username'";
    $result = mysqli_fetch_array(mysqli_query($con, $check));

    if(isset($result)){
        $biodata = mysqli_query($con, $data);
        $row = mysqli_fetch_assoc($biodata);
        $response['value'] = 1;
        $response['message'] = "Login berhasil";
        $response["nama"] = $row["nama"];
        $response["id_akses"] = $row["id_akses"];
        $response["id_karyawan"] = $row["id_user"];
        echo json_encode($response);
        
    }else{
        
        $response['value'] = 0;
        $response['message'] = "Login Gagal";
        echo json_encode($response);
    }
}



?>