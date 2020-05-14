<?php

namespace Ownable\Tests\Models;

use Ownable\OwnsModels;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use OwnsModels;

    public $guarded = [];
    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
