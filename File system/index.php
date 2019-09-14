<!doctype html>
<?php 
//File system  upload page V0.2
// 
// This is the V0.2 of Protest Art HK
// This source code should not be publish
// 
// Thanks to my team 
// Gloary to Hong Kong , Time Revolution
// 
// NEW : Allow user to select multiple tags
// NEW : Pre-make the language systme
// FIX : 
// TDO : Link tag database into tags selection for selection
// TDO : make the theme better
?>
<html>
<head>
<meta charset="utf-8">
<title>文宣上傳系統 | Protest Art HK</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 
<script src="https://kit.fontawesome.com/52c335ce3e.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="css/bootstrap-select.css">
</head>
<?php //set cookie for language systme
	$cookie_lang_name = 'lang';
	$cookie_lang_val = 'zh_HK';
	setcookie($cookie_lang_name, $cookie_lang_val, time() + (86400 * 120), "/");
	require('lang/zh_hk.php');
	
	?>
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
      <p class="font-weight-light text-muted mb-0">Protest Art HK</p>
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

<!-- 上傳頁面 --> 
<!-- Tag select -->
<?php include("function/tag-array.php"); ?>
<div class="container">
	<?php echo $_COOKIE['lang']; ?>
  <div class="page-content p-5" id="content">
    <h2 class="display-4 text-white"><?php echo $lang['upload_header'];?></h2>
    <div class="separator"</div>
  <form action="function/file-upload.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleFormControlFile1"><?php echo $lang['upload_header_choose'];?></label>
      <input type="file" class="form-control-file" name="poster">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1"><?php echo $lang['upload_form_author']?></label>
      <input type="text" class="form-control" name="author" placeholder="<?php echo $lang['upload_form_author_ph']?>">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1"><?php echo $lang['upload_form_desc']?></label>
      <textarea class="form-control" name="caption" rows="3" placeholder="<?php echo $lang['upload_form_desc_ph']?>"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect2">想加乜野Tag?</label>
      <select name="tag[]" id="first-disabled2" class="selectpicker form-control" multiple data-live-search="true">
        <option value="1">Test</option>
        <option value="2">Aircraft</option>
        <option value="3">Cloud</option>

      </select>
    </div>
    <div class="row">
      <input type="submit" value="Upload Image" name="submit" class="btn btn-primary mb-2">
    </div>
  </form>
</div>
</div>
</div>
<script src="js/bootstrap-select.js"></script> 
<script>
function createOptions(number) {
  var options = [], _options;
  for (var i = 0; i < number; i++) {
    var option = '<option value="' + i + '">Option ' + i + '</option>';
    options.push(option);}
  _options = options.join('');
  $('#number')[0].innerHTML = _options;
  $('#number-multiple')[0].innerHTML = _options;
  $('#number2')[0].innerHTML = _options;
  $('#number2-multiple')[0].innerHTML = _options;}
var mySelect = $('#first-disabled2');
createOptions(4000);
$('#special').on('click', function () {
  mySelect.find('option:selected').prop('disabled', true);
  mySelect.selectpicker('refresh');});
$('#special2').on('click', function () {
  mySelect.find('option:disabled').prop('disabled', false);
  mySelect.selectpicker('refresh');});
$('#basic2').selectpicker({
  liveSearch: true,
  maxOptions: 1});
</script>
</body>
</html>