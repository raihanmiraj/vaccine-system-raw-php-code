<?php
// $conn = mysqli_connect("localhost", "root", "", "vaccine");

// $conn = mysqli_connect("sql6.freemysqlhosting.net", "sql6441595", "MI45VssmSz", "sql6441595");

$conn = mysqli_connect("remotemysql.com", "LNyKU93NpX", "kOSW8Bp87p", "LNyKU93NpX");

 
 


if(mysqli_error($conn)){
    echo mysqli_error($conn);

}
$base_url = '';
?>