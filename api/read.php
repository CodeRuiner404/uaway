<?php
include '/opt/bitnami/db.php';
$sql="select * from forum";
$result=$conn->query($sql);
echo"<tbody>";
while($row=$result->fetch_assoc()){
    echo"<tr>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['question']."</td>";
    echo "<td>".$row['detail']."</td>";
    echo "<td>".$row['answer']."</td>";
    echo "</tr>";
}
echo "</tbody>";
$conn->close();
?>
