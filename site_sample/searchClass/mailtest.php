<?php

$user_ip = $_SERVER['REMOTE_ADDR'];
$user_name = "herb";
$user_dep = "herb";
$user_sugg = "1";
$user_sugg_title = "test";
$user_sugg_content = "test";

if($user_sugg == "1"){
	$mail_title = "[建議] ".$user_sugg_title;
}else if($user_sugg == "2"){
	$mail_title = "[Bug回報] ".$user_sugg_title;
}

$sub = "=?UTF-8?B?".base64_encode($mail_title)."?="; 
$from="From:search_sugg@192.192.6.103"; 
$from.="\nContent-Type:text/html;charset=utf-8"; 







$mail_content .= "建議回報者IP : ".$user_ip."<br>";
$mail_content .= "建議回報者姓名 : ".$user_name."<br>";
$mail_content .= "建議回報者系所 : ".$user_dep."<br>";
$mail_content .= "建議回報標題 : ".$mail_title."<br>";
$mail_content .= "建議回報內容 : <br><br>";
$mail_content .= nl2br($user_sugg_content);

if(mail("herbjoyce@gmail.com",$sub,$mail_content,$from)){
	echo "{success:true}";
	exit;
}else{
	echo "{failure:true,msg:'伺服器錯誤，請連繫管理員'}";
	exit;
}

?>