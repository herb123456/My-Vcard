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
header("Expires: Mon, 1 Jan 1970 00:00:00 GMT");    // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  // always modified
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                          

if(isset($_GET['ref'])) {
	$ref=$_GET['ref'];	
}	else {
	die();
}
echo 'result=';
if(file_exists($ref)) 
{
	if(substr($ref,-1)!='/') {
	$path_parts = pathinfo($ref);
	$dir=$path_parts["dirname"];
	$file=$path_parts["basename"]; 
	$dfile=$dir.'/descr.txt';
} 
 else {
	$dir=$ref;
	$file='__dir';
	$dfile=$dir.'descr.txt';
 }


	if($lines = @file($dfile)) 
	{
		foreach($lines as $str) 
		{
		   list($key,$var)=explode("\t", $str);
		   $data[$key]=rtrim($var,"\r\n");
		}
		if($data[$file])  echo $data[$file];  
	}
}
?>