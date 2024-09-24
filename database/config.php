<?php
date_default_timezone_set('Asia/Jakarta');

$con = mysqli_connect('localhost','root','','db_proyekpkl');
if (!$con) {
    die('Connect Error : ' . mysqli_connect_errno());
}

?>