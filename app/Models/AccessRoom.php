<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string   $key
 * @property string   $type
 * @property int      $limit_access
 * @property int      $access_counter
 * @property int      $created_at
 * @property int      $updated_at
 * @property DateTime $valid_until
 * @property boolean  $is_active
 */
class AccessRoom extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'access_rooms';

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
        'room_id', 'key', 'type', 'limit_access', 'valid_until', 'access_counter', 'is_active', 'user_created', 'user_updated', 'created_at', 'updated_at'
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
        'key' => 'string', 'type' => 'string', 'limit_access' => 'int', 'valid_until' => 'datetime', 'access_counter' => 'int', 'is_active' => 'boolean', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'valid_until', 'created_at', 'updated_at'
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
    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function participants(){
        return $this->hasMany(Participant::class);
    }
}
