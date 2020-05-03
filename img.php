<?php
$path="/img_face"; //путь к каталогу картинок относительно корня сайта
$d=opendir($_SERVER["DOCUMENT_ROOT"].$path);
if(!$d) exit;
$pics=array();
while(false!=($n=readdir($d))){
if(preg_match("~^[a-zA-Z0-9\-\_]+\.(jpg|gif|png)$~i",$n)){
$pics[]=$n;
}
}
closedir($d);
$x=rand(0,count($pics)-1);
$pic=$pics[$x];
header("Location: $path/$pic");
exit;
?>