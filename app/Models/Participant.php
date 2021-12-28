<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string   $name
 * @property string   $phone
 * @property string   $email
 * @property string   $token_id
 * @property DateTime $time_start
 * @property DateTime $time_end
 * @property DateTime $time_limit
 * @property int      $created_at
 * @property int      $updated_at
 */
class Participant extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'participants';

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
        'name', 'phone', 'email', 'access_room_id', 'room_id', 'time_start', 'time_end', 'time_limit', 'token_id', 'created_at', 'updated_at'
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
        'name' => 'string', 'phone' => 'string', 'email' => 'string', 'time_start' => 'datetime', 'time_end' => 'datetime', 'time_limit' => 'datetime', 'token_id' => 'string', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'time_start', 'time_end', 'time_limit', 'created_at', 'updated_at'
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
    public function accessRoom(){
        return $this->belongsTo(AccessRoom::class);
    }

    public function room(){
        return $this->belongsTo(Rooms::class);
    }

    public function answers(){
        return $this->hasMany(ParticipantAnswer::class);
    }
}
