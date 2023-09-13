<?php
  // Get the full URI
  $full_path = $_SERVER["REQUEST_URI"];
  $path_parts = explode("/", $full_path);

  // Remove the unneeded parts: "/" and "index.php"
  array_splice($path_parts, 0, 2);
?>

<html>
  <head>
    <title>Simple Frameworkless Website</title>

    <link rel="stylesheet" href="/styles.css">
  </head>
  <body>
    <header>
      <h1>Simple Frameworkless Website</h1>
    </header>

    <?php 
      if (count($path_parts) === 0 || $path_parts[0] === "") {
        echo "home!";
      }
      else {
        echo "not home!";
        // TODO: import the page based on the path (the directory structure should match the URI path)
      }
    ?>

    <footer>
      &copy; No One 2023
    </footer>
  </body>
</html>