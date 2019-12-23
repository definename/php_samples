<?php

function show_search_form()
{
    $self_path = $_SERVER["PHP_SELF"];
    print<<<_HTML_SEARCH_
    <form method="POST" action="$self_path">
        <input type="text" name="find_me" />
        <input type="submit" value="Search" />
    </form>
    _HTML_SEARCH_;
}

if ("POST" == $_SERVER["REQUEST_METHOD"]) {
    show_search_form();

    if (isset($_POST["find_me"])) {
        $find_me = $_POST["find_me"];

        $root_dir = ".\index";
        $dir = new RecursiveDirectoryIterator($root_dir, RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::SELF_FIRST);

        $file_found = 0;

        foreach ($files as $file_info) {
            if ($file_info->isFile()) {
                $extention = $file_info->getExtension();
                if (strcasecmp($extention, "html") === 0) {
                    $html_file = new SplFileObject($file_info->getPathname());
                    while (!$html_file->eof()) {
                        $file_line = strip_tags($html_file->fgets());
                        $found = preg_match("/\b" . $find_me ."\b/i", $file_line);
                        if ($found == 1) {
                            $file_found += 1;
                            $path_name = $file_info->getPathname();
                            $file_name = $file_info->getFilename();
                            print "<a href=" . $path_name .">" . $file_name . "</a>";
                            print nl2br(PHP_EOL);
                            break;
                        }
                    }
                    $html_file = null;
                }
            }
        }

        if ($file_found === 0) {
            print $find_me . " was not found" . nl2br(PHP_EOL);
        }
    }
} else {
    show_search_form();
}