<!-- <meta charset="UTF-8"> -->
<?php
$hostname = "localhost";
$dbname = "accounting";
$username = "root";
$password = "";

$conn = mysqli_connect($hostname,$username,$password,$dbname);
    mysqli_set_charset($conn,"utf8");
if(!$conn){
    echo mysqli_connect_error("خطأ قي الإتصال") . mysqli_connect_errno();
}
?>