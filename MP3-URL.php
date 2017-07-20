<?php
/*
Plugin Name: MP3 URL
Description: Replaces MP3 URL's wrapped in "[" and "]" with an MP3 player, so you can listen to MP3's on your site.
Version: 1.0
Author: LMP
Author URI: http://liamparker.com/
*/
function MP3URL($content)
{
$pattern = "/\[([^\n]+)(.mp3)\]/";
$content = preg_replace_callback($pattern,'getMP3',$content);
return $content;
}
function getMP3($matches){
$MP3 = $matches[1];
$Kind = $matches[2];
$MP3 = "$MP3$Kind";
$result = "<audio src='$MP3' controls='controls'>Your browser does not support the audio element.</audio>";
return $result;
}
add_filter('the_content', 'MP3URL');
?>