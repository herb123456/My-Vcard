<title>刪除公告</title><?php 
if(isset($_GET[id]) && $_GET[id] != "")
{
  $deletid = $_GET[id];
  //資料檔案路徑
  $datafile = "../../news.dat";
  //讀取資料內容
  $content = file($datafile);
  //格式化資料內容
    $j = 0;
  for($i=0;$i<count($content);$i++)
  {
    $temp = explode(" ",$content[$i]);
    if($temp[0] != $deletid && ($temp[3] == "1" || $temp[3] == "2"))
	{
      
        $newsdata[$j][id] = $temp[0];
        $newsdata[$j][title] = $temp[1];
        $newsdata[$j][url] = $temp[2];
   	    $newsdata[$j][day] = $temp[4];
		$newsdata[$j][type] = $temp[3];
  	    $j++;
      
	 }
  }
  //寫入剩餘資料
  $insertStr = $newsdata[0][id]." ".$newsdata[0][title]." ".$newsdata[0][url]." ".$newsdata[0][type]." ".$newsdata[0][day];
  for($i=1;$i<count($newsdata);$i++)
  {
    $insertStr .= "
".$newsdata[$i][id]." ".$newsdata[$i][title]." ".$newsdata[$i][url]." ".$newsdata[$i][type]." ".$newsdata[$i][day];
  }
  //unlink($datafile); //刪除原有資料檔
  
  $fileindex = fopen($datafile,"w");
  $write = fwrite($fileindex,$insertStr);
  
  if($write !=0){
    echo "刪除成功，<a href=./admin.php>按此返回</a>";
  }else{
    echo "刪除失敗";
  }
  fclose($fileindex);
  
  
  


}



?>

