#!/usr/bin/php
<?php

if ($argc == 2) {
    $curl = curl_init($argv[1]);
    preg_match('/http[s]*:\/\/(www.[a-zA-Z0-9]+.[a-zA-Z]+)/', $argv[1], $path);
    exec('mkdir '.$path[1]);  
    $html = file_get_contents($argv[1]);
    preg_match_all('/<img.*?src="(.*?)"/', $html, $balise_img);
    $url_img = array();
    foreach ($balise_img[1] as $src) {
        if ($src[0] != 'h') {
            $url_img[] = $argv[1].$src;
        }
        else {
            $url_img[] = $src;
        }
    }
   
    foreach ($url_img as $img) {
        $name = substr($img, strrpos($img, '/') + 1);
        $c = curl_init($img);
        $fp = fopen($path[1].'/'.$name, 'w');
        curl_setopt($c, CURLOPT_FILE, $fp);
        curl_exec($c);
        curl_close ($c);
        fclose($fp);
    }
}

?>