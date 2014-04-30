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
error_reporting(E_ALL);
chdir('content');

$handle = opendir('.');

echo '<?xml version="1.0" ?>
<index>
';
while ($entry = readdir($handle))
{
	if (is_dir($entry) and ($entry!='.') and ($entry!='..'))
	{
		echo '<groupfolder name="',$entry,'">
';
		$handle2 = opendir($entry);
		while ($entry2 = readdir($handle2))
		{
			if (is_dir($entry.'/'.$entry2) and ($entry2!='.') and ($entry2!='..'))
			{
				$amount=0;
				$handle3 = opendir($entry.'/'.$entry2);
				while ($entry3 = readdir($handle3))
				{
					if ((strtolower(substr ($entry3, -4, 4)) == ".jpg") and (substr($entry3, 0, 3) != "tn_")) $amount++;
					
				}
			echo '<folder path="content/',$entry,'/',$entry2,'/" name="',$entry2,'" amount="'.$amount.'"/>
';
			}
		}
		echo '</groupfolder>
';
	} 
} 
echo '</index>';
?>

