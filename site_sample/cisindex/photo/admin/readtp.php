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
$path='templates/';
$dir_handle = opendir($path) or die("Unable to open $path");
echo '<?xml version="1.0" ?>
<index>
'; 
$files=array();
while ($file = readdir($dir_handle)) 
{
 	if ($file != '.' and $file != '..' and strtolower(substr ($file, -4, 4)) == ".txt") $files[]=$file;
}

if(count($files)) {
	sort ($files);
	foreach ($files as $file) {
		
		echo '<file name="', $file,'" />
';
	}
}
closedir($dir_handle);
echo "</index>";
?>