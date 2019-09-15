<?php
// V0.0.1 Tag system
//
//
//
//
//
//============================


function getTag( $artid ) {
  require( 'db-config.php' );

  $sql_art = "SELECT tagid FROM tagartrel WHERE artid = '" . $artid . "'";
  $artid = $conn->query( $sql_art );
$tag_array = array();
	
  while ( $row = mysqli_fetch_array( $artid, MYSQLI_ASSOC ) ) {
    $tag_string = $row[ 'tagid' ];
    $tag = explode( ',', $tag_string );
    //echo '<pre>';
    //print_r( $tag );


    $tag_numb = count( $tag );
    $tag_array = array();
    for ( $x = 0; $x < $tag_numb; $x++ ) {
      $sql_tag = "SELECT tag FROM tag WHERE tagid = '" . $tag[ $x ] . "'";
      $tagid = $conn->query( $sql_tag );
      while ( $taglist = mysqli_fetch_array( $tagid, MYSQLI_ASSOC ) ) {
        //return "<span class='badge badge-secondary'>" . $taglist[ 'tag' ] . "</span>";
		array_push($tag_array, $taglist['tag']);
      }
    }
	  return $tag_array;
	  
  }
}
//echo "<pre>";
//print_r(getTag( 'U2r4xG_uev' ));
?>