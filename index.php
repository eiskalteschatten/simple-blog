<?php require_once("page_config.php"); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php if (isset($page_config["title"])) echo $page_config["title"] . " | "; ?> Simple Blog</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000000">
    <meta name="color-scheme" content="light dark">

    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    <link rel="stylesheet" href="/assets/css/styles.css">

    <?php
      if (isset($page_config["styles"])) {
        foreach ($page_config["styles"] as $styles) {
          echo "<link rel=\"stylesheet\" href=\"/assets/css/" . $styles . "\">";
        }
      }
    ?>

    <script src="/assets/js/scripts.js" async></script>

    <?php
      if (isset($page_config["scripts"])) {
        foreach ($page_config["scripts"] as $script) {
          echo "<script src=\"/assets/js/" . $script[0] . "\" $script[1]></script>";
        }
      }
    ?>
  </head>
  <body>
    <header class="container">
      <div class="blog-title">
        <h1>Simple Blog</h1>
      </div>

      <nav class="main-nav">
        <?php
          foreach ($pages_config as $key => $_page_config) {
            if (isset($_page_config["inMainNav"]) && $_page_config["inMainNav"] === true) {
              $is_homepage = $key === "home";
              $href = $is_homepage ? "/" : "/" . $key;

              if (parse_uri_string() === $key || (parse_uri_string() === "" && $is_homepage)) {
                echo "<a href=\"" . $href . "\" class=\"selected-link\">" . $_page_config["mainNavTitle"] . "</a>";
              }
              else {
                echo "<a href=\"" . $href . "\">" . $_page_config["mainNavTitle"] . "</a>";
              }
            }
          }
        ?>
      </nav>
    </header>

    <?php include_once($page_path); ?>

    <footer class="container">
      &copy; No One 2023
    </footer>
  </body>
</html>
