<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>ImageVue: {$file}</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
{literal}<style type="text/css">
<!--
body { {/literal}
	margin: {$margin|default:0}px {$margin|default:0}px {$margin|default:0}px {$margin|default:0}px;
{literal}
}
.textf {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #666666;
	padding: 10px 10px 16px;
	line-height: 16px;
}
a:visited {
	color: #000066;
	text-decoration: underline;
	padding-right: 3px;
	padding-left: 3px;
}
a:hover {
	color: #000066;
	text-decoration: none;
	border: 1px solid #000066;
	padding-right: 2px;
	padding-left: 2px;
	padding-bottom: 1px;
	padding-top: 1px;
}
a:link {
	color: #000066;
	text-decoration: underline;
	padding-right: 3px;
	padding-left: 3px;
}
a:active {
	color: #000066;
	text-decoration: underline;
}
.textfgreyarea {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #666666;
	padding: 5px 10px;
	line-height: 16px;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-bottom-style: solid;
	border-top-color: #FFFFFF;
	border-right-color: #FFFFFF;
	border-bottom-color: #FFFFFF;
	border-left-color: #FFFFFF;
}
.textfattribarea {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #666666;
	padding: 10px;
	line-height: 24px;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-right-style: solid;
	border-top-color: #EFEFEF;
	border-right-color: #EFEFEF;
	border-bottom-color: #EFEFEF;
	border-left-color: #EFEFEF;
}
-->
</style>{/literal}
</head>

<body scroll=auto>{if !$cached}<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="100%" height="100%">
  <param name="movie" value="preload.swf">
  <param name="quality" value="high">
  <param name="FLASHVARS" value="path={$path}{if $posx and $posy}&posx={$posx}&posy={$posy}{/if}&query={$query}">
  <embed src="preload.swf" width="100%" height="100%" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" flashvars="path={$path}{if $posx and $posy}&posx={$posx}&posy={$posy}{/if}&query={$query}"></embed></object>{else}<img src="{$prepath}{$path}" width="{$width}" height="{$height}">{if $desc}<table width="{$width}" border="0" cellspacing="0" cellpadding="0">
   
    <td height="10" bgcolor="#EFEFEF" class="textfgreyarea"><strong> {$file}</strong></td>
  </tr></table>
  <table width="{$width}" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td {if $descr}width="150"{/if} valign="top" class="textfattribarea"><strong>Dimensions:</strong> {$width} 
      x {$height}<br> <strong>Size:</strong> {$size}Kb<br> <strong> Date:</strong> {$date}</td>{if $descr}
    <td width="{$twidth}" valign="top" class="textf"><div align="left">{$descr|default:"No description given"}</div></td><td>&nbsp;</td>{/if}
  </tr>
  </table>
  <table width="{$width}" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#EFEFEF" class="textfgreyarea"><a href="{$prepath}{$path}" target="_blank"><font color="#666666">{$prepath}{$path}</font></a></td>
  </tr></table>{/if}{/if}</body></html>