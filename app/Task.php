<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'user_id'
    ];

    /**
     * Task has one User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        // hasOne(RelatedModel, foreignKeyOnRelatedModel = task_id, localKey = id)
        return $this->hasOne(User::class);
    }
}
