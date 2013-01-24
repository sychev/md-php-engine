<?php
    use \Michelf\MarkdownExtra;

function print_page_content_with_style($md_page_content = "") {
    require("settings.php");
    include("php-markdown/Markdown.php");
    include("php-markdown/MarkdownExtra.php");
    
    $style_file_name = "./themes/" . $settings_array['style']['theme'] . "/index.html";
    $style_exists = file_exists($style_file_name);
        if($style_exists) {
        // print("Main style file name is <code>" . $style_file_name . "</code>");
        $style_file_content = file_get_contents($style_file_name);
        if ($style_file_content != FALSE) {
            // we can read style content
            $stylized_page = str_replace("<!--php-md-article-content-here-->", MarkdownExtra::defaultTransform($md_page_content), $style_file_content);
            
            header("Content-Type: text/html");
            print($stylized_page);
        } else {
            print("Can't read style file file at " . $style_file_name . "<br />");
            // something goes wrong: we can't read style file
        }
    } else {
        print("Can't find style file file at " . $style_file_name . "<br />");
    }
}

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
            // print("markdown page content is" . $md_file_content);
            print_page_content_with_style($md_file_content);
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
    // print("Page value is " . $_GET['page'] . ".<br />");
    print_page_from_md($_GET['page']);
    
} else {
    // print("Page is not set.<br />");
    print_page_from_md();
}

?>