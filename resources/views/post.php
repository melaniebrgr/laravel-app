<!DOCTYPE html>
<title>My blog</title>
<link rel="stylesheet" href="/app.css">
<body>
  <h1>My blog</h1>
  <article>
    <h1>
      <?= $post->title; ?>
    </h1>
      <p>
          By <a href="#">Melanie Burger</a> in <a href="/categories/<?= $post->category->slug ?>"><?= $post->category->name ?></a>
      </p>
    <p><?= $post->body; ?></p>
  </article>
  <a href="/">go back</a>
</body>
