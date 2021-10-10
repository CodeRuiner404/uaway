<?php
include '/opt/bitnami/db.php';
$sql="select * from quiz where id <= 10";
$result=$conn->query($sql);
 
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}
 
echo json_encode($data);
exit();
?>
