<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Journey
 * @package App\Models
 * @property int id
 * @property int uuid
 * @property string city
 * @property string zip
 * @property string state
 * @property string latitude
 * @property string longitude
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon deleted_at
 * @property Carbon last_login_at
 */
class Map extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'uuid',
        'city',
        'zip',
        'state',
        'latitude',
        'longitude',
        'created_at',
        'updated_at',
        'deleted_at',
        'last_login_at',
    ];
}
