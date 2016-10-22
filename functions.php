<?php
    $defaultLanguage = "en";

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
        
        $localizer = getLocalizer($language);

        $navLinks = array(
            "PC" => "/pc",
            "Server" => "/server",
            "Peripherie" => "/peripherie",
            "Components" => "/components",
            "Software" => "/software",
        );

        //todo language und pageId beruecksichtigen
        foreach ($navLinks as $key => $value) {
            echo '<li><a href="'.$value.'">'.$localizer[$key].'</a></li>';
        }
    }

    function getLanguages($language){
        $supportedLanguages = array(
            "en" => "English",
            "de" => "Deutsch",
            "fr" => "Français"
        );

        if(!array_key_exists($language, $supportedLanguages))
            $language = $defaultLanguage; 

        foreach ($supportedLanguages as $key => $value) {
            if($key == $language){
                add_param($_SERVER['PHP_SELF'], 'lang', $language);
                echo '<li><span class="flag '.$key.'"></span><span>'.$value.'</span></li>';
            }
            else            
                echo '<li><span class="flag '.$key.'"></span><a href="/?lang='.$key.'">'.$value.'</a></li>';
        }
    }

    function products(){

        for ($x = 1; $x <= 10; $x++) {
            echo '
                <article>
                    <div class="article-image">
                        <image src="assets/images/placeholder.png">
                    </div>
                    <div class="article-description">
                        <span><h2>Article #'.$x.'</h2></span>
                        <span>'.getPrice($x).' CHF</span>
                        <p>Article specification</p>      
                    </div>
                    <div class="article-buy">
                        <form action="purchase-test.php" method="get">
                            <p><label>Count</label></p>
                            <p>
                                <input type="number" name="count" min="1" value="1" required>
                            </p>
                            <input type="hidden" name="price" value="'.getPrice($x).'"
                            <input type="hidden" name="id" value="'.$x.'">
                            <input type="submit" value="Buy">                    
                        </form>
                    </div>
                </article>
            ';
        }
    }

    function getPrice($x){
        return $x*99;
    }

    function getLocalizer($lang){
        $file = file_get_contents('Resources/navigation/'.$lang.'.json');

        if($file)
            $result = json_decode($file, true);

        return $result;
        // debug_dump($result);
    }

    function debug_dump($var){
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }