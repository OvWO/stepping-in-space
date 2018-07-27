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
        'title', 'user_id', 'complete'
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

    /**
     * Toggles the completed value of the model
     * @return Task
     */
    public function toggleComplete()
    {
        if ($this->complete) {
            $this->update(['complete' => false]);
        } else {
            $this->update(['complete' => true]);
        }
        return $this;
    }
}

// class Task extends Model
// {
//     public function scopeIncomplete($query)
//     {
//         return$query->where('completed', 0);
//     }
// }
// Then, you can reuse any time you need incomplete task(s)

// $incompleteTasks = Task::incomplete()->get();

// $incompleteTasksAssignedToMe = Task::incomplete()->where('user_id', 123)->get();
