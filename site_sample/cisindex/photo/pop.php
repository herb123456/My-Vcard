<?
require('include/Smarty.class.php');
require('include/getimagesize.php');

$f_desc=1;
import_request_variables ('gp','f_');
list($w, $h, $t) = GetURLImageSize($f_path);
$size=filesize('./'.$f_path);
$date=date('M-d-Y', filectime('./'.$f_path));
$t=new Smarty();

if(file_exists('./'.$f_path) and $f_desc) {	
$path_parts = pathinfo('./'.$f_path);
$dir=$path_parts["dirname"];
$file=$path_parts["basename"]; 

$dfile=$dir.'/descr.txt';

if($lines = @file($dfile)) {

	foreach($lines as $str) {
		list($key,$var)= explode("\t", $str);
		$data[$key]=$var;
		}
		if($data[$file]) $t->assign ('descr',nl2br(urldecode($data[$file])));  
	}
}

$t->assign ('width',$w);
$t->assign ('twidth',$w>640?450:$w-205-$f_margin*2);
$t->assign ('height',$h);
$t->assign ('posx',$f_posx);
$t->assign ('posy',$f_posy);
$t->assign ('desc',$f_desc);

$t->assign ('margin',$f_margin);
$t->assign ('size',round($size/1024));
$t->assign ('date',$date);
$t->assign ('cached',$f_cached);
$t->assign ('path',$f_path);
//$t->assign ('prepath',$f_prepath); //$_SERVER["HTTP_HOST"].dirname($_SERVER["SCRIPT_FILENAME"])
$t->assign ('prepath','http://'.$_SERVER["HTTP_HOST"].dirname($_SERVER["SCRIPT_NAME"]).'/'); //
$t->assign ('file',basename($f_path));
$t->assign ('query',urlencode($_SERVER['QUERY_STRING']));
$t->display ('pop.tpl');

?>