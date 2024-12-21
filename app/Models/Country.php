<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    public function latestComment(): \Staudenmeir\EloquentHasManyDeep\HasOneDeep
    {
        return $this->hasOneDeep(Comment::class, [User::class, Post::class])
            ->latest('comments.created_at');
    }

    public function testMethod()
    {
        return $this->latestComment->is(...);
    }
}
