<?php 
//資料檔案路徑
$datafile = "news.dat";
//讀取資料內容
$content = file($datafile);
//格式化資料內容
for($i=0;$i<count($content);$i++)
{
  $temp = explode(" ",$content[$i]);
  $newsdata[$i][title] = $temp[0];
  $newsdata[$i][url] = $temp[1];
}

print_r($newsdata);


?>

 <script language="JavaScript">
document.write("<?php echo $newsdata[0][1]; ?>");

 </script> 