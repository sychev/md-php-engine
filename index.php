<?php
    use \Michelf\MarkdownExtra;

function string_starts_with($haystack, $needle) {
    $pos = strpos($haystack, $needle);
    if ($pos === 0) {
        return true;
    }
    return false;
}

function print_page_content_with_style($md_page_content = "") {
    require("settings.php");
    include("php-markdown/Markdown.php");
    include("php-markdown/MarkdownExtra.php");
    
    $template_file_name = "index.html";
    
    // check if we have to show special template
    foreach($settings_array as $key => $value) {
        // print($key . " => " . $value . "<br />");
        if (string_starts_with($key, "custom-style") && is_array($value)) {
            if (array_key_exists("url_starts_with", $value) && // check that we have url property for custom template
                string_starts_with($_SERVER['REQUEST_URI'], $value["url_starts_with"]) && // check that first lettels of our url the same like custom template url definition
                array_key_exists("custom_template", $value)) { // chechk that we have file name for the custom template
                
                // print("We found custom template information for " . $value["url_starts_with"] . " " . $value["custom_template"]);
                $template_file_name = $value["custom_template"];
            }
        }
    }
    
    $template_file_path = "./themes/" . $settings_array['style']['theme'] . "/" . $template_file_name;

    $template_exists = file_exists($template_file_path);
    if($template_exists) {
        // print("Main style file name is <code>" . $template_file_path . "</code>");
        $template_file_content = file_get_contents($template_file_path);
        if ($template_file_content != FALSE) {
            // we can read style content
            $stylized_page = str_replace("<!--php-md-article-content-here-->", MarkdownExtra::defaultTransform($md_page_content), $template_file_content);
            
            header("Content-Type: text/html");
            print($stylized_page);
        } else {
            print("Can't read style file file at " . $template_file_path . "<br />");
            // something goes wrong: we can't read style file
        }
    } else {
        print("Can't find style file file at " . $template_file_path . "<br />");
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