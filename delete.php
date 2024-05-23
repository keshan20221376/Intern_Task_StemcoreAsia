<?php

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "task");
$delete = $_GET['del'];

$sql = "DELETE FROM user WHERE id ='$delete'";
if (mysqli_query($connection, $sql)) {
    echo '<script>location.replace("userTable.php")</script>';
  } else {
    echo 'Error: ' . mysqli_error($connection);
  }

?>