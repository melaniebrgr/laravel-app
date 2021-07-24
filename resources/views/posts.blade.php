<!DOCTYPE html>
<title>My blog</title>
<link rel="stylesheet" href="/app.css">
<body>
  <h1>My blog</h1>
  @foreach ($posts as $post)
    <article>
      <h1>
        <a href="/posts/{{ $post->slug }}">
          {{ $post->title }}
        </a>
      </h1>
      <p>
          By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
      </p>
      <p>{{ $post->body }}</p>
    </article>
  @endforeach
</body>
