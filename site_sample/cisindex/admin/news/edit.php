<?php 
if(isset($_GET[id]) && $_GET[id] != "")
{
  $editid = $_GET[id];
  //����ɮ׸��|
  $datafile = "../../news.dat";
  //Ū����Ƥ��e
  $content = file($datafile);
  //�榡�Ƹ�Ƥ��e
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

if(isset($_POST[edit]) && $_POST[edit] == "�ק�")
{
  $newtitle = $_POST[title];
  $newurl = $_POST[url];
  $newtype = $_POST[type];
  //����ɮ׸��|
  $datafile = "../../news.dat";
  //Ū����Ƥ��e
  $content = file($datafile);
  //�榡�Ƹ�Ƥ��e
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
		if($newsdata[$j][id] == $editid)//�ק���
		{
		  $newsdata[$j][title] = $newtitle;
          $newsdata[$j][url] = $newurl;
		  $newsdata[$j][type] = $newtype;		  
		}
  	    $j++;
      
	 }
  }
  //�N�s��Ƽg�J
  
  $editStr = $newsdata[0][id]." ".$newsdata[0][title]." ".$newsdata[0][url]." ".$newsdata[0][type]." ".$newsdata[0][day];
  for($i=1;$i<count($newsdata);$i++)
  {
    $editStr .= "
".$newsdata[$i][id]." ".$newsdata[$i][title]." ".$newsdata[$i][url]." ".$newsdata[$i][type]." ".$newsdata[$i][day];
  }
  //unlink($datafile); //�R���즳�����
  $fileindex = fopen($datafile,"w");
  $write = fwrite($fileindex,$editStr);
  
  if($write !=0){
    echo "�ק令�\�A<a href=./admin.php>������^</a>";
  }else{
    echo "�ק異��";
  }
  fclose($fileindex);
  

}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5" />
<title>�s�褽�i</title>
</head>

<body>
<?php if(isset($newsdata) && $newsdata[title] != ""){?>
<form id="form1" name="form1" method="post" action="">
  <table width="0" border="0" align="center" cellpadding="1" cellspacing="0" class="font1">
    <tr>
      <td class="font1">���i���D</td>
      <td width="160"><label>
        <input type="text" name="title" id="title" value="<?php echo $newsdata[title]; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>�����s��</td>
      <td><label>
        <input type="text" name="url" id="url" value="<?php if($newsdata[url] != "null"){echo $newsdata[url]; }?>" />
      </label></td>
    </tr>
    <tr>
      <td>���i�ʽ�</td>
      <td><label>
        <select name="type" id="type">
          <option value="1" <?php if($newsdata[type] == "1"){ ?>selected="selected"<?php }?>>�̷s����</option>
          <option value="2" <?php if($newsdata[type] == "2"){ ?>selected="selected"<?php }?>>���ʰT��</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td>���i���</td>
      <td><?php echo $newsdata[day];?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
      <input type="submit" name="edit" id="button" value="�ק�" />
      </label></td>
    </tr>
  </table>
</form>
<?php }?>
</body>
</html>