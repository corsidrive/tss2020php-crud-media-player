<?php 
function configLoader($path){
    $setting = json_decode(file_get_contents('./config.json'));
    // print_r($setting);
    foreach ($setting as $key => $value) {
       define($key,$value);
    }
}
// configLoader('./config.json');
