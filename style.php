<?php

function print_style_file($file_name = "") {
    if (empty($file_name)) {
        header('HTTP/1.0 404 Not Found');
    } else {
        require("settings.php");
        // print("Relative style file name is <code>" . $file_name . "</code><br />");
        $absolute_file_name = "./themes/" . $settings_array['style']['theme'] . '/'. $file_name;
        // print("Absolute style file name is <code>" . $absolute_file_name . "</code><br />");
        
        $doc_exist = file_exists($absolute_file_name);
        if($doc_exist) {
            // open relevant image
            $file_content = file_get_contents($absolute_file_name);
            if ($file_content != FALSE) {
                header("Content-Type: text/css");
                // we can read file content
                print($file_content);
            } else {
                // todo: make here 500 image to display in read file error
                // something goes wrong: we can't read file content
                header('HTTP/1.0 500 Internat Server Error');
            }
        } else {
            header('HTTP/1.0 404 Not Found');
        }

        
    }
}

if (isset($_GET['file'])) {
    print_style_file($_GET['file']);
} else {
    // print("File is not set.<br />");
    // print_style_file();
    header('HTTP/1.0 404 Not Found');
}
?>