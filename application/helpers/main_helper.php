<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('bu')){
    function bu($url){
        $rs = base_url().'index.php/'.$url;
        return $rs;
    }
}
if(!function_exists('bu2')){
    function bu2($url){
        $rs = base_url().'index.php/'.$url;
        echo $rs;
    }
}
if(!function_exists('su')){
    function su($url){
        $rs = site_url().$url;
        return $rs;
    }
}
if(!function_exists('fe')){
    function fe($name){
        if(form_error($name)!=''){
        $rs = "<span class=\"erro\">".form_error($name)."</span>";
        return $rs;
        }
    }
}
?>