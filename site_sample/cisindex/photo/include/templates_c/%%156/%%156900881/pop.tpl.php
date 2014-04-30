<?php /* Smarty version 2.5.0, created on 2003-09-13 21:59:05
         compiled from pop.tpl */ ?>
<?php $this->_load_plugins(array(
array('modifier', 'default', 'pop.tpl', 9, false),)); ?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>ImageVue: <?php echo $this->_tpl_vars['file']; ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php echo '<style type="text/css">
<!--
body { '; ?>

	margin: <?php echo $this->_run_mod_handler('default', true, @$this->_tpl_vars['margin'], 0); ?>
px <?php echo $this->_run_mod_handler('default', true, @$this->_tpl_vars['margin'], 0); ?>
px <?php echo $this->_run_mod_handler('default', true, @$this->_tpl_vars['margin'], 0); ?>
px <?php echo $this->_run_mod_handler('default', true, @$this->_tpl_vars['margin'], 0); ?>
px;
<?php echo '
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
</style>'; ?>

</head>

<body scroll=auto><?php if (! $this->_tpl_vars['cached']): ?><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="100%" height="100%">
  <param name="movie" value="preload.swf">
  <param name="quality" value="high">
  <param name="FLASHVARS" value="path=<?php echo $this->_tpl_vars['path']; ?>
<?php if ($this->_tpl_vars['posx'] && $this->_tpl_vars['posy']): ?>&posx=<?php echo $this->_tpl_vars['posx']; ?>
&posy=<?php echo $this->_tpl_vars['posy']; ?>
<?php endif; ?>&query=<?php echo $this->_tpl_vars['query']; ?>
">
  <embed src="preload.swf" width="100%" height="100%" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" flashvars="path=<?php echo $this->_tpl_vars['path']; ?>
<?php if ($this->_tpl_vars['posx'] && $this->_tpl_vars['posy']): ?>&posx=<?php echo $this->_tpl_vars['posx']; ?>
&posy=<?php echo $this->_tpl_vars['posy']; ?>
<?php endif; ?>&query=<?php echo $this->_tpl_vars['query']; ?>
"></embed></object><?php else: ?><img src="<?php echo $this->_tpl_vars['prepath']; ?>
<?php echo $this->_tpl_vars['path']; ?>
" width="<?php echo $this->_tpl_vars['width']; ?>
" height="<?php echo $this->_tpl_vars['height']; ?>
"><?php if ($this->_tpl_vars['desc']): ?><table width="<?php echo $this->_tpl_vars['width']; ?>
" border="0" cellspacing="0" cellpadding="0">
   
    <td height="10" bgcolor="#EFEFEF" class="textfgreyarea"><strong> <?php echo $this->_tpl_vars['file']; ?>
</strong></td>
  </tr></table>
  <table width="<?php echo $this->_tpl_vars['width']; ?>
" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td <?php if ($this->_tpl_vars['descr']): ?>width="150"<?php endif; ?> valign="top" class="textfattribarea"><strong>Dimensions:</strong> <?php echo $this->_tpl_vars['width']; ?>
 
      x <?php echo $this->_tpl_vars['height']; ?>
<br> <strong>Size:</strong> <?php echo $this->_tpl_vars['size']; ?>
Kb<br> <strong> Date:</strong> <?php echo $this->_tpl_vars['date']; ?>
</td><?php if ($this->_tpl_vars['descr']): ?>
    <td width="<?php echo $this->_tpl_vars['twidth']; ?>
" valign="top" class="textf"><div align="left"><?php echo $this->_run_mod_handler('default', true, @$this->_tpl_vars['descr'], 'No description given'); ?>
</div></td><td>&nbsp;</td><?php endif; ?>
  </tr>
  </table>
  <table width="<?php echo $this->_tpl_vars['width']; ?>
" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#EFEFEF" class="textfgreyarea"><a href="<?php echo $this->_tpl_vars['prepath']; ?>
<?php echo $this->_tpl_vars['path']; ?>
" target="_blank"><font color="#666666"><?php echo $this->_tpl_vars['prepath']; ?>
<?php echo $this->_tpl_vars['path']; ?>
</font></a></td>
  </tr></table><?php endif; ?><?php endif; ?></body></html>