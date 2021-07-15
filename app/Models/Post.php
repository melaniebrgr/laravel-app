<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
  public $title;

  public $date;
  
  public $excerpt;

  public $slug;

  public $body;

  public function __construct($title, $excerpt, $date, $slug, $body)
  {
    $this->title = $title;
    $this->date = $date;
    $this->excerpt = $excerpt;
    $this->slug = $slug;
    $this->body = $body;
  }

  public static function find($slug)
  {
    if (!file_exists($path = resource_path("posts/$slug.html"))) {
      throw new ModelNotFoundException;
    }

    return cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));
  }

  public static function all()
  {
    return collect(File::files(resource_path("posts/")))
      ->map(fn($file) => YamlFrontMatter::parseFile($file))
      ->map(fn($document) => new Post(
        $document->title,
        $document->excerpt,
        $document->date,
        $document->slug,
        $document->body(),
      ));
  }
}