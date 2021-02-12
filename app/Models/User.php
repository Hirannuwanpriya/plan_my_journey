<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App\Models
 * @property int id
 * @property int uuid
 * @property string name
 * @property string email
 * @property Carbon email_verified_at
 * @property string password
 * @property string first_name
 * @property string last_name
 * @property string phone
 * @property string gender
 * @property string country
 * @property Carbon birthday
 * @property boolean is_valid
 * @property boolean is_disabled
 * @property boolean is_social_valid
 * @property boolean is_phone_valid
 * @property boolean has_sms_recovery
 * @property string facebook_id
 * @property string twitter_id
 * @property string linkedin_id
 * @property string message_notification
 * @property string reminder_notification
 * @property string api_limit_notification
 * @property string legal_notification
 * @property string payment_notification
 * @property string billing_name
 * @property string billing_first_address
 * @property string billing_second_address
 * @property string tva_number
 * @property string billing_telephone
 * @property string billing_city
 * @property string billing_zip_code
 * @property string billing_province
 * @property string billing_country
 * @property string shipping_name
 * @property string shipping_first_address
 * @property string shipping_second_address
 * @property string shipping_telephone
 * @property string shipping_city
 * @property string shipping_zip_code
 * @property string shipping_province
 * @property string shipping_country
 * @property boolean subscription_sales_promotions
 * @property boolean subscription_product_updates
 * @property boolean subscription_newsletter
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon deleted_at
 * @property Carbon last_login_at
 */

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'uuid',
        'name',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'gender',
        'country',
        'birthday',
        'facebook_id',
        'twitter_id',
        'linkedin_id',

        'created_at',
        'updated_at',
        'deleted_at',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
