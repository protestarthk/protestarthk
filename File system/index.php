<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>文宣上傳系統 | Protest Art HK</title>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 
<script src="https://kit.fontawesome.com/52c335ce3e.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/css/main.css">
</head>

<body>
<div class="vertical-nav bg-white" id="sidebar">
<div class="py-4 px-3 mb-4 bg-light">
  <div class="media d-flex align-items-center"><img src="/img/flag.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm"> 
    <!--*
			  *set左icon就show, 否則不變 
<?php //echo <img scr='ava/creator_id.jpg' alt='server too many load ar, F5 la' width='65' class='mr-3 rounded-circle imag-thumbnail shadow-sm' ?> 
			  *-->
    <div class="media-body">
      <h4 class="m-0">Protest Art HK</h4>
      <p class="font-weight-light text-muted mb-0">Powered by a small team</p>
    </div>
  </div>
</div>
<p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">即刻使用</p>
<ul class="nav flex-column bg-white mb-0">
  <li class="li-protest"> <a href="#" class="nav-link text-dark bg-light"> <i class="fa fa-home mr-3 text-primary fa-fw"></i> 首頁 </a> </li>
  <li class="nav-item"> <a href="#" class="nav-link text-dark "> <i class="fa fa-server mr-3 text-primary fa-fw"></i> 文宣資料庫 </a> </li>
  <li class="nav-item"> <a href="#" class="nav-link text-dark "> <i class="fa fa-cloud-upload-alt mr-3 text-primary fa-fw"></i> 上傳文宣 </a> </li>
  <li class="nav-item"> <a href="#" class="nav-link text-dark "> <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i> 連濃牆專用文宣 </a> </li>
  <li class="nav-item"> <a href="#" class="nav-link text-dark "> <i class="fas fa-search mr-3 text-primary fa-fw"></i> 搜尋文宣</a></li>
  <li class="nav-item"> <a href="#" class="nav-link text-dark "> <i class="fa fa-user-secret mr-3 text-primary fa-fw"></i> 資料收集原則 </a> </li>
  <li class="nav-item"> <a href="#" class="nav-link text-dark "> <i class="fas fa-flag mr-3 text-primary fa-fw"></i> 舉報文宣 </a> </li>
  <li class="nav-item"> <a href="#" class="nav-link text-dark "> <i class="fas fa-bug mr-3 text-primary fa-fw"></i> 錯誤回報 </a> </li>
  <li class="nav-item"> <a href="#" class="nav-link text-dark "> <i class="fa fa-question mr-3 text-primary fa-fw"></i> 關於我們 </a> </li>
  </div>
</ul>
</div>
<!-- 右邊完 -->
<?php
if ( $_COOKIE[ 'lang' ] = "en_us" ) {
  $lang = array(
    "upload_header" => "Upload your Artwork",
    "upload_header_choose" => "Choose your Artwork<br/>not support deag and drop at this moment" );
} else if ( $_COOKIE[ 'lang' ] = "zh_HK" ) {
  $lang = array(
    "upload_header" => "上傳文宣",
    "upload_header_choose" => "揀番你想上傳嘅文宣<br/>(暫時唔支持Drag and Drop)" );
} else {
  $lang = array(
    "upload_header" => "Upload your Artwork",
    "upload_header_choose" => "Choose your Artwork",
    "upload_header_nodd" => "not support deag and drop at this moment",
	"upload_form_author" => "Author",
	  "upload_form_author_ph" => "Optional",
	  "upload_form_desc" => "Poster Description",
	  "upload_form_desc_ph" => "Optional");
}

?>
<!-- 上傳頁面 -->
	<?php include("function/tag-array.php"); ?>
<div class="container">
  <div class="page-content p-5" id="content">
    <h2 class="display-4 text-white"><?php echo $lang['upload_header'];?></h2>
    <div class="separator"</div>
  <form action="function/file-upload.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleFormControlFile1"><i class="fas fa-cloud-upload-alt"></i>&nbsp;<?php echo $lang['upload_header_choose'];?></label>
          <input type="file" class="form-control-file" id="poster">
        </div>
		  <div class="form-group">
    <label for="exampleFormControlInput1">作者名</label>
    <input type="text" class="form-control" id="author" placeholder="Optional">
  </div>
	  <div class="form-group">
    <label for="exampleFormControlTextarea1">文宣簡介</label>
    <textarea class="form-control" id="description" rows="3" placeholder="Up to you la"></textarea>
  </div>
	  <div class="form-group">
    <label for="exampleFormControlInput1">Tag<?php echo "<span class='badge badge-secondary'>" . $tag_en['police'] . "</span>&nbsp;"; ?></label>
    <input type="text" class="form-control" id="tag" placeholder="<?php echo "<span class='badge badge-secondary'>" . $tag_en['police'] . "</span>&nbsp;"; ?>">
  </div>
    <div class="row">
      <input type="submit" value="Upload Image" name="submit" class="btn btn-primary mb-2">
    </div>
  </form>
</div>
</div>
</div>
</body>
</html>