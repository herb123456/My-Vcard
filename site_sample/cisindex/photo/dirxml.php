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
$path=$_GET['path'];
require('include/getimagesize.php');
$dir_handle = opendir($path) or die("Unable to open $path");
echo '<?xml version="1.0" ?>
<index>
'; 

while ($file = readdir($dir_handle)) 
{
 	if ($file != '.' and $file != '..' and substr($file, 0, 3) != "tn_" and strtolower(substr ($file, -4, 4)) == ".jpg") $files[]=$file;
}

if(count($files)) {
	sort ($files);
	foreach ($files as $file) {
		list($w, $h, $t) = GetURLImageSize($path . '/' . $file);
		echo '<image name="', $file, '" width="', $w, '" height="', $h, '" size="', filesize($path . '/' . $file), '" date="', date('mdy', filectime($path . '/' . $file)), '" />
';
	}
}
closedir($dir_handle);
echo "</index>";
?>