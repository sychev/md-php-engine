<?php

function print_image_from_content($image_value = "") {
    // check if relevant image exist
    $content_directory = './content/';
    if (empty($image_value)) {
        // todo: make here 404 image to display in not found content image;
        header('HTTP/1.0 404 Not Found');
    } else {
        $relevant_image_file_name = $content_directory . $image_value;
    }
    $doc_exist = file_exists($relevant_image_file_name);
    if($doc_exist) {
        // open relevant image
        $image_file_content = file_get_contents($relevant_image_file_name);
        if ($image_file_content != FALSE) {
            print($image_file_content);
            // we can read file content
        } else {
            // todo: make here 500 image to display in read file error
            // something goes wrong: we can't read file content
            header('HTTP/1.0 500 Internat Server Error');
        }
    } else {
        // todo: make here 404 image to display in not found content image;
        header('HTTP/1.0 404 Not Found');
    }
}

if (isset($_GET['image'])) {
    print_image_from_content($_GET['image']);
} else {
    // print("Image is not set.<br />");
    print_image_from_content();
}
?>