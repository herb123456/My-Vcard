<?
#########################################################
#                                                       #
# Release....: ImageVue.v1.4.PHP.NULL-WDYL              #
# Date.......: 01/30/04                                 #
# Released...: WDYL                                     #
# Protection.: CallHome, License Check, Refferer Links  #
# URL........: http://www.imagevuex.com                 #
#                                                       #
#########################################################
$data['guest']	=	'guest';
$data['qaz76528']	=	'content/';
//$data['pain']	=	'content/';
//$data['test']	=	'content/Around the World/Portoer/';
//$data['mjau']	=	'content/Around the World/';
                    

$pass=strtolower($_GET['pass']);
/*$dfile='passwd.txt';
if($lines = @file($dfile) or die('none')) {
	


foreach($lines as $str) {
   list($key,$var)= explode("\t", $str);
   $data[$key]=$var;
   
}
*/

echo 'success=';
			 if(!$data[$pass]) { echo 'none'; }
			 else{ echo urlencode($data[$pass]); } 
			
	//	}
		
?>