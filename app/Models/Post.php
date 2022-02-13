<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post
{
    public $title;
    public $expert;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $expert, $date, $body, $slug)
    {
        $this->title = $title;
        $this->expert = $expert;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        // $files = File::files(resource_path("posts/"));
        // return array_map(fn ($file) => $file->getContents(), $files);

        return collect($files = File::files(resource_path("posts/")))
            ->map(fn ($file) => YamlFrontMatter::parseFile($file))
            ->map(fn ($documents) => new Post(
                $documents->title,
                $documents->expert,
                $documents->date,
                $documents->body(),
                $documents->slug
            ));
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }
}
