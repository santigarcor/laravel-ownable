<?php

namespace Ownable\Tests\Models;

use Ownable\Contracts\Ownable;
use Illuminate\Database\Eloquent\Model;

class Other extends Model implements Ownable
{
    public $guarded = [];
    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function isOwnedBy($owner): bool
    {
        if ($owner instanceof User) {
            return $this->post->user_id == $owner->id;
        }

        return false;
    }
}
