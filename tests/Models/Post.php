<?php

namespace Ownable\Tests\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $guarded = [];
    public $timestamps = false;

    public function others()
    {
        return $this->hasMany(Other::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
