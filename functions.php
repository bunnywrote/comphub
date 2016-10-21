<?php
    function add_param($url, $name, $value){
        if(strpos($url, '?') !== false) 
            $sep = '&';
        else $sep = '?';

        return $url.$sep.$name."=".urlencode($value);
    }

    function get_param($name, $default){
        if(!isset($_GET[$name]))
            return $default;
        return urldecode($_GET[$name]);
    }

    function navigation($language, $pageId){

        //todo language und pageId beruecksichtigen
        $navLinks = array(
            "PC" => "/pc",
            "Server" => "/server",
            "Periferie" => "/periferie",
            "Components" => "/components",
            "Software" => "/software",
        );

        foreach ($navLinks as $key => $value) {
            echo '<li><a href="'.$value.'">'.$key.'</a></li>';
        }
    }

    function getLanguages($language){
        $defaultLanguage = "en";
        $supportedLanguages = array(
            "en" => "English",
            "de" => "Deutsch",
            "fr" => "Français"
        );
    }