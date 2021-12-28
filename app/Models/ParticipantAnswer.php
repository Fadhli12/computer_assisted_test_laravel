<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $answer
 * @property string $right_answer
 * @property int    $answer_value
 * @property int    $created_at
 * @property int    $updated_at
 */
class ParticipantAnswer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'participant_answers';

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
        'participant_id', 'question_id', 'answer', 'right_answer', 'answer_value', 'created_at', 'updated_at'
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
        'answer' => 'string', 'right_answer' => 'string', 'answer_value' => 'int', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
    public function participant(){
        return $this->belongsTo(Participant::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
