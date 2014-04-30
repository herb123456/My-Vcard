<?php
#########################################################
#                                                       #
# Release....: ImageVue.v1.4.PHP.NULL-WDYL              #
# Date.......: 01/30/04                                 #
# Released...: WDYL                                     #
# Protection.: CallHome, License Check, Refferer Links  #
# URL........: http://www.imagevuex.com                 #
#                                                       #
#########################################################
$vars = array('popped', 'folder', 'config');
$varstr = '';
foreach ($vars as $var) {
	if(isset($_GET[$var])) 
	{
		$vvar=$_GET[$var];
		if (strlen ($varstr) > 1 and $vvar != '') $varstr .= '&';
		$varstr .= $var . '=' . urlencode($vvar);
	}
} 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>活動花絮</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
</head>

<body bgcolor="#ffffff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td></td>
  </tr>
  <tr> 
    <td height="450"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="100%" height="500">
        <param name="menu" value="false">
        <param name="movie" value="imageVue.swf">
        <param name="quality" value="high">
        <param name="BGCOLOR" value="#ffffff">
        <param name="FLASHVARS" value="<?php echo $varstr; ?>">
        <embed src="imageVue.swf" width="100%" height="500" menu="false" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" bgcolor="#ffffff" flashvars="<?php echo $varstr; ?>"></embed></object></td>
  </tr>
  <tr> 
    <td></td>
  </tr>
</table>
</body>
</html>
