<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $question
 * @property int    $question_group_id
 * @property int    $created_at
 * @property int    $updated_at
 */
class Question extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question', 'task_section_id', 'question_group_id', 'user_created', 'user_updated', 'created_at', 'updated_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'question' => 'string', 'question_group_id' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...

    // Relations ...
    public function taskSection(){
        return $this->belongsTo(TaskSection::class);
    }

    public function questionGroup(){
        return $this->belongsTo(QuestionGroup::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class)->orderBy('choice');
    }
}
