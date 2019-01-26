<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";

    // Relacion uno a muchos
    public function comments()
    {
      return $this->hasMany("App\Comment");
    }

    // Relacion uno a muchos
    public function likes()
    {
      return $this->hasMany("App\Likes");
    }

    // Relacion muchos a uno
    public function user()
    {
      return $this->belongsTo("App\User", "user_id");
    }
}
