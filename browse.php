<!doctype html>
<html>
<!--
//Browse page V0.0.1 Alpha
// 
// This is the V0.2 of Protest Art HK
// This source code should not be publish
// 
// Thanks to my team 
// Gloary to Hong Kong , Time Revolution
-->
<head>
<meta charset="utf-8">
<title>搵文宣</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 
<script src="https://kit.fontawesome.com/52c335ce3e.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
</head>

<style>
body {
    background: #599fd9;
    min-height: 100vh;
    overflow-x: hidden;
    font-family: 'Noto Sans TC', sans-serif;
}
</style>

<body>
<?php //initial Database connection
//SQL col id, artid, filename, caption, md5, author, uploadts
require( 'function/db-config.php' );
// Create connection
$conn = new mysqli( $db_host, $db_usr, $db_pwd, $db_name );
// Check connection
if ( $conn->connect_error ) {
  die( "Connection failed: " . $conn->connect_error );
}

?>
<div class="container">
  <?php
  $sql_poster = "SELECT artid, artname, author, caption, md5 FROM poster";
  $result = $conn->query( $sql_poster );

  if ( $result->num_rows > 0 ) {
    echo "<div class='row'>";
    while ( $row = $result->fetch_assoc() ) {
      echo "<div class='col-sm-4'><div class='card'> <img src='img/database/" . $row['md5'] . "' class='card-img-top'>
    <div class='card-body'>
      <h5 class='card-title'>" . $row['artname'] . "</h5><h6 class='card-subtitle mb-2 text-muted'>" . $row['author'] ."</h6>
      <p class='card-text'>" . $row['caption'] ."</p>
      <a href='" . $row['artid'] . "' class='btn btn-primary'>睇多D</a> </div>
  </div></div>";
    } echo "</div>";
  } else {
    echo "0 results";
  }
  $conn->close();

  ?>
</div>
</body>
</html>