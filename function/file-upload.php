<?php
$target_dir = "../img/database/"; //local圖檔位置

$temp = explode(".", $_FILES["poster"]["name"]); //改名
$filename = $_FILES['poster']['name']; // 拎原本名
$newfilename = md5($filename) . '.' . end($temp); //新檔名 md5.jpg
$target_file = $target_dir . basename($file_md5);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["poster"]["tmp_name"]);
    if($check !== false) {
        //係圖檔 可以upload
        $uploadOk = 1;
    } else {
        echo "咪玩啦, 係send圖啊";
        $uploadOk = 0;
    }
}


if ($uploadOk == 0) {
    echo "點upload啊, 你比錯檔我啊";
} else {
	
    if (move_uploaded_file($_FILES["poster"]["tmp_name"], "../img/database/" . $newfilename)) {
        echo "The file ". basename( $_FILES["poster"]["name"]). " has been uploaded.";
		print_r($_FILES);
    } else {
        echo "妖, upload唔到啊,你搞死左個file sys啊";
    }
}
?>