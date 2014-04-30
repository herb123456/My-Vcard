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
$vars = array('ref', 'body');
$varstr = '';
foreach ($vars as $var) {
	if(isset($_POST[$var])) 
	{
		$vvar=$_POST[$var];
		$$var= $vvar;
	}
} 

if(!isset($ref) or !isset($body) or !file_exists('../'.$ref)) die('fail');	


if(substr($ref,-1)!='/') {
	$path_parts = pathinfo($ref);
	$dir=$path_parts["dirname"];
	$file=$path_parts["basename"]; 
	$dfile='../'.$dir.'/descr.txt';
} 
 else {
	$dir=$ref;
	$file='__dir';
	$dfile='../'.$dir.'descr.txt';
 }


if($lines = @file($dfile)) {
	foreach($lines as $str) {
	   list($key,$var)= explode("\t", $str);
	   $data[$key]=rtrim($var,"\r\n");
	}
}
		$data [$file]=urlencode(stripslashes($body));
		asort($data);
		if($fp=@fopen($dfile,'w')){
			foreach($data as $key=>$val) {
				if($val!='') fputs($fp,$key."\t".$val."\r\n") or die('fail');
			}
			echo ('Save was successfull');
		} else echo ("Error: Can't create file");

?>