<?php


namespace App;


use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use HasRoles;

    public $timestamps = false;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
         'user_code', 'users_name', 'email', 'password', 'user_birthdate', 'user_phone', 'user_gender', 'user_img', 'province_code', 'city_code', 'district_code', 'kelurahan_code', 'kode_pos',
         'user_alamat', 'status','is_dashboard'
     ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_dashboard' => 1,

    ];
}
