<?php 

include('db_connection.php'); 

$sql = "insert into win (name,score,seconds,created_at) values ('".$_POST['name']."', '".$_POST['score']."', '".$_POST['time']."','".date('Y-m-d H:i:s')."')";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    header('location: dashboard.php');
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    die();
  }
?>