<?php

namespace Ownable\Tests\Models;

use Ownable\OwnsModel;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use OwnsModel;

    public $guarded = [];
    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
