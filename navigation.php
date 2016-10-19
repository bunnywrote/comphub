<?php

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
