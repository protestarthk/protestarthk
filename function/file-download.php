<?php
error_reporting(0);
@ini_set('display_errors', 0);

require( 'db-config.php' );
$fileid = $_GET[ 'id' ];

$conn = mysqli_connect( "localhost", "$db_usr", "$db_pwd", "$db_name" );

// Check connection
if ( mysqli_connect_errno() ) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT * FROM poster WHERE artid='" . $fileid . "'";
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {
  while ( $row = $result->fetch_assoc() ) {
    //include('debug.php');

    //echo '<pre>';
    //print_r( $row ); //Debug用, 咪亂搞

    $file_ori_name = $row[ 'filename' ];
    $upload_file_md5 = $row[ 'md5' ];

    //echo $file_type . "<br/>";
    //echo $file_ori_name . "<br/>";
    //echo $upload_file_md5 . "<br/>";
    //echo $file_size . "<br/>";
    //echo $file_download . "<br/>";

    // Start File Download
    header( 'Content-type: application/octet-stream' );
    header( 'Content-Disposition: attachment; filename="' . $file_ori_name . '"' );
    readfile( "../img/database/" . $upload_file_md5 );
  }
} else {
  echo "ERROR 404冇尼筆文宣啊";
	?><script type="text/javascript">
window.location.href = '../pages/404/';
</script><?php
	
}
$conn->close();


?>
