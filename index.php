<?php

function print_page_from_md($page_value = "") {
    // check if relevant document exist
    $page_value = rtrim($page_value, "/");
    $content_directory = './content/';
    $default_md_file = 'article.md';
    if (empty($page_value)) {
        $relevant_doc_file_name = $content_directory . $default_md_file;
    } else {
        $relevant_doc_file_name = $content_directory . $page_value . '/' . $default_md_file;
    }
    $doc_exist = file_exists($relevant_doc_file_name);
    if($doc_exist) {
        // open relevant document
        $md_file_content = file_get_contents($relevant_doc_file_name);
        if ($md_file_content != FALSE) {
            print($md_file_content);
            // we can read file content
        } else {
            print("Can't read file content.<br />");
            // something goes wrong: we can't read file content
        }
    } else {
        print("Can't find md file at " . $relevant_doc_file_name . "<br />");
    }
}

if (isset($_GET['page'])) {
    print("Page value is " . $_GET['page'] . ".<br />");
    print_page_from_md($_GET['page']);
    
} else {
    print("Page is not set.<br />");
    print_page_from_md();
}

$default_settings_array = array(
    "style" => array(
        "theme" => "typo",
    ),
);

$settings_array = $default_settings_array;

// Parse settings file
$settings_array = parse_ini_file("settings.ini", true);
//print_r($settings_array);
if (array_key_exists("style", $settings_array)) {
    $style_array = $settings_array["style"];
    if (array_key_exists("theme", $style_array)) {
        print("Theme is " . $style_array["theme"]);
    }
}
?>