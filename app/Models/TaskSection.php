<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $section
 * @property int $created_at
 * @property int $updated_at
 */
class TaskSection extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'task_sections';

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
        'section', 'question_group_id', 'created_at', 'updated_at'
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
        'section' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
    public function getTotalQuestionFilledAttribute(){
        return $this->questions()->count();
    }

    // Relations ...
    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function questionGroup(){
        return $this->belongsTo(QuestionGroup::class);
    }
}
