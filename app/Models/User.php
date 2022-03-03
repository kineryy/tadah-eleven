<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'register_ip',
        'last_ip',
        'invite_key',
        'last_online'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email',
        'password',
        'remember_token',
        'register_ip',
        'last_ip'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'banned_until',
        'joined',
        'last_online'
    ];

    public function threads()
    {
        return $this->hasMany('App\Models\ForumThread', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\ForumPost', 'user_id');
    }

    public function getReadableMoney()
    {
        $money = $this->money;

        if ($money < 100000) {
            // Anything less than one hundred thousand
            $money_format = number_format($money);
        } else if ($money < 1000000) {
            // Anything less than a million
            $money_format = number_format($money / 1000, 0) . 'K+';
        } else if ($money < 1000000000) {
            // Anything less than a billion
            $money_format = number_format($money / 1000000, 0) . 'M+';
        } else {
            // At least a billion
            $money_format = number_format($money / 1000000000, 1) . 'B+';
        }

        return $money_format;
    }
}
