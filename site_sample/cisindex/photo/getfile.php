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
$img=$_GET['img'];
$path = substr($img, 0, strrpos($img, '/'));
$file = substr($img, strrpos($img, '/') + 1);

$tnpath = $path . '/tn_' . $file;

if (@file_exists($tnpath)) {
    Header("Content-type: image/jpeg");
    readfile($tnpath);
} elseif (!file_exists($img)) {
    die("Image doesn't exist");
} else {
    if (function_exists("imagecreatefromjpeg") and function_exists("imagecreatetruecolor")) {
        $orig_image = imagecreatefromjpeg($img);
        $orig_x = imagesx($orig_image);
        $orig_y = imagesy($orig_image);
        if (($orig_x / $orig_y) >= (4 / 3)) {
            $y = round($orig_y / ($orig_x / 158));
            $x = 158;
        } else {
            $x = round($orig_x / ($orig_y / 118));
            $y = 118;
        } 
        $sm_image = imagecreatetruecolor($x, $y);
        Imagecopyresampled($sm_image, $orig_image, 0, 0, 0, 0, $x, $y, $orig_x, $orig_y);
        Header("Content-type: image/jpeg");
        imageJPEG($sm_image, '', 80);
		@imageJPEG($sm_image, $tnpath, 80);
        imagedestroy ($sm_image);
        imagedestroy ($orig_image);
    } else {
        header("Content-type: image/jpeg");
        readfile ('thumb.jpg');
    } 
} 
?>