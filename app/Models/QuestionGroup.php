<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

/**
 * @property string  $name
 * @property string  $type
 * @property int     $section_ammount
 * @property int     $question_ammount_per_section
 * @property int     $duration_per_section
 * @property int     $created_at
 * @property int     $updated_at
 * @property boolean $is_skippable
 */
class QuestionGroup extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'question_groups';

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
        'name', 'type', 'section_ammount', 'question_ammount_per_section', 'duration_per_section', 'is_skippable', 'user_created', 'user_updated', 'created_at', 'updated_at',
        'group_type'
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
        'name' => 'string', 'type' => 'string', 'section_ammount' => 'int', 'question_ammount_per_section' => 'int', 'duration_per_section' => 'int', 'is_skippable' => 'boolean', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
    const TYPE_KECERMATAN = 'kecermatan';
    const TYPE_KECERDASAN = 'kecerdasan';
    const TYPE_KEPRIBADIAN = 'kepribadian';
    // Scopes...

    // Functions ...
    static function typeQuestionGroupForOption(){
        return [
            'Kecermatan' => Self::TYPE_KECERMATAN,
            'Kecerdasan' => Self::TYPE_KECERDASAN,
            'Kepribadian' => Self::TYPE_KEPRIBADIAN
        ];
    }

    static function typeQuestionGroup(){
        return [
            Self::TYPE_KECERMATAN,
            Self::TYPE_KECERDASAN,
            Self::TYPE_KEPRIBADIAN
        ];
    }

    static function canSkipQuestion($type){
        return in_array($type,[
            Self::TYPE_KECERDASAN
        ]);
    }

    public function getTypeStrAttribute(){
        return str_replace('_',' ',$this->type);
    }

    public function getTotalQuestionAttribute(){
        return $this->section_ammount * $this->question_ammount_per_section;
    }

    public function getTotalQuestionFilledAttribute(){
        return $this->questions()->count();
    }

    public function getDetailUrlAttribute(){
        return route('admin.question-group.edit',$this->id);
    }

    public function getSectionUrlAttribute(){
        return route('admin.question-group.section',$this->id);
    }

    // Relations ...
    public function room(){
        return $this->hasManyThrough(Room::class,'room_question_groups');
    }

    public function sections(){
        return $this->hasMany(TaskSection::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

}
