<?php

function print_file_from_content($file_value = "") {
    // check if relevant file exist
    $content_directory = './content/';
    if (empty($file_value)) {
        // todo: make here 404 file to display in not found content file;
        header('HTTP/1.0 404 Not Found');
        print("404: Not found file $file_value");
    } else {
        $relevant_file_name = $content_directory . $file_value;
    }
    $img_exist = file_exists($relevant_file_name);
    if($img_exist) {
        // open relevant file
        $file_content = file_get_contents($relevant_file_name);
        if ($file_content != FALSE) {
            require("mime_type.php");
            header("Content-Type: " . mime_type($real_file_name));
            print($file_content);
            // we can read file content
        } else {
            // todo: make here 500 file to display in read file error
            // something goes wrong: we can't read file content
            header('HTTP/1.0 500 Internat Server Error');
        }
    } else {
        // todo: make here 404 file to display in not found content file;
        header('HTTP/1.0 404 Not Found');
        print("404: Not found file $relevant_file_name");
    }
}

if (isset($_GET['file'])) {
    print_file_from_content($_GET['file']);
} else {
    // print("file is not set.<br />");
    print_file_from_content();
}
?>