<?php 
$daytime = date("Y.m.d");

//資料檔案路徑
$datafile = "../../news.dat";
//讀取資料內容
$content = file($datafile);
//格式化資料內容
$lastpoint = count($content) - 1;
$temp = explode(" ",$content[$lastpoint]);
$lastdata[id] = $temp[0];

$insertYoN = true;
if(isset($_POST['submit']) && $_POST['submit'] == "送出")
{
  
  $id = $lastdata[id] + 1;
  if($_POST['title'] == ""){
    $msg .= "未填寫標題";
	$insertYoN = false;
  }else{
    $title = $_POST['title'];
  }
  
  if($_POST['url'] == ""){
    $url = "null";
  }else{
    $url = $_POST['url'];
  }
  
  $type = $_POST['type'];
  
  $insertStr = "
".$id." ".$title." ".$url." ".$type." ".$daytime;
  
  if($insertYoN)
  {
    $dataindex = fopen($datafile,"a+");
	$writeTF = fwrite($dataindex,$insertStr);
	if($writeTF != 0){
	  fclose($dataindex);
 	  header ("Location: ./admin.php");
	}else{
 	   echo "新增失敗";
	}
  }
  
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5" />
<title>新增公告</title>
<style type="text/css">
<!--
.font1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
</head>

<body>
<?php if(isset($msg))echo $msg;?>
<form id="form1" name="form1" method="post" action="">
  <table width="0" border="0" align="center" cellpadding="1" cellspacing="0" class="font1">
    <tr>
      <td class="font1">公告標題</td>
      <td width="160"><label>
        <input type="text" name="title" id="title" />
      </label></td>
    </tr>
    <tr>
      <td>相關連結</td>
      <td><label>
        <input type="text" name="url" id="url" />
      </label></td>
    </tr>
    <tr>
      <td>公告類型</td>
      <td><label>
        <select name="type" id="type">
          <option value="1">最新消息</option>
          <option value="2">活動訊息</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td>公告時間</td>
      <td><?php echo $daytime;?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
      <input type="submit" name="submit" id="button" value="送出" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
