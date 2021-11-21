<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

  protected $fillable = ['disabled'];

  /**
   * Relation authors.
   *
   * @return mixed
   */
  public function authors() {
    return $this->belongsToMany(Author::class);
  }
}
