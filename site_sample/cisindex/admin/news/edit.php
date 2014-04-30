<?php 
if(isset($_GET[id]) && $_GET[id] != "")
{
  $editid = $_GET[id];
  //資料檔案路徑
  $datafile = "../../news.dat";
  //讀取資料內容
  $content = file($datafile);
  //格式化資料內容
  for($i=0;$i<count($content);$i++)
  {
    $temp = explode(" ",$content[$i]);

    if($temp[0] == $editid)
    {
      $newsdata[id] = $temp[0];
      $newsdata[title] = $temp[1];
      $newsdata[url] = $temp[2];
	  $newsdata[day] = $temp[4];
	  $newsdata[type] = $temp[3];
    }//End if
   }//End for
}//End if

if(isset($_POST[edit]) && $_POST[edit] == "修改")
{
  $newtitle = $_POST[title];
  $newurl = $_POST[url];
  $newtype = $_POST[type];
  //資料檔案路徑
  $datafile = "../../news.dat";
  //讀取資料內容
  $content = file($datafile);
  //格式化資料內容
    $j = 0;
  for($i=0;$i<count($content);$i++)
  {
    $temp = explode(" ",$content[$i]);
    if($temp[3] == "1" || $temp[3] == "2")
	{
      
        $newsdata[$j][id] = $temp[0];
        $newsdata[$j][title] = $temp[1];
        $newsdata[$j][url] = $temp[2];
   	    $newsdata[$j][day] = $temp[4];
		$newsdata[$j][type] = $temp[3];
		if($newsdata[$j][id] == $editid)//修改資料
		{
		  $newsdata[$j][title] = $newtitle;
          $newsdata[$j][url] = $newurl;
		  $newsdata[$j][type] = $newtype;		  
		}
  	    $j++;
      
	 }
  }
  //將新資料寫入
  
  $editStr = $newsdata[0][id]." ".$newsdata[0][title]." ".$newsdata[0][url]." ".$newsdata[0][type]." ".$newsdata[0][day];
  for($i=1;$i<count($newsdata);$i++)
  {
    $editStr .= "
".$newsdata[$i][id]." ".$newsdata[$i][title]." ".$newsdata[$i][url]." ".$newsdata[$i][type]." ".$newsdata[$i][day];
  }
  //unlink($datafile); //刪除原有資料檔
  $fileindex = fopen($datafile,"w");
  $write = fwrite($fileindex,$editStr);
  
  if($write !=0){
    echo "修改成功，<a href=./admin.php>按此返回</a>";
  }else{
    echo "修改失敗";
  }
  fclose($fileindex);
  

}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5" />
<title>編輯公告</title>
</head>

<body>
<?php if(isset($newsdata) && $newsdata[title] != ""){?>
<form id="form1" name="form1" method="post" action="">
  <table width="0" border="0" align="center" cellpadding="1" cellspacing="0" class="font1">
    <tr>
      <td class="font1">公告標題</td>
      <td width="160"><label>
        <input type="text" name="title" id="title" value="<?php echo $newsdata[title]; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>相關連結</td>
      <td><label>
        <input type="text" name="url" id="url" value="<?php if($newsdata[url] != "null"){echo $newsdata[url]; }?>" />
      </label></td>
    </tr>
    <tr>
      <td>公告性質</td>
      <td><label>
        <select name="type" id="type">
          <option value="1" <?php if($newsdata[type] == "1"){ ?>selected="selected"<?php }?>>最新消息</option>
          <option value="2" <?php if($newsdata[type] == "2"){ ?>selected="selected"<?php }?>>活動訊息</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td>公告日期</td>
      <td><?php echo $newsdata[day];?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
      <input type="submit" name="edit" id="button" value="修改" />
      </label></td>
    </tr>
  </table>
</form>
<?php }?>
</body>
</html>
