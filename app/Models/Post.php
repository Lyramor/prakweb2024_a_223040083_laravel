<?php 

namespace App\Models;

use Illuminate\Support\Arr;

class Post {
  public static function all(){
      return [
          [
              'id' => '1',
              'slug' => 'judul-artikel-1',
              'title' => 'Judul Artikel 1',
              'author' => 'Muhamad Marsa Nur Jaman',
              'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam nobis fugit corrupti, quaerat non perspiciatis id est sequi debitis ipsam assumenda aspernatur praesentium vel, reprehenderit nulla doloribus accusamus inventore distinctio.'
          ],
          [
              'id' => '2',
              'slug' => 'judul-artikel-2',
              'title' => 'Judul Artikel 2',
              'author' => 'Lyramor',
              'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam nobis fugit corrupti, quaerat non perspiciatis id est sequi debitis ipsam assumenda aspernatur praesentium vel, reprehenderit nulla doloribus accusamus inventore distinctio.'
          ]
      ];
  }

  public static function find($slug) : array{
    // return Arr::first(static::all(), function ($post) use ($slug){
    //   return $post['slug'] == $slug;
    // });

    $post = Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

    if(! $post){
      abort(404);
    }
    return $post;
  }
}
?>