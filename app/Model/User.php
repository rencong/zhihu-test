<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Naux\Mail\SendCloudTemplate;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'confirmation_token'
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

//    public function setPasswordAttribute($password)
//    {
//        $this->attributes['password'] = Hash::make($password);
//    }

    public function sendPasswordResetNotification($token)
    {
        // 模板变量
        $bind_data = [
            'url'  => url(config('app.url').route('password.reset', $token, false))
        ];
        $template = new SendCloudTemplate('password_reset', $bind_data);

        Mail ::raw($template, function ($message){
            $message->from('2860105819@qq.com', 'Renc');
            $message->to($this->email);
        });
    }
}
