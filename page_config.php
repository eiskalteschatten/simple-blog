<?php

$pages_config = array(
  "home" => array(
    "inMainNav" => true,
    "mainNavTitle" => "Home"
  ),
  "archive" => array(
    "inMainNav" => true,
    "mainNavTitle" => "Archive",
    "title" => "Archive"
  ),
  "post" => array(
    "title" => "Post",
    "hasParams" => true
  ),
  "404" => array(
    "title" => "Page Not Found"
  )
);

function parse_uri() {
  // Get the full URI and break it apart
  $full_path = rtrim($_SERVER["REQUEST_URI"], "/");
  $path_parts = explode("/", $full_path);

  // Remove the unneeded parts: "/" and "index.php"
  $amount_to_remove = isset($path_parts[1]) && $path_parts[1] === "index.php" ? 2 : 1;
  array_splice($path_parts, 0, $amount_to_remove);

  return $path_parts;
}

function parse_uri_string(): string {
  $path_parts = parse_uri();
  return implode("/", $path_parts);
}

function get_page_key($pages_config): string {
  $path_parts = parse_uri();
  
  if ($pages_config[$path_parts[0]]["hasParams"] === true) {
    return "/" . $path_parts[0];
  }
  
  return count($path_parts) === 0 || $path_parts[0] === "" ? "home" : implode("/", $path_parts);
}

$page_key = get_page_key($pages_config);
$page_path = "pages/" . $page_key . ".php";

if (!file_exists($page_path)) {
  $page_key = "404";
  $page_path = "pages/404.php";
}

$page_config = $pages_config[$page_key];
