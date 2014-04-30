<?php
$datafile = "news.dat";

$dataindex = fopen($datafile,"a+");

//要寫入的字串
$writeStr = "標題 url
";
//將字串寫入news.data檔尾
$writeTF = fwrite($dataindex,$writeStr);
//判斷寫入是否成功
if($writeTF != 0)
{
 echo "字串寫入成";
 readfile($datafile);
}
else
{
 echo "字串寫入失敗";
}


?>