<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

  protected $fillable = ['name', 'surname', 'patronymic', 'age'];
  
    /**
   * Relation posts.
   *
   * @return mixed
   */
  public function posts() {
    return $this->belongsToMany(Post::class);
  }
}
