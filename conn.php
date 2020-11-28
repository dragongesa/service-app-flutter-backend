<?php
date_default_timezone_set('Asia/Jakarta');
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'db_service');

$con = mysqli_connect(HOST, USER, PASS, DB) or die('tidak bisa konek');
?>