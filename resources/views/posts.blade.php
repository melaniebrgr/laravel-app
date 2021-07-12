<!DOCTYPE html>
<title>My blog</title>
<link rel="stylesheet" href="/app.css">
<body>
  <h1>My blog</h1>
  <?php foreach ($posts as $post) : ?>
    <article>
      <?= $post; ?>
    </article>
  <?php endforeach; ?>
</body>