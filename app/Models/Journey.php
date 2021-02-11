<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Journey
 * @package App\Models
 * @property int id
 * @property int uuid
 * @property string latitude
 * @property string longitude
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon deleted_at
 * @property Carbon last_login_at
 */
class Journey extends Model
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
        'latitude',
        'longitude',
        'start_address',
        'start_lat',
        'start_long',
        'end_address',
        'end_lat',
        'end_long',
        'distance_text',
        'distance_value',
        'duration_text',
        'duration_value',
        'created_at',
        'updated_at',
        'deleted_at',
        'last_login_at',
    ];
}








