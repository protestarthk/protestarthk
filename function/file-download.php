<?php
require('db-config.php');
$fileid = $_GET['id'];

$conn = mysqli_connect("localhost","$db_usr","$db_pwd","$db_name");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql = "SELECT * FROM poster WHERE assid=" . $fileid;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        //print_r($row); //Debug用, 咪亂搞

		$file_type = $row['mime'];
		$file_ori_name = $row['filename'];
		$file_md5 = $row['md5'];
		
		header('Content-Type: ' . $file_type);
		header('Content-Disposition: attachment; filename=' . $file_ori_name);
		readfile('../img/database/' . $file_md5);
		    }
} else {
    echo "ERROR 404冇尼筆文宣啊";
}
$conn->close();


?>  