<?php

namespace App\Models;
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
    return static::all()->firstWhere('slug', $slug);
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
      ))
      ->sortByDesc('date');
  }
}