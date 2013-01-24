<?php

$default_settings_array = array(
    "style" => array(
        "theme" => "typography",
    ),
);

$settings_array = $default_settings_array;

// Parse settings file
$settings_array = parse_ini_file("settings.ini", true);
//print_r($settings_array);
/*
if (array_key_exists("style", $settings_array)) {
    $style_array = $settings_array["style"];
    if (array_key_exists("theme", $style_array)) {
        print("Theme is <code>" . $style_array["theme"] . "</code><br />");
    }
}
*/

?>
