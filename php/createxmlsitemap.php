<?php
$myurl ="https://40010monogatari.com/";
$mypath = dirname(__FILE__);
$folders = array("folder1","folder2","folder3");

$fp = fopen("$mypath/sitemap.xml", "w");
    fwrite($fp, '<?xml version="1.0" encoding="UTF-8"?>
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url><loc>'.$myurl.'</loc><lastmod>'.date("Y-m-d").'</lastmod></url>
    ');
    foreach($folders as $folder){
        $files = glob("$mypath/$folder/*.html");
            foreach($files as $filename){
                $filename = basename($filename);
                $filemodified = date("Y-m-d", filemtime("$mypath/$folder/$filename"));
                $siteinfo = '<url><loc>'.$myurl.'/'.$folder.'/'.$filename.'</loc><lastmod>'.$filemodified.'</lastmod></url>';
                fwrite($fp , $siteinfo."\n");
            }
    }
    fwrite($fp, '</urlset>');
fclose($fp);
?>