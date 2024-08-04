<?php
$posts_dir = getcwd() . "/content/posts";
$date_dirs = glob($posts_dir . '/*' , GLOB_ONLYDIR);
rsort($date_dirs);

$posts = [];

foreach ($date_dirs as $date_dir) {
  $dirs = glob($date_dir . '/*' , GLOB_ONLYDIR);

  foreach ($dirs as $dir) {
    $meta_contents_str = file_get_contents($dir . "/meta.json");
    $meta_contents = json_decode($meta_contents_str, true);
    $posts[] = $meta_contents;
  }
}
?>

<main class="container">
  <?php foreach ($posts as $post): ?>
    <article class="post">
      <h2 class="post-title">
        <a href="/post/<?= $post["id"] ?>"><?= $post["title"] ?></a>
      </h2>

      <div class="post-meta-data">
        <?php
          $date = new DateTimeImmutable($post['publishedDate']);
          echo $date->format('j F Y');
        ?>
      </div>

      <div>
        <?= $post['excerpt'] ?>
      </div>
    </article>
  <?php endforeach; ?>
</main>