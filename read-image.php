<?php
include "dblink.php";
$id = $_GET['id'];
$sql = "SELECT post_img FROM post WHERE post_id = $id";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_array($result);
header("Content-Type: image/jpeg");
echo $data['post_img'];
mysqli_close($link);
?>