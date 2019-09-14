<?php 
//File system  upload section V0.2
// 
// This is the V0.2 of Protest Art HK kernel system
// This source code should not be publish
// 
// Thanks to my team 
// Gloary to Hong Kong , Time Revolution
// 
// NEW : Generate artwork id
// NEW : Allow user to select multiple tags
// NEW : When author is empty, will assign default for it
// NEW : Pre-make the language systme
// FIX : Error when upload file
// FIX : 
// TDO : Link tag database into tags selection
// TDO : 
?>
<?php //initial Database connection and var.
//SQL col id, artid, filename, caption, md5, author, uploadts
require( 'db-config.php' );

// Create connection
$conn = new mysqli( $db_host, $db_usr, $db_pwd, $db_name );
// Check connection
if ( $conn->connect_error ) {
  die( "Connection failed: " . $conn->connect_error );
}

?>
<?php //Handle Post data from poster upload page
$upload_author = $_POST[ 'author' ]; // varchart for author name
if(empty($upload_author)){ $upload_author = '無名';} //If author is empty, change it's name
$upload_caption = $_POST[ 'caption' ]; // Plain text of caption
$upload_tag = $_POST[ 'tag' ]; //array from $tag[];
$tag_string = implode(', ', $upload_tag); //Change tag array as comma separate


// ==== Debug Test ====
//echo "Author : ". $upload_author . "<br/>";
//echo "<pre>";
//print_r($upload_tag);
//echo "<br/>" . $tag_string . "<br/>";
// ==== Debug Test ====


// Gen a art id call function
include('file-idgen.php');

$SerialNumberGenerator = new \Rundiz\SerialNumberGenerator\SerialNumberGenerator();
$artid = $SerialNumberGenerator->generate();
unset($SerialNumberGenerator);


?>
<?php // 處理上傳檔案
$target_dir = "../img/database/"; //local圖檔位置

$temp = explode( ".", $_FILES[ "poster" ][ "name" ] ); //改名
$filename = $_FILES[ 'poster' ][ 'name' ]; // 拎原本名
$file_md5 = md5( $filename ) . '.' . end( $temp ); //新檔名 md5.jpg
$target_file = $target_dir . basename( $file_md5 );

$uploadOk = 1;
$imageFileType = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );

if ( isset( $_POST[ "submit" ] ) ) {
  $check = getimagesize( $_FILES[ "poster" ][ "tmp_name" ] );
  if ( $check !== false ) {
    //係圖檔 可以upload
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}
?>
<?php // 開始上傳及加入Database
if ( $uploadOk == 0 ) {
  echo "點upload啊, 你比錯檔我啊";
} else {
  if ( move_uploaded_file( $_FILES[ "poster" ][ "tmp_name" ], "../img/database/" . $file_md5 ) ) { // 成功上傳則加入Database
    
	  
    // ==== Debug ====
    //echo "The file ". basename( $_FILES["poster"]["name"]). " has been uploaded.";
    //echo "<pre>";
    //print_r($_FILES['poster']);
    //echo "<br/>Author Name" . $_POST['author'] . "<br/>";
    //echo "Caption" . $_POST['caption'] . "<br/>Tags : ";
    //print_r($upload_tag);
    // ==== Debug ====
	  
	  
//SQL col artid, filename, caption, md5, author
    $sql_poster = "INSERT INTO poster (artid,filename,caption,md5,author)VALUES('" . $artid . "','" . $filename . "','" . $upload_caption . "','" . $file_md5 . "', '" . $upload_author . "')";
    $sql_tagartrel = "INSERT INTO tagartrel (id, tagarray, artid) VALUES ('', '" . $tag_string . "', '" . $artid . "')";
	  //echo $sql_poster; //debug use
	  //echo $sql_tagartrel; //debug use
    if ( $conn->query( $sql_poster ) === TRUE ) {
		echo "<script>window.location = '../thxforupload.php?id='" . $artid ."';</script>"; //Redirect with artid to Finish Upload pages
	} else {
		echo "Error: " . $sql_poster . "<br>" . $conn->error;
		echo "<BR />妖, upload唔到啊,個Database死左啊";
	}
    
	  $conn->close();

  } else {
    echo "妖, upload唔到啊,你搞死左個file sys啊";
  }
}
?>