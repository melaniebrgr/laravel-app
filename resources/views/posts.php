<!DOCTYPE html>
<title>My blog</title>
<link rel="stylesheet" href="/app.css">
<body>
  <h1>My blog</h1>
  <?php foreach ($posts as $post) : ?>
    <article>
      <h1>
        <a href="/posts/<?= $post->slug; ?>">
          <?= $post->title; ?>
        </a>
      </h1>
      <p><?= $post->body; ?></p>
    </article>
  <?php endforeach; ?>
</body>
