<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string  $name
 * @property boolean $is_active
 * @property int     $created_at
 * @property int     $updated_at
 */
class Room extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rooms';

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
        'name', 'is_active', 'user_created', 'user_updated', 'created_at', 'updated_at'
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
        'name' => 'string', 'is_active' => 'boolean', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
    public function getDetailUrlAttribute(){
        return route('admin.room.edit',$this->id);
    }

    public function getTotalDurationAttribute(){
        return $this->questionGroups->reduce(function ($total,$value){
            return $total + ($value->section_ammount * $value->duration_per_section);
        },0);
    }
    // Relations ...
    public function questionGroups(){
        return $this->belongsToMany(QuestionGroup::class,'room_question_groups');
    }

    public function participants(){
        return $this->hasMany(Participant::class);
    }

    public function accessRooms(){
        return $this->hasMany(AccessRoom::class);
    }
}
