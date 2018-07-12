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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
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
